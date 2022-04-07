<?php

namespace App\Classes\Services\Purchasings;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\RdPurchasings;
use App\Models\RdItems;
use DB;
use Auth;
use Exception;

class PurchasingsService
{
    public function indexView()
    {
        try {
            $purchasings = RdItems::all();
            $bloodGroups = Constants::BLOOD_GROUPS;
            $hicRegions = RdItems::select('region')->groupBy('region')->get();
            return view('reddrop_back.purchasings.manage_purchasings', [
                'hicItems' => $purchasings,
                'hicRegions' => $hicRegions,
                'bloodGroups' => $bloodGroups
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function pDataTable($request)
    {
        try {
            
            $queryItems = DB::table('rd_items')
                                ->select(
                                    'id', 
                                    'hic_id_no',
                                    'item_id_no', 
                                    'item_name', 
                                    'category',
                                    'company_name', 
                                    'region', 
                                    'category', 
                                    'qty_stock', 
                                    'unit_price', 
                                    'item_status'
                                    )->where('hic_id_no', '!=', Auth::user()->hic_id_no);
            
            if ($request->hicItemName == 'All'){
                $queryItems = DB::table('rd_items')
                                ->select(
                                    'id', 
                                    'hic_id_no',
                                    'item_id_no', 
                                    'item_name', 
                                    'category',
                                    'company_name', 
                                    'region', 
                                    'category', 
                                    'qty_stock', 
                                    'unit_price', 
                                    'item_status'
                                    )->where('hic_id_no', '!=', Auth::user()->hic_id_no)->get();
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
                $addPurchase = $data->id;
                $deleteItem = $data->id;
                $action = '
                    <a target="_blank" style="text-decoration:none;">
                        <button class="btn btn-primary btn-sm" type="button"
                            data-item-id="'. $data->id .'"
                            data-hic-id-no="'. $data->hic_id_no .'"
                            data-buying-id-no="'. $userIdNo .'"
                            data-buying-company="'. $buyingCompany .'"
                            data-item-id-no="'. $data->item_id_no .'"
                            data-item-name="'. $data->item_name .'"
                            data-item-category="'. $data->category .'"
                            data-item-company-name="'. $data->company_name .'"
                            data-item-region="'. $data->region .'"
                            data-item-unit-price="'. $data->unit_price .'" 
                            onclick="addPurchase('. $data->id .', '. $addPurchase .', this)">
                            <i class="fa fa-plus-circle"></i> Buy
                        </button>
                    </a>';
                return $action;
            })
            ->make();
        } catch(Exception $e) {
            return $e->getMessage();
        }
    }

    public function addPurchase(Request $request)
    {
        try {
            $addPurchase =  RdPurchasings::addPurchase($request);
            return $addPurchase;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function editPurchase(Request $request)
    {
        try {
            $editPurchase =  RdPurchasings::saveUpdatedPurchase($request);
            return $editPurchase;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function deleteItems(Request $request)
    {
        try {
            $deletedItems =  RdPurchasings::saveDeletedItems($request);
            return $deletedItems;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public function unitTest(Request $request)
    {
        try {
            // $mapKo = ['place' => 'california', 'coordinates' => '14.343, 121.680'];
            return view('reddrop_back.purchasings.unit_test');
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }
}
