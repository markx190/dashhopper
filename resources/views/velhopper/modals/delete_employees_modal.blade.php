<style>
.modal-backdrop
{
    opacity:0.5 !important;
}
.device-margin {
    margin-top: -9px;
}
</style>
<div class="modal" id="deleteEmployeesModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="delete-employees"><b><p id="header-label"><i class="fa fa-user-circle"></i> Delete Employee</p></b></div>
    <div class="row delete-alert-m">
</div>
<div class="row">
    <div class="col-md-12 d-employee-space">
        </div>
</div> 
<form id="delete-employees-form" class="delete-employees-form" enctype="multipart/form-data" method="POST">    
{{ csrf_field() }}
<div class="modal-body div-docs delete-employee-pad">
    <div class="row"><div class="col-md-10"><b>Are you sure you want to delete this Employee?</b></div></div>
    <div class="row">
        <div class="col-md-3">
            <label><b>Company</b></label><br>
                <p id="company-name-label"></p>
            <input id="delete-employee-id" type="hidden" class="form-control d-employee-id" name="id">  
        </div>
        <div class="col-md-3">
            <label><b>Terminal</b></label><br>
                <p id="site-terminal-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Name</b></label><br>
                <p id="employee-firstname-label"></p>
        </div> 
        <div class="col-md-3">
            <label><b>Position</b></label><br>
                <p id="employee-position-label"></p>
        </div>
        <div class="col-md-3">
            <label><b>Employee ID No.</b></label><br>
                <p id="employee-id-no-label"></p>
        </div>   
        <div class="col-md-3">
            <label><b>Employee Contact No.</b></label><br>
                <p id="employee-contact-no-label"></p>
            </div>   
        </div>
    <br>
        <div class="row">
            <div class="col-md-6">
                <label><b>Employee Avatar</b></label><br>
            <img id="d-employee-avatar" width="20%" height="66%" style="border-radius:50%" />
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row d-employee-btn">
        </div>
            <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('velhopper.back_scripts.manage_bus_units')

