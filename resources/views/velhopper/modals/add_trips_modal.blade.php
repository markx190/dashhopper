<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="addTripsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-bus"><b><p id="header-label"><i class="fa fa-paper-plane-o"></i> Add Trips</p></b></div>
    <div class="row alert-m">
</div>
<div class="row">
    <div class="col-md-12 a-trip-space">
        </div>
</div>  
<form class="add-trips-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs add-trip-pad">
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label>
                <input id="add-t-company-name" type="text" class="form-control" value="{{ $companyName }}" name="company_name" readonly> 
                <input id="add-t-bus-id-no" type="hidden" class="form-control" name="bus_id_no"> 
                <input id="add-t-bus-avatar" type="hidden" class="form-control" name="bus_avatar"> 
            <span id="t-company-name-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label>
                <input id="add-t-site-terminal" type="text" class="form-control" value="{{ $siteTerminal }}" name="site_terminal" readonly> 
            <span id="t-site-terminal-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Number</b></label>
                <input id="add-t-bus-number" type="text" class="form-control" name="bus_number" readonly> 
            <span id="t-bus-number-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Type</b></label>
                <input id="add-t-bus-type" type="text" class="form-control" name="bus_type" readonly> 
            <span id="t-bus-type-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>No. of Seats</b></label>
                <input id="add-t-no-of-seats" type="text" class="form-control" name="no_of_seats" readonly> 
            <span id="t-no-of-seats-text"></span>
        </div>
        <div class="col-md-3 trip-wifi">
            <label><b>Wifi</b></label>
                <input id="trip-with-wifi" type="checkbox" class="form-control" value="Yes" name="with_wifi"> 
            <span id="t-wifi-text"></span>
        </div>
        <div class="col-md-3 trip-cr">
            <label><b>Comfort Room</b></label>
                <input id="trip-with-cr" type="checkbox" class="form-control" value="Yes" name="with_cr"> 
            <span id="t-cr-text"></span>
        </div> 
        <div class="col-md-3">
            <label><b>Fare Amount</b></label>
                <input id="add-t-fare-amount" type="text" class="form-control" name="fare_amount">
                <span id="t-fare-amount-text"></span> 
            </div>   
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><b>Origin Address</b></label>
                    <input id="add-t-origin-address" type="text" class="form-control" name="origin_address"> 
                <span id="t-origin-address-text"></span> 
            </div>
            <div class="col-md-6">
                <label><b>Destination Address</b></label>
                    <input id="add-t-destination-address" type="text" class="form-control" name="destination_address"> 
                <span id="t-destination-address-text"></span> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label><b>Trip Date</b></label>
                    <input id="add-t-travel-date" type="date" class="form-control" name="travel_date"> 
                <span id="t-trip-date-text"></span>
            </div>
            <div class="col-md-3">
                <label><b>Trip Time</b></label>
                    <input id="add-t-travel-time" type="text" class="form-control" value="00:00" name="travel_time"> 
                <span id="t-trip-time-text"></span>
            </div>
            <div class="col-md-3" style="margin-top: 32px;">
                <select id="add-t-time-ap" class="form-control add-time-ap" name="time_ap">
                    <option value="AM">AM</option>
                    <option value="PM">PM</option>
                    </select> 
                <span id="t-time-ap-text"></span>
            </div>
            <div class="col-md-3">
                <label><b>Driver</b></label>
                    <select class="form-control select-drivers-name" name="driver_name">
                        <option></option>
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->firstname .' '. $driver->lastname  }}">{{ $driver->firstname .' '. $driver->lastname }}</option>
                        @endforeach
                    </select>
                <span id="t-drivers-name-text"></span> 
            </div>
            <div class="col-md-3">
                <label><b>Bus Assistant</b></label>
                    <select class="form-control select-conductors-name" name="conductor_name">
                        <option></option>
                        @foreach($conductors as $conductor)
                            <option value="{{ $conductor->firstname .' '. $conductor->lastname  }}">{{ $conductor->firstname .' '. $conductor->lastname }}</option>
                        @endforeach
                    </select>
                <span id="t-conductors-name-text"></span>
            </div>
        </div>
    </div>
<div class="modal-footer">
    <div class="row add-trip-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_bus_units')