<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;
use Auth;

class TripPassengers extends Model
{
    protected $table = "trip_passengers";
    protected $guarded = ['id'];
    
    public static function addPassenger($request)
    {
        DB::beginTransaction();
        try {
        $refNumber = mt_rand(100000, 999999); 
        $createTripPassengers = self::create([
            'passenger_id_no' => mt_rand(100000, 999999),
            'ref_number' => $refNumber,
            'bus_id_no' => $request->pBusIdNo,
            'travel_id_no' => $request->pTravelIdNo,
            'seat_no' => $request->pSeatNo,
            'bus_number' => $request->pBusNo,
            'bus_type' => $request->pBusType,
            'company_name' => $request->pCompanyName,
            'origin_address' => $request->pOriginAddress,
            'destination_address' => $request->pDestinationAddress,
            'site_terminal' => $request->pSiteTerminal,
            'travel_date' => $request->pTravelDate,
            'travel_time' => $request->pTravelTime,
            'time_ap' => $request->pTimeAp,
            'first_name' => $request->pFirstName,
            'middle_name' => $request->pMiddleName,
            'last_name' => $request->pLastName,
            'gender' => $request->gender,
            'age' => $request->pAge,
            'p_address' => $request->pAddress,
            'p_contact_no' => $request->pContactNo,
            'fare_amount' => $request->pFareAmount,
            'p_status' => 'Unpaid'
        ]);
            DB::commit();
            return $refNumber; 
        } catch (Exception $e){
            DB::rollback();
            return $e->getMessage();
        } 
    }

    public static function saveUpdatedPassenger($request)
    {
        DB::beginTransaction();
        try {
        $updatedPassenger = self::where('id', $request->jobId)->first();
        if (!empty($updatedPassenger)){
            $updatedPassenger->payment_method = $request->pPaymentMethod;
            $updatedPassenger->p_status = $request->pStatus;
            $updatedPassenger->ref_number = $request->pRefNumber;    
            $updatedPassenger->save();
            DB::commit();
            return $updatedPassenger;
            }  
        } catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    public static function saveDeletedJob($request)
    {
        $deletedLinks = self::find($request->dJobId)->delete();
            return response()->json('Deleted');
    }

}


