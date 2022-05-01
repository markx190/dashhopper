@include('backoffice_front.layouts.app_header')
<div class="container">
    <section id="about" >
	    <div class="container">
		    <br>
			<header class="section-header">
        <h2 style="text-align: center; font-size: 22px; font-family: sans-serif;">Sign in</h2>
	</header>
<!-- <form id="login-form" class="form-horizontal" method="POST" action="{{ route('login') }}"> -->
<form id="login-form" class="form-horizontal">
<div class="row">
	<div class="col-md-3">
		<label>Email:</label>
	    <input id="email" type="email" class="form-control" name="email">
        <span id="email-text"></span>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label>Password:</label>                          
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
            <button type="button" id="login-button" class="btn btn-primary" onclick="submitLogin(event)">
                <i class="fa fa-sign-in"></i> Login
            </button>
        <!-- <a id="forgotPassword" class="btn btn-link" href="{{ url('/forgot-password') }}">Forgot password?</a>               -->
   <span id="cred-match-text"></span>  
</div>
    </div>
        </div>
</form>
</section>
<div class="row bottom-h">
    <div class="col-md-10" style="height: 230px;">
        </div>
    </div>
</div>
@extends('backoffice_front.layouts.app_footer')

