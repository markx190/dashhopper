<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="deleteTripsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-bus"><b><p id="header-label"><i class="fa fa-paper-plane-o"></i> Edit Trip</p></b></div>
    <div class="row delete-alert-m">
</div>
<div class="row">
    <div class="col-md-12 d-trip-space">
        </div>
</div>  
<form class="delete-trips-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs delete-trip-pad">
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label>
            <p id="delete-company-name-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label>
            <p id="delete-site-terminal-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Bus Number</b></label> 
            <p id="delete-bus-number-label"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Type </b></label>
            <p id="delete-bus-type-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>No. of Seats</b></label>
            <p id="delete-no-of-seats-label"></p>
        </div>
        <div class="col-md-3 delete-trip-wifi">
            <label><b>Wifi</b></label>
                <input id="delete-trip-with-wifi" type="checkbox" class="form-control" value="Yes" name="with_wifi"> 
            <span id="delete-t-wifi-text"></span>
        </div>
        <div class="col-md-3 delete-trip-cr">
            <label><b>Comfort Room</b></label>
                <input id="delete-trip-with-cr" type="checkbox" class="form-control" value="Yes" name="with_cr"> 
            <span id="delete-t-cr-text"></span>
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
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_schedules')