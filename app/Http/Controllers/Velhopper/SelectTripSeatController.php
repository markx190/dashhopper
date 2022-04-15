<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\SelectTripSeatService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;

class SelectTripSeatController extends Controller
{
    protected $selectTripSeat;

    public function __construct(SelectTripSeatService $selectTripSeat)
    {
        $this->selectTripSeat = $selectTripSeat;
    }

    public function callSelectTripSeat(Request $request)
    {
        try {
            $selectSeat = $this->selectTripSeat->selectTripSeat($request);
            return $selectSeat;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}