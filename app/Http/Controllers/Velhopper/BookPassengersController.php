<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\BookPassengersService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;

class BookPassengersController extends Controller
{
    protected $bookPassenger;

    public function __construct(BookPassengersService $bookPassenger)
    {
        $this->bookPassenger = $bookPassenger;
    }

    public function bookPassenger(Request $request)
    {
        try {
            $passengers = $this->bookPassenger->bookPassenger($request);
            return $passengers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function addPassenger(Request $request)
    {
        try {
            $addPassengers = $this->bookPassenger->addPassenger($request);
            return $addPassengers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

    public function completeBooking(Request $request)
    {
        try {
            $addPassengers = $this->bookPassenger->completeBooking($request);
            return $addPassengers;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}