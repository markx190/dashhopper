<main class="main-d" onLoad="mainD">
    <div class="container-fluid">        
        <ol class="breadcrumb mb-4 dash-active">
            <li class="breadcrumb-item active">Hi, <b style="margin-left: 3px;">{{ Auth::user()->user_firstname }} {{ Auth::user()->user_lastname }} </b>. Welcome to your Dashboard. Today is &nbsp;<b>{{ $dateTime }}</b></li>
                </ol>
                @if(Auth::user()->user_account_type == 'Administrator')
                    <div class="row cards">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><i class="fa fa-users"></i> System Users</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" style="cursor: pointer;" onclick="viewListOfUsers(event)">View List</a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth::user()->user_account_type == 'Applicant')
                    <div class="row cards">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body"><i class="fa fa-folder-open"></i> Manage your Documents</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" style="cursor: pointer;" onclick="manageNewsContents(event)">View List</a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth::user()->user_account_type == 'Administrator')
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-success text-white mb-4">
                            <div class="card-body"><i class="fa fa-bus"></i> Bus Units</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" style="cursor: pointer;" onclick="viewListOfBusUnits(event)">View List</a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth::user()->user_account_type == 'Administrator')
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-warning text-white mb-4">
                            <div class="card-body"><i class="fa fa-id-card-o"></i> Employees</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" style="cursor: pointer;" onclick="viewListOfEmployees(event)">View List</a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if(Auth::user()->user_account_type == 'Administrator')
                    <div class="col-xl-3 col-md-6">
                        <div class="card bg-secondary text-white mb-4">
                            <div class="card-body"><i class="fa fa-calendar"></i> Trip Schedules</div>
                                <div class="card-footer d-flex align-items-center justify-content-between">
                                    <a class="small text-white stretched-link" style="cursor: pointer;" onclick="viewListOfSchedules(event)">View List</a>
                                <div class="small text-white"><i class="fa fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            
    </div>
</main> 
@include('velhopper.back_scripts.navbars_table')
@include('app_back_end.back_scripts.manage_users')	
@include('app_back_end.back_scripts.add_documents')





