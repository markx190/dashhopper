<main class="hic-documents">
    <div class="container-fluid">
       <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active"><b>Manage System Users</b>. Today is &nbsp;<b>{{ $dateTime }}</b></li>
    </ol>
<br>
<div class="row">
    <div class="col-md-6" id="trips">
        <button class="btn btn-primary btn-sm" onclick="showRegistrationForm(event)"><i class="fa fa-plus-circle"></i> Add User</button>                         
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-list"></i>
        List of System Users
            </div>
        <div class="row users-spinner">
    </div> 
<div class="card-body docs-body">
    <form id="filter-users-form">
        <div class="row">
            <div class="col-md-3">
                <label>Account Type</label>
                    <select class="form-control account-type">
                    <option></option>
                    <option value="All">All</option>
                    <option value="Administrator">Administrator</option>
                <option value="User Account">User Account</option>     
            </select>  
        </div>
        <div class="col-md-3">
            <label>Position</label>
                <select class="form-control dash-position">
                    <option></option>
                    <option value="">All</option>
                    <option value="Terminal Officer">Terminal Officer</option>
                    <option value="Bus Dispatcher">Bus Dispatcher</option>
                <option value="Bus Attendant">Bus Attendant</option>
            </select>  
        </div>
        <div class="col-md-3">
            <button style="margin-top: 34px;" class="btn btn-success btn-sm" onclick="filterClientUsers(event)"><i class="fa fa-search"></i> Submit</button>                         
            </div>
        </div>
    </form>
<br>
<div class="table-responsive">
    <table id="users-datatable" class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="u-th">Name</th>
                <th class="u-th">Email</th>
                <th class="u-th">Type</th>
                <th class="u-th">Position</th>
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
@include('velhopper.modals.register_user_modal') 
@include('velhopper.modals.edit_user_modal') 
@include('velhopper.modals.delete_user_modal') 











