<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Auth;

class BtTransactions extends Model
{
    protected $table = "bt_travel_transactions";
	protected $guarded = ['id'];
    
    public static function bookTransactions($request)
    {
        $createTransactions = self::create([
            'trans_id_no' => mt_rand(100000, 999999),
            'bt_id_no' => $request->btIdNo,
            'sd_id_no' => $request->sdIdNo,
            'bt_name' => $request->btName,
            'drivers_name' => $request->driversName,
            'service_name' => $request->serviceName,
            'vehicle_location' => $request->vehicleLocation,
            'service_industry' => $request->serviceIndustry,
            'vehicle_type' => $request->vehicleType,
            'vehicle_label' => $request->vehicleLabel,
            'vehicle_plate_no' => $request->vehiclePlateNo,
            'vehicle_setting_capacity' => $request->vehicleSettingCapacity,
            'vehicle_baggage_capacity' => $request->vehicleBaggageCapacity,
            'service_description' => $request->serviceDesc,
            'service_route' => $request->serviceRoute,
            'trans_amount' => $request->fareAmount,
            'type_of_trip' => $request->getTrip,
            'book_month' => $request->bookMonthVal,
            'book_day' => $request->bookDay,
            'book_year' => $request->bookYear,
            'book_hour' => $request->bookHour,
            'day_format' => $request->getDayFormat,
            'pickup_location' => $request->pickUpLocation,
            'firstname' => $request->firstName,
            'lastname' => $request->lastName,
            'client_contact_no' => $request->getClientContactNo,
            'passenger_count' => $request->noOfPassenger,
            'trans_status' => $request->transStatus 
        ]);
       
        return response()->json($createTransactions);
    }

    public static function saveEditedTransactions($request)
    {
        $editedTransactions = BtTransactions::where('trans_id_no', $request->e_TransIdNo)->first();
        if (!empty($editedTransactions)){
            $editedTransactions->trans_status = $request->e_TransStatus;
            $editedTransactions->save();
            return $editedTransactions;
        }  
    }

    public static function saveEditedBookings($request)
    {
        $editedBookings = BtTransactions::where('trans_id_no', $request->e_TransIdNo)->first();
        if (!empty($editedBookings)){
            $editedBookings->trans_status = $request->e_TransStatus;
            $editedBookings->save();
            return $editedBookings;
        }  
    }

    public static function countBookNotifications($request)
    {
        $countBookNotifications = BtTransactions::where('bt_id_no',  Auth::user()->user_id_no)->where('trans_status', 'Unpaid')->count();
        return response()->json($countBookNotifications);
        
    }

    public static function dropDownListOfBookings()
    {
        $dropDownListOfBookings = BtTransactions::where('bt_id_no',  Auth::user()->user_id_no)->where('trans_status', 'Unpaid')->orderBy('created_at', 'DESC')->get();
        return $dropDownListOfBookings;
    }

    public static function bookingPerCustomer($request)
    {
        $bookingPerCustomer = BtTransactions::where('trans_id_no',  $request->id)->first();
        return $bookingPerCustomer;
    }

    public static function readCustomerBooking($request)
    { 
        $bookingPerCustomer = BtTransactions::where('trans_id_no',  $request->id)->first();
            if(!empty($bookingPerCustomer)){
                $bookingPerCustomer->trans_status = $request->readStatus;
                $bookingPerCustomer->save();
                return $bookingPerCustomer;
            } else {
                return respose()->json('Error');
            }
    }

    public static function custReadCustomerBooking($request)
    { 
        $custBookingPerCustomer = BtTransactions::where('trans_id_no',  $request->id)->first();
            if(!empty($custBookingPerCustomer)){
                $custBookingPerCustomer->trans_status = $request->custReadStatus;
                $custBookingPerCustomer->save();
                return $custBookingPerCustomer;
            } else {
                return respose()->json('Error');
            }
    }

    public static function saveAcceptedBooking($request)
    {
        $saveAcceptedBooking = BtTransactions::where('trans_id_no',  $request->c_TransIdNo)->first();
            if(!empty($saveAcceptedBooking)){
                $saveAcceptedBooking->trans_status = $request->c_TransStatus;
                $saveAcceptedBooking->save();
                return response()->json('Saved');
            } else {
                return respose()->json('Error');
        }
    }

    public static function custSaveAcceptedBooking($request)
    {
        $custSaveAcceptedBooking = BtTransactions::where('trans_id_no',  $request->c_TransIdNo)->first();
            if(!empty($custSaveAcceptedBooking)){
                $custSaveAcceptedBooking->trans_status = $request->c_TransStatus;
                $custSaveAcceptedBooking->save();
                return response()->json('Saved');
            } else {
                return respose()->json('Error');
        }
    }

    public static function customerCountBookNotifications($request)
    {
        $custCountBookNotifications = BtTransactions::where('trans_id_no',  Auth::user()->spock_id_no)->where('trans_status', 'Accepted')->count();
        return response()->json($custCountBookNotifications);
        
    }

    public static function customerDropDownListOfBookings()
    {
        $custDropDownBookNotifications = BtTransactions::where('trans_id_no',  Auth::user()->spock_id_no)->where('trans_status', 'Accepted')->orderBy('updated_at', 'DESC')->get();
        return $custDropDownBookNotifications;
    }

}

