@extends('layouts.app', ['bodyclass' => 'bg-dark', 'hidenav' => true])

@section('content')
<div class="container_bg">
    <div class="container">
        <div class="navbar pl-0 pt-3  mb-5">
            <h5 class="my-2 mr-md-auto logo_rlg_img"></h5>
            <div class="phone_no navbar-nav ml-md-auto">1-833 ruby-rides <br/><a class="phone_no_href" href="tel:18337829743">1-833-782-9743</a></div>
			<div class="phone_no navbar-nav">1-844-RUBY-MEDS<br/><a class="phone_no_href" href="tel:18447829633">1-844-782-9633</a></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="login_txt">We are a <span>transportation scheduling</span> company that allows law firms to use and provide concierge transportation services including but not limited to auto, bus, train, handicap accessible and plane for plaintiffs who are injured and require such services on a non-recourse basis.</div>
            </div>
            <div class="col-lg-6">
                <div class="card card-login">
                    <div class="card-header login_card_header">Log In</div>
                    <div class="card-body">
                        <form method="post" action="{{ route('login') }}" id="login">
                            @csrf
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                            @if(session()->has('message-error'))
                                <div class="alert alert-danger">
                                    sdfghgf{{ session()->get('message-error') }}
                                </div>
                            @endif
                            <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}">
                                <!--<label for="exampleInputEmail1">Email address</label>-->
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="User ID - email address">
                                {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!}
                            </div>
                            <div class="form-group {{$errors->has('password') ? 'has-error' : '' }}">
                                <!--<label for="exampleInputPassword1">Password</label>-->
                                <input class="form-control" id="exampleInputPassword1" type="password" name="password" placeholder="Password">
                                {!! $errors->first('password', '<span class="alert-msg">:message</span>') !!}
                            </div>
                            <div class="text-right"><a class="d-block frgt_pwd" href="{{ route('password.request') }}">Forgot Password?</a></div>
                            <div class="form-group {{ $errors->has('agree') ? 'has-error' : '' }}">
                                <div class="form-check">
                                    <label class="form-check-label login_tc">
                                        <input class="form-check-input" type="checkbox" name="agree" {{old('agree') ? ' checked' : ''}}>
                                               With submission of login credentials above, I agree to Ruby Legal Group 
                                               <a href="{{url('terms')}}">terms and conditions.</a></label>
                                    {!! $errors->first('agree', '<br><span class="alert-msg">:message</span>') !!}
                                </div>
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block btn_outline">Submit</button>
                        </form>
                        <div class="text-center"> <a class="d-block mt-3 login_acc" href="{{ route('signup.display') }}">Create new law firm account</a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid footer_bg">
    <div class="container">
        <footer class="pt-md-5">
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
        </footer>
    </div>
</div>
@endsection 
