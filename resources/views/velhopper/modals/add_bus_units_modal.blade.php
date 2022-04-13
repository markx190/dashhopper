<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="addBusUnitsModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-bus"><b><p id="header-label"><i class="fa fa-bus"></i> Add Bus</p></b></div>
    <div class="row alert-m">
</div>
<div class="row">
    <div class="col-md-12 a-bus-space">
        </div>
</div>  
<form class="add-bus-units-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs add-bus-pad">
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label>
                <input id="add-company-name" type="text" class="form-control" value="{{ $companyName }}" name="company_name" readonly> 
            <span id="a-company-name-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label>
                <input id="add-site-terminal" type="text" class="form-control" value="{{ $siteTerminal }}" name="site_terminal" readonly> 
            <span id="a-site-terminal-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Number</b></label>
                <input id="add-bus-number" type="text" class="form-control" name="bus_number"> 
            <span id="a-bus-number-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Bus Type</b></label>
                <select id="add-bus-type" class="form-control select-bus-type" name="bus_type">
                    <option></option>
                    <option value="Ordinary">Ordinary</option>
                    <option value="Economy">Economy</option>
                    <option value="Semi Deluxe">Semi Deluxe</option>
                    <option value="Deluxe">Deluxe</option>
                </select>
                <span id="a-bus-type-text"></span>
            </div> 
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-3">
                <label><b>No. of Seats</b></label>
                <input id="add-no-of-seats" type="number" class="form-control" name="no_of_seats"> 
            <span id="a-no-of-seats-text"></span>
        </div>  
        <div class="col-md-3">
            <label><b>Wifi</b></label>
                <input id="add-wifi" type="checkbox" class="form-control" value="Yes" name="with_wifi"> 
        </div>
        <div class="col-md-3">
            <label><b>Comfort Room</b></label>
                <input id="add-cr" type="checkbox" class="form-control" value="Yes" name="with_cr"> 
            </div>    
        </div>
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-6">
                <label><b>Upload Bus Avatar</b></label>
                <input id="add-bus-avatar" style="height: 2.7em;" type="file" class="form-control a-bus-avatar" name="bus_avatar"> 
            <span id="a-bus-avatar-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row add-bus-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_bus_units')