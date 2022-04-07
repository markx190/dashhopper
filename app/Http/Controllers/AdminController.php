<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Sparejob;
use Auth;
use Image;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
	*/
	
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
	
	public function __construct()
    {
        $this->middleware('auth:admin');
    }
	
    public function index()
    {
       return view('admin', compact('users'));
    }
	
	public function admin_profile()
	{
		return view('admin_profile', array('user' => Auth::user()));
	}
	
	public function update_avatar(Request $request){
			
		// Handles user upload of avatar 
		$this->validate($request, [
			'avatar' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048;'
		]);
		
		if($request->hasFile('avatar')) {
			$avatar = $request->file('avatar');
			$filename = time() . '.' . $avatar->getClientOriginalExtension();
			Image::make($avatar)->resize(300,300)->save( public_path('/uploads/avatars/' . $filename) );
			
			$admin = Auth::user();
			$admin->avatar = $filename;
			$admin->save();
		}
		
		return view('admin_profile', array('user' => Auth::user()) );
	}

}
