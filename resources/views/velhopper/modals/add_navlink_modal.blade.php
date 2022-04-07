<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="addNavlinkModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-link"></i> Add New Navlink</p></b></div>
    <div class="row alert-m">
</div>
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-6">
            <label><b>Navlink Name</b></label>
                <input id="add-nav-name" type="text" class="form-control label-name" name="label_name"> 
            <span id="a-navlink-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Position</b></label>
                <select id="n-location" class="form-control link-position" name="position_number">
                    <option></option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                </select>
            <span id="a-position-text"></span>
        </div> 
        <div class="col-md-3">
            <label><b>Type</b></label>
                <select id="n-location" class="form-control navbar-type" name="navbar_type">
                    <option></option>
                    <option value="Navlink List">Navlink List</option>
                    <option value="Dropdown List">Dropdown List</option>
                </select>
                <input type="hidden" class="form-control" value="For Approval" name="navlink_status">   
            <span id="a-navbar-type-text"></span>
        </div> 
    </div>
</div>
<div class="modal-footer">
    <div class="row s-btn">
        </div>
            <button id="submit-link-btn" type="button" class="btn btn-success btn-sm submitNavlink">Submit</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>