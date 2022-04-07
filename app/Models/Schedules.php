<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;
use Auth;

class Schedules extends Model
{
    protected $table = "travel_schedules";
    protected $guarded = ['id'];

    public static function saveUpdatedSchedules($request)
    {
        DB::beginTransaction();
        try {
        $updatedSchedules = self::where('id', $request->id)->first();
        if (!empty($updatedSchedules)){
            $updatedSchedules->company_name = $request->company_name;
            $updatedSchedules->bus_type = $request->bus_type;
            $updatedSchedules->fare_amount = $request->fare_amount;
            $updatedSchedules->travel_date = $request->travel_date;
            $updatedSchedules->travel_time = $request->travel_time;
            $updatedSchedules->time_ap = $request->time_ap;
            $updatedSchedules->origin_address = $request->origin_address;
            $updatedSchedules->destination_address = $request->destination_address;
            $updatedSchedules->origin_address = $request->origin_address;
            $updatedSchedules->destination_address = $request->destination_address;
            $updatedSchedules->driver_name = $request->driver_name;
            $updatedSchedules->conductor_name = $request->conductor_name;
    
            $updatedSchedules->save();
            DB::commit();
            return response()->json(['errorStatus' => 0]);
            }  
        } catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    public static function saveDeleteLink($request)
    {
        $deletedLinks = self::find($request->dNavId)->delete();
            return response()->json('Deleted');
    }

}


