@extends('layouts.app', ['bodyclass' => 'bg-dark', 'hidenav' => true])

@section('content')
<div class="container_bg">
    <div class="container">
        <div class="navbar pl-0 pt-3  mb-5">
            <h5 class="my-2 mr-md-auto logo_rlg_img"></h5>
            <div class="phone_no navbar-nav flex-row ml-md-auto">1-833 ruby-rides <br/> <a class="phone_no_href" href="tel:18337829743">1-833-782-9743</a></div>
			<div class="phone_no navbar-nav flex-row">1-844-RUBY-MEDS<br/><a class="phone_no_href" href="tel:18447829633">1-844-782-9633</a></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="login_txt">We are a <span>transportation scheduling</span> company that allows law firms to use and provide concierge transportation services including but not limited to auto, bus, train, handicap accessible and plane for plaintiffs who are injured and require such services on a non-recourse basis.</div>
            </div>
            <div class="col-lg-6">
                <div class="card card-login">
                    <div class="card-header login_card_header">Forgot Password</div>
                    <div class="card-body">
                        <form method="post" action="{{route('password.email')}}">
                            @csrf
                            <div class="text-center mt-4 mb-5">
                                <p>Enter your email address and we will send you instructions on how to reset your password.</p>
                            </div>
                            <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}""> 
                                <!--<label for="exampleInputEmail1">Email address</label>-->
                                <input class="form-control" id="exampleInputEmail1" type="email" name="email" value="{{old('email')}}" aria-describedby="emailHelp" placeholder="Enter email address">
                                {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!}
                            </div>
                            <button class="btn btn-outline-primary btn-block btn_outline" type="submit">Reset Password</button>
                        </form>
                        <div class="text-center"> <a class="d-block mt-3 login_acc" href="{{ route('login') }}">Back to Login</a> </div>
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
                <div class="col-lg-5 col-md">
                    <div class="logo_footer"></div>
                </div>
                <div class="col-lg-7 col-md foot_copyright"> <span>RUBY TRANSIT SOLUTIONS</span><br/>
                    ©2019 All Rights Reserved </div>
            </div>
        </footer>
    </div>
</div>
@endsection 
