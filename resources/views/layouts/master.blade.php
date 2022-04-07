<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
				<title>@yield('title')</title>
					<meta content="width=device-width, initial-scale=1.0" name="viewport">
					<meta content="" name="keywords">
					<meta content="" name="description">
					<!-- Favicons -->
					<link href="tour/img/favicon.png" rel="icon">
					<link href="tour/img/apple-touch-icon.png" rel="apple-touch-icon">			
					<!-- Google Fonts -->
					<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">	
					<!-- Bootstrap CSS File -->
					<link href="tour/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
					<!-- Libraries CSS Files -->
					<link href="tour/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
					<link href="tour/lib/animate/animate.min.css" rel="stylesheet">
					<link href="tour/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
					<link href="tour/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
				<link href="tour/lib/magnific-popup/magnific-popup.css" rel="stylesheet">
			<link href="tour/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<!-- Main Stylesheet File -->
	<link href="tour/css/style.css" rel="stylesheet">
	
	</head>
	<body id="body">
		<div id="preloader"></div>
			<!--==========================
				Top Bar
				============================-->
					<section id="topbar" class="d-none d-lg-block">
						<div class="container clearfix">
							<div class="contact-info float-left">
							<!--<i class="fa fa-envelope-o"></i> <a href="mailto:contact@example.com">contact@example.com</a>-->
							<!--<i class="fa fa-phone"></i> +1 5589 55488 55-->
							</div>
							<div class="social-links float-right">
							<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
							<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
						<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
					<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
				<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
			</div>
		</div>
	</section>
	<!--==========================
    Header
	============================-->
	<header id="header">
		<div class="container">
		
			<div id="logo" class="pull-left">
			<h1><a href="#body" class="scrollto">Spare<span>Time</span></a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
		<!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
    </div>
	
	<nav id="nav-menu-container">
    <ul class="nav-menu">
		@if (Auth::guest())
			<li class="menu-active"><a href="#body">Home</a></li>
				<li><a href="#help">How it Works</a></li>
					<li><a href="{{ url('/register') }}">Make an Account</a></li>
						<li><a href="{{ url('/login') }}">Login</a></li>
		@else
			<li>
				<a id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fa fa-fw fa-bell"></i>
						<span class="d-lg-none">Notifications
							<span class="badge badge-pill badge-primary">2</span>
								</span>
							<!--<span class="indicator text-danger d-none d-lg-block">
						<i class="fa fa-fw fa-circle"></i>-->
					</span>
				</a>
				<div class="dropdown-menu" aria-labelledby="messagesDropdown">
					<h6 class="dropdown-header">New Messages:</h6>
						<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="#">
								<strong>David Miller</strong>
								<span class="small float-right text-muted">11:21 AM</span>
							<div class="dropdown-message small">Hey there!</div>
						</a>
					</div>
				</li>		
			<li>
				<a href="#" class="" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
					<img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
						{{ Auth::user()->name }} <span class="caret"></span>
							</a>
								<ul class="dropdown-menu" role="menu">
							<li><a href="/dashboard"><i class="fa fa-btn fa-dashboard"></i> Dashboard</a></li>
						<li>
					<a href="{{ url('/full_profile') }}"><i class="fa fa-btn fa-user-o"></i> Profile</a>
				</li>
				<!-- <a href="/profile/{{ Auth::user()->email }}"><i class="fa fa-btn fa-user"></i>Profile</a> -->
				<hr>
					<li><a href="/sparejobs/create"><i class="fa fa-btn fa-flag-o"></i> Create Post</a></li>
						<!--<li><a href="/sparejobs"><i class="fa fa-btn fa-list"></i> Posts</a></li>
							<li><a href="/sparejobs"><i class="fa fa-btn fa-wrench"></i> My Sparetimers</a></li>
									<li><a href="/servejobs"><i class="fa fa-btn fa-gears"></i> Transactions</a></li>-->
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
					</div>
				</div>
			</nav><!-- #nav-menu-container -->
		</div>
    </header>
	<section id="intro" class="wow fadeIn">
		<div class="intro-content">
			<h2><span></span><br></h2>
				<div>
			<a href="{{ url('/register') }}" class="btn-get-started scrollto" align="left">Get Started Now</a>
		</div>
	</div>
    <div id="intro-carousel" class="owl-carousel" >
		<div class="item" style="background-image: url('tour/img/intro-carousel/1.jpg');"></div>
			<div class="item" style="background-image: url('tour/img/intro-carousel/2.jpg');"></div>
				<div class="item" style="background-image: url('tour/img/intro-carousel/3.jpg');"></div>
				<div class="item" style="background-image: url('tour/img/intro-carousel/4.jpg');"></div>
			<div class="item" style="background-image: url('tour/img/intro-carousel/5.jpg');"></div>
		</div>
	</section>
	<main id="main">
  
	<section id="contact" class="wow fadeInUp">
    <div class="container">
        <div class="section-header">
			<h3>What is SpareTime</h3>
			<p>A SpareTimer is an individual who has extra time on their hands and would like to use that time more efficiently by helping 
		those around you and receiving payment in return for that help.</p>
	<br>
	@yield('search_task')
	</section>
	
	<!--
    <section id="team" class="wow fadeInUp">
		<div class="container">
			<div class="section-header">
		<h3>Find Someone</h3>
    </div>
    <div class="row">
		<div class="col-lg-3 col-md-6">
            <div class="member">
				<div class="pic"><img src="tour/img/team-1.jpg" alt=""></div>
					<div class="details">
					<h4>Walter White</h4>
						<span>Chief Executive Officer</span>
						<div class="social">
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-google-plus"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
				</div>
			</div>
        </div>
	</div>
    <div class="col-lg-3 col-md-6">
        <div class="member">
            <div class="pic"><img src="tour/img/team-2.jpg" alt=""></div>
              <div class="details">
                <h4>Sarah Jhinson</h4>
                <span>Product Manager</span>
                <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
				</div>
			</div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="member">
			<div class="pic"><img src="tour/img/team-3.jpg" alt=""></div>
				<div class="details">
					<h4>William Anderson</h4>
					<span>CTO</span>
					<div class="social">
					<a href=""><i class="fa fa-twitter"></i></a>
					<a href=""><i class="fa fa-facebook"></i></a>
					<a href=""><i class="fa fa-google-plus"></i></a>
					<a href=""><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="member">
            <div class="pic"><img src="tour/img/team-4.jpg" alt=""></div>
				<div class="details">
					<h4>Amanda Jepson</h4>
						<span>Accountant</span>
						<div class="social">
						<a href=""><i class="fa fa-twitter"></i></a>
						<a href=""><i class="fa fa-facebook"></i></a>
						<a href=""><i class="fa fa-google-plus"></i></a>
						<a href=""><i class="fa fa-linkedin"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    </section>
	-->
	<section id="services">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="box wow fadeInLeft">
					<div class="icon"><i class="fa fa-gears"></i></div>
				<h4 class="title"><a href="">Post your Task</a></h4>
			<p class="description">Create your account and make a post</p>
		</div>
    </div>
	<div class="col-lg-6">
		<div class="box wow fadeInRight">
			<div class="icon"><i class="fa fa-flag"></i></div>
				<h4 class="title"><a href="">Review Offers</a></h4>
            <p class="description">View offer from Sparetimers</p>
        </div>
    </div>
	<div class="col-lg-6">
        <div class="box wow fadeInLeft" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-copy"></i></div>
				<h4 class="title"><a href="">Get it Done</a></h4>
            <p class="description">Choose the right person for your task</p>
        </div>
    </div>
	<div class="col-lg-6">
        <div class="box wow fadeInRight" data-wow-delay="0.2s">
            <div class="icon"><i class="fa fa-newspaper-o"></i></div>
				<h4 class="title"><a href="">Secure Payments</a></h4>
				<p class="description">We hold task payments secure</p>
				</div>
			</div>
		</div>
	</div>
    </section>

	<section id="clients" class="wow fadeInUp">
		<div class="container">
			<div class="section-header">
				<h3>Our Partners</h3>
			<p>Got the flat-pack but no time to assemble? Find someone on Sparetimer to take the load off and piece it together quick-smart!
		</p>
    </div>
    <div class="owl-carousel clients-carousel">
		<img src="tour/img/clients/client-1.png" alt="">
			<img src="tour/img/clients/client-2.png" alt="">
			<img src="tour/img/clients/client-3.png" alt="">
			<img src="tour/img/clients/client-4.png" alt="">
			<img src="tour/img/clients/client-5.png" alt="">
			<img src="tour/img/clients/client-6.png" alt="">
			<img src="tour/img/clients/client-7.png" alt="">
			<img src="tour/img/clients/client-8.png" alt="">
			</div>
		</div>
    </section>
	@yield('footer')
	<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
	<!-- JavaScript Libraries -->
		<script src="tour/lib/jquery/jquery.min.js"></script>
			<script src="tour/lib/jquery/jquery-migrate.min.js"></script>
				<script src="tour/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
					<script src="tour/lib/easing/easing.min.js"></script>
						<script src="tour/lib/superfish/hoverIntent.js"></script>
							<script src="tour/lib/superfish/superfish.min.js"></script>
								<script src="tour/lib/wow/wow.min.js"></script>
									<script src="tour/lib/owlcarousel/owl.carousel.min.js"></script>
									<script src="tour/lib/magnific-popup/magnific-popup.min.js"></script>
								<script src="tour/lib/sticky/sticky.js"></script>
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
						<!-- Contact Form JavaScript File -->
					<!-- <script src="tour/contactform/contactform.js"></script> -->
				<!-- Template Main Javascript File -->
			<script src="tour/js/main.js"></script>
		</body>
	</html>