<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-dark bg-rts-header fixed-top" id="mainNav"> 
@if(Auth::user()->userType->name == 'authorized_user' )
<a class="navbar-brand rts_logo" href="/RXdashboard"></a>
@else
<a class="navbar-brand rts_logo" href="#"></a>
@endif
	@if(Session::has('rxsession') == 1)
		<div class="phone_no_small navbar-nav flex-row ml-md-auto">1-844 ruby-meds</div>
	@else
		<div class="phone_no_small navbar-nav flex-row ml-md-auto">1-833 ruby-rides</div>	
	@endif
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

			 @if(Auth::user()->userType->name == 'admin')
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard"> <a class="nav-link" href="{{route('admin_dashboard.index')}}"> <span class="nav-link-text">Dashboard</span> </a> </li>
			@endif

            @can('passenger_request.view')
				@if(Session::has('rxsession') == 1 && Auth::user()->userType->name == 'authorized_user')
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Passenger Request"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#passengerRequest" data-parent="#exampleAccordion"> <span class="nav-link-text">Client Request</span> </a>
						<ul class="sidenav-second-level collapse" id="passengerRequest">
							@can('passenger_request.create')						
									<li> 
										<a href="{{ route('passenger_request.createrx') }}">Add New Client</a> 
									</li>	
							@endcan
							<li> 
								<a href="{{ route('passenger_request.index') }}">View Client Request</a> 
							</li>
							
						</ul>
					</li>
				@else
					<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Passenger Request"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#passengerRequest" data-parent="#exampleAccordion"> <span class="nav-link-text">Passenger Request</span> </a>
						<ul class="sidenav-second-level collapse" id="passengerRequest">
							@can('passenger_request.create')						
								<li> 
									<a href="{{ route('passenger_request.create') }}"><span class="submit_req_passenger">Submit New Passenger</span></a> 
								</li>						
							@endcan
							<li> 
								<a href="{{ route('passenger_request.index') }}">View Submitted Passenger Requests</a> 
							</li>							
						</ul>
					</li>
				@endif
            @endcan    

            @if((Auth::user()->userType->name == 'admin' || (Auth::user()->userType->name == 'authorized_user')))
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Manage Users"> 
                <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#manageUsers" data-parent="#exampleAccordion"> <span class="nav-link-text">Manage Users</span> </a> 
                <ul class="sidenav-second-level collapse" id="manageUsers">
                    @can('manage_user.create')
                    <li> 
                        <a href="{{route('user.create')}}">Add User</a> 
                    </li>
                    @endCan

                    @can('manage_user.staff_create')
                    <li> 
                        <a href="{{route('user.staff.create')}}">Add RLG User</a>
                    </li>
                    @endCan

                    @can('manage_user.view')
                    <li> 
                        <a href="{{route('user.staff.view', ['approver'])}}">Approvers</a>
                    </li>
                    @endCan

                    @can('manage_user.view')
                    <li> 
                        <a href="{{route('user.staff.view', ['call_center_professional'])}}">Call Center Professionals</a> 
                    </li>
                    @endCan

                    @can('manage_user.view')
                    <li> 
                        <a href="{{route('user.staff.view', ['book_keeper'])}}">Book Keepers</a> 
                    </li>
                    @endCan
                </ul>
            </li>
            @endif
			
				@can('lawfirm_details.view')
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Lawfirm Management"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#lawfirm-management" data-parent="#exampleAccordion"> <span class="nav-link-text">Lawfirm Management</span> </a>
					<ul class="sidenav-second-level collapse" id="lawfirm-management">
						@if(Auth::user()->userType->name != 'authorized_user' )
						<li>
							<a href="{{route('lawfirm.list')}}">Lawfirm List</a>
						</li>
						@endif
						@canany(['manage_user.view','manage_user.lawfirmuser_view'])
						<li>
							<a href="{{route('user.lawfirm.view')}}">Law Firm Users</a>
						</li>
						@endcanany
					</ul>
				</li>
				@endCan

				@can('outstanding_bill.view')
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bills"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#bills" data-parent="#exampleAccordion"> <span class="nav-link-text">Bills</span> </a>
					<ul class="sidenav-second-level collapse" id="bills">
						<li>
							<a href="{{route('bill.outstanding')}}">Outstanding Bills</a>
						</li>

						@can('paid_bill.view')
						<li> 
							<a href="{{route('bill.paid')}}">Paid Bills</a> 
						</li>
						@endCan

						@can('amount_reduction.create')
						<li> 
							<a href="{{route('bill.reduction')}}">Reduction Threshold</a> 
						</li>
						@endCan
                        <li> 
                            <a href="{{route('bill.reduction.request')}}">Reduction Request</a> 
                        </li>
					</ul>
				</li>
				@endCan

				@can('outstanding_bill.view')
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Passenger Management"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#passenger-management" data-parent="#exampleAccordion"> <span class="nav-link-text">Passenger Management</span> </a>
					<ul class="sidenav-second-level collapse" id="passenger-management">                 
						<li>
							<a href="{{route('passenger.list')}}">Passenger List</a> 
						</li>

						@can('paid_bill.view')
						<li> 
							<a href="{{route('address.index')}}">Frequest Addresses</a> 
						</li>
						@endCan
					</ul>
				</li>
				@endCan

				@can('history_logs.view')
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="History Logs"> <a class="nav-link" href="{{route('history_logs.index')}}"> <span class="nav-link-text">History Logs</span> </a> </li>
				@endCan


				@can('email_setting.create')
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Email Settings"> <a class="nav-link" href="{{route('email_settings.index')}}"> <span class="nav-link-text">Email Settings</span> </a> </li>
				@endCan

				@can('outstanding_balance_limit.view')
				<li class="nav-item" data-toggle="tooltip" data-placement="right" title="See Outstanding Balance and Limit"> <a class="nav-link" href="#manageUsers"> <span class="nav-link-text">See Outstanding Balance & Limit</span> </a> </li>       
				@endCan

			
			@if(Auth::user()->userType->name != 'authorized_user')
				<li class="nav-item" data-toggle="tooltip" data-placement="right"> 
						<span class="nav-link"><br /><br /><br /><input type="checkbox" id='service_toggle' checked data-toggle="toggle"></span>
				</li>
			@endif

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle mr-lg-2 header_ico help_ico" href="#"> FAQ </a> </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle mr-lg-2 header_ico" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">  
                    <i class="fa fa-fw fa-bell pos_rel"></i> 
                    <span class='msgCount'>0</span>
                    <!--<span class="d-lg-none">Alerts <span class="badge badge-pill badge-warning">6 New</span> </span>-->
                    <span class="indicator text-warning d-none d-lg-block"> 
                        <!--<i class="fa fa-fw fa-circle"></i>--> 
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">Notifications:</h6>
                    <div id="notificationList"></div>

                    <!--                    <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"> <span class="text-success"> <strong> <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong> </span> <span class="small float-right text-muted">11:21 AM</span>
                                            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"> <span class="text-danger"> <strong> <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong> </span> <span class="small float-right text-muted">11:21 AM</span>
                                            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#"> <span class="text-success"> <strong> <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong> </span> <span class="small float-right text-muted">11:21 AM</span>
                                            <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                                        </a>-->
                    <!--<div class="dropdown-divider"></div>-->
                    <!--<a class="dropdown-item small" href="#">View all alerts</a>--> </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle mr-lg-2 header_ico actor_txt" id="admin_actor" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->email ?? ''}} ({{str_replace('_',' ',Auth::user()->userType->name ?? '')}}) </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="admin_actor"> <a href="{{route('myprofile', Auth::user()->id)}}" class="nav-link actor_txt"> <i class="fa fa-fw fa-user"></i>My Profile</a>
                <a class="nav-link actor_txt" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-sign-out"></i>Logout</a> </div>
            </li>
        </ul>
    </div>
