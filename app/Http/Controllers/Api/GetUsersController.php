<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Api\GetUsersService;
use App\User;
use App\Models\RdItems;
use Auth;
use Validator;
use Exception;

class GetUsersController extends Controller
{
    protected $getUsers;

    public function __construct(GetUsersService $getUsers)
    {
        $this->getUsers = $getUsers;
    }

    public function getUsers()
    {
        try {
            $getUsers = $this->getUsers->getUsers();
            return $getUsers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
    
    // public function purchasingsDtAjax(Request $request)
    // {
    //     try {
    //         return $this->purchasings->pDataTable($request);
    //     } catch (Exception $e){
    //         return $e->getMessage();
    //     }
    // }

    // public function addPurchase(Request $request)
    // {
    //     try {
    //         $addPurchase = $this->purchasings->addPurchase($request);
    //         return $addPurchase;
    //     } catch (Exception $e){
    //         return $e->getMessage();
    //     }
    // }

    // public function editPurchase(Request $request)
    // {
    //     try {
    //         $editPurchase = $this->purchasings->editPurchase($request);
    //         return $editPurchase;
    //     } catch (Exception $e){
    //         return $e->getMessage();
    //     }
    // }

    // public function deletePurchase(Request $request)
    // {
    //     try {
    //         $deletedPurchase = $this->purchasings->deletePurchase($request);
    //         return $deletedPurchase;
    //     } catch (Exception $e){
    //         return $e->getMessage();
    //     }
    // }

    // public function unitTest(Request $request)
    // {
    //     try {
    //         $unitTest = $this->purchasings->unitTest($request);
    //         return $unitTest;
    //     } catch (Exception $e){
    //         return $e->getMessage();
    //     }
    // }

}