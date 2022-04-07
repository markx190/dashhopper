<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;
use Auth;

class NewsContents extends Model
{
    protected $table = "news_contents";
    protected $guarded = ['id'];
    
    public static function addNewsContents($request)
    {
        DB::beginTransaction();
        try {
        $createPurchasings = self::create([
            'news_id_no' => mt_rand(100000, 999999),
            'article_name' => $request->article_name,
            'contents' => $request->contents,
            'content_type' => $request->content_type,
            'position' => $request->position,
            'content_status' => $request->content_status,
            'news_image' => $request->news_image,
            'created_by' => $request->created_by
        ]);
            DB::commit();
            return response()->json('Saved'); 
        } catch (Exception $e){
            DB::rollback();
            return $e->getMessage();
        } 
    }

    // public static function saveUpdatedPurchase($request)
    // {
    //     DB::beginTransaction();
    //     try {
    //     $editPurchase = self::where('id', $request->e_pur_item_id)->first();
    //     if (!empty($editPurchase)){
    //         $editPurchase->quantity = $request->e_pur_qty;
    //         $editPurchase->total_amount = $request->e_pur_total_amount;
    //         $editPurchase->save();
    //         DB::commit();
    //             return response()->json($editPurchase->item_name);
    //         }  
    //     } catch(Exception $e){
    //         DB::rollback();
    //         return $e->getMessage();
    //     }
    // }

    // public static function saveDeletedPurchase($request)
    // {
    //     $deletePurchase = self::find($request->d_pur_item_id)->delete();
    //         return response()->json(['status' => 'deleted']);
    // }

    // public static function countPurchasingsNotifications($request)
    // {
    //     try {
    //         $countPurchasingsNotifications = self::where('buying_id_no', 3)->count();
    //         return response()->json($countPurchasingsNotifications);
    //     } catch (Exception $e){
    //         return $e->getMessage();
    //     }        
    // }

    // public static function dropDownListOfPurchasings($request)
    // {
    //     try {
    //         $dropDownListOfPurchasings = self::where('pur_status', 'Unpaid')
    //                                            ->where('buying_id_no', Auth::user()->hic_id_no)
    //                                            ->groupBy('buying_id_no')
    //                                            ->get(); 
    //         return $dropDownListOfPurchasings;
    //     } catch (Exception $e){
    //         return $e->getMessage();
    //     }
    // }

}


