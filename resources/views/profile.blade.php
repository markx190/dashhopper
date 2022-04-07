@include('layouts.app_up')
<section id="testimonials">
	<div class="container">
	    <header class="section-header">
            <h2 style="text-align: center; font-size: 22px;">Change your profile picture<br>
        <br>
    <img src="/uploads/avatars/{{ $user->avatar }}" style="width:145px; height:132px; image-align:center; border-radius:50%"></h2>
</header>
<hr>
<i class="ion-ios-upload-outline" style="color: #003171;"></i><b> Upload Photo</b>
<br />

@include('partials._messages_updated_Profile')
<form enctype="multipart/form-data" action="/upload-avatar" method="post">		
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="row">
	<div class="col-md-6">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<input type="file" name="avatar" class="form-control">
		</div>
	</div>
<div class="row">
	<div class="col-md-12">
		<input type="submit" value="Save" class="btn btn-success pull-right">
			</div>	
		<div>
	</div>
</section>
@extends('layouts.footer')
