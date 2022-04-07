<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="deleteNavlinkModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-link"></i> Delete Navlink</p></b></div>
    <div class="row alert-m">
</div>
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-9">
            <b>Are you sure you want to delete this Navlink?</b>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label><b>Navlink Name</b></label>
            <h6 style="margin-top: -12px;" id="d-navlink-text"></h6>
        </div>
        <div class="col-md-3">
            <label><b>Position</b></label>
            <h6 style="margin-top: -12px;" id="d-position-text"></h6>
        </div> 
        <div class="col-md-3">
            <label><b>Type</b></label>   
            <h6 style="margin-top: -12px;" id="d-navbar-type-text"></h6>
        </div> 
        <div class="col-md-3">
            <label><b>Status</b></label>   
            <h6 style="margin-top: -12px;" id="d-navbar-status-text"></h6>
        </div> 
    </div>
</div>
<div class="modal-footer">
    <div class="row s-btn">
        </div>
            <button id="delete-link-btn" type="button" class="btn btn-success btn-sm submitDeleteNavlink">Delete</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>