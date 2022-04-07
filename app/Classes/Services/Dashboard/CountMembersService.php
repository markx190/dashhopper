<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use DB;
use Exception;

class CountMembersService
{
    public function countMembersNotifications($request)
    {
        try {
            $countMembersNotifications = User::countMembersNotifications($request);
            return $countMembersNotifications;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function dropDownListOfMembers($request)
    {
        try {
            $dropDownListOfMembers = User::dropDownListOfMembers($request);   
            return view('reddrop_back.members.dropdown_list_of_members', [
                'dropDowns' => $dropDownListOfMembers
            ]);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function seenMembersRegistrations($request)
    {
        try {
            $seenMembersRegistrations = User::seenMembersRegistrations($request);   
            return $seenMembersRegistrations;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function saveAcceptedMembers($request)
    {\Log::info('save');
        try {
            $saveAccceptedMembers = User::saveAcceptedMembers($request);   
            return $saveAccceptedMembers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    
}
