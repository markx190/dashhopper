<main class="main-profile">
    <div class="container-fluid">
        <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active">Hi <b style="margin-left: 3px;"> {{ Auth::user()->user_firstname }}</b>. Today is <b style="margin-left: 3px;">{{ $dateTime }}</b></li>
        </ol>
<div class="row profile-img">
    <div class="col-md-12">
        <img id="rd-profile-pic" src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:125px; height:121px; image-align:center; border-radius:50%"></h2>                    
    </div> 
</div>
<div class="row">  
    <div class="col-md-2">
        <label>
            <button type="button" class="btn btn-primary btn-sm"
            onclick="goToUpdateAvatar('{{ Auth::user()->hic_id_no }}', this)"
            data-hic-id-no="{{ Auth::user()->hic_id_no }}"
            data-hic-profile-avatar="/uploads/avatars/{{ Auth::user()->avatar }}"
            >
            <i class="fa fa-user-circle"></i> Update Avatar</button>
        </label>
    </div>
    <div class="col-md-6">
        <label>
            <button type="button" class="btn btn-success btn-sm"
            onclick="updateUsernameAndPassword('{{ Auth::user()->hic_id_no }}', this)"
            data-hic-id-no="{{ Auth::user()->hic_id_no }}"
            data-hic-profile-avatar="/uploads/avatars/{{ Auth::user()->avatar }}"
            >
            <i class="fa fa-id-card-o"></i> Change Username and Password</button>
        </label>
    </div>
</div>
<div class="row hci-label">  
    <div class="col-md-6">
        <label><b><i class="fa fa-user-circle"></i> User Information </b></label>
    </div>
</div>
@if(Auth::user()->user_account_type == 'Administrator')
<div class="row">
    <div class="col-md-3">
        <label>Name</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_firstname }} {{ Auth::user()->user_middlename }} {{ Auth::user()->user_lastname }} {{ Auth::user()->user_suffix }}</h3>
    </div>
    <div class="col-md-3">
        <label>Company</label>
            <h3 id="hic-data-margin">{{ Auth::user()->hic_name }}</h3>
    </div>
    <div class="col-md-3">
        <label>Position</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_account_type }}</h3>
    </div>
    <div class="col-md-3">
        <label>Email</label>
            <h3 id="hic-data-margin">{{ Auth::user()->email }}</h3>
    </div>
</div>
@endif
@if(Auth::user()->user_account_type == 'User Account')
<div class="row">
    <div class="col-md-3">
        <label>Name</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_firstname }} {{ Auth::user()->user_middlename }} {{ Auth::user()->user_lastname }} {{ Auth::user()->user_suffix }}</h3>
    </div>
    <div class="col-md-3">
        <label>Gender</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_gender }}</h3>
    </div>
    <div class="col-md-3">
        <label>Age</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_age }}</h3>
    </div>
    <div class="col-md-3">
        <label>Date of Birth</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_birth_month }} {{ Auth::user()->user_birth_day }}, {{ Auth::user()->user_birth_year }}</h3>
    </div>
    <div class="col-md-3">
        <label>Place of Birth</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_place_of_birth }}</h3>
    </div>
    <div class="col-md-3">
        <label>Civil Status</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_civil_status }}</h3>
    </div>
    <div class="col-md-3">
        <label>Religion</label>
            <h3 id="hic-data-margin">{{ Auth::user()->user_religion }}</h3>
    </div>
    <div class="col-md-3">
        <label>Mobile Number</label>
            <h3 id="hic-data-margin">{{ Auth::user()->hic_contact_no }}</h3>
    </div>
</div>
@if(Auth::user()->hic_street)
<div class="row">
    <div class="col-md-12"><i class="fa fa-map"></i> <b>Permanent Address</b></div>
</div>
<div class="row">
    <div class="col-md-3">
        <label>Street</label>
            <h3 id="hic-data-margin">{{ Auth::user()->hic_street }}</h3>
    </div>
    <div class="col-md-3">
        <label>Street</label>
            <h3 id="hic-data-margin">{{ Auth::user()->hic_village }}</h3>
    </div>
    <div class="col-md-3">
        <label>Street</label>
            <h3 id="hic-data-margin">{{ Auth::user()->hic_city }}</h3>
    </div>
    <div class="col-md-3">
        <label>Province</label>
            <h3 id="hic-data-margin">{{ Auth::user()->hic_province }}</h3>
    </div>
</div>
@endif
<div class="row">
    <div class="col-md-3">
        <label>Position applied</label>
            <h3 id="hic-data-margin">{{ Auth::user()->position_applied }}</h3>
    </div>
    <div class="col-md-3">
        <label>Type</label>
            <h3 id="hic-data-margin">{{ Auth::user()->job_type }}</h3>
    </div>
    <div class="col-md-3">
        <label>Area of Specialty</label>
            <h3 id="hic-data-margin">{{ Auth::user()->area_of_specialty }}</h3>
    </div>
    <div class="col-md-3">
        <label>Years of Experience</label>
            <h3 id="hic-data-margin">{{ Auth::user()->years_of_exp }}</h3>
    </div>
    <div class="col-md-3">
        <label>Company you are applying for</label>
            <h3 id="hic-data-margin">{{ Auth::user()->hic_name }}</h3>
    </div>
    <div class="col-md-3">
        <label>Region</label>
            <h3 id="hic-data-margin">{{ Auth::user()->region }}</h3>
    </div>
    <div class="col-md-3">
        <label>Country</label>
            <h3 id="hic-data-margin">{{ Auth::user()->country }}</h3>
    </div>
</div>
<div class="row">
@if(Auth::user()->passport_number)
    <div class="col-md-3">
        <label>Passport Number</label>
            <h3 id="hic-data-margin">{{ Auth::user()->passport_number }}</h3>
    </div>
    <div class="col-md-3">
        <label>Date of Expiry</label>
            <h3 id="hic-data-margin">{{ Auth::user()->passport_exp_month .' '. Auth::user()->passport_exp_day .',' . Auth::user()->passport_exp_year  }}</h3>
    </div>
@endif
@if(Auth::user()->prc_number)
    <div class="col-md-3">
        <label>PRC Number</label>
            <h3 id="hic-data-margin">{{ Auth::user()->passport_number }}</h3>
    </div>
    <div class="col-md-3">
        <label>Date of Expiry</label>
            <h3 id="hic-data-margin">{{ Auth::user()->prc_exp_month .' '. Auth::user()->prc_exp_day .',' . Auth::user()->prc_exp_year  }}</h3>
    </div>
@endif
</div>
<div class="row">   
    <div class="col-md-3">
        <label>Status</label>
        <h3 id="hic-data-margin">{{ Auth::user()->hic_user_status }}</h3>
    </div>
</div>
@endif
</main>
<br />
@include('app_back_end.modals.change_avatar')
@include('app_back_end.back_scripts.update_avatar')






	




      


