<div class="modal" id="userRegisterModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="modal-header-new"><b><p id="register-label"><i class="fa fa-pencil-square"></i> Register User</p></b></div>
<form id="rd-register-form">    
{{ csrf_field() }}
<section id="login">
    <div class="row">
        <div class="col-md-12 s-space">
    </div>
</div>    
<div class="container register-con reg-pad">
<div class="row first-row" style="margin-top: 15px;">
	<div class="col-md-3">
        <div class="form-group">        
		    <label>Name of Company</label>
                <select name="hic_name" class="form-control select-hic-name">
                    <option></option>
                    <option value="ALPS">ALPS</option>
                    <option value="BLTBCo">BLTBCo</option>
                    <option value="Five Star">Five Star</option>
                    <option value="Genesis">Genesis</option>
                    <option value="Victory Liner">Victory Liner</option>
                </select> 
	            <input id="hic-user-status" type="hidden" class="form-control rd-inputs" value="New Account" name="hic_user_status">
	        <input id="hic-user-level" type="hidden" class="form-control rd-inputs" value="Client" name="hic_user_level">            
        <span id="hic-name-text"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Terminal Network</label>
            <select name="hic_network" class="form-control select-terminal-network">
                <option></option>
                <option value="Cubao">Cubao</option>
                <option value="Pasay">Pasay</option>
            </select>                          
            <span id="hic-terminal-network-text"></span>
        </div>
    </div>
<div class="col-md-3">
    <div class="form-group">
        <label>Position</label>
            <select name="hic_network" class="form-control select-position">
                <option></option>
                <option value="Terminal Officer">Terminal Officer</option>
                <option value="Bus Dispatcher">Bus Dispatcher</option>
                <option value="Bus Attendant">Bus Attendant</option>
                <option value="Dispatcher">Dispatcher</option>
            </select>                                                    
            <span id="hic-position-text"></span>
        </div>
    </div>
<div class="col-md-3">
    <div class="form-group">
        <label>Account Type</label>
            <select name="user_account_type" class="form-control select-user-account-type">
                <option></option>
                <option value="Administrator">Administrator</option>
                <option value="Field User">Field User</option>
            </select>                      
            <span id="hic-account-type-text"></span>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-3">
        <div class="form-group">
            <label>Firstname</label>                          
            <input id="hic-firstname" type="text" class="form-control rd-inputs" name="user_firstname">
        <span id="hic-firstname-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Middlename</label>                          
            <input id="hic-middlename" type="text" class="form-control rd-inputs" name="user_middlename">
        <span id="hic-middlename-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Lastname</label>                          
            <input id="hic-lastname" type="text" class="form-control rd-inputs" name="user_lastname">
            <span id="hic-lastname-text"></span>
        </div>    
    </div>
    <div class="col-md-3">
        <div class="form-group">
	        <label>Contact Number</label>
	            <input id="hic-admin-contact-no" type="text" class="form-control rd-inputs" name="hic_contact_no">
            <span id="hic-admin-contact-no-text"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label><b>Login Details</b></label>
    </div>
</div>
<div class="row second-row">
    <div class="col-md-3">
        <div class="form-group">
            <label>Email</label>                          
                <input id="hic-email" type="text" class="form-control rd-inputs" name="email">
            <span id="hic-email-text"></span>
        <span id="hic-email-valid-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Password</label>                          
            <input id="hic-password" type="password" class="form-control rd-inputs" name="password">
        <span id="hic-password-text"></span>
    </div>    
</div>
<div class="col-md-3">
    <div class="form-group">
        <label>Confirm Password</label>                          
            <input id="hic-password-con" type="password" name="passwordCon" class="form-control rd-inputs">    
                <span id="hic-password-con-text"></span>
            </div>    
        </div>
    </div>
</section>
<div class="modal-footer">
    <button id="reg-btn" type="button" value="Save" class="btn btn-success btn-sm pull-right" onclick="submitRegisterUser(event)"><i class="fa fa-save"></i> Save</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
            </div>
            </div>
        </div>
    </div>
</form>