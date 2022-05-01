@include('app_front.layouts.app_header')
<br />
<div class="container">
    <div class="book-confirm">
    </div>
    <div class="col-md-5">
        Bus: <b>{{ $tripBooking->bus_number }} - {{ $tripBooking->company_name }} - {{ $tripBooking->bus_type }}</b>
            <br>
        Route: <b>{{ $tripBooking->origin_address }} to {{ $tripBooking->destination_address }}</b>
            <br>
        Departure Date / Time: <b>{{ Carbon\Carbon::parse($tripBooking->travel_date)->format('F j, Y') }} {{ $tripBooking->travel_time .' '. $tripBooking->time_ap }}</b>
            <br>
        Bus Terminal: <b>{{ $tripBooking->site_terminal }}</b>
            <br>
        Fare Amount: <b>PHP {{ $tripBooking->fare_amount }}</b>    
    </div>
    <div class="col-md-5">
        Aminities: @if($tripBooking->with_wifi == 'Yes') <i class="fa fa-check-circle" style="color: #26C281;"></i> WIFI @endif @if($tripBooking->with_cr == 'Yes') <i  class="fa fa-check-circle" style="color: #26C281;"></i> CR @endif
    </div>
</div>
<br>
<div class="container">
    <div class="col-md-3">
        <label><b>Bus Seat No.</b></label>
        <input type="text" class="form-control p-seat-no" value="{{ $seatNo }}" name="seat_no" readonly />
        <input type="hidden" class="form-control p-travel-id-no" value="{{ $tripBooking->travel_id_no }}" name="travel_id_no" />
        <input type="hidden" class="form-control p-bus-number" value="{{ $tripBooking->bus_number }}" name="bus_no" />
        <input type="hidden" class="form-control p-bus-id-no" value="{{ $tripBooking->bus_id_no }}" name="bus_id_no" />
        <input type="hidden" class="form-control p-bus-type" value="{{ $tripBooking->bus_type }}" name="bus_type" />
        <input type="hidden" class="form-control p-company-name" value="{{ $tripBooking->company_name }}" name="bus_type" />
        <input type="hidden" class="form-control p-site-terminal" value="{{ $tripBooking->site_terminal }}" name="site_terminal" />
        <input type="hidden" class="form-control p-origin-address" value="{{ $tripBooking->origin_address }}" name="origin_address" />
        <input type="hidden" class="form-control p-destination-address" value="{{ $tripBooking->destination_address }}" name="destination_address" />
        <input type="hidden" class="form-control p-fare-amount" value="{{ $tripBooking->fare_amount }}" name="fare_amount" />
        <input type="hidden" class="form-control p-travel-date" value="{{ $tripBooking->travel_date }}" name="travel_date" />
        <input type="hidden" class="form-control p-travel-time" value="{{ $tripBooking->travel_time }}" name="travel_time" />
        <input type="hidden" class="form-control p-time-ap" value="{{ $tripBooking->time_ap }}" name="time_ap" />
    </div>
    <div class="col-md-3">
        <label><b>Firstname</b></label>
            <input type="text" class="form-control p-first-name" name="first_name" />
        <span id="p-first-name-text"></span>
    </div>
    <div class="col-md-3">
        <label><b>Middlename</b></label>
            <input type="text" class="form-control p-middle-name" name="middle_name" />
    </div>
    <div class="col-md-3">
        <label><b>Lastname</b></label>
            <input type="text" class="form-control p-last-name" name="last_name" />
        <span id="p-last-name-text"></span>
    </div>
    <br>
    <div class="col-md-3">
        <label><b>Gender</b></label>
            <input class="radio c-male" id="male" type="radio" value="Male" name="gender"> Male
	        <input class="radio c-female" id="female" type="radio" value="Female" name="gender"> Female
            <br>
        <span id="p-gender-text"></span>
    </div>
    <div class="col-md-3">
        <label><b>Age</b></label>
            <input type="number" class="form-control p-age" name="age" />
        <span id="p-age-text"></span>
    </div>
    <div class="col-md-3">
        <label><b>Contact Number</b></label>
            <input type="text" class="form-control p-contact-no" name="p_contact_no" />
        <span id="p-contact-no-text"></span>
    </div>
    <div class="col-md-12">
        <label><b>Address</b></label>
            <input type="text" class="form-control p-address" name="p_address" />
        <span id="p-address-text"></span>
    </div>
</div>
<br>
<div class="container">
    <div class="col-md-3">
        <button id="book-passenger-btn" class="btn btn-success btn-sm" onclick="submitBookPassenger(event)"><i class="fa fa-paper-plane-o"></i> Submit</button>                         
    </div>
<br>
<div class="col-md-12">
    <i class="fa fa-tasks"></i> Passengers are required to report immediately to the terminal with their belongings 1 hour before departure. Bring your Vaccination Passport and valid Identification Cards.</p>
    </div>
</div>
@extends('app_front.layouts.app_footer')
