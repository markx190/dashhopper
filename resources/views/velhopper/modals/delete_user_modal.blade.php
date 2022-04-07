<div class="modal" id="deleteUserModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="add-documents"><b><p id="header-label"><i class="fa fa-user-circle"></i> Delete User</p></b></div>
    <div class="row delete-alert-m">
</div>
<form>    
<div class="modal-body">
    <div class="row">
        <div class="col-md-6">
            <label><b>Are your sure you want to delete this user?</b></label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Name</label>
            <b><p style="margin-top: -15px;"><span id="d-user-name"></span></p></b>
        </div>
    </div>
</div>
<div class="modal-footer">
    <div class="row">
        </div>
            <button id="delete-user-button" type="button" class="btn btn-danger btn-sm">Delete</button>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>
@include('app_back_end.back_scripts.manage_users')

