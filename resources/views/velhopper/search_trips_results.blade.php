<br />
<div class="row booking-div">
    <div class="col-md-3">
        <label><b>Date</b></label>
        <input type="date" name="date_of_booking" class="form-control s-travel-date" />
    <span id="s-travel-date-text"></span>
</div>
<div class="col-md-3">
    <label><b>Type</b></label>
        <select class="form-control s-bus-type" name="bus_type">
            <option></option>
            <option value="Ordinary">Ordinary</option>
            <option value="Economy">Economy</option>
            <option value="Semi Deluxe">Semi Deluxe</option>
        <option value="Deluxe">Deluxe</option>
    </select>
    <span id="s-booking-type-text"></span>
</div>
<div class="col-md-3">
    <label><b>Origin</b></label>
        <select class="form-control s-travel-origin" name="origin">
            <option></option>
            <option value="Cubao">Cubao</option>
            <option value="Baguio">Baguio</option>
            <option value="Baler">Baler</option>
        <option value="Cabanatuan">Cabanatuan</option>
    </select>
    <span id="s-travel-origin-text"></span>
</div>
<div class="col-md-3">
    <label><b>Destination</b></label>
        <select class="form-control s-travel-destination" name="destination">
            <option></option>
            <option value="Cubao">Cubao</option>
            <option value="Baguio">Baguio</option>
            <option value="Baler">Baler</option>
            <option value="Cabanatuan">Cabanatuan</option>
        </select>
    <span id="s-travel-destination-text"></span>
    </div>
</div>
<br />
    <div class="row">
        <div class="col-md-3">
            <button id="search-travel-btn" class="btn btn-primary btn-sm" onclick="submitBookingSearch(event)"><i class="fa fa-search"></i> Search</button>                         
        </div>
    </div>
</div>
<br />
<div class="row">
    @forelse($tripResults as $tResult)
        <div class="col-md-3">
            <img src="/uploads/documents/{{ $tResult->bus_avatar }}" style="width:155px; height:148px; border-radius:50%" />
            <br>
            Bus Company: <b>{{ $tResult->company_name }}</b>
            <br>
            Bus Number: <b>{{ $tResult->bus_number }}</b>
            <br>
            Bus Type: <b>{{ $tResult->bus_type }}</b>
            <br>
            Terminal: <b>{{ $tResult->site_terminal }}</b>
            <br>
            Route: <b>{{ $tResult->origin_address }} to {{ $tResult->destination_address }}</b>
            <br>
            Departure Date: <b>{{ Carbon\Carbon::parse($tResult->travel_date)->format('F j, Y') }}</b>
            <br> 
            Time: <b>{{ $tResult->travel_time }} {{ $tResult->time_ap }}</b>
            <br>
            Aminities: 
                <b>
                    @if($tResult->with_wifi)
                    <i class="fa fa-check-circle" style="color: #26C281;"></i> WIFI
                    @endif
                    @if($tResult->with_cr)
                    <i class="fa fa-check-circle" style="color: #26C281;"></i> CR
                    @endif
                </b>
            <br>
            Fare Amount: <b>PHP {{ $tResult->fare_amount }}</b>
            <br>
        <a href="/select_trip_seat/{{ $tResult->id }}"><button id="search-travel-btn" class="btn btn-success btn-sm" onclick="bookATrip(this)"><i class="fa fa-bus"></i> Book</button></a>                         
    </div>    
    @empty
        <div class="col-md-6">
            <p>Sorry, No Results Found</p>
        </div>
    @endforelse
</div>
<div style="height: 95px;">
</div>