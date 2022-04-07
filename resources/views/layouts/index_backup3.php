<!DOCTYPE html>
    <html lang="en">
	      <head>
		     <meta charset="utf-8">
			    <title>Buzytown</title>
				    <meta content="width=device-width, initial-scale=1.0" name="viewport">
					    <meta content="" name="keywords">
						    <meta content="" name="description">
						        <!-- Favicons -->
						        <link href="jang/img/favicon.png" rel="icon">
						        <link href="jang/img/apple-touch-icon.png" rel="apple-touch-icon">
						        <!-- Google Fonts -->
						        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
						        <!-- Bootstrap CSS File -->
						        <link href="../jang/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
						        <!-- Libraries CSS Files -->
						        <link href="../jang/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
						        <link href="jang/lib/animate/animate.min.css" rel="stylesheet">
				                <link href="jang/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
			                    <link href="jang/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
			                <link href="jang/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
		                <!-- Main Stylesheet File -->
					<link href="jang/css/style.css" rel="stylesheet">
	            <!-- <script src="js/jquery-validation/js/jquery.validate.js"></script>
	        <script src="js/jquery-validation/js/jquery.validate.min.js"></script>
	    <script src="js/jquery-validation/js/jquery.maskedinput.js"></script>
	<script src="js/jquery-validation/js/mktSignup.js"></script> -->
<style>
	.loading {
		background: url('images/spinner.gif') no-repeat center center;
		height: 148px;
		display: none;
	}
	.contentLoading {
		background: url('images/spinner.gif') no-repeat center center;
		height: 148px;
	}
	.registerLoading {
		background: url('../images/spinner.gif') no-repeat center center;
		height: 148px;
	}
	.divMargin {
		margin-top: 120px;
	}
	.regMargin {
		margin-top: 110px;
	}
	#firstLabel {
		margin-top: 75px;
	}
	.affilMargin {
		margin-top: -68px;
	}
	.footerMargin {
	    margin-top: -75px;	
	}
	#footerPublic {
        margin-top: -40px;		
	}
</style>
<script type="text/javascript">
    // $(function(){
    //     // bind change event to select
    //     $('#dynamic_select').on('change', function (){
    //         var url = $(this).val(); // get selected value
    //         if (url) { // require a URL
    //             window.location = url; // redirect
    //         }
    //         return false;
    //     });
	// });

function startPage(){
	$('#regLoading').removeClass('registerLoading');
	$('#content').removeClass("divMargin");
	$('#register').removeClass('regMargin');
	$('#affil').addClass("affilMargin");
	$('.contentLoading').show();
	setTimeout(getMainContent, 3000);
}

function clickServices(event){
	const display = $("#super").text();
	$('#categories').hide();
	$('#affil').hide();
   	$('.loading').show()
	$('#content').addClass("divMargin");
	setTimeout(getPage, 3000);
}

function getPage(){
    $.ajax({
	url: "/content",	
	type: "get",		
	// data: data,		
	cache: false,
	success: function (html){
		$('#content').removeClass("divMargin");		
		$('#content').html(html);
		$('.loading').hide();	
		}
    });
}

function getMainContent(){
    $.ajax({
	url: "/mainContent",	
	type: "get",		
	cache: false,
	success: function (html){
		$('#mainContent').html(html);
		$('.contentLoading').hide();	
		}
    });
}

function clickRegister(event){
	// $('#affil').hide();
	$('#categories').hide();
	$('#mainContent').hide();
	$('#register').addClass('regMargin');	
	$('#regLoading').addClass('registerLoading');
	setTimeout(registration, 3000);
}

function registration(){
    $.ajax({
	url: "/registration",
	type: "get",
	cache: false,
	success: function (html){
        $('#register').html(html);
		$('.registerLoading').hide();
		$('#register').removeClass('regMargin');
		}
	});	
}

function clickLogin(event){
	alert('Login');
	$('#affil').hide();
	$('#categories').hide();
	$('#mainContent').hide();
	login();
}

function login(){
	$.ajax({
    url: "/signin",
	type: "get",
	cache: false,
	success: function(html){
	    $('#login').html(html);	
 	    }
	});
}

$('#li-register').css('color', '#1bb1dc');
$('#li-login').css('color', '#1bb1dc');

        </script>
    </head>
<body onLoad="startPage()">
<header id="header">
@if (Auth::guest())
	<div id="topbar">
		<div class="container">
			<div class="social-links">
				<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
				<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
				<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
			<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
		</div>
	</div>
</div>
@endif
<div class="container">
	<div class="logo float-left">
	    <!-- Uncomment below if you prefer to use an image logo -->
          	<h2><a href="{{ url('.') }}" class="scrollto"><span>Buzytown</span></a></h2>
		<!--<h2 class="text-light"><a href="#intro" class="scrollto"><span>D</span></a></h2>-->
	<!-- <a href="#header" class="scrollto"><img src="jang/img/Dira_Logo.png" alt="" class="img-fluid"></a> -->
</div>
<nav class="main-nav float-right d-none d-lg-block">
	<ul>
	@if (Auth::guest())
		<!-- <li class="active"><a href="#intro">Home</a></li> -->
		    <li><a href="#about">Help</a></li>
				<!-- <li><a id="super" style="cursor: pointer;" onClick="clickServices(event)">Our Site</a></li> -->
            <li><a style="cursor: pointer;" onclick="clickRegister(event)">Register</a></li>
		<li><a style="cursor: pointer;" onclick="clickLogin(event)">Login</a></li>
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
											<a href="/profile/{{ Auth::user()->email }}"><i class="fa fa-btn fa-user"></i>Profile</a>-->
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
<div class="runLabel" id="categories">
    <section id="team" class="section-bg">
	    <div class="container">
		    <div id="firstLabel" class="section-header">   
	    <h2 style="text-align: center; font-size: 22px;">We innovate trust</h2>
    </div>
<h2 style="text-align: center; font-size: 16px;">Having trouble with hassles and decision making? Just take it easy, we're here for you!</h2>
<div id="mainContent">
	<p class="contentLoading"><p>
</div>
    </div>
</div>
<div id="register" class="regMargin">
	<p id="regLoading" class="registerLoading"></p>
</div>
<div id="login">
</div>
<div id="content" class="divMargin">
	<p class="loading"></p>
</div>
<div id="toProfile">
</div>
    </div>
</div>
<div class="affilMargin" id="affil">
    <section id="clients" class="wow fadeInUp">
	    <div class="container">
		<header class="section-header">
	<h2 style="text-align: center; font-size: 22px;">We're working with</h2>
</header>
<div class="owl-carousel clients-carousel">
	<img src="jang/img/clients/client-1.png" width="60px" alt="">
	    <img src="jang/img/clients/client-2.png" width="60px" alt="">
		    <img src="jang/img/clients/client-3.png" width="60px" alt="">
	    	<img src="jang/img/clients/client-4.png" width="60px" alt="">
			</div>
		</div>
	</section>
</div>
<!--==========================
Footer
============================-->
@extends('layouts.footer')

