<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<title>Hopperjang</title>
				<meta content="width=device-width, initial-scale=1.0" name="viewport">
					<meta content="" name="keywords">
						<meta content="" name="description">
						<!-- Favicons -->
						<link href="jang/img/favicon.png" rel="icon">
						<link href="jang/img/apple-touch-icon.png" rel="apple-touch-icon">
						<!-- Google Fonts -->
						<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
						<!-- Bootstrap CSS File -->
						<link href="jang/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
						<!-- Libraries CSS Files -->
						<link href="jang/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
						<link href="jang/lib/animate/animate.min.css" rel="stylesheet">
						<link href="jang/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
					<link href="jang/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
				<link href="jang/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
			<!-- Main Stylesheet File -->
		<link href="jang/css/style.css" rel="stylesheet">
	</head>

	<body>
		<header id="header">
			<!--<div id="topbar">
				<div class="container">
				<div class="social-links">
				<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
				<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
				<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
			</div>
		</div>-->
	</div>

	<div class="container">
		<div class="logo float-left">
			<!-- Uncomment below if you prefer to use an image logo -->
			<h2 class="text-light"><a href="{{ url('/') }}" class="scrollto"><span>Sparetime Hackaton</span></a></h2>
		<!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
	</div>

	<nav class="main-nav float-right d-none d-lg-block">
		<ul>
			@if (Auth::guest())
				<li class="active"><a href="#intro">Home</a></li>
				<li><a href="#about">About Us</a></li>
			<li><a href="#services">Services</a></li>
		<li><a href="#portfolio">Portfolio</a></li>
	<li><a href="#team">Team</a></li>
	@else
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
			<img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top: -1px; left:10px; border-radius:50%">
				{{ Auth::user()->firstname }} <span class="caret"></span>
					</a>
						<ul class="dropdown-menu" role="menu">
							@if(Auth::user()->user_level == 'New Applicant')
								<li><a href="/hospitals"><i class="ion-ios-world-outline"></i> See Opportunities</a></li>
									@endif
										@if(Auth::user()->user_level == 'New Applicant')
											<li><a href="/donors"><i class="ion-ios-speedometer-outline" aria-hidden="true"></i> Dashboard</a></li>
											@endif
										@if(Auth::user()->user_level == 'Client Admin')
										<li><a href="/clientusers"><i class="fa fa-users" aria-hidden="true"></i> Users Area</a></li>
										@endif
										@if(Auth::user()->user_status == 'Admin')
										<li><a href="{{ url('/items') }}"><i class="fa fa-btn fa-th-list"></i> Blood Inventory</a></li>
										@endif
										@if(Auth::user()->user_status == 'Validated')
										<li><a href="{{ url('/items') }}"><i class="fa fa-btn fa-th-list"></i> Blood Inventory</a></li>
										@endif
										<!--@if(Auth::user()->user_status == 'Validated')
										<li><a href="{{ url('/donors') }}"><i class="fa fa-medkit" aria-hidden="true"></i> Donors</a></li>
										@endif
										<li><a href="{{ url('/donors') }}"><i class="fa fa-medkit" aria-hidden="true"></i> Donors</a></li>
										<li><a href="{{ url('/items') }}"><i class="fa fa-btn fa-th-list"></i> Blood Inventory</a></li>
										<!-- <a href="/profile/{{ Auth::user()->email }}"><i class="fa fa-btn fa-user"></i>Profile</a>-->
										<!-- <li><a href="/sparejobs"><i class="fa fa-btn fa-list"></i> Posts</a></li>-->
										<!-- <li><a href="/sparejobs"><i class="fa fa-btn fa-wrench"></i> My Sparetimers</a></li>
										<li><a href="."><i class="fa fa-btn fa-newspaper-o"></i> Hosts</a></li>
										<li><a href="/monitors"><i class="fa fa-btn fa-gears"></i> Transactions</a></li>-->
										<li><a href="{{ url('/tokenreadyfullprofile') }}"><i class="ion-ios-paper-outline"></i> My Preferences</a></li>
										<li>
										<a href="{{ route('logout') }}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
									<i class="fa fa-btn fa-sign-out"></i> Logout 
								</a>
							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                	{{ csrf_field() }}
					</form>
				</li>
			</ul>
		</li>
							@endif
						</ul>
					</li>
				</ul>
			</nav><!-- .main-nav -->
		</div>
	</header><!-- #header -->

	<main id="main">
		<section id="testimonials">
			<div class="container">
				<header class="section-header">
		<h3>Profile</h3>
	</header>
    
	<div class="row">
		<div class="col-lg-8">
            <div class="testimonial-item">
                <img src="jang/img/testimonial-1.jpg" class="testimonial-img" alt="">
					<br>
						<h3>{{ Auth::user()->firstname . " " . Auth::user()->lastname }}</h3>
							<h2>Necklase Snatcher</h4>
							<p>To be able to share my skills to the world</p>
							</div>
							<div class="panel-body">
							@if(count($errors) > 0)
							<ul>
							@foreach($errors->all() as $error)
							<li class="alert alert-danger">{{ $error }}</li>
						@endforeach
					</ul>
				@endif
			</div>
		</div>
	</div>
	
	<hr></hr>
	<i class="ion-ios-bookmarks-outline" style="color: #003171;"></i><b> Basic Information</b>
	<br />

	@include('partials._messages_updated_Profile')
		<form method="post" action="/edit">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
	
	<div class="row">
		<div class="col-md-3">
			<label for="account_type"><b>Type of Account:</b></label><br>
				<input type="radio" value="Job Seeker" name="account_type" {{ $user->account_type == 'Job Seeker' ? 'checked' : '' }}> Job Seeker
		<input type="radio" value="Employer" name="account_type" {{ $user->account_type == 'Employer' ? 'checked' : '' }}> Employer
	</div>
	
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('prev_job') ? ' has-error' : '' }}">
			<label for="prev_job"><b>Previous or Current Job:</b></label>
				<input id="prev_job" type="text" class="form-control" name="prev_job" value="{{ $user->prev_job }}" placeholder="" required autofocus>
				@if ($errors->has('prev_job'))
					<span class="help-block">
						<strong>{{ $errors->first('prev_job') }}</strong>
				</span>
			@endif
		</div>
	</div>	
	
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('job_applied') ? ' has-error' : '' }}">
			<label for="job_applied"><b>Job you are interested to apply:</b></label>
				<input id="job_applied" type="text" class="form-control" name="job_applied" value="{{ $user->job_applied }}" placeholder="" required autofocus>
				@if ($errors->has('job_applied'))
					<span class="help-block">
						<strong>{{ $errors->first('job_applied') }}</strong>
					</span>
				@endif
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-3">
			<label for="firstname">Firstname:</label><br>
				<input type="text" name="firstname" value="{{ $user->firstname }}" class="form-control">
					<input type="hidden" name="account_type" value="{{ $user->account_type }}" class="form-control">
						<input type="hidden" name="job_applied" value="{{ $user->job_applied }}" class="form-control">
					<input type="hidden" name="user_status" value="{{ $user->user_status }}" class="form-control">
				<input type="hidden" name="user_level" value="{{ $user->user_level }}" class="form-control">
			<input type="hidden" name="prev_job" value="{{ $user->prev_job }}" class="form-control">
		<input type="hidden" name="gender" value="{{ $user->gender }}" class="form-control">
	</div>
	<div class="col-md-3">
		<label for="lastname">Lastname:</label><br>
			<input type="text" name="lastname" value="{{ $user->lastname }}" class="form-control">
	</div>
	<div class="col-md-3">
		<label for="middlename">Middlename:</label><br>
			<input type="text" name="middlename" value="{{ $user->middlename }}" class="form-control">
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="suffix">Suffix:</label><br>
				<input type="text" name="suffix" value="{{ $user->suffix }}" class="form-control">
		</div>
	</div>
	
	<div class="col-md-3">
		<label for="gender"><b>Gender:</b></label><br>
			<input type="radio" value="Male" name="gender" {{ $user->gender == 'Male' ? 'checked' : '' }}> Male
		<input type="radio" value="Female" name="gender" {{ $user->gender == 'Female' ? 'checked' : '' }}> Female
	</div>
	<div class="col-md-4">
		<label for="marital_status"><b>Marital Status:</b></label><br>
			<input type="radio" value="Single" name="marital_status" {{ $user->marital_status == 'Single' ? 'checked' : '' }}> Single
				<input type="radio" value="Married" name="marital_status" {{ $user->marital_status == 'Married' ? 'checked' : '' }}> Married
			<input type="radio" value="Separated" name="marital_status" {{ $user->marital_status == 'Separated' ? 'checked' : '' }}> Separated
		<input type="radio" value="Widow" name="marital_status" {{ $user->marital_status == 'Widow' ? 'checked' : '' }}> Widow
	</div>
	
	<div class="col-md-5">
		<div class="form-group">
			<label for="spouse_name"><b>Name of Spouse</b> (Maiden Name) (If married only)</label><br>
			<input type="text" name="spouse_name" value="{{ $user->spouse_name }}" class="form-control">
		</div>
	</div>
	</div>
	
	<hr></hr>

	<div class="row">
	<div class="col-md-3">
		<div class="form-group">
			<label for="age"><b>Age:</b></label><br>
			<input type="number" name="age" value="{{ $user->age }}" class="form-control">
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="form-group{{ $errors->has('birthmonth') ? ' has-error' : '' }}">
            <label for="birthmonth"><b>Date of Birth:</b></label>                          
				<select name="birthmonth" class="form-control">
				    <option value="Month">Month</option>
						<option value=""></option>
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
	    </div>
    </div>

	<div class="col-md-3">
		<div class="form-group">
			<label for="birthday"><b>Day:</b></label><br>
			<input type="number" name="birthday" value="{{ $user->birthday }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="birthyear"><b>Birthyear:</b></label><br>
				<input type="number" name="birthyear" value="{{ $user->birthyear }}" class="form-control">
			</div>
		</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="height"><b>Height:</b>(Ft. and Inches)</label><br>
			<input type="text" name="height" value="{{ $user->height }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="weight"><b>Weight:</b>(Kilograms)</label><br>
			<input type="text" name="weight" value="{{ $user->weight }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="citizenship"><b>Citizenship:</b></label><br>
			<input type="text" name="citizenship" value="{{ $user->citizenship }}" class="form-control">
		</div>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="Religion"><b>Religion:</b></label><br>
			<input type="text" name="religion" value="{{ $user->religion }}" class="form-control">
		</div>
	</div>
	
	</div>
	
	
	<hr></hr>
	<i class="ion-ios-bookmarks-outline" style="color: #003171;"></i><b> Login Details</b>
	<br />
	<div class="row">
		<div class="col-md-3">
			<label for="email"><b>Email</b>:</label><br>
		<input type="email" name="email" value="{{ $user->email }}" class="form-control" required>
	</div>
	<div class="col-md-3">
		<label for="password"><b>Password</b>:</label><br>
			<input type="password" name="password" class="form-control" required>
	</div>
	<div class="col-md-3">
		<div class="form-group">
			<label for="password_confirmation"><b>Confirm Password</b>:</label><br>
				<input type="password" name="password_confirmation" class="form-control" required>
			</div>
		</div>
	</div>       

	<hr></hr>
	<i class="ion-ios-bookmarks-outline" style="color: #003171;"></i> <b>Contacts</b>
	
	<div class="row">
		<div class="col-md-3">
			<label for="tel_no"><b>Telephone No.</b> (Home)</label><br>
		<input type="text" name="tel_no" value="{{ $user->tel_no }}" class="form-control">
	</div>	
	<div class="col-md-3">
		<label for="mobile_no"><b>Mobile No.</b></label><br>
			<input type="text" name="mobile_no" value="{{ $user->mobile_no }}" class="form-control">
		</div>	
	</div>
	
	<hr></hr>
	<i class="ion-ios-bookmarks-outline" style="color: #003171;"></i><b> Address</b>
	<div class="row">
		<div class="col-md-6">
			<label for="street"><b>Street and Bldg.No.</b></label><br>
		<input type="text" name="street" value="{{ $user->street }}" class="form-control">
	</div>	
	<div class="col-md-3">
		<label for="village"><b>Village (Barangay)</b>:</label><br>
			<input type="text" name="village" value="{{ $user->village }}" class="form-control">
	</div>	
	<div class="col-md-3">
		<div class="form-group">
			<label for="city"><b>City / Municipality</b>:</label><br>
			<input type="text" name="city" value="{{ $user->city }}" class="form-control">
		</div>	
	</div>
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="province"><b>Province</b>:</label><br>
				<select name="province" class="form-control">
					<option value="{{ $user->province }}">{{ $user->province }}</option>
						<option name="ref_province" value="Abra">Abra</option>
							<option name="ref_province" value="Agusan Del Norte">Agusan Del Norte</option>
								<option name="province" value="Agusan Del Sur">Agusan Del Sur</option>
								<option name="province" value="Aklan">Aklan</option>
								<option name="province" value="Albay">Albay</option>
								<option name="province" value="Antique">Antique</option>
								<option name="province" value="Apayao">Apayao</option>
								<option name="province" value="Aurora">Aurora</option>
								<option name="province" value="Basilan">Basilan</option>
								<option name="province" value="Bataan">Bataan</option>
								<option name="province" value="Batanes">Batanes</option>
								<option name="province" value="Batangas">Batangas</option>
								<option name="province" value="Benguet">Benguet</option>
								<option name="province" value="Biliran">Biliran</option>
								<option name="province" value="Bohol">Bohol</option>
								<option name="province" value="Bukidnon">Bukidnon</option>
								<option name="province" value="Bulacan">Bulacan</option>
								<option name="province" value="Cagayan">Cagayan</option>
								<option name="province" value="Camarines Norte">Camarines Norte</option>
								<option name="province" value="Camarines Sur">Camarines Sur</option>
								<option name="province" value="Camiguin">Camiguin</option>
								<option name="province" value="Capiz">Capiz</option>
								<option name="province" value="Catanduanes">Catanduanes</option>
								<option name="province" value="Cavite">Cavite</option>
								<option name="province" value="Cebu">Cebu</option>
								<option name="province" value="Aurora">Aurora</option>
								<option name="province" value="Basilan">Basilan</option>
								<option name="province" value="Compostela Valley">Compostela Valley</option>
								<option name="province" value="Cotabato">Cotabato</option>
								<option name="province" value="Davao Del Norte">Davao Del Norte</option>
								<option name="province" value="Davao Del Sur">Davao Del Sur</option>
								<option name="province" value="Davao Occidental">Davao Occidental</option>
								<option name="province" value="Davao Oriental">Davao Oriental</option>
								<option name="province" value="Dinagat Islands">Dinagat Island</option>
								<option name="province" value="Eastern Samar">Eastern Samar</option>
								<option name="province" value="Guimaras">Guimaras</option>
								<option name="province" value="Ifugao">Ifugao</option>
								<option name="province" value="Ilocos Norte">Ilocos Norte</option>
								<option name="province" value="ILOCOS SUR">ILOCOS SUR</option>
								<option name="province" value="ILOILO">ILOILO</option>
								<option name="province" value="ISABELA">ISABELA</option>
								<option name="province" value="KALINGA">KALINGA</option>
								<option name="province" value="LA UNION">LA UNION</option>
								<option name="province" value="LAGUNA">LAGUNA</option>
								<option name="province" value="LANAO DEL NORTE">LANAO DEL NORTE</option>
								<option name="province" value="LANAO DEL SUR">LANAO DEL SUR</option>
								<option name="province" value="LEYTE">LEYTE</option>
								<option name="province" value="ALBAY">ALBAY</option>
								<option name="province" value="MAGUINDANAO">MAGUINDANAO</option>
								<option name="province" value="MARINDUQUE">MARINDUQUE</option>
								<option name="province" value="MASBATE">MASBATE</option>
								<option name="province" value="MISAMIS OCCIDENTAL">MISAMIS OCCIDENTAL</option>
								<option name="province" value="MISAMIS ORIENTAL">MISAMIS ORIENTAL</option>
								<option name="province" value="MOUNTAIN PROVINCE">MOUNTAIN PROVINCE</option>
								<option name="province" value="NEGROS OCCIDENTAL">NEGROS OCCIDENTAL</option>
								<option name="province" value="NEGROS ORIENTAL">NEGROS ORIENTAL</option>
								<option name="province" value="NORTHERN SAMAR">NORTHERN SAMAR</option>
								<option name="province" value="NUEVA ECIJA">NUEVA ECIJA</option>
								<option name="province" value="NUEVA VIZCAYA">NUEVA VIZCAYA</option>
								<option name="province" value="OCCIDENTAL MINDORO">OCCIDENTAL MINDORO</option>
								<option name="province" value="ORIENTAL MINDORO">ORIENTAL MINDORO</option>
								<option name="province" value="PALAWAN">PALAWAN</option>
								<option name="province" value="PAMPANGA">PAMPANGA</option>
								<option name="province" value="PANGASINAN">PANGASINAN</option>
								<option name="province" value="QUEZON">QUEZON</option>
								<option name="province" value="QUIRINO">QUIRINO</option>
								<option name="province" value="RIZAL">RIZAL</option>
								<option name="province" value="ROMBLON">ROMBLON</option>
								<option name="province" value="SAMAR">SAMAR</option>
								<option name="province" value="SARANGANI">SARANGANI</option>
								<option name="province" value="SIQUIJOR">SIQUIJOR</option>
								<option name="province" value="SORSOGON">SORSOGON</option>
								<option name="province" value="SOUTH COTABATO">SOUTH COTABATO</option>
								<option name="province" value="SOUTHERN LEYTE">SOUTHERN LEYTE</option>
								<option name="province" value="SULTAN KUDARAT">SULTAN KUDARAT</option>
								<option name="province" value="SULO">SULO</option>
								<option name="province" value="SURIGAO DEL NORTE">SURIGAO DEL NORTE</option>
								<option name="province" value="SURIGAO DEL SUR">SURIGAO DEL SUR</option>
								<option name="province" value="TARLAC">TARLAC</option>
								<option name="province" value="TAWI-TAWI">TAWI-TAWI</option>
								<option name="province" value="ZAMBALES">ZAMBALES</option>
							<option name="province" value="Zamboanga Del Norte">Zamboanga Del Norte</option>
						<option name="province" value="Zamboanga Del Sur">Zamboanga Del Sur</option>
					<option name="province" value="Metro Manila">Metro Manila</option>
				<option name="province" value="NCR">NCR</option>
			</select>
		</div>	
	</div>	
	
	<div class="col-md-3">
		<div class="form-group">
			<label for="place_of_birth"><b>Place of Birth:</b></label><br>
				<input type="text" name="place_of_birth" value="{{ $user->place_of_birth }}" class="form-control">
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-12">
			<input type="submit" value="Save" class="btn btn-success pull-right">
				</div>	
					<div>
			</div>
		</section>
	</main>

	<!--==========================
    Footer
	============================-->
	<footer id="footer" class="section-bg">
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="row">
						<div class="col-sm-12">
					<div class="footer-info">
				<b>Disclaimer</b>
			<p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare 
		fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
    </div>
 
    <!--<div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
						</div>-->
						</div>
						</div>
					</div>
				</div>
			</div>	
		</div>
    </div>

	<div class="container">
		<div class="copyright">
			&copy; Copyright <strong>Hopperjang</strong>. All Rights Reserved
				</div>
					<div class="credits">
				A<a href="https://www.hopperjang.com/"> Mark Escario</a> Production
			</div>
		</div>
	</footer>
	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
		<!-- Uncomment below i you want to use a preloader -->
			<!-- <div id="preloader"></div> -->
				<!-- JavaScript Libraries -->
					<script src="jang/lib/jquery/jquery.min.js"></script>
					<script src="jang/lib/jquery/jquery-migrate.min.js"></script>
					<script src="jang/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
					<script src="jang/lib/easing/easing.min.js"></script>
					<script src="jang/lib/mobile-nav/mobile-nav.js"></script>
					<script src="jang/lib/wow/wow.min.js"></script>
					<script src="jang/lib/waypoints/waypoints.min.js"></script>
					<script src="jang/lib/counterup/counterup.min.js"></script>
					<script src="jang/lib/owlcarousel/owl.carousel.min.js"></script>
					<script src="jang/lib/isotope/isotope.pkgd.min.js"></script>
					<script src="jang/lib/lightbox/js/lightbox.min.js"></script>
					<!-- Contact Form JavaScript File -->
				<!-- <script src="jang/contactform/contactform.js"></script> -->
			<!-- Template Main Javascript File -->
		<script src="jang/js/main.js"></script>
	</body>
</html>