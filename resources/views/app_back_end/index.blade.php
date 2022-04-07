@include('app_back_end.admin_dashboard.header')
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- <div class="sb-sidenav-menu-heading">Dashboard</div> -->
                        <a class="nav-link settings side-links" onclick="returnDashboard(event)">
                            <div class="sb-nav-link-icon"><i class="fa fa-home" style="font-size: 24px;"></i></div>
                                Home
                        </a>
                        <a id="profile" class="nav-link collapsed side-links" data-toggle="collapse" data-target="#collapse-Profile" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon"><i class="fa fa-user-circle" style="font-size: 20px;"></i></div>
                            @if( Auth::user()->user_account_type == 'Admin')
                                Admin Profile
                            @else
                                Preferences
                            @endif
                            <div class="sb-sidenav-collapse-arrow"><i class="fa fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapse-Profile" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link side-links edit-profile" onclick="viewProfile(event)"> <i class="fa fa-btn fa-id-card-o"></i> &nbsp;&nbsp; View Profile</a>
                                <a class="nav-link side-links edit-profile" onclick="updateProfile(event)"> <i class="fa fa-pencil-square"></i> &nbsp;&nbsp; Update Profile</a>
                                <!-- <a class="nav-link side-links edit-profile" onclick="updateUsernameAndPassword(event)"> <i class="fa fa-key"></i> &nbsp;&nbsp; Username and Password</a> -->
                            </nav>
                        </div>
                                </div>
                            </div>
                        <div class="sb-sidenav-footer">
                    <div class="small">Logged in as: <i class="fa fa-key"></i> </div>
                <i class="fa fa-user-circle"></i> {{ Auth::user()->user_account_type }}
            </div>
        </nav>
    </div>
<div id="layoutSidenav_content">
@include('app_back_end.admin_dashboard.main_dashboard')
@include('app_back_end.admin_dashboard.back_footer')











