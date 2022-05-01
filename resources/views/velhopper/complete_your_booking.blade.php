@include('app_front.layouts.app_header')
<br />
<div class="container">
    <div class="book-confirm">
        </div>
        <div class="col-md-5">
    </div>
</div>
<div class="container">
    <div class="col-md-6">
        <i class="fa fa-money"></i> <b>Pay Fare Amount to complete your Booking</b>
    </div>
</div>
<div class="container">
    <div class="col-md-5">
        Bus: <b>{{ $pTrips->bus_number }} - {{ $pTrips->company_name }} - {{ $pTrips->bus_type }}</b>
            <br>
        Route: <b>{{ $pTrips->origin_address }} to {{ $pTrips->destination_address }}</b>
            <br>
        Departure Date / Time: <b>{{ Carbon\Carbon::parse($pTrips->travel_date)->format('F j, Y') }} {{ $pTrips->travel_time .' '. $pTrips->time_ap }}</b>
            <br>
        Bus Terminal: <b>{{ $pTrips->site_terminal }}</b>
            <br>
        Fare Amount: <b>PHP {{ $pTrips->fare_amount }}</b>
            <br>
        Booking Fee: <b>PHP 6.00</b>
            <br>
        Total: <b>PHP {{ $pTrips->fare_amount + 6.00 }}.00</b>    
    </div>
<div class="col-md-3">
    <input type="hidden" class="form-control p-time-ap" value="{{ $pTrips->ref_number }}" name="ref_number" />
</div>
<br>
<div class="col-md-5">
    Your Booking Reference Number is <b>{{ $pTrips->ref_number }}</b>
    </div>
</div>
<div class="container">
    <div class="col-md-9">
        <button id="book-passenger-btn" class="btn btn-secondary btn-sm" onclick="submitCompleteBooking(event)"><i class="fa fa-credit-card"></i> Pay</button> 
    </div>
<br>
<div class="col-md-12">
    <i class="fa fa-tasks"></i> Passengers are required to report immediately to the terminal with their belongings 1 hour before departure. Bring your Vaccination Passport and valid Identification Cards.</p>
    </div>
</div>
@extends('app_front.layouts.app_footer')
