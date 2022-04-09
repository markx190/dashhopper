<main class="hic-documents">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active"><b>Manage Travel Schedules</b>. Today is &nbsp;<b>{{ $dateTime }}</b></li>
    </ol>
<br>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-list"></i>
        List of Schedules
        </div>
    <div class="row users-spinner">
</div> 
<div class="card-body docs-body">
    <form id="filter-bus-units-form">
        <div class="row">
            <div class="col-md-3">
                <label>Bus Type</label>
                    <select class="form-control select-bus-type">
                        <option></option>
                        <option value="All">All</option>
                        <option value="Ordinary">Ordinary</option>
                    <option value="Economy">Economy</option> 
                <option value="Semi Deluxe">Semi Deluxe</option>     
            <option value="Deluxe">Deluxe</option>     
        </select>
    <span id="bus-type-text"></span>  
</div>
<div class="col-md-3">
    <button id="btnSearchSchedules" style="margin-top: 34px;" class="btn btn-success btn-sm" onclick="filterSchedules(event)"><i class="fa fa-search"></i> Submit</button>                         
        </div>
    </div>
</form>
<br>
<div class="table-responsive">
    <table id="schedules-datatable" class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="u-th">Bus</th>
                <th class="u-th">Routes</th>
                <th class="u-th">Date and Time</th>
                <th class="u-th">Personnels</th>
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
@include('velhopper.modals.edit_trips_modal') 
@include('velhopper.modals.delete_trips_modal') 
@include('velhopper.back_scripts.manage_schedules') 

 












