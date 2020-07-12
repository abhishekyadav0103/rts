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
                <form class="rts_form" method="POST" action="{{route('user.lawfirm.edit', [$user->id])}}">
                    @csrf
                    <div class="form-group row {{$errors->has('firmname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-5 col-form-label">Firm Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Taxman Firm" name="firmname" value="{{old('firmname', $user->lawfirm->name)}}" readonly>
                            {!! $errors->first('firmname', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('firstname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-5 col-form-label">First Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="John" name="firstname" value="{{old('firstname', $user->user->firstname)}}">
                            {!! $errors->first('firstname', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('lastname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-5 col-form-label">Last Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Doe" name="lastname" value="{{old('lastname', $user->user->lastname)}}">
                            {!! $errors->first('lastname', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('email') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-5 col-form-label">Email Address <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="john.doe@gmail.com" name="email" value="{{old('email', $user->statement_email)}}" readonly>
                            {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <!--                    <div class="form-group row">
                                            <label for="" class="col-sm-5 col-form-label">Law Firm "Internal Comment" (A-F scale) <span class="red">*</span></label>
                                            <div class="col-sm-4">
                                                <input type="text" class="form-control" placeholder="Internal Comment (A-F scale)" name="internalcomment" value="">
                                            </div>
                                        </div>-->
                    <div class="form-group row {{$errors->has('title') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-5 col-form-label">Title <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="title" id='user_title'>
                                <option value=''>Please Select</option>
                                <option value='Attorney' {{old('title', $user->title) == 'Attorney' ? 'selected' : ''}}>Attorney</option>
                                <option value='Case Manager' {{old('title', $user->title) == 'Case Manager' ? 'selected' : ''}}>Case Manager</option>
                                <option value='Call Center Professional' {{old('title', $user->title) == 'Call Center Professional' ? 'selected' : ''}}>Call Center Professional</option>
                                <option value='Bookeeper' {{old('title', $user->title) == 'Bookeeper' ? 'selected' : ''}}>Bookkeeper</option>
                            </select>
                            {!! $errors->first('title', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('bar_number') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-5 col-form-label">Bar Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Bar Number" name="bar_number" value="{{old('bar_number', $user->bar_number)}}">
                            {!! $errors->first('bar_number', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{$errors->has('license_issuance_state') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-5 col-form-label">State of License Issuance</label>
                        <div class="col-sm-4">
                            <select class="form-control" name='license_issuance_state'>
                                <option value=''>Please Select</option>
                                @foreach($states as $id => $state)
                                <option {{old('license_issuance_state', $user->license_issuance_state) == $id ? 'selected' : ''}} value='{{$id}}'>{{$state}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('license_issuance_state', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>
                    <div class="float-right"> <a href="{{route('user.lawfirm.view')}}" class="btn btn-link cancel_txt">Cancel</a>
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

@section('custom_scripts')
<script>
    getRequiredFields();
    $('#user_title').on('change', function() {
        getRequiredFields();
    });

    function getRequiredFields() {
        $('input[name="bar_number"]').closest('.form-group').find('label span').remove();
        $('select[name="license_issuance_state"]').closest('.form-group').find('label span').remove();
        if ($('#user_title').val() == 'Attorney') {
            $('input[name="bar_number"]').closest('.form-group').find('label').html('Bar Number <span class="red">*</span>');
            $('select[name="license_issuance_state"]').closest('.form-group').find('label').html('State of License Issuance <span class="red">*</span>');
        }
    }

</script>
@endsection