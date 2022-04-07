<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DNS1D;

class BarcodeController extends Controller
{
    function index()
    {
    	//GENERATE NG BARCODE THEN SAVE SA VARIABLE NA PATH YUNG DIRECTORY
    	$path = DNS1D::getBarcodePNGPath("4", "C39+");
    	echo '<img src="./' . $path . '" alt="barcode"/>';
    }
}
