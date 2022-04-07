<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;

class BtClientAccounts extends Model
{
    protected $table = 'users';
	protected $guarded = ['id'];
    
    public static function createClientAccount($request)
    {
        $user_id_no = mt_rand(100000, 999999);        
        $createClientsData = self::create([
            'user_id_no' => $user_id_no,
            'spock_id_no' => $request->clientTransIdNo,
            'firstname' => $request->clientFirstName,
            'lastname' => $request->clientLastName,
            'user_status' => $request->clientUserStatus,
            'user_level' => $request->clientUserLevel,
            'mobile_no' => $request->clientContactNo,
            'email' => $request->getClientEmail,
            'password' => bcrypt($request->getClientPassword)
        ]);
        return $createClientsData;
    }
}

