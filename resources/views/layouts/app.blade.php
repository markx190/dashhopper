<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- CSRF Token -->
					<meta name="csrf-token" content="{{ csrf_token() }}">
					<title>@yield('title')</title>
				<!-- Styles -->
			<link href="{{ asset('css/app.css') }}" rel="stylesheet">
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{ asset('fontawesome/css/font-awesome.min.css') }}">
	<script>
		window.laravel = {!! json_encode([
			'csrfToken' => csrf_token(), 
		]) !!};
	</script>
	<style>
		.unread{
			background-color: #e5e5e5;
		}
		</style>	
		@stack('after-styles')
		</head>
	<body>
	<div id="app">
		<nav class="navbar navbar-default navbar-static-top">
			<div class="container">
				<div class="navbar-header">
					<!-- Collapsed Hamburger -->
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
                	<!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/vbb') }}">
			@yield('label')
        </a>
	</div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav">
				&nbsp;
				</ul>
					<!-- Right Side Of Navbar -->
					<ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
						@if (Auth::guest())
							<li><a href="{{ route('login') }}">Login</a></li>
							<li><a href="{{ route('register') }}">Register</a></li>
						@else
						
				<!--<li class="dropdown">
					<a class="nav-link dropdown-toggle mr-lg-2 notification" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						<span class="d-lg-none">Notifications
						<span class="count"> 	
						@if(count(auth()->user()->unreadNotifications) == '0')
							<span class="badge badge-pill badge-primary" style="background-color: #A6A6A6;">
						@else
							<span class="badge badge-pill badge-primary" style="background-color: #C3272B;">
						@endif
						{{ count(auth()->user()->unreadNotifications) }} 
						</span>
						</span><span class="caret"></span>
					</a>
					<ul class="dropdown-menu" role="menu" id="showNotification">				
						@foreach(auth()->user()->notifications as $note)
					<li>
						@if($note->type == 'App\Notifications\ReplyPost')	
							<a href="confirmpost/{{ $note->notifiable_id }}" class="{{ $note->read_at == null ? 'unread' : ' ' }}">				
							{!! $note->data['data'] !!}
							<?php $note->markasRead() ?>
							</a>
						@elseif($note->type == 'App\Notifications\SelectPost')
							<a href="seepost/{{ $note->notifiable_id }}" class="{{ $note->read_at == null ? 'unread' : ' ' }}">				
						{!! $note->data['data'] !!}
						<?php $note->markasRead() ?>
							</a>	
						@else
						<a href="replypost/{{ $note->notifiable_id }}" class="{{ $note->read_at == null ? 'unread' : ' ' }}">				
						{!! $note->data['data'] !!}
						<?php $note->markasRead() ?>
						</a>	
						@endif					
						</li>
						@endforeach
					</ul>
				</span>
			</span>
		</a>
	</li>-->
	
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:50px;">
			<img src="/uploads/avatars/{{ Auth::user()->avatar }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
				{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} <span class="caret"></span>
				</a>
				<ul class="dropdown-menu" role="menu">
					@if(Auth::user()->user_level == 'Admin')
						<li><a href="/hospitals"><i class="fa fa-btn fa-h-square"></i> Client Area</a></li>
					@endif
					@if(Auth::user()->user_level == '')
						<li><a href="/donors"><i class="fa fa-medkit" aria-hidden="true"></i> Donors</a></li>
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
					
					<li><a href="{{ url('/full_profile') }}"><i class="fa fa-btn fa-user-circle"></i> My Profile</a></li>
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
		</nav>
		@yield('content')
		</div>
		<!-- Scripts -->
		<script src="{{ asset('js/app.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		{{-- <script src="/StreamLab/StreamLab.js"></script> --}}
		<script>
		
		// var message, ShowDiv = $('#showNotification'), count = $('#count'), c;
		// var slh = new StreamLabHtml();
		// var sls = new StreamLabSocket ({
			
		// 	appId:"{{ config('stream_lab.app_id') }}",
		// 	channelName:"Spare",
		// 	event:"*"
			
		// });		
		
		// sls.socket.onmessage = function(res){
		
		// slh.setData(res);
		
		// 	if(slh.getSource() === 'messages'){
				
		// 		c = parseInt(count.html());
		// 		count.html(c+1);
				
		// 		message = slh.getMessage();
		// 		ShowDiv.prepend('<li><a href="" class="unread">'+message+'</a></li>')
		// 	}
		// }
		
		$('.notification').on('click', function(){
			
			setTimeout( function(){
			count.html(0);

						$('.unread').each(function() {
					
							$(this).removeClass('unread');
				
						});			
					}, 5000);
			
				});
			</script>
		@stack('after-scripts')
	</body>
</html>