@include('layouts.app_up')
<section id="preferences">
	<div class="container">
	    <header class="section-header">
        <h2 style="text-align: center; font-size: 22px;">Preferences<br>
    <img id="user-profile-pic" src="/uploads/avatars/{{ $user->avatar }}" style="width:145px; height:139px; image-align:center; border-radius:50%"></h2>
</header>
@include('partials._messages_update_profile')
<div class="row pref-pri-labels">
	<div class="col-md-3">
        <label for="affiliation"><b>Name</b>:</label><br>                         
    <h4 class="pref-name"><i class="fa fa-car"></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<h4>
</div>
<div class="col-md-3 sub-pref-labels">
    <label for="service-category"><b>Service Category</b>:</label><br>   
        <h4 class="pref-industry">{{ Auth::user()->industry }} </h4>                  
</div>
<div class="col-md-3 sub-pref-labels">
    <label for="service"><b>Service</b>:</label><br>
        <h4 class="pref-service">{{ Auth::user()->skills }}</h4>                       
</div>
<div class="col-md-3 sub-pref-labels">
    <label for="region"><b>Region</b>:</label><br>
        <h4 class="pref-region">{{ Auth::user()->point_of_origin }}</h4>                        
	</div>
</div>
<div class="row pref-div">
	<div class="col-md-3">
	    <div class="form-group">
	    <div class="icon" style="background: #BE90D4;"><i class="fa fa-edit icon-margin" style="color: #FFFFFF; font-size: 28px; text-align:center;"></i><b><a id="goToEditProfile" class="profile-links" style="cursor: pointer;" style="text-decoration: none;"> Update profile</a></b></div>
    </div>	
</div>
<div class="col-md-3">
    <div class="form-group">
        <div class="icon" style="background: #2ABB9B;"><i class="fa fa-user-circle icon-margin" style="color: #FFFFFF; font-size: 28px; text-align:center;"></i><b><a id="goToChangeAvatar" class="profile-links" style="cursor: pointer;" style="text-decoration: none;"> Change profile picture</a></b></div>
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <div class="icon" style="background: #BFBFBF;"><i class="fa fa-gears icon-margin" style="color: #FFFFFF; font-size: 28px; text-align:center;"></i><b><a id="goToListOfServiceDetails" class="profile-links" style="cursor: pointer;" style="text-decoration: none;"> My Services</a></b></div>
    </div>
</div>
<!-- <div class="col-md-3">
    <div class="form-group">
        <div class="icon" style="background: #1BB1DC;"><i class="ion-ios-analytics-outline icon-margin" style="color: #FFFFFF; font-size: 28px; text-align:center;"></i><b> Activity Report</b></div>
	    </div>
	</div> -->
</div>
    <div class="service-space">
</div>
</section>
@extends('layouts.footer')
