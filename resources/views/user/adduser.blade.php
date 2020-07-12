@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Add User</h1>
            </div>
        </div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <form class="rts_form" method="POST" action="{{route('user.save')}}">
                    @csrf
                    <div class="form-group row {{$errors->has('title') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Title <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="title" id="user_title">
                                <option value=''>Please Select</option>
                                @foreach($lawFirmTitles as $title)
                                <option {{old('title') == $title ? 'selected' : ''}} value='{{$title}}'>{{$title}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('title', '<span class="alert-msg">:message</span>') !!}
                            <input type="text" class="form-control" name="other_title" id="other_title" placeholder="Other" style="display:none;margin-top:15px;">
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
                            <input type="text" class="mask-phone form-control" placeholder="(___) ___-____" name="contact_number" value="{{old('contact_number')}}">
                            {!! $errors->first('contact_number', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('comment') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Comments <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <textarea placeholder="Internal comments view by Admin only"  class="form-control" name="comment" value="{{old('comment')}}"></textarea>
                            {!! $errors->first('comment', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>
                    <div class="float-right"> <a href="#" class="btn btn-link cancel_txt">Cancel</a>
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

