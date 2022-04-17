@include('app_front.layouts.app_header')
<br />
<div class="container">
    <div class="col-md-5">
        Bus: <b>{{ $tripSeats->bus_number }} - {{ $tripSeats->company_name }} - {{ $tripSeats->bus_type }}</b>
            <br>
        Route: <b>{{ $tripSeats->origin_address }} to {{ $tripSeats->destination_address }}</b>
            <br>
        Departure Date / Time: <b>{{ Carbon\Carbon::parse($tripSeats->travel_date)->format('F j, Y') }} {{ $tripSeats->travel_time .' '. $tripSeats->time_ap }}</b>
            <br>
        Bus Terminal: <b>{{ $tripSeats->site_terminal }}</b>
            <br>
        Fare Amount: <b>PHP {{ $tripSeats->fare_amount }}</b>    
    </div>
    <div class="col-md-4">
        Aminities: @if($tripSeats->with_wifi == 'Yes') <i  class="fa fa-check-circle" style="color: #26C281;"></i> WIFI @endif @if($tripSeats->with_cr == 'Yes') <i  class="fa fa-check-circle" style="color: #26C281;"></i> CR @endif
    </div>
</div>
<br>
<div class="col-md-12" style="text-align: center;">
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_1 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_1 }}</button></a>
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_2 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_2 }}</button></a>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_3 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_4 }}</button>
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_5 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_6 }}</button>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_7 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_8 }}</button>
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_9 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_10 }}</button>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_11 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_12 }}</button>
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_13 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_14 }}</button>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_15 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_16 }}</button>
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_18 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_19 }}</button>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_20 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_21 }}</button>
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_22 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_23 }}</button>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_24 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_25 }}</button>
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_26 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_27 }}</button>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_28 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_29 }}</button>
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_30 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_31 }}</button>
    &nbsp;
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_32 }}</button>
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 3em;">{{ $tripSeats->seat_33 }}</button>
</div>
<br />
<div class="container">
    <i class="fa fa-newspaper-o"></i> Passengers are required to report immediately to the terminal with their belongings 1 hour before departure. Bring your Vaccination Passport and valid Identification Cards.</p>
</div>
@extends('app_front.layouts.app_footer')
