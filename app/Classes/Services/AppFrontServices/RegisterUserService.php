<?php

namespace App\Classes\Services\AppFrontServices;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\FilUsers;
use DB;
use Auth;
use Exception;

class RegisterUserService
{

    public function addUser($request)
    {
        try {
            $addUser = FilUsers::addUser($request);
            return $addUser;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

}
