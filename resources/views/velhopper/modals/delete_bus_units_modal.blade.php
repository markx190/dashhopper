<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="deleteBusUnitsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="delete-bus"><b><p id="header-label"><i class="fa fa-bus"></i> Delete Bus</p></b></div>
    <div class="row delete-alert-m">
</div>
<div class="row">
    <div class="col-md-12 d-bus-space">
        </div>
</div> 
<form id="delete-form" class="delete-bus-units-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs delete-bus-pad">
    <div class="row"><div class="col-md-10"><b>Are you sure you want to delete this item?</b></div></div>
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label><br>
                <p id="company-name-label"></p>
            <input id="delete-bus-id" type="hidden" class="form-control d-bus-id" name="id">  
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label><br>
                <p id="site-terminal-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Bus Number</b></label><br>
                <p id="bus-number-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Bus Type</b></label><br>
                <p id="bus-type-label"></p>
        </div> 
        <div class="col-md-3">
            <label><b>No. of Seats</b></label><br>
                <p id="no-of-seats-label"></p>
        </div>  
        <div class="col-md-3">
            <label><b>Wifi</b></label><br>
                <p id="with-wifi-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Comfort Room</b></label><br>
                <p id="with-cr-label"></p>
            </div>    
        </div>
        <br>
        <div class="row">
            <div class="col-md-6">
                <label><b>Bus Avatar</b></label><br>
            <img id="d-bus-avatar" width="30%" height="65%" />
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row d-bus-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_bus_units')

