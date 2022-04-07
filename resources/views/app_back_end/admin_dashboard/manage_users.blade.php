<div class="card-header">
    <i class="fa fa-table mr-1"></i>
        System Users
        </div>
    <div class="row users-spinner">
</div> 
<div class="card-body">
    <form id="search-users-form">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>HIC Type</label>
                        <select id="select-hic-type" name="hic_type" class="form-control select-hic">
                            <option></option>
                            <option value="All">All</option>
                            @foreach ($hicTypes as $key => $value)
                            <option value="{{ $value }}">{{ $value }}</option>
                            @endforeach
                        </select>
                        <span id="hic-type-select-text"></span>
                    </div>
                </div>
            <div class="col-md-3">
        <button id="user-search-btn" type="button" class="btn btn-success btn-sm" onclick="searchUsers(event)"><i class="fa fa-search"></i> Search</button>
    </div>
</div>
</form>
<div class="table-responsive">
    <table id="hic-users-datatable" class="table table-bordered" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Hospital</th>
                <th>Type</th>
                <th>Admin</th>
                <th>Contact</th>
                <th>Email</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
                </thead>
            </table>
        </div>
    </div>
</div>    
@include('reddrop_back.modals.edit_user')
