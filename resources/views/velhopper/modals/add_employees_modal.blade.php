<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="addEmployeesModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-bus"><b><p id="header-label"><i class="fa fa-user-circle"></i> Add Employee</p></b></div>
    <div class="row alert-m">
</div>
<div class="row">
    <div class="col-md-12 a-employee-space">
        </div>
</div>  
<form class="add-employees-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs add-employee-pad">
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
        <label><b>Firstname</b></label>
            <input id="add-employee-firstname" type="text" class="form-control" name="firstname"> 
        <span id="a-employee-firstname-text"></span>
    </div>
    <div class="col-md-3">
        <label><b>Lastname</b></label>
            <input id="add-employee-lastname" type="text" class="form-control" name="lastname"> 
        <span id="a-employee-lastname-text"></span>
    </div>
    <div class="col-md-3">
        <label><b>Employee ID No.</b></label>
            <input id="add-employee-id-no" type="number" class="form-control" name="employee_id_no"> 
        <span id="a-employee-id-no-text"></span>
    </div>
    <div class="col-md-3">
        <label><b>Position</b></label>
            <select id="add-employee-position" class="form-control select-e-position" name="position">
                <option></option>
                    <option value="Terminal Officer">Terminal Officer</option>
                    <option value="Bus Dispatcher">Bus Dispatcher</option>
                    <option value="Driver">Driver</option>
                    <option value="Conductor">Conductor</option>
                <option value="Bus Attendant">Bus Attendant</option>
            </select>
        <span id="a-employee-position-text"></span>
    </div> 
    <div class="col-md-3">
        <label><b>Contact Number</b></label>
            <input id="add-employee-contact-no" type="number" class="form-control" name="contact_number"> 
            <span id="a-contact-no-text"></span>
        </div>  
    </div>
    <div class="row" style="margin-top: 15px;">
        <div class="col-md-6">
            <label><b>Upload Employee Avatar</b></label>
                <input id="add-employee-avatar" style="height: 2.7em;" type="file" class="form-control a-employee-avatar" name="employee_avatar"> 
                <span id="a-employee-avatar-text"></span>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <div class="row add-employee-btn">
            </div>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_employees')