<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class MainContentController extends Controller
{

    public function index(){

        return view('hopperjang.mainContent');

    }
}