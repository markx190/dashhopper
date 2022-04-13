<?php

namespace App\Http\Controllers\Velhopper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Classes\Services\Dashboard\SearchTripsService;
use App\User;
use Auth;
use Validator;
use Image;
use Exception;

class SearchTripsController extends Controller
{
    protected $searchTrips;

    public function __construct(SearchTripsService $searchTrips)
    {
        $this->searchTrips = $searchTrips;
    }

    public function callSearchTrips(Request $request)
    {
        try {
            $viewTrips = $this->searchTrips->searchTrips($request);
            return $viewTrips;
        } catch (Exception $e){
            return $e->getMessage();
        }
    }

}