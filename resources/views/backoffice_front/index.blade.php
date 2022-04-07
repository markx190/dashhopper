@include('backoffice_front.layouts.app_header')
<div class="container">
    <div class="header-space"></div>
        <header class="jumbotron my-4 header-image">
            <h1 class="display-h1">Your transit booking buddy</h1>
                <div class="row">
                    <div class="col-md-6">
                    <div class="form-group">
                </div>
            </div>
        </div>
    </header>
<div class="row">
    <div class="col-md-12">
        <b>When are you travelling? Check our daily provincial trip schedules</b>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <p><i class="fa fa-calendar"></i> Easy Booking</p>
    </div>
</div>
<div class="row booking-div">
    <div class="col-md-3">
        <label><b>Date</b></label>
    <input type="date" name="date_of_booking" class="form-control" />
</div>
<div class="col-md-3">
    <label><b>Type</b></label>
        <select class="form-control booking-type" name="type_of_booking">
            <option></option>
            <option value="Ordinary">Ordinary</option>
            <option value="Economy">Economy</option>
            <option value="Semi Deluxe">Semi Deluxe</option>
        <option value="Deluxe">Deluxe</option>
    </select>
</div>
<div class="col-md-3">
    <label><b>Origin</b></label>
        <select class="form-control booking-type" name="type_of_booking">
            <option></option>
            <option value="Cubao">Cubao</option>
            <option value="Baguio">Baguio</option>
            <option value="Baler">Baler</option>
        <option value="Cabanatuan">Cabanatuan</option>
    </select>
</div>
<div class="col-md-3">
    <label><b>Destination</b></label>
        <select class="form-control booking-type" name="type_of_booking">
            <option></option>
            <option value="Cubao">Cubao</option>
            <option value="Baguio">Baguio</option>
            <option value="Baler">Baler</option>
            <option value="Cabanatuan">Cabanatuan</option>
        </select>
    </div>
</div>
<br />
    <div class="row">
        <div class="col-md-3">
            <button class="btn btn-success btn-sm" onclick="submitBookingSearch(event)"><i class="fa fa-paper-plane-o"></i> Submit</button>                         
        </div>
    </div>
</div>
<div style="height: 60px;">
</div>
@extends('backoffice_front.layouts.app_footer')

