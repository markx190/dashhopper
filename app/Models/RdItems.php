<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;

class RdItems extends Model
{
    protected $table = "rd_items";
    protected $guarded = ['id'];
    
    public static function addItems($request)
    {
        DB::beginTransaction();
        try {
        $createItems = self::create([
            'item_id_no' => mt_rand(100000, 999999),
            'hic_id_no' => $request->add_hic_id_no,
            'company_name' => $request->add_company_name,
            'region' => $request->add_region,
            'item_name' => $request->add_item_name,
            'item_status' => $request->add_item_status,
            'category' => $request->add_item_category,
            'qty_stock' => $request->add_qty_stock,
            'unit_price' => $request->add_unit_price,
            'purchase_month' => $request->add_pur_month,
            'purchase_day' => $request->add_pur_day,
            'purchase_year' => $request->add_pur_year, 
            'purchased_from' => $request->add_pur_from,
            'exp_month' => $request->add_exp_month,
            'exp_day' => $request->add_exp_day,
            'exp_year' => $request->add_exp_year
        ]);
            DB::commit();
            return $createItems; 
        } catch (Exception $e){
            DB::rollback();
            return $e->getMessage();
        } 
    }

    public static function saveUpdatedItems($request)
    {
        DB::beginTransaction();
        try {
        $updatedItems = self::where('id', $request->edit_item_id)->first();
        if (!empty($updatedItems)){
            $updatedItems->item_id_no = $request->edit_item_id_no;
            $updatedItems->item_name = $request->edit_item_name;
            $updatedItems->category = $request->edit_item_category;
            $updatedItems->qty_stock = $request->edit_qty_stock;
            $updatedItems->unit_price = $request->edit_unit_price;
            $updatedItems->purchase_month = $request->edit_pur_month;
            $updatedItems->purchase_day = $request->edit_pur_day;
            $updatedItems->purchase_year = $request->edit_pur_year;
            $updatedItems->purchased_from = $request->edit_pur_from;
            $updatedItems->exp_month = $request->edit_exp_month;
            $updatedItems->exp_day = $request->edit_exp_day;
            $updatedItems->exp_year = $request->edit_exp_year;
            $updatedItems->save();
            DB::commit();
            return $updatedItems;
        }  
        } catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    public static function saveDeletedItems($request)
    {
        $deletedItems = self::find($request->delete_item_id)->delete();
            return response()->json(['status' => 'saved']);
    }

}


