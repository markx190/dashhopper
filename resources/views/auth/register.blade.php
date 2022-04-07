@include('layouts.header')
<main id="main">
	<section id="registerPage">
		<div class="container">
			<br>
			    <header id="regLabel" class="section-header">
			<h2 style="text-align: center; font-size: 22px;">Create an account</h2>
		</header>
	<br>
<form id="register-form">
<div id="reg-div" class="row reg-text">
    <div class="col-md-12">
	    <label><b>We're helping you finding passenger.</b></label>
	</div>
</div>
<div class="row">
    <div class="col-md-3">
	    <label for="account_type">Account Type</label>
		    <select id="accountType" name="account_type" class="form-control account-select2">
		        <option value="">Select Acount Type</option>
				<option></option>
			    <option value="Single">Sole / Private </option>
	        <option value="Company">Company</option>
	    </select>
	<span id="accountText"></span>
</div>
<div class="col-md-3">
	<label for="service-category">Service Category</label>
	    <select id="industry" name="industry" class="form-control select-industry industry-select2">
		    <option value="">Select Category</option>
			    <option></option>
			<option value="Travel and Tours">Travel and Tours</option>
        </select>
	<span id="industryText"></span>
</div>
<div class="col-md-6">
    <div class="form-group">
	    <label for="skills">Service Offered</label>
	        <select id="skillTrans" name="skills" class="form-control select-skills">
		        <option value="">Select Service</option>
            </select>
	    <span id="serviceText"></span>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
	    <label for="point_of_origin">Service Origin</label>
	        <select id="origin" name="point_of_origin" class="form-control location-select">
		        <option value="">Select</option>
			        <option value=""></option>
				    <option value="Aurora">Aurora</option>
				<option value="Leyte">Leyte</option>    
            </select>
		<span id="locationText"></span>
    </div>
</div>
<div class="col-md-9">
    <div class="form-group">
        <label for="company_name">Company Name:</label>                          
		    <input id="userStatus" type="hidden" class="form-control" name="user_status" value="New Account">
			<input id="userLevel" type="hidden" class="form-control" name="user_level" value="Bt Personnel">
		    <input id="companyName" type="text" class="form-control" name="company_name">
	    </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
	    <label for="firstname">Firstname:</label>
	    <input id="firstname" type="text" class="form-control" name="firstName">
	<span id="firstname-text"></span>
</div>
<div class="col-md-3">
    <label for="lastname">Lastname:</label>                          
		<input id="lastname" type="text" class="form-control" name="lastName">
	<span id="lastname-text"></span>
</div>
<div class="col-md-3">
    <label for="mobile_no">Mobile Number:</label>                          
        <input id="mobileno" type="number" class="form-control" name="mobile_no" maxlength="11">
		<span id="mobile-text"></span>
    </div>
</div>
<hr>
<div class="row">
	<div class="col-md-3">
		<label for="email">E-Mail Address</label>
		    <input id="email" type="email" class="form-control" name="email">
		<span id="email-text"></span>
	</div>
</div>
<div class="row">
	<div class="col-md-3">
		<label for="password">Password</label>
		    <input id="password" type="password" class="form-control" name="password">
		<span id="password-text"></span>
    </div>
</div>
<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="password-confirm">Confirm Password</label>
		    <input id="passwordCon" type="password" name="passwordCon" class="form-control">
			<span id="password-con-text"></span>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="col-md-12 col-md-offset-4">
	    <button id="submit-button" type="button" class="btn btn-primary pull-right" onclick="toSubmit(event)">Submit</button>
            </div>
                </div>
                    </div>
				        </form>
                    </section>
			    <p id="regInit"><p>
            </main>
        </div>
    </div>
</div>
<br />
@extends('layouts.login_footer')
