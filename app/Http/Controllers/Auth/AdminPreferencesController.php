<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\BtSkills;
use App\Models\BtServiceDetails;
use App\Models\BtTransactions;
use Auth;

class AdminPreferencesController extends Controller
{
    public function index()
    { 
        $users = User::where('user_level', Auth::user()->user_level)->first();
            return view('auth.admin_dashboard', [
                'user' => $users
           ]);   
    }

    public function addSkillsPage()
    {
        $users = User::where('user_level', Auth::user()->user_level)->first();         
        return view('auth.add_skills', [
            'userData' => $users
        ]);
    }

    public function listOfUsers()
    {
        $listOfUsers = User::all();        
        return view('auth.list_of_users', [
            'users' => $listOfUsers
        ]);
    }

    public function saveEditedUsers(Request $request){
        $saveEditedUsers = User::saveEditedUsers($request);
        return $saveEditedUsers;
    }

    public function deleteUsers(Request $request){
        $deletedUsers = User::deleteUsers($request);
    }

    public function addSkills(Request $request)
    {
        $addSkills = BtSkills::saveSkills($request);
        return $addSkills;
    }

    public function listOfSkills()
    {
        $listOfSkills = BtSkills::all();        
        return view('auth.list_of_skills', [
            'skills' => $listOfSkills
        ]);
    }

    public function listOfServicesDetails()
    {
        $listOfServicesDetails = BtServiceDetails::all();        
        return view('auth.list_of_services_details', [
            'serviceDetails' => $listOfServicesDetails
        ]);
    }

    public function saveEditedSkills(Request $request){
        $saveEditedSkills = BtSkills::saveEditedSkills($request);
        return $saveEditedSkills;
    }

    public function deleteSkills(Request $request){
        $deletedSkills = BtSkills::deleteSkills($request);
    }

    public function listOfTransactions()
    {
        $listOfTransactions = BtTransactions::all();        
        return view('auth.list_of_transactions', [
            'transactions' => $listOfTransactions
        ]);
    }

    public function saveEditedTransactions(Request $request){
        $saveEditedTransactions = BtTransactions::saveEditedTransactions($request);
        return $saveEditedTransactions;
    }

    public function listOfBookings()
    {
        $listOfBookings = BtTransactions::where('bt_id_no', Auth::user()->user_id_no)->get();     
        return view('auth.list_of_bookings', [
            'bookings' => $listOfBookings
        ]);
    }

    public function clientListOfBookings()
    {
        $clientListOfBookings = BtTransactions::where('trans_id_no', Auth::user()->spock_id_no)->get();     
        return view('auth.client_list_of_bookings', [
            'bookings' => $clientListOfBookings
        ]);
    }

    public function saveEditedBookings(Request $request){
        $saveEditedBookings = BtTransactions::saveEditedBookings($request);
        return $saveEditedBookings;
    }
}
