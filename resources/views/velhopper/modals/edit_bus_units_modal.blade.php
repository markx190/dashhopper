<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="editBusUnitsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="edit-bus"><b><p id="header-label"><i class="fa fa-bus"></i> Edit Bus</p></b></div>
    <div class="row edit-alert-m">
</div>
<div class="row">
    <div class="col-md-12 e-bus-space">
        </div>
</div> 
<form id="edit-form" class="edit-bus-units-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs edit-bus-pad">
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label>
                <input id="edit-company-name" type="text" class="form-control" name="company_name" readonly>
                <input id="edit-bus-id" type="hidden" class="form-control e-bus-id" name="id">  
            <span id="e-company-name-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label>
                <input id="edit-site-terminal" type="text" class="form-control" value="{{ $siteTerminal }}" name="site_terminal" readonly> 
            <span id="e-site-terminal-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Number</b></label>
                <input id="edit-bus-number" type="text" class="form-control" name="bus_number"> 
            <span id="e-bus-number-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Type</b></label>
                <select id="edit-bus-type" class="form-control select-e-bus-type" name="bus_type">
                    <option></option>
                    <option value="Ordinary">Ordinary</option>
                    <option value="Economy">Economy</option>
                    <option value="Semi Deluxe">Semi Deluxe</option>
                    <option value="Deluxe">Deluxe</option>
                </select>
            <span id="e-bus-type-text"></span>
        </div> 
        <div class="col-md-3">
            <label><b>No. of Seats</b></label>
                <input id="edit-no-of-seats" type="text" class="form-control" name="no_of_seats"> 
            <span id="e-no-of-seats-text"></span>
        </div>  
        <div class="col-md-3 edit-wifi">
            <label><b>Wifi</b></label>
                <input id="e-with-wifi" type="checkbox" class="form-control" value="Yes" name="with_wifi"> 
            <span id="e-wifi-text"></span>
        </div>
        <div class="col-md-3 edit-cr">
            <label><b>Comfort Room</b></label>
                <input id="e-with-cr" type="checkbox" class="form-control" value="Yes" name="with_cr"> 
                <span id="e-cr-text"></span>
            </div>    
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label><b>Bus Avatar</b></label><br>
            <img id="e-bus-avatar" width="40%" height="70%" />
        </div>
        <div class="col-md-6">
            <label><b>Change Bus Avatar</b></label>
                <input id="edit-bus-avatar" style="height: 2.7em;" type="file" class="form-control e-bus-avatar" name="bus_avatar"> 
            <span id="e-bus-avatar-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row e-bus-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_bus_units')

