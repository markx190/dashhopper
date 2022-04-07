<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderItem;
use App\Corepatient;
use App\Item;

use Aceraven777\PayMaya\PayMayaSDK;
use Aceraven777\PayMaya\API\Checkout;
use Aceraven777\PayMaya\Model\Checkout\Item as PayMayaItem;
use App\Libraries\PayMaya\User as PayMayaUser;
use Aceraven777\PayMaya\Model\Checkout\ItemAmount;
use Aceraven777\PayMaya\Model\Checkout\ItemAmountDetails;

class OrderController extends Controller
{
    public function index(){
        $orders = Order::paginate(10);
        return view ('orders.index')->withOrders($orders);
    }

    public function show($id){
        $orders = OrderItem::join('items', 'order_items.inventory_id', '=', 'items.id')->where('order_id', $id)->paginate(5);
        return view('orders.show')->withOrders($orders);
    }

    public function store(Request $req){
    	PayMayaSDK::getInstance()->initCheckout(
	        'pk-A8aEsptjZGXar9At3ZPKH0DlUZge5UKXFqloeGDtARm',
	        'sk-bi6bdLEfFd1GH6T6bF19vvI3kXc5gvTDJWbpDL3QWeK',
	        'SANDBOX'
	    );

    	$order = new Order();

    	if(is_numeric($req->id)){
    		$patient = Corepatient::find($req->id);

    		$order->fname = $patient->pFirstname;
    		$order->lname = $patient->pLastname;
    		$order->age = $patient->pAge;
    		$order->hosp_name = $patient->pClinicId;
    		$order->doc_name = $patient->pDoctorsname;
    	}
    	else{
    		$patient = json_decode($req->id);

    		$order->fname = $patient[0];
    		$order->lname = $patient[1];
    		$order->age = $patient[2];
    		$order->hosp_name = $patient[3];
    		$order->doc_name = $patient[4];
    	}

    	$order->save();
    	$orderItems = array();

    	$items = json_decode($req->orders);
    	foreach($items as $orders){
    		$item = Item::find($orders->inventory_id);
    		$orderItem = new OrderItem();
    		$orderItem->order_id = $order->id;
    		$orderItem->inventory_id = $item->id;
    		$orderItem->quantity = $orders->quantity;
    		$orderItem->price = $orders->price;

    		$orderItem->save();
    		array_push($orderItems, $orderItem);

            $temp = Item::find($orders->inventory_id);
            $temp->pQuantity = $temp->pQuantity - $orders->quantity;
            $temp->save();
    	}

    	$sample_item_name = Item::find($orderItems[0]->inventory_id)->pHCI;
	    $sample_total_price = Item::find($orderItems[0]->inventory_id)->pSellingPrice;

	    $sample_user_phone = '09154590172';
	    $sample_user_email = 'admin@admin.com';
	    
	    $sample_reference_number = '1234567890';

	    // Item
	    $itemAmountDetails = new ItemAmountDetails();
	    $itemAmountDetails->tax = "0.00";
	    $itemAmountDetails->subtotal = number_format($sample_total_price, 2, '.', '');
	    $itemAmount = new ItemAmount();
	    $itemAmount->currency = "PHP";
	    $itemAmount->value = $itemAmountDetails->subtotal;
	    $itemAmount->details = $itemAmountDetails;
	    $item = new PayMayaItem();
	    $item->name = $sample_item_name;
	    $item->amount = $itemAmount;
	    $item->totalAmount = $itemAmount;

	    // Checkout
	    $itemCheckout = new Checkout();

	    $user = new PayMayaUser();
	    $user->contact->phone = $sample_user_phone;
	    $user->contact->email = $sample_user_email;

	    $itemCheckout->buyer = $user->buyerInfo();
	    $itemCheckout->items = array($item);
	    $itemCheckout->totalAmount = $itemAmount;
	    $itemCheckout->requestReferenceNumber = $sample_reference_number;
	    $itemCheckout->redirectUrl = array(
	        "success" => route('paymaya.success'),
	        "failure" => route('paymaya.failed'),
	        "cancel" => route('paymaya.cancelled'),
	    );

	    if ($itemCheckout->execute() === false) {
            $error = $itemCheckout::getError();
            return redirect()->back()->withErrors(['message' => $error['message']]);
        }

        if ($itemCheckout->retrieve() === false) {
            $error = $itemCheckout::getError();
            return redirect()->back()->withErrors(['message' => $error['message']]);
        }

        return redirect()->to($itemCheckout->url);
    }

    public function success(){
    	return redirect()->route('patients');
    }

    public function failed(){
    	return redirect()->route('patients');
    }

    public function cancelled(){
    	return redirect()->route('patients');
    }

}
