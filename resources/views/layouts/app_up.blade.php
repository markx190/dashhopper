<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
			<title>Buzytour</title>
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
                        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
                    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />        -->
		        <!-- Main Stylesheet File -->
	        <link href="jang/css/style.css" rel="stylesheet">
	    <link href="jang/css/preferences.css" rel="stylesheet">
	<link href="jang/css/content-preferences.css" rel="stylesheet">
</head>
<body>
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
		<h2 class="text-light"><a href="{{ url('.') }}" class="scrollto"><span>buzytour</span></a></h2>
    <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
</div>
<nav class="main-nav float-right d-none d-lg-block">
    <ul>
	@if (Auth::guest())
	<!-- <li class="active"><a href="#intro">Home</a></li> -->
		<li><a href="{{ url('/guidelines') }}" id="create_record">Help</a></li>
		    <li><a id="reRegister" href="{{ url('/register') }}">Register</a></li>
	    <li><a href="#login">Sign in</a></li>
    @else
    <li class="dropdown notif-li">
		@if(Auth::user()->user_level == 'Bt Personnel')
	    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
	        <button type="button" class="btn btn-primary notif">
            <i class="fa fa-car"></i> <span id="bt-badge" class="badge notif-count"></span>
			</button>
			<span class="caret"></span>
        </a>		
		<ul class="dropdown-menu" role="menu">
			<li class="list-menu"></li>
			</li>
		</ul>
	
		@endif

		@if(Auth::user()->user_level == 'Customer')
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
	        <button type="button" class="btn btn-primary notif">
            <i class="fa fa-car"></i> <span id="cust-badge" class="badge cust-notif-count"></span>
			</button>
			<span class="caret"></span>
        </a>		
		<ul class="dropdown-menu" role="menu">
			<li class="cust-list-menu"></li>
			</li>
		</ul>

		@endif

	</li>
	
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
		<img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top: -1px; left:10px; border-radius:50%">
			{{ Auth::user()->firstname }}<span class="caret"></span>
				</a>
					<ul class="dropdown-menu" role="menu">
					@if (Auth::user()->user_level == 'Bt Personnel')
					<li><a href="/dashboard"><i class="ion-ios-speedometer-outline dash" aria-hidden="true"></i> Dashboard</a></li>
						<li><a href="/preferences"><i class="ion-ios-paper-outline dash" aria-hidden="true"></i> Preferences</a></li>
					@endif

					@if (Auth::user()->user_level == 'Customer')
						<li><a href="/dashboard"><i class="ion-ios-speedometer-outline dash" aria-hidden="true"></i> Dashboard</a></li>
					@endif 

					@if (Auth::user()->user_level == 'Admin')
					<li><a href="/admin_dashboard"><i class="ion-ios-speedometer-outline dash" aria-hidden="true"></i> Admin Dashboard</a></li>
					@endif
						<li>
							<a href="{{ route('logout') }}"
	                        onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fa fa-btn fa-sign-out dash"></i> Logout 
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
		</nav>
	</div>	
</header>
@include('layouts.modals.customer_book_modal')
@include('layouts.modals.cust_customer_book_modal')


