<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-dark bg-rts-header fixed-top" id="mainNav"> <a class="navbar-brand rts_logo" href="{{ url('/admin') }}"></a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="User Management"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#userManagement" data-parent="#exampleAccordion"> <span class="nav-link-text">User Management</span> </a>
                <ul class="sidenav-second-level collapse" id="userManagement">
                    <li> <a href="{{ url('') }}">Law Firm Users</a> 
                        <!--<a href="{{ url('/admin/navbar') }}">Law Firm Users</a>--> 
                    </li>
                    <li> <a href="{{ url('') }}">Law Firm Admin</a> </li>
                    <li> <a href="{{ url('') }}">Case Managers</a> </li>
                    <li> <a href="{{ url('') }}">Bookkeepers</a> </li>
                    <li> <a href="{{ url('') }}">Call Center Professionals</a> </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Law Firm Management"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#lawfirmManagement" data-parent="#exampleAccordion"> <span class="nav-link-text">Law Firm Management</span> </a>
                <ul class="sidenav-second-level collapse" id="lawfirmManagement">
                    <li> <a href="{{ url('') }}">Law Firms</a> </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Passenger Request"> <a class="nav-link" href="{{ url('') }}"> <span class="nav-link-text">Passenger Request</span> </a> </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Bills"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#bills" data-parent="#exampleAccordion"> <span class="nav-link-text">Bills</span> </a>
                <ul class="sidenav-second-level collapse" id="bills">
                    <li> <a href="#">Outstanding Bills</a> </li>
                    <li> <a href="#">Paid Bills</a> </li>
                    <li> <a href="#">Set the % reduction in amount</a> </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Passenger Management"> <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#passengerManagement" data-parent="#exampleAccordion"> <span class="nav-link-text">Passenger Management</span> </a>
                <ul class="sidenav-second-level collapse" id="passengerManagement">
                    <li> <a href="{{url('request.index')}}">Passenger List</a> </li>
                    <li> <a href="#">Frequent Addresses</a> </li>
                </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="History Logs"> <a class="nav-link" href="{{ url('') }}"> <span class="nav-link-text">History Logs</span> </a> </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle mr-lg-2 header_ico help_ico" href="#"> <i class="far fa-question-circle"></i> </a> </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle mr-lg-2 header_ico" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-fw fa-bell"></i> <span class="d-lg-none">Alerts <span class="badge badge-pill badge-warning">6 New</span> </span> <span class="indicator text-warning d-none d-lg-block"> 
              <!--<i class="fa fa-fw fa-circle"></i>--> 
                    </span> </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">New Alerts:</h6>
                    <div class="dropdown-divider"></div>
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
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item small" href="#">View all alerts</a> </div>
            </li>
            <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle mr-lg-2 header_ico actor_txt" id="admin_actor" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Admin </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="admin_actor"> <a class="nav-link actor_txt" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-sign-out"></i>Logout</a> </div>
            </li>

            <!--   <li class="nav-item">
                      <form class="form-inline my-2 my-lg-0 mr-lg-2">
                          <div class="input-group">
                              <input class="form-control" type="text" placeholder="Search for...">
                              <span class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fa fa-search"></i>
                      </button>
                    </span>
                          </div>
                      </form>
                  </li>-->

        </ul>
    </div>
</nav>
<footer class="sticky-footer">
    <div class="container-fluid footer_bg">
        <div class="container">
            <div class="pt-md-5">
                <div class="row">
                    <div class="col-lg-5 col-md">
                        <div class="logo_footer"></div>
                    </div>
                    <div class="col-lg-7 col-md foot_copyright"> <span>RUBY TRANSIT SOLUTIONS</span><br/>
                        ©2019 All Rights Reserved </div>
                </div>
            </div>
        </div>
    </div>
</footer>
