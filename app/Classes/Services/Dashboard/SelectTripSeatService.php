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

class SelectTripSeatService
{
    
    public function selectTripSeat($request)
    {
        try {
            \Log::info('id: '.  $request->id);
            $tripSeats = Schedules::where('id', $request->id)->first();
            \Log::info('trips: '. $tripSeats);
            return view('velhopper.select_seat_form', [
                'tripSeats' => $tripSeats
            ]);
            
        } catch (\Exception $e) {
            return $e->getMessage();
        }        
    }

}
