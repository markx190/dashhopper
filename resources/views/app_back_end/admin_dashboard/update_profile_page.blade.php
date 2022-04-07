<main class="main-profile">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 dash-active">
    <li class="breadcrumb-item active">Hi <b style="margin-left: 3px;">{{ Auth::user()->user_firstname }}</b>. Today is <b style="margin-left: 3px;">{{ $dateTime }}</b></li>
</ol>
<div class="row profile-img">
    <div class="col-md-12">
        <img id="rd-profile-pic" src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:125px; height:120px; image-align:center; border-radius:50%"></h2>                    
    </div> 
</div>
<div class="row">  
    <div class="col-md-6">
        <label><b><i class="fa fa-info-circle"></i> Here, you can complete your personal information</b></label>
    </div>
</div>
<div class="alert-space"></div>
<form id="update-profile-form"> 
<div class="row">
    <div class="col-md-3">
        <label><b>Firstname</b></label>
            <input id="user-firstname-input" type="text" class="form-control u-user-firstname" value="{{ Auth::user()->user_firstname }}" name="user_firstname">
        <input id="user-id-no-input" type="hidden" class="form-control" value="{{ Auth::user()->hic_id_no }}" name="hic_id_no">            
    <span id="update-hic-firstname-text"></span>
</div>
<div class="col-md-3">
    <label><b>Middlename</b></label>
        <input id="user-middlename-input" type="text" class="form-control u-user-middlename" value="{{ Auth::user()->user_middlename }}" name="user_middlename">
</div>
<div class="col-md-3">
    <label><b>Lastname</b></label>
        <input id="user-lastname-input" type="text" class="form-control u-user-lastname" value="{{ Auth::user()->user_lastname }}" name="user_lastname">
    <span id="update-hic-lastname-text"></span>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label><b>Suffix</b></label>
        <input id="user-suffix-input" type="text" class="form-control u-user-suffix" value="{{ Auth::user()->user_suffix }}" name="user_lastname">
        </div>
    </div>
</div>
<div class="row">
<div id="divGender" class="col-md-3">
	<label for="gender"><b>Gender</b></label><br>
		<input class="radio c-male" id="male" type="radio" value="Male" name="user_gender" {{ Auth::user()->user_gender == 'Male' ? 'checked' : '' }}> Male
	        <input class="radio c-female" id="female" type="radio" value="Female" name="user_gender" {{ Auth::user()->user_gender == 'Female' ? 'checked' : '' }}> Female
		<br>
	<span id="genderText"></span>
</div>
<div class="col-md-3">
    <label><b>Civil Status</b></label>
        <select class="form-control u-civil-status">
            <option value="{{ Auth::user()->user_civil_status }}">{{ Auth::user()->user_civil_status }}</option>
            <option value="Single">Single</option>
            <option value="Married">Married</option>
            <option value="Separated">Separated</option>
            <option value="Widowed">Widowed</option>
        </select>
    <span id="update-civil-status-text"></span>
</div>
<div class="col-md-3">
    <label><b>Religion</b></label>
        <select class="form-control u-religion">
            <option value="{{ Auth::user()->user_religion }}">{{ Auth::user()->user_religion }}</option>
            <option value="Islam">Islam</option>
            <option value="Roman Catholic">Roman Catholic</option>
            <option value="Iglesia ni Kristo">Iglesia ni Kristo</option>
            <option value="Jehovas Witness">Jehovas Witness</option>
            <option value="Christian Variants">Christian Variants</option>
            <option value="Hinduism">Hinduism</option>
        </select>
    <span id="update-user-religion-text"></span>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label><b>Age</b></label>
            <input id="user-age-input" type="number" class="form-control u-user-age" value="{{ Auth::user()->user_age }}" name="user_age">
            <span id="update-user-age-text"></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label><b>Date of Birth</b></label>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <label>Month</label>
            <select id="hic-user-birth-day" class="form-control u-birth-month" name="user_birth_month">
            <option value="{{ Auth::user()->user_birth_month }}">{{ Auth::user()->user_birth_month }}</option>
            <option value="January">January</option>
            <option value="February">February</option>
            <option value="March">March</option>
            <option value="April">April</option>
            <option value="May">May</option>
            <option value="June">June</option>
            <option value="July">July</option>
            <option value="August">August</option>
            <option value="September">September</option>
            <option value="October">October</option>
            <option value="November">November</option>
            <option value="December">December</option>
        </select>
    <span id="update-user-birthmonth-text"></span>
</div>
<div class="col-md-3">
    <label><b>Day</b></label>
        <input id="hic-user-birth-day-input" type="number" class="form-control u-birth-day" value="{{ Auth::user()->user_birth_day }}" name="user_birth_day">
    <span id="update-user-birthday-text"></span>
</div>
<div class="col-md-3">
    <label><b>Year</b></label>
        <input id="hic-user-birth-year-input" type="number" class="form-control u-birth-year" value="{{ Auth::user()->user_birth_year }}" name="user_birth_year">
    <span id="update-user-birthyear-text"></span>
</div>
<div class="col-md-3">
    <div class="form-group">
        <label><b>Place of Birth</b> (Province)</label>
            <input id="hic-user-birthplace-input" type="text" class="form-control u-birthplace" value="{{ Auth::user()->user_place_of_birth }}" name="user_place_of_birth">
            <span id="update-user-birthplace-text"></span>
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-3">
    <label><b>Company</b></label>
        <input id="u-hic-name-input" type="text" class="form-control u-hic-name" value="{{ Auth::user()->hic_name }}" name="hic_name">
    <span id="update-hic-name-text"></span>
</div>
<div class="col-md-3">
    <label><b>Position</b></label>
        <input id="hic-position-input" type="text" class="form-control u-position" value="{{ Auth::user()->hic_position }}" name="hic_position">
    <span id="update-position-text"></span>
</div>
<div class="col-md-3">
    <label><b>Account Type</b></label>
        <input id="user-account-type-input" type="text" class="form-control u-user-account-type" value="{{ Auth::user()->user_account_type }}" name="user_acount_type">
    <span id="update-user-account-type-text"></span>
</div>
<div class="col-md-3">
    <div class="form-group">
	    <label><b>Contact Number</b></label>
	        <input id="hic-admin-contact-no" type="number" class="form-control rd-inputs u-contact-no" value="{{ Auth::user()->hic_contact_no }}" name="hic_contact_no">
            <span id="update-contact-no-text"></span>
        </div>
    </div>
</div>
<div class="row">  
    <div class="col-md-12">
        <button id="update-profile-btn" type="button" name="update" class="btn btn-success btn-sm pull-right" onclick="submitUpdatedProfile(event)">Update</button>
            </div>
        </div>
    </form>
</main>
<br />
@include('app_back_end.back_scripts.update_profile') 




