<br />
<div class="row booking-div">
    <div class="col-md-3">
        <label><b>Date</b></label>
        <input type="date" name="date_of_booking" class="form-control s-travel-date" />
    <span id="s-travel-date-text"></span>
</div>
<div class="col-md-3">
    <label><b>Type</b></label>
        <select class="form-control s-booking-type" name="type_of_booking">
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
            <button id="search-travel-btn" class="btn btn-success btn-sm" onclick="submitBookingSearch(event)"><i class="fa fa-search"></i> Submit</button>                         
        </div>
    </div>
</div>
<br />
<div class="row">
    <div class="col-md-12">
        <p>Sorry, No Trip Schedules Found</p>
    </div>
</div>

<div style="height: 75px;">
</div>