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

class BookPassengersService
{
    public function bookPassenger($request)
    {
        try {
            $tripBookings = Schedules::where('id', $request->id)->first();
            $seatNo = $request->seatNo;
            return view('velhopper.book_passenger_form', [
                'tripBooking' => $tripBookings,
                'seatNo' => $seatNo
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
        }        
    }

}
