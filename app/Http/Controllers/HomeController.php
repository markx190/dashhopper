<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sparejob;
use App\Sparejam;
use App\User;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(){
        return view('hopperjang.index');
    }

    // public function index()
    // {
    //     /*return view('home');*/
	// 	$sparejobs = Sparejob::paginate(8);
	// 	return view('sparetime.planet', compact('sparejobs'));
    // }
	
	// public function dashboard()
    // {
	// 	$sparejobs = Sparejob::where('user_id', '=', Auth::id())->paginate (4)->setPath ('');
    //     return view('dashboard', compact('sparejobs'));
	// }
	
	// public function homepage()
    // {
    //     return view('home.homepage');
	// }
	
	// public function sparejam()
    // {
	// 	$sparejams = Sparejam::where('user_id', '=', Auth::id())->get();
    //     return view('layout.app', compact('sparejams'));
	// }
	
}
