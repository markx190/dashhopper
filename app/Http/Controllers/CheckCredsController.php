<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class CheckCredsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function credentialsHandler(Request $data)
    {
        $credentials = array(
            'email' => $data['userName'],
            'password' => $data['passWord']
        );

        $getDataByEmail = User::where('email', $credentials['email'])->get();
        \Log::info('Hey '. $getUserData);
          
        $getDataByPassword = User::where('password', $credentials['password'])->count();
        \Log::info('Hey '. $checkPassword);
        
       
        if ($getDataByEmail > 0 && $getDataByPassword > 0) {
            return response()->json(['success' => 'ok']);
            // \Log::info('hoy hoy');
        } else {
            return response()->json(['error' => 'withError']);
            // \Log::info('hoy hoy hoy');
        }
    }
}
