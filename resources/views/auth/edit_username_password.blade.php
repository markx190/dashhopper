<div id="updateProfile" class="container">
	<header class="section-header">
        <h5 style="text-align: center; font-size: 16px; margin-top: 12px;"><b>{{ $userData->user_firstname .' '. $userData->user_lastname }}</b><br>
        <br>
    <img src="/uploads/avatars/{{ $userData->avatar }}" style="width:125px; height:121px; image-align:center; border-radius:50%"></h5>
</header>
<div class="row up-alert-div"></div>
<p><b>Change Username and Password</b></p>
<hr>
<form id="update-form">
<div class="row">
	<div class="col-md-3">
		<label for="email"><b>E-Mail Address</b></label>
		    <input id="email" type="email" class="form-control" name="email" value="{{ $userData->email }}">
	        <input id="firstname" type="hidden" class="form-control" name="spock_id_no" value="{{ $userData->spock_id_no }}">
	    <input id="firstname" type="hidden" class="form-control" name="user_id_no" value="{{ $userData->user_id_no }}">   
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<label for="password"><b>Type New Password</b></label>
		<input id="password" type="password" class="form-control" name="password">
    </div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="password-confirm"><b>Confirm New Password</b></label>
		    <input id="passwordCon" type="password" name="passwordCon" class="form-control">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <button type="button" class="btn btn-primary pull-right" id="update-button" onclick="saveUpdatedUsernameAndPassword(event)">Save</button>                      
	    </div>
    </div>
</form>
<br />
@include('app_back_end.back_scripts.update_profile') 




