<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\Schedules;
use DB;
use Exception;
use Auth;

class SearchTripsService
{
    
    public function searchTrips($request)
    {
        try {
            date_default_timezone_set('Asia/Manila');
            $dTime = date('F j, Y');
            $trips = DB::table('travel_schedules')
                            ->select(
                                    'id', 
                                    'bus_id_no',
                                    'travel_date',
                                    'travel_time', 
                                    'time_ap', 
                                    'bus_number',
                                    'bus_type',
                                    'with_wifi',
                                    'with_cr',
                                    'no_of_seats',
                                    'site_terminal', 
                                    'company_name', 
                                    'bus_avatar', 
                                    'origin_address', 
                                    'destination_address', 
                                    'fare_amount');
            
            if (!empty($request->searchTravelDate)){
                $trips->where('travel_date', $request->searchTravelDate);
            }

            if (!empty($request->searchBusType)){
                $trips->where('bus_type', $request->searchBusType);
            }

            if (!empty($request->searchTravelOrigin)){
                $trips->where('origin_address', $request->searchTravelOrigin);  
            }

            if (!empty($request->searchTravelDestination)){
                $trips->where('destination_address', $request->searchTravelDestination);  
            }

            $tripResults = $trips->get();

                return view('velhopper.search_trips_results', [
                    'tripResults' => $tripResults,
                ]);

        } catch (\Exception $e) {
            return $e->getMessage();
        }        
    }

}
