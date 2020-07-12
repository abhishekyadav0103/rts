@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">My Profile</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
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
                <form class="rts_form" method="POST" action="{{route('myprofile', [$user->id])}}" id="update_profile">
                    @csrf
                    <div class="form-group row {{$errors->has('firstname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">First Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="John" name="firstname" value="{{old('firstname', $user->firstname)}}">
                            {!! $errors->first('firstname', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('lastname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Last Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Doe" name="lastname" value="{{old('lastname', $user->lastname)}}">
                            {!! $errors->first('lastname', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('email') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Email Address <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="john.doe@gmail.com" name="email" value="{{old('email', $user->email)}}" readonly>
                            {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('contact_number') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Contact Number <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mask-phone" placeholder="(541) 754-3010" name="contact_number" value="{{old('contact_number', $contactNumber)}}">
                            {!! $errors->first('contact_number', '<span class="alert-msg">:message</span>') !!}
                            <input type="hidden" name="user_id" value="{{ $userId }}">
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('password') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Password </label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" placeholder="Password" name="password" id="password" value="">
                            {!! $errors->first('password', '<span class="alert-msg">:message</span>') !!}
                        </div>
                        <div class="col-sm-3"><i class="far fa-question-circle header_ico help_txt" data-toggle="tooltip" data-placement="right" title="Minimum 8 characters. Atleast 1 Captial letter and 1 number."></i></div>
                    </div>
                    <div class="form-group row {{$errors->has('cpassword') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Confirm Password </label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" id="cpassword" value="">
                            {!! $errors->first('cpassword', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>
                    <div class="float-right"> <a href="{{route('user.staff.view', [$user->userType->name])}}" class="btn btn-link cancel_txt">Cancel</a>
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('partials.topnav_modal')

</div>

@endsection