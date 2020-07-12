<!-- Navigation-->

<nav class="navbar navbar-expand-lg navbar-dark bg-rts-header fixed-top" id="mainNav"> <a class="navbar-brand rx_logo" href="/RXdashboard"></a><div class="phone_no_small navbar-nav flex-row ml-md-auto">1-833 ruby-rides </div>&nbsp;&nbsp;
<div class="phone_no_small navbar-nav flex-row ml-md-auto">1-844 ruby-meds </div>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">        
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
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="admin_actor">
                <a class="nav-link actor_txt" data-toggle="modal" data-target="#exampleModal"> <i class="fa fa-fw fa-sign-out"></i>Logout</a> </div>
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
