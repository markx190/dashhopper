<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\UserResetPasswordNotification;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 
    protected $fillable = ['hic_id_no', 
                           'hic_name', 
                           'hic_type',
                           'job_type',
                           'position_applied',
                           'area_of_specialty',
                           'years_of_exp',
                           'prc_number',
                           'passport_number',
                           'country',
                           'region',
                           'hic_network',
                           'hic_name',
                           'region',
                           'user_firstname',
                           'user_lastname',
                           'hic_contact_no',
                           'hic_position',
                           'user_account_type',
                           'hic_user_status',
                           'hic_user_level',
                           'email',
                           'password'
                        ];
	
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new UserResetPasswordNotification($token));
    }
	
	public function setRandomStringAttribute($number)
	{
		$this->attributes['hic_id_no'] = str_random($number);
    }

    public static function saveEditedUsers($request)
    {
        DB::beginTransaction();
        try {
        $updatedUsers = User::where('id', $request->eHicId)->first();
        if (!empty($updatedUsers)){
            $updatedUsers->hic_user_status = $request->getUserStatus;
            $updatedUsers->save();
            DB::commit();
            return $updatedUsers;
            } 
        } catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }

    public static function deleteUsers($request)
    {   
        DB::beginTransaction();
        try {
        $deletedUsers = User::find($request->dUserId)->delete();
            DB::commit();
            return $deletedUsers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public static function countMembersNotifications($request)
    {
        try {
            $countMembersNotifications = self::where('hic_user_status', 'New Account')->count();
            return response()->json($countMembersNotifications);
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public static function dropDownListOfMembers($request)
    {
        try {
            $dropDownListOfMembers = self::where('hic_user_status', 'New Account')->get(); 
            return $dropDownListOfMembers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public static function seenMembersRegistrations($request)
    {
        DB::beginTransaction();
        try {
            $seenMembersRegistrations = self::where('hic_id_no', $request->hicId)->first();
        if (!empty($seenMembersRegistrations)){
            $seenMembersRegistrations->hic_user_status = $request->seenStatus;
            $seenMembersRegistrations->save();
            DB::commit();
            return response()->json($seenMembersRegistrations);
            } 
        } catch(Exception $e){
            return $e->getMessage();
        }
    }

    public static function saveAcceptedMembers($request)
    {
        DB::beginTransaction();
        try {
            $saveAcceptedMembers = self::where('hic_id_no', $request->accept_id_no)->first();
        if (!empty($saveAcceptedMembers)){
            $saveAcceptedMembers->hic_user_status = $request->accept_status;
            $saveAcceptedMembers->save();
            DB::commit();
            return response()->json('Saved');
            } 
        } catch(Exception $e){
            return $e->getMessage();
        }
    }
}