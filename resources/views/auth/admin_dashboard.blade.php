@include('layouts.app_up')
<section id="testimonials">
	<div class="container">
	    <header class="section-header" id="dashboard-header">
            <h2 style="text-align: center; font-size: 22px;">Dashboard<br>
        <br>
    <img id="admin-profile-pic" src="/uploads/avatars/{{ $user->avatar }}" style="width:145px; height:128px; image-align:center; border-radius:50%"></h2>
</header>
<div class="row admin-details">
	<div class="col-md-3">                     
        <h3 class="admin-name"><i class="fa fa-user-circle user-icon"></i> {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h3>
    </div>
</div>
<hr id="admin-line-break">
    <div class="row skill-well">
        <div class="col-md-3">
            <div class="form-group">
                <!-- <div class="icon" style="background: #BE90D4;"> <i class="ion-ios-gear plus-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> <b><a style="cursor: pointer;" onclick="addSkills(event)">Services </a></b></div> -->
                    <div class="icon" style="background: #F7CA18;"> 
                <i class="fa fa-gears s-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> 
            <b><a style="cursor: pointer;" onclick="listOfServicesDetails(event)">Services Details </a></b>
        </div>                
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <!-- <div class="icon" style="background: #BE90D4;"> <i class="ion-ios-gear plus-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> <b><a style="cursor: pointer;" onclick="addSkills(event)">Services </a></b></div> -->
            <div class="icon" style="background: #F7CA18;"> 
                <i class="fa fa-hand-stop-o s-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> 
            <b><a style="cursor: pointer;" onclick="listOfSkills(event)">Services </a></b>
        </div>                
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <!-- <div class="icon" style="background: #BE90D4;"> <i class="ion-ios-gear plus-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> <b><a style="cursor: pointer;" onclick="addSkills(event)">Services </a></b></div> -->
            <div class="icon" style="background: #F7CA18;"> <i class="fa fa-users s-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> 
            <b><a style="cursor: pointer;" onclick="listOfUsers(event)"> Registered Users</a></b>
        </div>                
    </div>
</div>
<div class="col-md-3">
    <div class="form-group">
        <!-- <div class="icon" style="background: #BE90D4;"> <i class="ion-ios-gear plus-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> <b><a style="cursor: pointer;" onclick="addSkills(event)">Services </a></b></div> -->
            <div class="icon" style="background: #F7CA18;"> <i class="fa fa-list s-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> 
                <b><a style="cursor: pointer;" onclick="listOfTransactions(event)"> Transactions</a></b>
                    </div>                
                </div>
            </div>
        </div>
    <div class="skill-space">
</div>
</section>
@extends('layouts.footer')
