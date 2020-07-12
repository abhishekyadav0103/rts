@extends('layouts.app', ['bodyclass' => 'bg-dark', 'hidenav' => true])

@section('content')
<div class="container_bg">
    <div class="container">
        <div class="navbar pl-0 pt-3  mb-5">
            <a href="{{ route('login') }}"><h5 class="my-2 mr-md-auto logo_img"></h5></a>
            <div class="phone_no navbar-nav flex-row ml-md-auto">1-833 ruby-rides (1-833 782-9743)</div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page_title">Sign Up - Law Firm Users</h1>
            </div>
        </div>
        <form class="rts_form" method="post" action="{{route('user.signup.save', $lawfirm['id'])}}" id="lawfirmuser">
            @csrf
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Firm Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" readonly class="form-control-plaintext" id="" value="{{@$lawfirm['name']}}">
                    <input type="hidden" class="form-control-plaintext" id="token" name="token" value="{{@$token}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">First Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" readonly class="form-control-plaintext" id="" value="{{@$lawfirm['firstname']}}">
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Last Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" readonly class="form-control-plaintext" id="" value="{{@$lawfirm['lastname']}}">
                </div>
            </div>
            <div class="form-group row {{$errors->has('email') ? 'has-error' : '' }}">
                <label for="staticEmail" class="col-sm-3 col-form-label">Email Address <span class="red">*</span><br/><small>(used as your login ID)</small></label>
                <div class="col-sm-4">
                    <input type="text" class="{{@token ? 'form-control-plaintext' : 'form-control'}}" id="" placeholder="example@example.com" {{isset($lawfirm['email']) ? 'readonly' : ''}} name="email" value="{{old('email', @$lawfirm['email'])}}">
                    {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row {{$errors->has('password') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Password <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="">
                    {!! $errors->first('password', '<span class="alert-msg">:message</span>') !!}
                </div>
                <div class="col-sm-3"><i class="far fa-question-circle header_ico help_txt" data-toggle="tooltip" data-placement="right" title="Minimum 8 characters. Atleast 1 Captial letter and 1 number."></i></div>
            </div>
            <div class="form-group row {{$errors->has('cpassword') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Confirm Password <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="password" class="form-control" placeholder="Confirm Password" name="cpassword" value="">
                    {!! $errors->first('cpassword', '<span class="alert-msg">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row {{$errors->has('title') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Title <span class="red">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" name="title" id="user_title" {{isset($lawfirm['title']) ? 'readonly' : ''}}>
                        <option value=''>Please Select</option>
                           @foreach($lawFirmTitles as $title)
                        <option {{old('title') == $title ? 'selected' : ''}} value='{{$title}}'>{{$title}}</option>
                        @endforeach
                    </select>
                    {!! $errors->first('title', '<span class="alert-msg">:message</span>') !!}
                    <input type="text" class="form-control" name="other_title" id="other_title" placeholder="Other" style="display:none;margin-top:15px;">
                </div>
            </div>
            <div class="form-group row {{$errors->has('bar_number') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Bar Number @if (!empty($lawfirm['title']) && $lawfirm['title'] == 'Attorney')
                    <span class="red">*</span>
                @endif
                </label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Bar Number" name="bar_number" value="{{old('bar_number')}}">
                    {!! $errors->first('bar_number', '<span class="alert-msg">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row {{$errors->has('license_issuance_state') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">State of License Issuance 
                @if (!empty($lawfirm['title']) && $lawfirm['title'] == 'Attorney')
                    <span class="red">*</span>
                @endif
                </label>
                <div class="col-sm-4">
                    <select class="form-control" name="license_issuance_state">
                        <option value=''>Please Select</option>
                        @foreach($states as $id => $state)
                            <option {{old('license_issuance_state') == $id ? 'selected' : ''}} value='{{$id}}'>{{$state}}</option>
                        @endforeach
                        <!--<option  {{old('license_issuance_state') == 'License 1' ? 'selected' : ''}} value='License 1'>License 1</option>-->
                    </select>
                    {!! $errors->first('license_issuance_state', '<span class="alert-msg">:message</span>') !!}
                </div>
            </div>
            <div class="sub_title">Summary</div>
            <div class="col-lg-7 p-0">
                <div class="form-group form-check {{ $errors->has('agree') ? 'has-error' : '' }}">
                    <input type="checkbox" class="form-check-input" id="" name="agree" {{old('agree') ? ' checked' : ''}}>
                           <label class="form-check-label" for="">With my signature below, I, agree to 
                        Ruby Transit Solutions <a href="{{url('terms')}}">terms and conditions.</a></label>
                    {!! $errors->first('agree', '<span class="alert-msg">:message</span>') !!}
                </div>
            </div>
            <div class="form-group row {{ $errors->has('signature') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Signature <span class="red">*</span></label>
                <div class="col-sm-4">
                    <section class="signature-component">
                        <canvas class="sign" id="signature-pad" height="200"></canvas>
                    </section>
                    <br/>
                    <div class="text-right">
                        <!--<a href="#" id="save">Save</a>--> 
                        <!--<a href="#" id="clear">Clear</a>-->
                        <button type="button" id="clear">Clear</button>
                    </div>
                    {!! $errors->first('signature', '<span class="alert-msg">:message</span>') !!}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12"> <hr/></div>
            </div>
            <div class="float-right">
                <a href="{{route('login')}}" class="btn btn-outline-primary btn_outline_frm">Cancel</a>
                <button class="btn btn-outline-primary btn_outline_frm" id="saveLawFirmUser" type="button">Submit</button>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
</div>
@endsection

@section('custom_scripts')
<script>
    $('#user_title').on('change', function() {
        $('input[name="bar_number"]').closest('.form-group').find('label span').remove();
	$('select[name="license_issuance_state"]').closest('.form-group').find('label span').remove();
        if ($(this).val() == 'Attorney') {
            $('input[name="bar_number"]').closest('.form-group').find('label').html('Bar Number <span class="red">*</span>');
	    $('select[name="license_issuance_state"]').closest('.form-group').find('label').html('State of License Issuance <span class="red">*</span>');
        }
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
<script src="{{asset('js')}}/signature_pad_canvas.js"></script>
<script type="text/javascript">

    var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
        backgroundColor: 'rgba(255, 255, 255, 0)',
        penColor: 'rgb(0, 0, 0)',
        velocityFilterWeight: .7,
        minWidth: 0.5,
        maxWidth: 2.5,
        throttle: 16, // max x milli seconds on event update, OBS! this introduces lag for event update
        minPointDistance: 3,
    });
//    var saveButton = document.getElementById('save');
    var clearButton = document.getElementById('clear');
//    var showPointsToggle = document.getElementById('showPointsToggle');

//    saveButton.addEventListener('click', function(event) {
//        var data = signaturePad.toDataURL('image/png');
//        window.open(data);
//    });
    clearButton.addEventListener('click', function(event) {
        signaturePad.clear();
    });
//    showPointsToggle.addEventListener('click', function(event) {
//        signaturePad.showPointsToggle();
//        showPointsToggle.classList.toggle('toggle');
//    });

    /*******************************************************/
    $('#saveLawFirmUser').on('click', function() {
        var data = signaturePad.toDataURL('image/png');
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'signature';
        input.value = !signaturePad.isEmpty() ? data : '';
        document.querySelector('form').appendChild(input);
        $('form').submit();
    });

</script> 
@endsection
