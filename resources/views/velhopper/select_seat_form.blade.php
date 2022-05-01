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
    @if($tripSeats->seat_1 == '1')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_1 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_1 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_1 }}</button>
    @endif

    @if($tripSeats->seat_2 == '2')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_2 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_2 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_2 }}</button>
    @endif
    &nbsp;
    
    @if($tripSeats->seat_3 == '3')    
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_3 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_3 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_3 }}</button>
    @endif
    
    @if($tripSeats->seat_4 == '4')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_4 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_4 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_4 }}</button>
    @endif
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    @if($tripSeats->seat_5 == '5')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_5 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_5 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_5 }}</button>
    @endif

    @if($tripSeats->seat_6 == '6')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_6 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_6 }}</button></a>
    @else 
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_6 }}</button>
    @endif
    &nbsp;

    @if($tripSeats->seat_7 == '7')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_7 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_7 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_7 }}</button>
    @endif
    
    @if($tripSeats->seat_8 == '8')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_8 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_8 }}</button></a>
    @else 
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_8 }}</button>
    @endif
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    @if($tripSeats->seat_9 == '9')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_9 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_9 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_9 }}</button>
    @endif

    @if($tripSeats->seat_10 == '10')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_10 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_10 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_10 }}</button>
    @endif

    &nbsp;
    @if($tripSeats->seat_11 == '11')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_11 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_11 }}</button></a>
    @else 
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_11 }}</button>
    @endif

    @if($tripSeats->seat_12 == '12')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_12 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_12 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_12 }}</button>
    @endif
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    @if($tripSeats->seat_13 == '13')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_13 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_13 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_13 }}</button>
    @endif
    
    @if($tripSeats->seat_14 == '14')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_14 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_14 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_14 }}</button>
    @endif
    &nbsp;

    @if($tripSeats->seat_15 == '15')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_15 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_15 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_15 }}</button>
    @endif
    
    @if($tripSeats->seat_16 == '16')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_16 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_16 }}</button></a>
    @else 
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_16 }}</button>
    @endif
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    @if($tripSeats->seat_17 == '17')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_17 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_17 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_17 }}</button>
    @endif
    
    @if($tripSeats->seat_18 == '18')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_18 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_18 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_18 }}</button>
    @endif
    &nbsp;

    @if($tripSeats->seat_19 == '19')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_19 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_19 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_19 }}</button>
    @endif

    @if($tripSeats->seat_20 == '20')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_20 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_20 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_20 }}</button>
    @endif
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    @if($tripSeats->seat_20 == '20')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_20 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_20 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_20 }}</button>
    @endif
    
    @if($tripSeats->seat_21 == '21')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_21 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_21 }}</button></a>
    @else 
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_21 }}</button>
    @endif
    &nbsp;

    @if($tripSeats->seat_22 == '22')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_22 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_22 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_22 }}</button>
    @endif

    @if($tripSeats->seat_23 == '23')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_23 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_23 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;">{{ $tripSeats->seat_23 }}</button>
    @endif
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    @if($tripSeats->seat_24 == '24')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_24 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_24 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_24 }}</button>
    @endif

    @if($tripSeats->seat_25 == '25')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_25 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_25 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_25 }}</button>
    @endif
    &nbsp;
    @if($tripSeats->seat_26 == '26')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_26 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_26 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_26 }}</button>
    @endif

    @if($tripSeats->seat_27 == '27')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_27 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_27 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_27 }}</button>
    @endif
</div>
<div class="col-md-12" style="text-align: center; margin-top: 12px;">
    @if($tripSeats->seat_28 == '28')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_28 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_28 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_28 }}</button>
    @endif
    
    @if($tripSeats->seat_29 == '29')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_29 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_29 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_29 }}</button>
    @endif
    &nbsp;

    @if($tripSeats->seat_30 == '30')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_30 }}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_30 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_30 }}</button>
    @endif

    @if($tripSeats->seat_31 == '31')
    <a href="/book_passenger/{{ $tripSeats->id }}/{{ $tripSeats->seat_31}}"><button id="search-travel-btn" class="btn btn-success btn-sm" style="width: 4em;">{{ $tripSeats->seat_31 }}</button></a>
    @else
    <button id="search-travel-btn" class="btn btn-secondary btn-sm" style="width: 4em;" disabled>{{ $tripSeats->seat_31 }}</button>
    @endif
</div>
<br />
<div class="container">
    <i class="fa fa-tasks"></i> Passengers are required to report immediately to the terminal with their belongings 1 hour before departure. Bring your Vaccination Passport and valid Identification Cards.</p>
</div>
@extends('app_front.layouts.app_footer')
