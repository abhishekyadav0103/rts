@extends('layouts.app', ['bodyclass' => 'bg-dark', 'hidenav' => true])

@section('content')
<div class="container_bg">
    <div class="container">
        <div class="navbar pl-0 pt-3  mb-5"> <a href="{{ route('login') }}">
                <h5 class="my-2 mr-md-auto logo_rlg_img"></h5>
            </a>
			<div class="phone_no navbar-nav flex-row ml-md-auto">1-833 ruby-rides <br/> <a class="phone_no_href" href="tel:18337829743">1-833-782-9743</a></div>
			<div class="phone_no navbar-nav flex-row">1-844-RUBY-MEDS<br/><a class="phone_no_href" href="tel:18447829633">1-844-782-9633</a></div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <h1 class="page_title">Create your Ruby Legal Group law firm account</h1>
            </div>
        </div>
        <form class="rts_form" method="post" action="{{route('signup.save')}}" id="lawfirm">
            @csrf
            <div class="sub_title">Law Firm Details</div>
            <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Law Firm Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Law Firm Name" name="name" id="name" value="{{old('name')}}">
                    {!! $errors->first('name', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('firstname') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">First Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" id="firstname" value="{{old('firstname')}}">
                    {!! $errors->first('firstname', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('lastname') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Last Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" id="lastname" value="{{old('lastname')}}">
                    {!! $errors->first('lastname', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Law Firm Email Address <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="example@example.com" name="email" value="{{old('email')}}">
                    {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!} </div>
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
            <div class="form-group row {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Primary Contact Number <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="mask-phone form-control" placeholder="(___) ___-____" name="contact_number" value="{{old('contact_number')}}">
                    {!! $errors->first('contact_number', '<span class="alert-msg">:message</span>') !!} </div>
                <div class="col-sm-3"><i class="far fa-question-circle header_ico help_txt" data-toggle="tooltip" data-placement="right" title="e.g. (541) 754-3010"></i></div>
            </div>
            <div class="form-group row {{ $errors->has('address1') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Street 1 <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Street 1" name="address1" value="{{old('address1')}}">
                    {!! $errors->first('address1', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('address2') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Street 2</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Street 2" name="address2" value="{{old('address2')}}">
                    {!! $errors->first('address2', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">City <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="City" name="city" value="{{old('city')}}">
                    {!! $errors->first('city', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('state') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">State <span class="red">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" name="state">
                        <option value=''>Please Select</option>

                        @foreach($states as $id => $state)

                        <option {{old('state') == $id ? 'selected' : ''}} value='{{$id}}'>{{$state}}</option>

                        @endforeach

                    </select>
                    {!! $errors->first('state', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('zip') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">ZIP Code <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="ZIP Code" maxlength="10" name="zip" value="{{old('zip')}}">
                    {!! $errors->first('zip', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Notes<!--  <span class="red">*</span> --></label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="notes" >{{old('notes')}}</textarea>
                    {!! $errors->first('zip', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="sub_title">Summary</div>
            <div class="col-lg-7 p-0">
                <div class="form-group form-check {{ $errors->has('agree') ? 'has-error' : '' }}">
                    <input type="checkbox" class="form-check-input" id="" name="agree" {{old('agree') ? ' checked' : ''}}>
                           <label class="form-check-label" for="">With my signature below, I, <span id="f_l_name">(Name)</span>, hereby verify that I am an member of 
                        <span id="l_f_name">(Law Firm Name)</span> that has decision making authority. I also agree to 
                        Ruby Legal Group <a href="{{url('terms')}}">terms and conditions.</a></label>
                    {!! $errors->first('agree', '<span class="alert-msg">:message</span>') !!} </div>
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
                <div class="col-lg-12">
                    <hr/>
                </div>
            </div>
            <div class="float-right">
                <a href="{{route('login')}}" class="btn btn-outline-primary btn_outline_frm">Cancel</a>
                <button class="btn btn-outline-primary btn_outline_frm" id="saveLawFirm" type="button">Submit</button>
            </div>
        </form>
        <div class="clearfix"></div>
    </div>
</div>
@endsection 
@section('custom_scripts') 
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
//var saveButton = document.getElementById('save');
var clearButton = document.getElementById('clear');
//var showPointsToggle = document.getElementById('showPointsToggle');
//saveButton.addEventListener('click', function(event) {
//    var data = signaturePad.toDataURL('image/png');
//    window.open(data);
//});
clearButton.addEventListener('click', function(event) {
    signaturePad.clear();
});
//showPointsToggle.addEventListener('click', function(event) {
//    signaturePad.showPointsToggle();
//    showPointsToggle.classList.toggle('toggle');
//});

/*******************************************************/
$('#saveLawFirm').on('click', function() {
    var data = signaturePad.toDataURL('image/png');
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'signature';
    input.value = !signaturePad.isEmpty() ? data : '';
    document.querySelector('form').appendChild(input);
    $('form').submit();
});


$(document).on("blur", "#name", function(){
    var lName = $(this).val(); 
    if (lName != '') {
        $("#l_f_name").html(lName);
    } else {
        $("#l_f_name").html('(Law Firm Name)');
    }
});

$(document).on("blur", "#firstname", function(){
    var firstName = $(this).val(); 
    if (firstName != '') {
        $("#f_l_name").html(firstName);
    } else {
        $("#f_l_name").html('(Name)');
    }
});

$(document).on("blur", "#lastname", function(){
    var firstName = $("#firstname").val(); 
    var lastName = $(this).val(); 
    if (lastName != '') {
        $("#f_l_name").html(firstName+" "+lastName);
    } else {
        $("#f_l_name").html('(Name)');
    }
});
</script> 
@endsection
