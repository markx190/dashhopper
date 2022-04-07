<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Models\BtClientAccounts;

class CheckEmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function emailHandler(Request $data)
    {
        // if (empty($data)){
        //     return response()->json(['emptyArray' => 'This field is required']);
        // }

        $email = array(
            'email' => $data['email'],
        );

        $checkEmail = User::where('email', $email['email'])->count();
        if ($checkEmail > 0) {
            return response()->json(['error' => 'Email already exist']);
        } else {
            return response()->json(['success' => 'ok']);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientEmailHandler(Request $data)
    {
        $email = array(
            'clientEmail' => $data['clientEmail'],
        );

        $checkClientEmail = BtclientAccounts::where('email', $email['clientEmail'])->count();
        if ($checkClientEmail > 0) {
            return response()->json(['error' => 'Email already exist']);
        } else {
            return response()->json(['success' => 'ok']);
        }
    }
}
