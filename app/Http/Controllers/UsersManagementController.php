<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Donor;
use App\Item;
use Auth;
use Image;
use Storage;
use Session;
use Carbon\Carbon;

class UsersManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$user = User::where('clientidno', '=', Auth::id())->paginate(4);
        $user = User::paginate(6);
		return view('clientusers.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientusers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request, [
        
            'lastname' => 'required',
            'firstname' => 'required',
            /*'pRVS' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048;'*/
                
            ]);
            
            $user = new User;
			$user->clientidno = $request->clientidno;
            $user->user_id_no = mt_rand(100000, 999999);
            $user->lastname = $request->lastname;
            $user->firstname = $request->firstname;
            $user->middlename = $request->middlename;
			$user->gender = $request->gender;
			$user->designation = $request->designation;
			$user->company_name = $request->company_name;
            $user->network = $request->network;
            $user->street = $request->street;
			$user->village = $request->village;
			$user->city = $request->city;
            $user->province = $request->province;
			$user->region = $request->region;
			$user->license_no = $request->license_no;
			$user->bankaccount_no = $request->bankaccount_no;
			$user->creditcard_no = $request->creditcard_no;
			$user->department = $request->department;
			$user->editing = $request->editing;
			$user->buying = $request->buying;
			$user->paying = $request->paying;
			$user->selling = $request->selling;
			$user->inventory = $request->inventory;
			$user->doctors_mode = $request->doctors_mode;
			$user->delivery = $request->delivery;
			$user->user_level = $request->user_level;
			$user->user_status = $request->user_status;
			$user->email = $request->email;
			$user->password = bcrypt($request->password);
            $user->created_by = $request->created_by;
			$user->updated_by = $request->updated_by;
            
            if ($request->hasFile('avatar')){
                
                $avatar = $request->file('avatar');
                $filename = time() . '.' . $avatar->getClientOriginalExtension();
                $location = public_path('uploads/avatars/'. $filename);
                Image::make($avatar)->resize(800, 400)->save($location);
                
                $user->avatar = $filename;
            }
            
            $user->save();
            
            Session::flash('success', 'You have successfully registered as our new user');
            return redirect('/clientusers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
		return view('clientusers.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
		return view('clientusers.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	 
    public function update(Request $request, $id)
    {
        $user = User::findORFail($id);
		$user->update($request->all());

		if (! isset($request->live))
			$user->update(array_merge($request->all(),['live' => false]));
        else
		$user->update($request->all());
		
		Session::flash('updated', 'You successfully updated 1 Red Drop User');
		return redirect('/clientusers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
	
}
