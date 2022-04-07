<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Exception;
use DB;
use Auth;

class FilUsers extends Model
{
    protected $table = "users";
    protected $guarded = ['id'];
    
    public static function addUser($request)
    {
        DB::beginTransaction();
        try {
        $createUser = self::create([
            'hic_id_no' => mt_rand(100000, 999999),
            'hic_name' => $request->hic_name,
            'user_account_type' => $request->user_account_type,
            'hic_network' => $request->hic_terminal_network,
            'user_firstname' => $request->user_firstname,
            'user_lastname' => $request->user_lastname,
            'hic_contact_no' => $request->hic_admin_contact_no,
            'hic_position' => $request->hic_position,
            'hic_user_status' => $request->hic_user_status,
            'hic_user_level' => $request->hic_user_level,
            'email' => $request->hic_email,
            'password' => bcrypt($request->hic_password)
        ]);
            DB::commit();
            return $createUser; 
        } catch (Exception $e){
            DB::rollback();
            return $e->getMessage();
        } 
    }

}


