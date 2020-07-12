@extends('layouts.app')

<?php $userType = request()->route()->userType; ?>

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Add RLG User</h1>
            </div>
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-12">
                <form class="rts_form" method="POST" action="{{route('user.staff.save')}}">
                    @csrf
                    <div class="form-group row {{ $errors->has('firstname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Select Role <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="user_type">
                                <option value=''>Please Select</option>
                                @if (Auth::user()->isAdminUser())
                                    <option value='admin' {{old('user_type', $userType) == 'admin' ? 'selected' : ''}}>Admin</option>
                                @endif
                                <option value='approver' {{old('user_type', $userType) == 'approver' ? 'selected' : ''}}>Approver</option>
                                <option value='book_keeper' {{old('user_type', $userType) == 'book_keeper' ? 'selected' : ''}}>Book Keeper</option>
                                <option value='call_center_professional' {{old('user_type', $userType) == 'call_center_professional' ? 'selected' : ''}}>Call Center Professional</option>
                            </select>
                            {!! $errors->first('user_type', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('firstname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">First Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{old('firstname')}}">
                            {!! $errors->first('firstname', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('lastname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Last Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{old('lastname')}}">
                            {!! $errors->first('lastname', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Email Address <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="example@example.com" name="email" value="{{old('email')}}">
                            {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Contact Number <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mask-phone" placeholder="(___) ___-____" name="contact_number" value="{{old('contact_number')}}">
                            {!! $errors->first('contact_number', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('comment') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Comments <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <textarea placeholder="Internal comments view by Admin only" class="form-control" name="comment">{{old('comment')}}</textarea>
                            {!! $errors->first('comment', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>
                    <div class="float-right"> <a href="{{route('user.staff.create')}}" class="btn btn-link cancel_txt">Cancel</a>
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid--> 
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center"> <small>Copyright © Your Website 2018</small> </div>
        </div>
    </footer>

    @include('partials.topnav_modal')

</div>
@endsection