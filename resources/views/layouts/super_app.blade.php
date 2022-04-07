<!DOCTYPE html>
	<html lang="{{ app()->getLocale() }}">
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
			<h1><a href="{{ url('/') }}" class="scrollto">Spare<span>Time</span></a></h1>
			<!-- Uncomment below if you prefer to use an image logo -->
		<!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
    </div>
	<nav id="nav-menu-container">
        <ul class="nav-menu">
			<li class="menu-active"><a href="#body">How it Works</a></li>
				<li><a href="#help">Help</a></li>
					<li><a href="{{ url('/register') }}">Make an Account</a></li>
					<li><a href="{{ url('/login') }}">Login</a></li>
				</ul>
			</nav><!-- #nav-menu-container -->
		</div>
    </header>
	
	<main id="main">	
	<br />
	@yield('content')

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