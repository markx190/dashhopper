<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use DB;
use Exception;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'rJobType' => 'required|string|max:255',
            'rFirstname' => 'required|string|max:255',
            'rLastname' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        DB::beginTransaction();
        try {
        $data['hic_id_no'] = mt_rand(100000, 999999);
        DB::commit();
        return User::create([
            'hic_id_no' => $data['hic_id_no'],
            'job_type' => $data['rJobType'], 
            'position_applied' => $data['rPositionApplied'],
            'years_of_exp' => $data['rYearsOfExp'],
            'area_of_specialty' => $data['rAreaOfSpecialty'],
            'region' => $data['rRegion'],
            'country' => $data['rCountry'],
            'hic_name' => $data['rHicName'],
            'user_firstname' => $data['rFirstname'],
            'user_lastname' => $data['rLastname'],
            'user_middlename' => $data['rMiddlename'],
            'user_suffix' => $data['rSuffix'],
            'hic_contact_no' => $data['rContactNo'],
            'hic_user_status' => $data['rUserStatus'],
            'hic_user_level' => $data['rUserLevel'],
            'user_account_type' => $data['rAccountType'],
            'email' => $data['hic_email'],
            'password' => bcrypt($data['hic_password'])
        ]);
        } catch(Exception $e){
            DB::rollback();
            return $e->getMessage();
        }
    }
}
