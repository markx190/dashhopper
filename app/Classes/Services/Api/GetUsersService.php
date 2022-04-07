<?php

namespace App\Classes\Services\Api;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\RdItems;
use DB;
use Auth;
use Exception;

class GetUsersService
{
    public function getUsers()
    {
        try {
            $getUsers = User::all();
            return response()->json($getUsers);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
