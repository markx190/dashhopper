<div class="modal" id="membersRegModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
        <div class="edit-avatar"> <b><p id="header-label"><i class="fa fa-medkit"></i> New Account</p></b></div>
    <div class="row alert-a">
</div>
<form id="accept-members-form">   
<div class="modal-body bt-industry">
<div class="row">
    <div class="col-md-4 new-hic">
        <div class="form-group">
            <label for="hic-name">Health Care Insitution</label>
                <input id="new-hic-id-no" type="hidden" name="hic_id_no" class="form-control">
                <input id="new-member-status" type="hidden" value="Accepted" name="hic_user_status" class="form-control edit-file">
                <input id="new-hic-name" type="hidden" name="hic_name" class="form-control edit-file">                
                <h3 id="new-hic-member"></h3>
            <span id="accept-new-acc-text"></span>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button id="accept-member-btn" type="button" name="Submit" class="btn btn-success btn-sm pull-right" onclick="submitAcceptedMembers(event)">Accept</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>
</form>