<main class="hic-documents">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 dash-active">
    <li class="breadcrumb-item active">Hi, {{ Auth::user()->user_firstname }} {{ Auth::user()->user_lastname }} , Manage Subscribers</li>
</ol>
<div class="row">
    <div class="col-md-6" id="trips">
        <button class="btn btn-success btn-sm" onclick="addJobs(event)"><i class="fa fa-location-arrow"></i> Email</button>                         
    </div>
</div>
<div class="row charts-docs">
    <div class="col-xl-12 docs-table">
        <div class="card mb-4">         
<div class="card-header docs-h">
    <i class="fa fa-gears"></i>
        List of Jobs
            </div>
        <div class="row docs-spinner">
    </div> 
<div class="card-body docs-body">
    <form id="search-items-form">
        <div class="row">          
    </div>
</form>
<div class="table-responsive">
    <table id="jobs-table" class="table-docs table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th class="link-th">Job Title</th>
                <th class="link-th">Type</th>
                <th class="link-th">Date</th>
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