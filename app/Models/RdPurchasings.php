<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;
use Auth;

class RdPurchasings extends Model
{
    protected $table = "rd_purchasings";
    protected $guarded = ['id'];
    
    public static function addPurchase($request)
    {
        DB::beginTransaction();
        try {
        $createPurchasings = self::create([
            'pur_id_no' => mt_rand(100000, 999999),
            'hic_id_no' => $request->p_hic_id_no,
            'item_id_no' => $request->p_item_id_no,
            'item_name' => $request->p_item_name,
            'category' => $request->p_item_category,
            'company_name' => $request->p_company_name,
            'buying_company' => $request->p_buying_company,
            'buying_id_no' => $request->p_buying_id_no,
            'region' => $request->p_item_region,
            'quantity' => $request->p_item_quantity,
            'unit_price' => $request->p_unit_price,
            'total_amount' => $request->p_total_amount,
            'pur_status' => $request->p_item_status
        ]);
            DB::commit();
            return response()->json($createPurchasings->item_name); 
        } catch (Exception $e){
            DB::rollback();
            return $e->getMessage();
        } 
    }

    public static function saveUpdatedPurchase($request)
    {
        DB::beginTransaction();
        try {
        $editPurchase = self::where('id', $request->e_pur_item_id)->first();
        if (!empty($editPurchase)){
            $editPurchase->quantity = $request->e_pur_qty;
            $editPurchase->total_amount = $request->e_pur_total_amount;
            $editPurchase->save();
            DB::commit();
                return response()->json($editPurchase->item_name);
            }  
        } catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    public static function saveDeletedPurchase($request)
    {
        $deletePurchase = self::find($request->d_pur_item_id)->delete();
            return response()->json(['status' => 'deleted']);
    }

    public static function countPurchasingsNotifications($request)
    {
        try {
            $countPurchasingsNotifications = self::where('buying_id_no', 3)->count();
            return response()->json($countPurchasingsNotifications);
        } catch (Exception $e){
            return $e->getMessage();
        }        
    }

    public static function dropDownListOfPurchasings($request)
    {
        try {
            $dropDownListOfPurchasings = self::where('pur_status', 'Unpaid')
                                               ->where('buying_id_no', Auth::user()->hic_id_no)
                                               ->groupBy('buying_id_no')
                                               ->get(); 
            return $dropDownListOfPurchasings;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}


