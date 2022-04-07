<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                        <meta name="description" content="" />
                        <meta name="author" content="" />
                    <title>Dashhopper</title>
                <link href="/app_back_styles/dist/css/styles.css" rel="stylesheet" />
            <link href="/app_back_styles/dist/css/app_system.css" rel="stylesheet" />
        <link href="/app_back_styles/dist/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark vel_nav">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">Dashhopper Backoffice</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fa fa-bars"></i></button>
                <!-- Navbar Search-->
                    <div class="input-group">
                    <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                <div class="input-group-append">
            <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
        </div> -->
    </div>
<!-- Navbar-->
<ul class="navbar-nav ml-auto ml-md-0">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <!-- <i class="fa fa-id-card-o"></i> <a class="dropdown-item" href="#">Settings</a> -->
                    <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
                        <a class="dropdown-item" style="cursor: pointer;" onclick="viewProfile(event)">
							<i class="fa fa-btn fa-id-card-o"></i> Profile 
						</a>
                        <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
	                        onclick="event.preventDefault();
							document.getElementById('logout-form').submit();">
							<i class="fa fa-btn fa-sign-out dash"></i> Logout 
						    </a>
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                {{ csrf_field() }}
				</form>
            </div>
        </li>
    </ul>
</nav>



