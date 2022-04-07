<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="addJobModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents" style="background-color: #006422;"><b><p id="header-label"><i class="fa fa-link"></i> Add New Job</p></b></div>
    <div class="row alert-m">
</div>
<div class="modal-body div-docs">
    <div class="row">
        <div class="col-md-6">
            <label><b>Job Name</b></label>
                <input id="add-job-name" type="text" class="form-control job-name" name="position_name"> 
            <span id="a-jobname-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Job Type</b></label>
                <select id="position" class="form-control position-type" name="position_type">
                    <option></option>
                    <option value="Administrative">Administrative</option>
                    <option value="Clinical">Clinical</option>
                    <option value="Nursing">Nursing</option>
                </select>
            <span id="a-position-type-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row s-btn">
        </div>
            <button id="submit-job-btn" type="button" class="btn btn-success btn-sm submitJob">Submit</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>