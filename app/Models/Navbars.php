<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;
use Auth;

class Navbars extends Model
{
    protected $table = "navbars";
    protected $guarded = ['id'];
    
    public static function addNavlink($request)
    {
        DB::beginTransaction();
        try {
        $createLinks = self::create([
            'navbar_id_no' => mt_rand(100000, 999999),
            'label_name' => $request->navLabelName,
            'position_number' => $request->positionNumber,
            'navbar_type' => $request->navbarType,
            'navlink_status' => 'For Approval',
            'created_by' => Auth::user()->user_firstname .' '. Auth::user()->user_lastname
        ]);
            DB::commit();
            return $createLinks; 
        } catch (Exception $e){
            DB::rollback();
            return $e->getMessage();
        } 
    }

    public static function saveUpdatedLinks($request)
    {
        DB::beginTransaction();
        try {
        $updatedLinks = self::where('id', $request->eNavId)->first();
        if (!empty($updatedLinks)){
            $updatedLinks->label_name = $request->eNavLabelName;
            $updatedLinks->position_number = $request->ePositionNumber;
            $updatedLinks->navbar_type = $request->eNavbarType;
            $updatedLinks->navlink_status = $request->eNavStatus;
    
            $updatedLinks->save();
            DB::commit();
            return $updatedLinks;
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


