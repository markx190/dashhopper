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
    <div class="row delete-trip-alert-m">
</div>
<div class="row">
    <div class="col-md-12 d-trip-space">
        </div>
</div>  
<form class="delete-schedules-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs delete-trip-pad">
    <div class="row">
        <div class="col-md-12">
        <p>Are you sure you want to delete this schedule?</p>
    </div>
</div>
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label>
            <p id="delete-company-name-label"></p>
            <input type="hidden" class="delete-schedules-id" name="id" />
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
                <p id="delete-fare-amount-label"></p>
            </div>   
        </div>
        <div class="row">
            <div class="col-md-6">
                <label><b>Origin Address</b></label>
            <p id="delete-origin-address-label"></p>
        </div>
        <div class="col-md-6">
            <label><b>Destination Address</b></label>
                <p id="delete-destination-address-label"></p> 
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label><b>Trip Date</b></label>
            <p id="delete-travel-date-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Trip Time</b></label>
            <p id="delete-travel-time-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Driver</b></label>
                <p id="delete-travel-driver-label"></p>
        </div>
        <div class="col-md-3 edit-conductor-name-div">
            <label><b>Bus Assistant</b></label>
            <p id="delete-travel-conductor-label"></p>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row d-schedules-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_schedules')