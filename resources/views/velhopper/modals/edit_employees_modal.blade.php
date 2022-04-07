<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="editEmployeesModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="edit-bus"><b><p id="header-label"><i class="fa fa-user-circle"></i> Edit Employees</p></b></div>
    <div class="row edit-alert-m">
</div>
<div class="row">
    <div class="col-md-12 e-employee-space">
        </div>
</div> 
<form id="edit-employees-form" class="edit-employees-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs edit-employee-pad">
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label>
                <input id="edit-company-name" type="text" class="form-control" name="company_name" readonly>
                <input id="edit-employee-id" type="hidden" class="form-control e-employee-id" name="id">  
            <span id="e-company-name-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label>
                <input id="edit-site-terminal" type="text" class="form-control" value="{{ $siteTerminal }}" name="site_terminal" readonly> 
            <span id="e-site-terminal-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Firstname</b></label>
                <input id="edit-employee-firstname" type="text" class="form-control e-firstname" name="firstname"> 
            <span id="e-employee-firstname-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Lastname</b></label>
                <input id="edit-employee-lastname" type="text" class="form-control e-lastname" name="lastname"> 
            <span id="e-employee-lastname-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Employee ID No.</b></label>
                <input id="edit-employee-id-no" type="number" class="form-control e-employee-id-no" name="employee_id_no"> 
            <span id="e-employee-id-no-text"></span>
        </div>
        <div class="col-md-3">
            <label><b>Position</b></label>
                <select id="edit-employee-position" class="form-control select-edit-position" name="position">
                    <option></option>
                    <option value="Terminal Officer">Terminal Officer</option>
                    <option value="Bus Dispatcher">Bus Dispatcher</option>
                    <option value="Driver">Driver</option>
                    <option value="Conductor">Conductor</option>
                <option value="Bus Attendant">Bus Attendant</option>
            </select>
        <span id="e-employee-position-text"></span>
    </div> 
    <div class="col-md-3">
        <label><b>Contact Number</b></label>
            <input id="edit-employee-contact-no" type="number" class="form-control" name="contact_number"> 
            <span id="e-contact-no-text"></span>
        </div>  
    </div>
    <br>
    <div class="row">
        <div class="col-md-3">
            <label><b>Employee Avatar</b></label><br>
        <img id="e-employee-avatar" width="40%" height="74%" style="border-radius:50%" />
    </div>
    <div class="col-md-6">
            <label><b>Upload Employee Avatar</b></label>
                <input id="edit-employee-avatar" style="height: 2.7em;" type="file" class="form-control e-employee-avatar" name="employee_avatar"> 
            <span id="e-employee-avatar-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row e-employee-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_employees')

