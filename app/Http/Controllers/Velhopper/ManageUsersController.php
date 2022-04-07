<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\ManageUsersService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;

class ManageUsersController extends Controller
{
    protected $manageUsers;

    public function __construct(ManageUsersService $manageUsers)
    {
        $this->manageUsers = $manageUsers;
    }

    public function index()
    {
        try {
            $viewUsers = $this->manageUsers->indexView();
            return $viewUsers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }
    
    public function usersDtAjax(Request $request)
    {
        try {
            return $this->manageUsers->dataTable($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function searchUsers(Request $request)
    {
        try {
            return $this->manageUsers->dataTable($request);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function editUsers(Request $request)
    {
        try {
            $updatedUsers = $this->manageUsers->editUsers($request);
            return $updatedUsers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function deleteUsers(Request $request)
    {
        try {
            $deletedUsers = $this->manageUsers->deleteUsers($request);
            return $deletedUsers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}