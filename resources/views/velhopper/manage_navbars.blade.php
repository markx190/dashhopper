<main class="hic-documents">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 dash-active">
    <li class="breadcrumb-item active">Hi, {{ Auth::user()->user_firstname }} {{ Auth::user()->user_lastname }} , Manage Navbar Links</li>
</ol>
<div class="row">
    <div class="col-md-6" id="trips">
        <button class="btn btn-success btn-sm" onclick="addNavlink(event)"><i class="fa fa-plus-circle"></i> Add Navlink</button>                         
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-list"></i>
        List of Navlinks
            </div>
        <div class="row docs-spinner">
    </div> 
<div class="card-body docs-body">
    <form id="search-items-form">
        <div class="row">          
    </div>
</form>
<div class="table-responsive">
    <table id="navbar-table" class="table-docs table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="link-th">Position No.</th>
                <th class="link-th">Label Name</th>
                <th class="link-th">Type</th>
                <th class="link-th">Status</th>
                <th class="link-th">Created By</th>
                <th class="link-th">Action</th>
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
    .link-th {
        font-size: 14px;
        font-family: "Montserrat", sans-serif;
    }
</style>
@include('profile_cake.modals.add_navlink_modal') 
@include('profile_cake.modals.edit_navlink_modal') 
@include('profile_cake.modals.delete_navlink_modal') 
@include('profile_cake.back_scripts.navbars_table')











