@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Create Passenger Request</h1>
            </div>
        </div>
        <div class="row">
			<div class="col-12">
						@if(Request::is('passenger/request/create/rx'))
								<div class="container">
									<div class="row">										
										<div class="col-12">
											<div id="custom-search-input">
												<div class="input-group">
														<table cellspacing=5 cellpadding=5 width='100%'><tr><td>
														<input id="search" type="text" name="search" placeholder="Search passenger by Name, Email, Mobile"></td><td>
														
														<input class="btn btn-outline-primary btn_outline_frm" type="button" name="populateBtn" value='Populate' onClick="populateData()"></td></tr></table>
														<input id="searchresp" type="hidden" name="searchresp" placeholder="Search passenger by Name, Email, Mobile">														
												</div>
											</div>
										</div>
									</div>
								</div>
						@endif
			</div>
				
            <div class="col-12">
                <form class="rts_form" method="POST" action="{{route('passenger_request.save', @$passengerRequest->id)}}" id="pass_req" autocomplete="off">
                    @csrf
                    <div class="sub_title">Client Information</div>
					<input id="application_id" type="hidden" name="application_id" value="">
                    <div class="form-group row {{ $errors->has('date_of_loss') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Date of Loss <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control datepicker" placeholder="mm-dd-yyyy" name='date_of_loss' id="date_of_loss" value='{{old('date_of_loss', @$passengerRequest->date_of_loss)}}' require>
                            {!! $errors->first('date_of_loss', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>

                    <div class="form-group row {{ $errors->has('firstname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Passenger First Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Passenger First Name" name="firstname" id="firstname" value="{{old('firstname', @$passengerRequest->first_name)}}">
                            {!! $errors->first('firstname', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('lastname') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Passenger Last Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Passenger Last Name" name="lastname" id="lastname" value="{{old('lastname', @$passengerRequest->last_name)}}">
                            {!! $errors->first('lastname', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('gender') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Gender <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1" {{old('gender', @$passengerRequest->gender)==1 ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineRadio1">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2" {{old('gender', @$passengerRequest->gender)==2 ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineRadio2">Female</label>
                            </div>
                            <div class="clearfix"></div>
                            {!! $errors->first('gender', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Email Address <br/>
                            <small>(for identification purposes only)</small></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="example@example.com" name="email" id="email" value="{{old('email', @$passengerRequest->email)}}">
                            {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('dob') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Passenger Date of birth <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control datepicker" placeholder="mm-dd-yyyy" id='dob' name='dob' autocomplete="off" value='{{old('dob', @$passengerRequest->dob)}}'>
                            {!! $errors->first('dob', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('social_security_number') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Social Security Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" maxlength="9" placeholder="ex: 123456789" id='social_security_number' name='social_security_number' value='{{old('social_security_number', @$passengerRequest->social_security_number)}}'>
                            {!! $errors->first('social_security_number', '<span class="alert-msg">:message</span>') !!} </div>
                        <div class="col-sm-3"><i class="far fa-question-circle header_ico help_txt" data-toggle="tooltip" data-placement="right" title="Must have 9 characters."></i></div>
                    </div>
                    <div class="form-group row {{ $errors->has('additional_ride_spec') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Additional ride specifics</label>
                        <div class="col-sm-4"> 
                            @foreach($additionalSpecs as $id => $specs)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name='additional_ride_spec[]' value="{{$id}}" id='addl_rides_{{$id}}' @if(is_array(old('additional_ride_spec', @$selectedAdditionalSpecs)) && in_array($id, old('additional_ride_spec', @$selectedAdditionalSpecs))) checked @endif)>
                                       <label class="form-check-label" for="defaultCheck1"> {{$specs}} </label>
                            </div>
                            @endforeach
                            <div class="form-check">
                                <input class="form-check-input chk_other" type="checkbox" name='additional_ride_spec[]' id="other1" value="other" @if(is_array(old('additional_ride_spec', @$selectedAdditionalSpecs)) && in_array('other', old('additional_ride_spec', @$selectedAdditionalSpecs))) checked @endif>
                                       <label class="form-check-label" for="defaultCheck1">
                                    <input type="text" class="form-control" placeholder="Other" name='other_ride_spec' value="{{old('other_ride_spec', @$otherRideSpec)}}">
                                    {!! $errors->first('other_ride_spec', '<span class="alert-msg">:message</span>') !!} </label>
                            </div>
                            {!! $errors->first('additional_ride_spec', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('mobile_number') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Passenger Mobile Phone Number <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mask-phone" placeholder="(___) ___-____" name='mobile_number' id='mobile_number' value="{{old('mobile_number', @$passengerRequest->mobile_number)}}"  autocomplete="nope" autocomplete="off">
                            {!! $errors->first('mobile_number', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('alternate_number') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Passenger Alternate Phone Number</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control mask-phone" placeholder="(___) ___-____" name='alternate_number' id='alternate_number' value="{{old('alternate_number', @$passengerRequest->alternate_number)}}"  autocomplete="nope" autocomplete="off">
                            {!! $errors->first('alternate_number', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Passenger Street 1 <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input placeholder="Passenger Street 1" type="text" class="form-control" id="street1" name="street1" value="{{old('street1', @$passengerRequest->street1)}}">{!! $errors->first('street1', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Passenger Street 2 <!-- <span class="red">*</span> --></label>
                        <div class="col-sm-4">
                            <input placeholder="Passenger Street 2" type="text" class="form-control" id="street2" name="street2" value="{{old('street2', @$passengerRequest->street2)}}">
                                                                                    {!! $errors->first('street2', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Passenger City <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input placeholder="Passenger City" type="text" class="form-control" id="city" name="city" value="{{old('city', @$passengerRequest->city)}}">
                                                                                    {!! $errors->first('city', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Passenger State <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" id="state_id" name="state_id">
                                <option value=''>Select Passenger State</option>

                                @foreach($states as $id => $state)

                                <option {{old('state') == $id ? 'selected' : ''}} value='{{$id}}'>{{$state}}</option>

                                @endforeach

                            </select>
                            {!! $errors->first('state_id', '<span class="alert-msg">:message</span>') !!} 
                            <!-- <input placeholder="Passenger State" type="text" class="form-control" id="state_id" name="state_id" value="{{old('state_id', @$passengerRequest->state_id)}}">{!! $errors->first('state_id', '<span class="alert-msg">:message</span>') !!} -->
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Passenger Zip Code <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input placeholder="Passenger Zip Code" type="text" class="form-control" id="zip_code" name="zip_code" value="{{old('zip_code', @$passengerRequest->zip_code)}}">{!! $errors->first('zip_code', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('notes') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Notes for the driver</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" placeholder="Ex: gate code 1234; spanish speaking," name='notes' id='notes' value="{{old('notes', @$passengerRequest->notes_for_driver)}}">
                            {!! $errors->first('notes', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>


                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Accident Type <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" id="accident_type" name="accident_type">
                                <option value=''>Select Accident Type</option>

                                @foreach($accident_type as $id => $accident_type_val)

                                <option {{old('accident_type') == $id ? 'selected' : ''}} value='{{$id}}'>{{$accident_type_val}}</option>

                                @endforeach

                            </select>
                            {!! $errors->first('accident_type', '<span class="alert-msg">:message</span>') !!}                             
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Liability <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" id="liability" name="liability">
                                <option value=''>Select Liability</option>

                                @foreach($liability as $id => $liability_val)

                                <option {{old('liability') == $id ? 'selected' : ''}} value='{{$id}}'>{{$liability_val}}</option>

                                @endforeach

                            </select>
                            {!! $errors->first('liability', '<span class="alert-msg">:message</span>') !!}                 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Client outstanding meds to date<span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" id="client_outstanding_meds_to_date" name="client_outstanding_meds_to_date">
                                <option value=''>Select client outstanding</option>

                                @foreach($client_outstanding_meds_to_date as $id => $meds_to_date)

                                <option {{old('client_outstanding_meds_to_date') == $id ? 'selected' : ''}} value='{{$id}}'>{{$meds_to_date}}</option>

                                @endforeach

                            </select>
                            {!! $errors->first('client_outstanding_meds_to_date', '<span class="alert-msg">:message</span>') !!}                 
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Insurance<span class="red">*</span></label>
                            <div class="col-sm-4">
                                <select class="form-control" id="insurance" name="insurance">
                                    <option value=''>Select insurance</option>

                                        @foreach($insurance as $id => $insurance_val)

                                            <option {{old('insurance') == $id ? 'selected' : ''}} value='{{$id}}'>{{$insurance_val}}</option>

                                        @endforeach

                                </select>
                                {!! $errors->first('insurance', '<span class="alert-msg">:message</span>') !!}
                            </div>
                    </div>


                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Property Damage<span class="red">*</span></label>
                            <div class="col-sm-4">
                                <select class="form-control" id="property_damage" name="property_damage">
                                    <option value=''>Select Property damage</option>

                                        @foreach($property_damage as $id => $property_damage_val)

                                            <option {{old('property_damage') == $id ? 'selected' : ''}} value='{{$id}}'>{{$property_damage_val}}</option>

                                        @endforeach

                                </select>
                                {!! $errors->first('property_damage', '<span class="alert-msg">:message</span>') !!}
                            </div>
                    </div>

                    <div class="form-group row {{ $errors->has('rx_coverage_yes_no') ? 'has-error' : '' }}">
                        <label for="staticEmail" class="col-sm-3 col-form-label">Rx Coverage<span class="red">*</span></label>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rx_coverage_yes_no" id="rxcoverRadio1" value="1" onclick> 
                                <label class="form-check-label" for="rxcoverRadio1">Yes</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rx_coverage_yes_no" id="rxcoverRadio1" value="2" checked>
                                <label class="form-check-label" for="rxcoverRadio1">No</label>
                            </div>
                            <div class="clearfix"></div>
                            {!! $errors->first('rx_coverage_yes_no', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>

                    <div class="form-group row" >
                            <label for="staticEmail" class="col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-sm-4" id="rx_coverage_block" style='display:none'>
                                <select class="form-control" id="rx_coverage" name="rx_coverage">
                                    <option value=''>Select Rx coverage</option>

                                        @foreach($rx_coverage as $id => $rx_coverage_val)

                                            <option {{old('rx_coverage') == $id ? 'selected' : ''}} value='{{$id}}'>{{$rx_coverage_val}}</option>

                                        @endforeach

                                </select>
                                {!! $errors->first('rx_coverage', '<span class="alert-msg">:message</span>') !!}
                            </div>
                    </div>

                    <div class="form-group row">
                        <label for="" class="col-sm-12 col-form-label range_txt">$500 transportation account limit covered under lien/LOP before further authorization is needed</label>
                    </div>
                    <div class="form-group row {{ $errors->has('transportation_limit') ? 'has-error' : '' }}">                        

                        <label for="" class="col-sm-3 col-form-label">If higher than $500 is needed, please enter requested amount here</label>
                        <div class="col-sm-4">
                            <input class="form-control" type="text" id="transportation_limit" name="transportation_limit" value="500" />
                            {!! $errors->first('transportation_limit', '<span class="alert-msg">:message</span>') !!} 
                        </div>
                    </div>
                    <!-- <div class="form-group row">                        
                        <label for="" class="col-sm-1"></label>
                        <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="trans_lm" name="trans_lm" value="1">
                                    <label class="form-check-label" for=""> To edit transportation limit click on checkbox. </label>
                            </div>                            
                            <div class="range_txt">Ruby Transit Solutions will require additional case information for limits higher than $500</div>
                        </div>
                    </div> -->
                    <div class="sub_title">Additional Services</div>
                    <div class="form-group row {{ $errors->has('additional_service') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">My client is interested in the following medical services that accept a LOP/lien and would like a Ruby Legal Group team member to contact me to discuss options </label>
                        <div class="col-sm-4">
                            @foreach($additionalServices as $id => $service)
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="additional_service[]" value="{{$id}}" id="addl_services_{{$id}}" @if(is_array(old('additional_service', @$selectedAdditionalServices)) && in_array($id, old('additional_service', @$selectedAdditionalServices))) checked @endif >
                                       <label class="form-check-label" for=""> {{$service}} </label>
                            </div>
                            @endforeach
                            <div class="form-check">
                                <input class="form-check-input chk_other" type="checkbox" id="other2" name="additional_service[]" value="other" @if(is_array(old('additional_service', @$selectedAdditionalServices)) && in_array('other', old('additional_service', @$selectedAdditionalServices))) checked @endif>
                                       <label class="form-check-label" for="defaultCheck1">
                                    <input type="text" class="form-control" placeholder="Other" name="other_additional_service" value="{{old('other_additional_service', @$otherAdditionalService)}}">
                                    {!! $errors->first('other_additional_service', '<span class="alert-msg">:message</span>') !!} </label>
                            </div>
                            {!! $errors->first('additional_services', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>

                    @if(!isset($passengerRequest->id))
                    <div class="sub_title">Summary</div>
                    <div class="col-lg-7 p-0">
                        <div class="form-group form-check {{ $errors->has('agree') ? 'has-error' : '' }}">
                            <input type="checkbox" class="form-check-input" name='agree' {{old('agree') ? ' checked' : ''}}>
								@if(Request::is('passenger/request/create/rx'))
                                   <label class="form-check-label" for="">With my signature below, I, agree to 
                                Rx <a href="{{url('rxterms')}}">terms and conditions.</a></label>
								@else
									<label class="form-check-label" for="">With my signature below, I, agree to 
                                Ruby Legal Group <a href="{{url('terms')}}">terms and conditions.</a></label>
								@endif
                            {!! $errors->first('agree', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>
                    <div class="form-group row {{ $errors->has('signature') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Signature <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <section class="signature-component">
                                <canvas class="sign" id="signature-pad" name ="signature" height="200"></canvas>
                            </section>
                            <br/>
                            <div class="text-right">
                                <!--<a href="#" id="save">Save</a>--> 
                                <!--<a href="#" id="clear">Clear</a>-->
                                <button type="button" id="clear">Clear</button>
                            </div>
                        </div>
                        {!! $errors->first('signature', '<span class="alert-msg">:message</span>') !!}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-12">							
                            <hr/>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{route('passenger_request.index')}}" class="btn btn-link cancel_txt">Cancel</a>
                        <button class="btn btn-outline-primary btn_outline_frm" id="savePassReq" type={{isset($passengerRequest->id) ? "submit" : "button" }}>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid--> 
    <!-- /.content-wrapper--> 

    @include('partials.topnav_modal') 

</div>
@endsection

@section('custom_scripts') 
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script> 
<script src="{{asset('js')}}/signature_pad_canvas.js"></script>

@if(!isset($passengerRequest->id))
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
$('#savePassReq').on('click', function() {
    var data = signaturePad.toDataURL('image/png');
    var input = document.createElement('input');
    input.type = 'hidden';
    input.name = 'signature';
    input.value = !signaturePad.isEmpty() ? data : '';
    document.querySelector('form').appendChild(input);
    $('.rts_form').submit();
});

</script>
@endif

<script>

$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy',
        autoclose: true,
        endDate: '+1d'
    });

    $('.mask-phone').bind('copy paste cut',function(e) {
      e.preventDefault();
      alert('cut,copy & paste options are disabled !!');
    });
});

    $('input[name=transportation_limit]').on('change', function() {
        //$('.transport_value').text($(this).val());
    })

    /*AY (24-04-2019) code is used for enable and disable transaction limit field*/
    /*$(document).on('click', '#trans_lm', function(){
        if($(this).is(':checked')){
            $('#ex1').removeAttr('readonly');
            $('#ex1').css('background', '#ffffff');
        } else {
            $('#ex1').attr('readonly', 'readonly');
            $('#ex1').css('background', '#f6f6f6');

        }
    });*/
    /*AY (24-04-2019) code is used for enable and disable transaction limit field*/
    jQuery.extend(jQuery.validator.messages, {
        min: jQuery.validator.format("Transportation account limit needs to be greater than $500."),
        max: jQuery.validator.format("Transportation account limit needs to be less than $100000.")
    });
    $('#pass_req').validate({// initialize the plugin
        rules: {
            date_of_loss: {
                required: true // AY (24-04-2019) set required field for date of lost
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            transportation_limit: { // AY (24-04-2019) set minimum value 500 for transportation_limit
                min: 500,
                max: 100000
            },
            other_ride_spec: {
                required: "#other1:checked"
            },
            other_additional_service: {
                required: "#other2:checked"
            },
            dob: {
                required: true
            },
            mobile_number: {
                required: true
            },
            agree: {
                required: true
            },
            street1: {
                required: true
            },
            /*street2: {
                required: true
            },*/
            city: {
                required: true
            },
            state_id: {
                required: true
            },
            zip_code: {
                required: true,
                digits: true,
                minlength: 5,
                maxlength: 5
            },
            accident_type: {
                required: true
            },
            liability: {
                required: true
            },
            insurance: {
                required: true
            },
            property_damage: {
                required: true
            },
            client_outstanding_meds_to_date: {
                required: true
            }
        }
    });

    $('input[name=rx_coverage_yes_no]').on('change', function() {
        if(this.value == 1){
            $('#rx_coverage_block').show();
        }else{
            $('#rx_coverage_block').hide();
        }
    });

</script> 

<script>
function autocomplete(inp) {
	//alert(document.getElementById("search").value);
	

  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
	  //alert(document.getElementById("search").value);

		arr=getPassenger();
		//alert();
		//alert(this.value)
	
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
       // if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
		if(arr[i].indexOf(this.value) != -1){
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          //b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
		  b.innerHTML = arr[i].substr(0, val.length);
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/

function getPassenger(){
			
	$.ajax({
		url: "{{url('autocomplete')}}",
		data: {
				term : $('#search').val()
		 },
		dataType: "json",
		success: function(data){
				var resp = $.map(data,function(obj){
								var selObj;
								//selObj=obj.email+" "+ obj.first_name+" "+ obj.last_name+" "+obj.mobile_number+",";					
								selObj=obj.id+" | "+obj.mobile_number+" | "+obj.email+" | "+obj.first_name+" "+obj.last_name+",";					
								return selObj; 
						   });
						   $('#searchresp').val(resp);
						   //alert(resp);
						   //arr=resp.split('##');
						   //return arr;
							//response(resp);
		}
	});
	var arr=[];
	var resp;
	resp=$('#searchresp').val();
	if(resp != ""){
		arr=resp.split(",");
		/*alert(arr[0]); // Outputs: Harry
		alert(arr[1]); 
		alert(arr[2]); 
		alert(arr[3]); 
		alert(arr.toString());*/
	}
	//console.log(resp);
	return arr;
}

autocomplete(document.getElementById("search"));

var response;

function populateData(){
		val=$('#search').val();
		arr=val.split(" | ");	
		
		arr[0]=arr[0].trim();
		
		if(arr[0]==""){
			alert('Please select some passenger to populate data!');
			return false;
		}

		$.ajax({
		url: "{{url('search')}}",
		data: {
				id : arr[0]
		 },
		success: function(data){
				obj = JSON.parse(data);
				//alert(obj.first_name);
				$('#application_id').val(arr[0]);
				//alert($('#application_id').val());
				$('#firstname').val(obj.first_name);
				$('#firstname').attr('readonly', true);

				$('#lastname').val(obj.last_name);
				$('#lastname').attr('readonly', true);
				
				$('#email').val(obj.email);
				$('#email').attr('readonly', true);
				
				if(obj.gender==1){
					$('#inlineRadio1').prop("checked", true);		
					
				}if(obj.gender==2){
					$('#inlineRadio2').prop("checked", true);					
				}

				$('#inlineRadio1').attr('disabled', true);
				$('#inlineRadio2').attr('disabled', true);
				
				$('#mobile_number').val(obj.mobile_number);
				$('#mobile_number').attr('readonly', true);
				$('#alternate_number').val(obj.alternate_number);
				$('#alternate_number').attr('readonly', true);
				$('#street1').val(obj.street1);
				$('#street1').attr('readonly', true);
				$('#street2').val(obj.street2);
				$('#street2').attr('readonly', true);
				$('#city').val(obj.city);
				$('#city').attr('readonly', true);
				$('#state_id').val(obj.state_id);
				$('#state_id').attr('readonly', true);
				$('#zip_code').val(obj.zip_code);
				$('#zip_code').attr('readonly', true);

				$('#date_of_loss').val(obj.date_of_loss);
				$('#date_of_loss').attr('readonly', true);
				$('#date_of_loss').attr('disabled', true);
				$('#dob').val(obj.dob);
				$('#dob').attr('readonly', true);
				$('#dob').attr('disabled', true);

				$('#social_security_number').val(obj.social_security_number);
				$('#social_security_number').attr('readonly', true);
				$('#notes').val(obj.notes_for_driver);
				$('#notes').attr('readonly', true);
				$('#transportation_limit').val(obj.transportation_limit);
				$('#transportation_limit').attr('readonly', true);
				$('#trans_lm').attr('disabled', true);
				$('#other').attr('disabled', true);
				$('#other2').attr('disabled', true);

				if(obj.addl_rides != ""){
					addl_rides_arr=obj.addl_rides.split(",");
					for (const addl_ride of addl_rides_arr){
						//console.log(addl_ride);
						$('#addl_rides_'+addl_ride).prop("checked", true);
						$('#addl_rides_'+addl_ride).attr("disabled", true);
					}
				}

				if(obj.addl_services != ""){
					addl_services_arr=obj.addl_services.split(",");	
					for (const addl_services of addl_services_arr){
						//console.log(addl_services);
						$('#addl_services_'+addl_services).prop("checked", true);
						$('#addl_services_'+addl_services).attr("disabled", true);

					}
				}

				var addl_specs = {!! json_encode($additionalSpecs) !!};			
				$.each(addl_specs, function(key1,value1) {
					$('#addl_rides_'+key1).attr("disabled", true);
					//alert(key);

				});

				var addl_services1 = {!! json_encode($additionalServices) !!};								
				
				$.each(addl_services1, function(key,value) {
						$('#addl_services_'+key ).attr("disabled", true);
				});

									
								
			}
	});
}



</script>
@endsection