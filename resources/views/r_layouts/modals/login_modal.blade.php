<div class="modal" id="loginModal" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content pull-right">
    <div class="modal-header"> <b><p id="login-label"><i class="fa fa-sign-in"></i> Login</p></b></div>
<br>
<section id="login">
    <div class="row s-space">
</div>   
<div class="container login-pad">
    <form id="login-form">    
        <div class="row">
	        <div class="col-md-3">
		        <label><i class="fa fa-envelope"></i> Email:</label>
	        <input id="email" type="email" class="form-control" name="email">
        <span id="email-text"></span>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label><i class="fa fa-lock"></i> Password:</label>                          
            <input id="password" type="password" class="form-control" name="password">
        <span id="password-text"></span>
    </div>
</div>
<div class="form-group">
    <div class="row">
        <div class="col-md-3">                    
            <input id="rememberMe" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
        </div>
    </div>
</div>
<div class="row">
    <div class="form-group">
        <div class="col-md-12">    
            <button type="button" id="login-btn" class="btn btn-primary" onclick="submitRdLogin(event)">
                Login
            </button>
                <!-- <a id="forgotPassword" class="btn btn-link" href="{{ url('/forgot-password') }}">Forgot password?</a>               -->
            <span id="cred-match-text"></span>                       
        </div>
	</form>
</section>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
        </div>
            </div>
    </div>
</div>

