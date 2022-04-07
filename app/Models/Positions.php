<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;
use Auth;

class Positions extends Model
{
    protected $table = "positions";
    protected $guarded = ['id'];
    
    public static function addJob($request)
    {
        DB::beginTransaction();
        try {
        $createJobs = self::create([
            'position_id_no' => mt_rand(100000, 999999),
            'position_name' => $request->jobName,
            'position_type' => $request->positionType,
            'created_by' => Auth::user()->user_firstname .' '. Auth::user()->user_lastname
        ]);
            DB::commit();
            return $createJobs; 
        } catch (Exception $e){
            DB::rollback();
            return $e->getMessage();
        } 
    }

    public static function saveUpdatedJob($request)
    {
        DB::beginTransaction();
        try {
        $updatedJob = self::where('id', $request->jobId)->first();
        if (!empty($updatedJob)){
            $updatedJob->position_name = $request->eJobName;
            $updatedJob->position_type = $request->ePositionType;
            $updatedJob->created_by = Auth::user()->user_firstname .' '. Auth::user()->user_lastname;
    
            $updatedJob->save();
            DB::commit();
            return $updatedJob;
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


