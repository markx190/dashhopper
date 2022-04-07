<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="editJobModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents" style="background-color: #006422;"><b><p id="header-label"><i class="fa fa-link"></i> Edit Job</p></b></div>
    <div class="row edit-alert-m">
</div>
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-6">
            <label><b>Job Name</b></label>
                <input id="e-job-name" type="text" class="form-control edit-job-name" name="position_name"> 
            <span id="e-jobname-text"></span>
        </div>
        <div class="col-md-3 div-position">
            <label><b>Job Type</b></label>
                <select id="position" class="form-control edit-position-type" name="position_type">
                    <option></option>
                    <option value="Administrative">Administrative</option>
                    <option value="Clinical">Clinical</option>
                    <option value="Nursing">Nursing</option>
                </select>
            <span id="e-position-type-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row s-btn">
        </div>
            <button id="edit-job-btn" type="button" class="btn btn-success btn-sm editJob">Submit</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>