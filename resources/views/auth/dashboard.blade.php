@include('layouts.app_up')
<section id="testimonials">
	<div class="container">
	    <header class="section-header">
            <h2 style="text-align: center; font-size: 22px;">Dashboard<br>
        <br>
    <img id="user-profile-pic" src="/uploads/avatars/{{ $user->avatar }}" style="width:145px; height:138px; image-align:center; border-radius:50%"></h2>
</header>
<div class="row dashboard-div">
	<div class="col-md-3">
        <label for="affiliation"><b>Name</b>:</label><br>   
    <h4 class="pref-name">
    @if(Auth::user()->user_level == 'Customer')
    <i class="fa fa-user-circle"></i>
    @else
    <i class="fa fa-car"></i>
    @endif
    {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h4>
</div>
@if(Auth::user()->user_level != 'Customer')
<div class="col-md-3">
    <label for="affiliation"><b>Industry</b>:</label><br>   
    <h4 class="pref-name">{{ Auth::user()->industry }}</h4>                   
</div>
<div class="col-md-3">
    <label for="professional"><b>Service</b>:</label><br>
    <h4 class="pref-name">{{ Auth::user()->skills }}</h4>                       
</div>
<div class="col-md-3">
    <label for="province"><b>Location of Service</b>:</label><br>
        <h4 class="pref-name">{{ Auth::user()->point_of_origin }}</h4>                        
	</div>
@endif
</div>
<div class="row dashboard-menu">
    <div class="col-md-3">
        <div class="form-group">
            <div class="icon daily-booking" style="background: #2ABB98;"><i class="fa fa-list list-icon" style="color: #2282ff; font-size: 28px; text-align:center;"></i> 
                
                @if(Auth::user()->user_level == 'Customer')
                <b><a id="booking" style="cursor: pointer;" onclick="clientListOfBookings(event)"> Travel Listings</a></b>
                @endif
                @if(Auth::user()->user_level == 'Bt Personnel')
                <b><a id="booking" style="cursor: pointer;" onclick="listOfBookings(event)"> Daily Bookings</a></b>
                @endif
                @if(Auth::user()->user_level == 'Admin')
                <b><a id="booking" style="cursor: pointer;" onclick="listOfBookings(event)"> Daily Bookings</a></b>
                @endif
                
                        </div>
                    </div>
                </div>
            </div>
        <div class="booking-space">
    </div>
</div>
</section>
@extends('layouts.footer')

