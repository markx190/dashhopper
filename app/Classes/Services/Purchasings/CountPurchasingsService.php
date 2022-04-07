<?php

namespace App\Classes\Services\Purchasings;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\RdPurchasings;
use Auth;
use DB;
use Exception;

class CountPurchasingsService
{
    public function indexOrdersView()
    {
        try {
            $purchasings = RdPurchasings::all();
            $bloodGroups = Constants::BLOOD_GROUPS;
            $hicRegions = RdPurchasings::select('region')->groupBy('region')->get();
            return view('reddrop_back.purchasings.manage_purchasings_box', [
                'hicItems' => $purchasings,
                'hicRegions' => $hicRegions,
                'bloodGroups' => $bloodGroups
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function ordersDataTable($request)
    {
        try {    
            $queryItems = DB::table('rd_purchasings')
                                ->select(
                                    'id', 
                                    'pur_id_no',
                                    'hic_id_no',
                                    'buying_id_no',
                                    'item_id_no', 
                                    'item_name', 
                                    'category',
                                    'unit_price',
                                    'quantity',
                                    'total_amount',
                                    'company_name', 
                                    'region',
                                    'buying_company',
                                    'pur_status'
                                    )->where('buying_id_no', 698602);
            
            if ($request->hicItemName == 'All'){
                $queryItems = DB::table('rd_purchasings')
                                ->select(
                                    'id', 
                                    'pur_id_no',
                                    'hic_id_no',
                                    'buying_id_no',
                                    'item_id_no', 
                                    'item_name',
                                    'category', 
                                    'unit_price',
                                    'quantity',
                                    'total_amount',
                                    'company_name', 
                                    'region',
                                    'buying_company',
                                    'pur_status'
                                    )->where('buying_id_no', '!=', 698602);
            }
            
            if ($request->hicItemName){
                $queryItems->where('item_name', $request->hicItemName);
            }
                                            
            if ($request->hicRegion){
                $queryItems->where('region', $request->hicRegion);
            }

            $userIdNo = Auth::user()->hic_id_no;
            $buyingCompany = Auth::user()->hic_name;
                                                         
            $query = datatables()->of($queryItems);
                return $query
            ->addColumn('action', function ($data) use($userIdNo, $buyingCompany) {
                $editPurchase = $data->id;
                $deletePurchase = $data->id;
                $action ='
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-primary btn-sm" type="button"
                            data-pur-id="'. $data->id .'"
                            data-pur-id-no="'. $data->pur_id_no .'"
                            data-item-name="'. $data->item_name .'"
                            data-item-unit-price="'. $data->unit_price .'"
                            data-item-quantity="'. $data->quantity .'"
                            data-item-company-name="'. $data->company_name .'"
                            data-item-category="'. $data->category .'"
                            data-item-region="'. $data->region .'"
                            data-buying-id-no="'. $data->buying_id_no .'"
                            data-buying-company="'. $data->buying_company .'"
                            onclick="editPurchase('. $data->id .', '. $editPurchase .', this)">
                            <i class="fa fa-edit"></i> Edit
                        </button>
                    </a>
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-danger btn-sm" type="button"
                            data-pur-id="'. $data->id .'"
                            data-pur-id-no="'. $data->pur_id_no .'"
                            onclick="deletePurchase('. $data->pur_id_no .', '. $deletePurchase .', this)">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </a>';
                return $action;
            })
            ->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function countPurchasingsNotifications($request)
    {
        try {
            $countPurchasingsNotifications = RdPurchasings::countPurchasingsNotifications($request);
            return $countPurchasingsNotifications;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function dropDownListOfPurchasings($request)
    {
        try {
            $dropDownListOfPurchasings = RdPurchasings::dropDownListOfPurchasings($request);  
            return view('reddrop_back.purchasings.dropdown_list_of_purchasings', [
                'purchasings' => $dropDownListOfPurchasings
            ]);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}
