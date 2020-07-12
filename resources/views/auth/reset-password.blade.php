@extends('layouts.app', ['bodyclass' => 'bg-dark', 'hidenav' => true])

@section('content')
<div class="container_bg">
    <div class="container">
        <div class="navbar pl-0 pt-3  mb-5">
            <h5 class="my-2 mr-md-auto logo_img"></h5>
            <div class="phone_no navbar-nav flex-row ml-md-auto">1-833 ruby-rides <br><a class="phone_no_href" href="tel:18337829743">1-833-782-9743</a></div>
			<div class="phone_no navbar-nav flex-row">1-844-RUBY-MEDS<br/><a class="phone_no_href" href="tel:18447829633">1-844-782-9633</a></div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="login_txt">We are a <span>transportation scheduling</span> company that allows law firms to use and provide concierge transportation services including but not limited to auto, bus, train, handicap accessible and plane for plaintiffs who are injured and require such services on a non-recourse basis.</div>
            </div>
            <div class="col-lg-6">
                @if($message = session()->get('message'))
                    @include('widgets.alert', array('class'=>'success', 'link'=> '', 'message'=> $message, 'icon'=> 'check'))
                @endif
                <div class="card card-login">
                    <div class="card-header login_card_header">Reset Password</div>
                    <div class="card-body">
                        <form method="post" action="{{ url('password/reset') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">
                            <div class="form-group {{$errors->has('email') ? 'has-error' : '' }}"> 
                                <!--<label for="exampleInputPassword1">Password</label>-->
                                <input class="form-control" id="" type="text" name="email" placeholder="Email" value="{{$email or old('email')}}">
                                {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!} 
                            </div>
                            <div class="form-group {{$errors->has('password') ? 'has-error' : '' }}"> 
                                <!--<label for="exampleInputPassword1">Password</label>-->
                                <input class="form-control" id="" type="password" name="password" placeholder="New Password">
                                {!! $errors->first('password', '<span class="alert-msg">:message</span>') !!} 
                            </div>
                            <div class="form-group {{$errors->has('password_confirmation') ? 'has-error' : '' }}"> 
                                <!--<label for="exampleInputPassword1">Password</label>-->
                                <input class="form-control" id="" type="password" name="password_confirmation" placeholder="Confirm New Password">
                                {!! $errors->first('password_confirmation', '<span class="alert-msg">:message</span>') !!} 
                            </div>
                            <button type="submit" class="btn btn-outline-primary btn-block btn_outline">Submit</button>
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
