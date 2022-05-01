@include('app_front.layouts.app_header')
<div class="container search-spinner">
<br>
<div id="xped" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ul class="carousel-indicators">
    <li data-target="#xped" data-slide-to="0" class="active"></li>
    <li data-target="#xped" data-slide-to="1"></li>
    <li data-target="#xped" data-slide-to="2"></li>
</ul>
<!-- The slideshow -->
<div class="carousel-inner">
    <div class="carousel-item active" style="height: 25em;">
    <img src="/images/bus_footer_image.jpg" alt="Los Angeles" />
</div>
<div class="carousel-item" style="height: 25em;">
    <img src="/images/travel_banner.jpeg" alt="Chicago" />
</div>
<div class="carousel-item" style="height: 25em;">
    <img src="/images/bus_footer_image.jpg" alt="New York" />
    </div>
</div>
<!-- Left and right controls -->
<a class="carousel-control-prev" href="#xped" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
</a>
<a class="carousel-control-next" href="#xped" data-slide="next">
    <span class="carousel-control-next-icon"></span>
</a>
        </div>
    </header>
<br>
<div class="row">
    <div class="col-md-12">
        <b>When are you travelling? Check our daily provincial trip schedules</b>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p><i class="fa fa-calendar"></i> Easy Booking </p>
    </div>
</div>
<div class="row booking-div">
    <div class="col-md-3">
        <label><b>Date</b></label>
        <input type="date" name="date_of_booking" class="form-control s-travel-date" />
    <span id="s-travel-date-text"></span>
</div>
<div class="col-md-3">
    <label><b>Type</b></label>
        <select class="form-control s-bus-type" name="bus_type">
            <option></option>
            <option value="Ordinary">Ordinary</option>
            <option value="Economy">Economy</option>
            <option value="Semi Deluxe">Semi Deluxe</option>
            <option value="Deluxe">Deluxe</option>
        </select>
    <span id="s-booking-type-text"></span>
</div>
<div class="col-md-3">
    <label><b>Origin</b></label>
        <select class="form-control s-travel-origin" name="origin">
            <option></option>
            <option value="Cubao">Cubao</option>
            <option value="Baguio">Baguio</option>
            <option value="Baler">Baler</option>
        <option value="Cabanatuan">Cabanatuan</option>
    </select>
    <span id="s-travel-origin-text"></span>
</div>
<div class="col-md-3">
    <label><b>Destination</b></label>
        <select class="form-control s-travel-destination" name="destination">
            <option></option>
            <option value="Cubao">Cubao</option>
            <option value="Baguio">Baguio</option>
            <option value="Baler">Baler</option>
            <option value="Cabanatuan">Cabanatuan</option>
        </select>
    <span id="s-travel-destination-text"></span>
    </div>
</div>
<br />
    <div class="row">
        <div class="col-md-3">
            <button id="search-travel-btn" class="btn btn-primary btn-sm" onclick="submitBookingSearch(event)"><i class="fa fa-search"></i> Search</button>                         
        </div>
    </div>
<br>
<hr>
<div class="row">
    <div class="col-md-12">
        <i class="fa fa-newspaper-o"></i> <b>Support</b>
    </div>
    <div class="col-md-12">
        Help Center
        </div>
    <div class="col-md-12">
        Safety Information
    </div>
    <div class="col-md-12">
        Terms
    </div>
    <div class="col-md-12">
        Privacy Policy
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <i class="fa fa-paymaya"></i>  
        </div>
    </div>
</div>
<style>
    /* Make the image fully responsive */
    .carousel-inner img {
    width: 100%;
    height: 100%;
}
</style>
@extends('app_front.layouts.app_footer')
