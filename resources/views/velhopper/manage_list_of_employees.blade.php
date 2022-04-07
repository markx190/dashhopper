<main class="hic-documents">
    <div class="container-fluid">
       <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active"><b>Manage Employees</b>. Today is &nbsp;<b>{{ $dateTime }}</b></li>
    </ol>
<br>
<div class="row">
    <div class="col-md-6" id="trips">
        <button class="btn btn-primary btn-sm" onclick="showAddEmployeesModal(event)"><i class="fa fa-plus-circle"></i> Add Employee</button>                         
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-list"></i>
        List of Employees
            </div>
    <div class="row users-spinner">
</div> 
<div class="card-body docs-body">
    <form id="filter-employees-form">
        <div class="row">
            <div class="col-md-3">
                <label>Position</label>
                    <select class="form-control e-position">
                    <option></option>
                    <option value="">All</option>
                    <option value="Terminal Officer">Terminal Officer</option>
                    <option value="Bus Dispatcher">Bus Dispatcher</option>
                    <option value="Driver">Driver</option>
                <option value="Conductor">Conductor</option>
            <option value="Bus Attendant">Bus Attendant</option>
        </select>
    <span id="employee-type-text"></span>  
</div>
<div class="col-md-3">
    <button id="btnSearchEmployees" style="margin-top: 34px;" class="btn btn-success btn-sm" onclick="filterBusUnits(event)"><i class="fa fa-search"></i> Submit</button>                         
        </div>
    </div>
</form>
<br>
<div class="table-responsive">
    <table id="employees-datatable" class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="u-th">ID No.</th>
                <th class="u-th">Name</th>
                <th class="u-th">Position</th>
                <th class="u-th">Contact No.</th>
                <th class="u-th">Action</th>
            </tr>
        </thead>
            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .btn-group-xs > .btn, .btn-xs {
        padding: .25rem .4rem;
        font-size: .875rem;
        line-height: .5;
        border-radius: .2rem;
    }
    .u-th {
        background-color: #ECF0F1;
    }
</style>
@include('velhopper.modals.add_employees_modal')
@include('velhopper.modals.edit_employees_modal') 
@include('velhopper.modals.delete_employees_modal') 