</nav>
<footer class="sticky-footer">
    <div class="container-fluid footer_bg">
        <div class="container">
            <div class="pt-md-5">
                <div class="row">
                    <div class="col-lg-3 col-md">
                        <div class="logo_footer"></div>
                    </div>
                    <div class="col-lg-4 col-md foot_copyright"> <span>RUBY LEGAL GROUP</span><br/>
                        ©2019 All Rights Reserved </div>
                    <div class="col-lg-2 col-md foot_copyright">
                        <span class="f_address"></span><br>
                        <span class="f_address_inner">
                        <span class="f_email"><a href="#">About Us</a><br>
                        <span class="f_email"><a href="#">Careers</a><br>
                        <span class="f_email"><a href="#">Terms of Service</a>
                        </span>
                    </div>
                    <div class="col-lg-3 col-md foot_copyright">
                        <span class="f_address">Address:</span><br>
                        <span class="f_address_inner">415 Westheimer Road Suite 103 Houston, TX 77006<br><br>
                        <span class="f_email">Email:</span> info@rubylegalgroup.com<br>
                        <span class="f_email">Ruby Rides:</span> <a class="phone_no_href_bottom" href="tel:18337829743">1-833-782-9743</a><br>
                        <span class="f_email">Ruby Meds:</span> <a class="phone_no_href_bottom" href="tel:18447829633">1-844-782-9633</a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
