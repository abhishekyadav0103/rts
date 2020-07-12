@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Edit</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="rts_form" method="POST" action="{{route('user.staff.edit', [$user->id])}}">
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
                            <input type="text" class="form-control" placeholder="(541) 754-3010" name="contact_number" value="{{old('contact_number', $user->contact_number)}}">
                            {!! $errors->first('contact_number', '<span class="alert-msg">:message</span>') !!}
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
    <!-- /.container-fluid--> 
    <!-- /.content-wrapper-->
    <!--    <footer class="sticky-footer">
            <div class="container">
                <div class="text-center"> <small>Copyright © Your Website 2018</small> </div>
            </div>
        </footer>-->

    @include('partials.topnav_modal')

</div>
@endsection