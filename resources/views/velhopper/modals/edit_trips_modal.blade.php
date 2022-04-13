<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="editTripsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-bus"><b><p id="header-label"><i class="fa fa-paper-plane-o"></i> Edit Trip</p></b></div>
    <div class="row edit-alert-m">
</div>
<div class="row">
    <div class="col-md-12 e-trip-space">
        </div>
</div>  
<form class="edit-trips-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs edit-trip-pad">
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label>
                <input id="edit-t-company-name" type="text" class="form-control" name="company_name" readonly> 
                    <input id="edit-trip-id" type="hidden" class="form-control" name="id">
                    <input id="edit-t-bus-id-no" type="hidden" class="form-control" name="bus_id_no"> 
                <input id="edit-t-bus-avatar" type="hidden" class="form-control" name="bus_avatar"> 
            <span id="edit-t-company-name-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label>
                <input id="edit-t-site-terminal" type="text" class="form-control" name="site_terminal" readonly> 
            <span id="edit-t-site-terminal-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Number</b></label>
                <input id="edit-t-bus-number" type="text" class="form-control" name="bus_number" readonly> 
            <span id="edit-t-bus-number-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Type </b></label>
                <select id="edit-trip-bus-type" class="form-control" name="bus_type">
                    <option></option>
                </select>
            <span id="edit-t-bus-type-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>No. of Seats</b></label>
                <input id="edit-t-no-of-seats" type="text" class="form-control" name="no_of_seats" readonly> 
            <span id="edit-t-no-of-seats-text"></span>
        </div>
        <div class="col-md-3 edit-trip-wifi">
            <label><b>Wifi</b></label>
                <input id="edit-trip-with-wifi" type="checkbox" class="form-control" value="Yes" name="with_wifi"> 
            <span id="edit-t-wifi-text"></span>
        </div>
        <div class="col-md-3 edit-trip-cr">
            <label><b>Comfort Room</b></label>
                <input id="edit-trip-with-cr" type="checkbox" class="form-control" value="Yes" name="with_cr"> 
            <span id="edit-t-cr-text"></span>
        </div> 
        <div class="col-md-3">
            <label><b>Fare Amount</b></label>
                <input id="edit-t-fare-amount" type="text" class="form-control" name="fare_amount">
                <span id="edit-t-fare-amount-text"></span> 
            </div>   
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><b>Origin Address</b></label>
                    <input id="edit-t-origin-address" type="text" class="form-control" name="origin_address"> 
                <span id="edit-t-origin-address-text"></span> 
            </div>
            <div class="col-md-6">
                <label><b>Destination Address</b></label>
                    <input id="edit-t-destination-address" type="text" class="form-control" name="destination_address"> 
                <span id="edit-t-destination-address-text"></span> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label><b>Trip Date</b></label>
                <input id="edit-t-travel-date" type="date" class="form-control" name="travel_date"> 
            <span id="edit-t-trip-date-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Trip Time</b></label>
                <input id="edit-t-travel-time" type="text" class="form-control" name="travel_time"> 
            <span id="edit-t-trip-time-text"></span>
        </div>
        <div class="col-md-3" style="margin-top: 32px;">
            <select id="edit-t-time-ap" class="form-control" name="time_ap"></select>
            <span id="edit-t-time-ap-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Driver</b></label>
                <select id="tDrivers" name="driver_name" class="form-control select-trip-drivers">
		            <option value="">Select</option>
                </select>
            <span id="edit-t-driver-name-text"></span> 
        </div>
        <div class="col-md-3 edit-conductor-name-div">
            <label><b>Bus Assistant</b></label>
                <select id="tConductors" name="conductor_name" class="form-control select-trip-conductors">
		            <option value="">Select</option>
                </select>
            <span id="edit-t-conductor-name-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row edit-trip-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_schedules')