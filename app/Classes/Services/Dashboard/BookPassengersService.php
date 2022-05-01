<?php

namespace App\Classes\Services\Dashboard;
use Illuminate\Http\Request;
use App\Classes\Constants\Constants;
use Carbon\Carbon;
use Datatables;
use App\User;
use App\Models\Schedules;
use App\Models\TripPassengers;
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

    public static function addPassenger($request)
    {
        try {
            $addPassengers = TripPassengers::addPassenger($request);
            self::updateBusSeats($request);
            return $addPassengers;
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

    public static function updateBusSeats($request)
    {
        try {
        $updatedSeats = '';
        if($request->pSeatNo == '1'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_1 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '2'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_2 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '3'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_3 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '4'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_4 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '5'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_5 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '6'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_6 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '7'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_7 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '8'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_8 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '9'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_9 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '10'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_10 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '11'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_11 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '12'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_12 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '13'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_13 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '14'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_14 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '15'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_15 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '16'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_16 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '17'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_17 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '18'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_18 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '19'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_19 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '20'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_20 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '21'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_21 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '22'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_22 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '23'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_23 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '24'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_24 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '25'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_25 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '26'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_26 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '27'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_27 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '28'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_28 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '29'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_29 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '30'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_30 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        } elseif($request->pSeatNo == '31'){
            $updatedSeats = Schedules::where('travel_id_no', $request->pTravelIdNo)->first();
            if(!empty($updatedSeats)){
                $updatedSeats->seat_31 = 'Taken';
                $updatedSeats->save();
                DB::commit();
                return $updatedSeats;
            }
        }
        
        } catch(Exception $e){
            return $e->getMessage();
        }

    }

    public function completeBooking($request)
    {
        try {
            $tripBookings = DB::table('trip_passengers')->where('ref_number', $request->refNumber)->first();
            return view('velhopper.complete_your_booking', [
                'pTrips' => $tripBookings
            ]);
        } catch (Exception $e){
            return $e->getMessage(); 
        }
    }

}
