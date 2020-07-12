@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid" id="pass_details">
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Passenger Detail</h1>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Status</label>
            <div class="col-sm-3">
                <span class="text_grey">{!! $pstatus !!}</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label"></label>
            <div class="col-sm-3">
                <span class="text_grey"></span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Passenger Name / ID</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $passenger->name }} / {{ $passenger->code }}</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Law Firm Name</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $passenger->creator->lawfirm->name }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Passenger Phone No.</label>
            <div class="col-sm-3">
                <span class="text_grey mask-phone">{{ $passenger->mobile_number }}</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Law Firm Phone No.</label>
            <div class="col-sm-3">
                <span class="text_grey mask-phone">{{ $passenger->creator->lawfirm->contact_number }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Date of Birth / SSN</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ date('m-d-Y', strtotime($passenger->dob)) }} / {{$passenger->social_security_number}}</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Law Firm User</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $passenger->creator->user->getName() }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">$ Limit</label>
            <div class="col-sm-3">
                <span class="text_grey">${{$passenger->amount}}</span>
            </div>

            <div class="col-sm-5">
            @if ((Auth::user()->isAdminUser() || Auth::user()->isApprover() || Auth::user()->isCallCenterProfessional())
                                && $passenger->status == $constants['PASSENGER_STATUS']['ACTIVE'] && is_null($ride))
                <span class="text_grey">
                    <a id="associate_ride_link" href="" data-toggle="modal" data-target="#associateRides" data-id="{{ $passenger->id  }}">
						@if($rxsess == 0)
                            <button class="btn btn-outline-primary btn_outline_frm"
                                type="button">Book a Ride</button>
						@endif
                    </a>
                </span>
            @elseif (!is_null($ride))
                <span class="text_grey">
                    Ride RD{{ str_pad($ride->id, 3, '0', STR_PAD_LEFT) }} associated with the request.
                </span>
            @endif
            </div>

        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Paid Amount</label>
            <div class="col-sm-3">
                <span class="text_grey"></span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Outstanding Amount</label>
            <div class="col-sm-3">
                <span class="text_grey">${{$outstanding_amount}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Passenger Request Submission Date</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ date('m-d-Y', strtotime($passenger->created_at)) }} </span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Date of Loss</label>
            <div class="col-sm-3">
                <span class="text_grey">{{date('m-d-Y', strtotime($passenger->date_of_loss))}}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Gender</label>
            <div class="col-sm-3">
                <span class="text_grey">@if($passenger->gender == 1) Male @else Female @endif</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Alternate Number</label>
            <div class="col-sm-3">
                <span class="text_grey mask-phone">{{ $passenger->alternate_number }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Patient Home Address</label>
            <div class="col-sm-9">
                <span class="text_grey">
                {{ $address }}
                </span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Accident Type</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $accidentTypeV }}</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Liability</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $liabilityV }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Client outstanding meds to date</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $clientOutstandingMedsV }}</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Insurance</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $insuranceV }}</span>
            </div>
        </div>
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-3 col-form-label">Property Damage</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $propertyDamageV }}</span>
            </div>
            <label for="staticEmail" class="col-sm-3 col-form-label">Rx Coverage</label>
            <div class="col-sm-3">
                <span class="text_grey">{{ $rxCoverageV }}</span>
            </div>
        </div>
    </div>

    <!-- START Frequent Address -->
    <div class="container-fluid" id="fr_add_details">
        <div class="row">
            <div class="col-12">
                <h2 class="sub_title">Frequent Addresses</h2>
            </div>
            <div class="col-lg-12">
                <div class="add_btn_wrap add_btn_wrap_add">
                <a href="{{url('address/export/csv/'.$userType)}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('address/export/xlsx/'.$userType)}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                    </a>
                    <a href="#addComment" data-toggle="modal" class="btn btn-outline-primary btn_filled" id=""><i class="fas fa-plus"></i> Add New Address</a>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTableAddresses" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Passenger Id</th>
                                <th>Passenger Name</th>
                                <th>Type</th>
                                <th>Mobile Number</th>
                                <th>Business Name</th>
                                <th>Street</th>
                                <th>Street 2</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Zip Code</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- END Frequent Address -->
    </br>
    <!-- Start History Logs -->
    <div class="container-fluid" id="hi_log_details">
    <div class="row">
        <div class="col-12">
            <h2 class="sub_title">History Logs</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped" id="historyLogTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- End History Logs -->
    
    </br>
    <div class="container-fluid">
        <div class="form-group row">
            @if (!Auth::user()->isLawFirmUser())
            <div class="col-sm-3">
                <label class="col-form-label bold">Call Center Professional Comments</label>
                @foreach($callCenterUserN as $callCenterUserNotes)
                    <div class="text_grey">{{ $callCenterUserNotes->comment }}</div>
                    <div>{{ date('n-d-Y H:i:s', strtotime($callCenterUserNotes->created_at)) }}</div>
                @endforeach
            </div>
            <div class="col-sm-3">
                <label class="col-form-label bold">Bookkeeper Comments</label>
                @foreach($bookkeeperUserN as $bookkeeperUserNotes)
                    <div class="text_grey">{{ $bookkeeperUserNotes->comment }}</div>
                    <div>{{ date('n-d-Y H:i:s', strtotime($bookkeeperUserNotes->created_at)) }}</div>
                @endforeach
            </div>
            <div class="col-sm-3">
                <label class="col-form-label bold">Case Manager Comments</label>
                @foreach($caseManagerN as $caseManagerNotes)
                    <div class="text_grey">{{ $caseManagerNotes->comment }}</div>
                    <div>{{ date('n-d-Y H:i:s', strtotime($caseManagerNotes->created_at)) }}</div>
                @endforeach
            </div>
            <div class="col-sm-3">
                <label class="col-form-label bold">Admin Comments</label>
                @foreach($adminUserN as $adminUserNotes)
                    <div class="text_grey">{{ $adminUserNotes->comment }}</div>
                    <div>{{ date('n-d-Y H:i:s', strtotime($adminUserNotes->created_at)) }}</div>
                @endforeach
            </div>
            @endif
            <div class="col-sm-3">
                <label class="col-form-label bold">Lawfirm Comments</label>
                @foreach($lawfirmN as $lawfirmNotes)
                    <div class="text_grey">{{ $lawfirmNotes->comment }}</div>
                    <div>{{ date('n-d-Y H:i:s', strtotime($lawfirmNotes->created_at)) }}</div>
                    <div class="comment-padding-top"><a target="_blank" href="{{ url('/documents') }}/{{ $lawfirmNotes->document }}">{{ $lawfirmNotes->document }}</a></div>
                @endforeach
            </div>
            <div class="col-sm-3">
                <label class="col-form-label bold">Other Comments</label>
                @foreach($otherN as $otherNotes)
                    <div class="text_grey">{{ $otherNotes->comment }}</div>
                    <div>{{ date('n-d-Y H:i:s', strtotime($otherNotes->created_at)) }}</div>
                    <div class="comment-padding-top"><a target="_blank" href="{{ url('/documents') }}/{{ $otherNotes->document }}">{{ $otherNotes->document }}</a></div>
                @endforeach
            </div>
        </div>
    </div>
    
    </br>
    <!-- Start Ride Details -->
    <div class="container-fluid" id="ride_details">
    <div class="row">
        <div class="col-12">
            <h2 class="sub_title">Ride Details</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped" id="rideDetailsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Date of Ride</th>
                            <th>Pickup Description</th>
                            <th>DropOff Description</th>
                            <th>Amount</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- End Ride Details -->
    </br>
    <!-- Start Invoice Details -->
    <div class="container-fluid" id="inv_details">
    <div class="row">
        <div class="col-12">
            <h2 class="sub_title">Invoice Details</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped" id="invoiceDetailsTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Bill To</th>
                            <th>Invoice ID</th>
                            <th>Date</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <!-- End Invoice Details -->


    @include('partials.topnav_modal')

    <!-- Modal-->
    <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Address</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="alert alert-danger" style="display:none"></div>
                <div class="alert alert-success" style="display:none"></div>
                <div class="modal-body view_form">
                    <form method="post" action="" id="addressForm" name="addressForm" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                        <!-- <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Search Passenger By Name or Id</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control cleartext" id="search_passenger" name="search_passenger" autocomplete="off" required>
                            </div>
                        </div> -->
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger Id</label>
                            <div class="col-sm-7">
                                <input type="hidden" class="cleartext" id="passenger_id_s" name="passenger_id_s" value="{{ $passenger->id }}">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="passengerid" value="{{ $passenger->code }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger First Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="firstname" value="{{ $passenger->first_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger Last Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="lastname" value="{{ $passenger->last_name }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Date of Birth</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="lastname" value="{{ date('m-d-Y', strtotime($passenger->dob)) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Date of Loss</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="lastname" value="{{ date('m-d-Y', strtotime($passenger->date_of_loss)) }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Location Type <span class="red">*</span></label></label>
                            <div class="col-sm-7">
                                <select class="form-control cleartext" name="address_type" id="address_type">
                                    <option value="">Select</option>
                                    @foreach($locationType as $val)
                                        <option value="{{ $val }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row location_other" style="display:none;">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Other</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control cleartext" id="address_type_other" name="address_type_other" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Phone Number <span class="red">*</span></label></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control mask-phone cleartext" id="phone_number" name="phone_number" placeholder="(___) ___-____" autocomplete="nope" autocomplete="off" value="{{ $passenger->mobile_number }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Business Name
                            <br><small>(if applicable)</small></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control cleartext" id="business_name" name="business_name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Street 1 <span class="red">*</span></label></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control cleartext" id="street1" name="street1" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Street 2</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control cleartext" id="street2" name="street2" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">City <span class="red">*</span></label></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control cleartext" id="city" name="city" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">State <span class="red">*</span></label></label>
                            <div class="col-sm-7">
                                <select class="form-control" id="state_id" name="state_id">
                                    <option value=''>Select State</option>
									@if(isset($states))
										@foreach($states as $id => $state)
											<option {{old('state') == $id ? 'selected' : ''}} value='{{$id}}'>{{$state}}</option>
										@endforeach
									@endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Zip Code <span class="red">*</span></label></label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control cleartext" id="zip_code" name="zip_code" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Comments</label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="comments" id="comments"></textarea>
                            </div>
                        </div>                
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-outline-primary btn_outline_frm" id="addAddressBtn" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal popup for associate rides-->
    <div class="modal fade" id="associateRides" tabindex="-1" role="dialog" aria-labelledby="associateRidesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="associateRidesLabel">Associate Passenger Request</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    <form method="post" action="{{ route('ride.save') }}" id="addressSelectForm">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger ID</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="associate_puserId" value="">
                                <input type="hidden" id="associate_pId">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger First Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="associate_pfirstname" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label"> Passenger Last Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="associate_plastname" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Select Ride</label>
                            <div class="col-sm-7">
                                <input type="radio" id="associate_ride_type" name="associate_ride_type" value="uber"> Uber
                                &nbsp;&nbsp;&nbsp;<input type="radio" id="associate_ride_type" name="associate_ride_type" value="lyft" checked="checked"> Lyft
                                <span class="alert-msg"></span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Notes </label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="associate_notes" id="associate_notes"></textarea>
                                <span class="alert-msg"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <input type="hidden" id="passenger_id_address" name="passenger_id_address">
                        <input type="hidden" id="passenger_id" name="passenger_id">
                        <input type="hidden" id="ride_type_address" name="ride_type_address">
                        <input type="hidden" id="notes_address" name="notes_address">

                        <div class="form-group row">
                            <label for="source_address" class="col-sm-5 col-form-label">Source Address</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="source_address" id="source_address">
                                    <option value="">Select</option>
                                @foreach($addresses as $address)
                                    <option value="{{ $address->id }}">
                                        {{ $address->street1 }}, {{ $address->street2 }}, {{ $address->city }}, {{ $address->state }}
                                    </option>
                                @endforeach
                                    <option value="0">Add new</option>
                                </select>
                            </div>
                        </div>
                        <div id="source_address_div" style="display:none;">
                            <div class="form-group row">
                                <label for="street1" class="col-sm-5 col-form-label">Street 1</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="street1" name="source_street1" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="street2" class="col-sm-5 col-form-label">Street 2</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="street2" name="source_street2" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-5 col-form-label">City</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="city" name="source_city" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-sm-5 col-form-label">State</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="state_id" name="source_state_id" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode" class="col-sm-5 col-form-label">Zip Code</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="zip_code" name="source_zip_code" value="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="destination_address" class="col-sm-5 col-form-label">Destination Address</label>
                            <div class="col-sm-7">
                                <select class="form-control" name="destination_address" id="destination_address">
                                    <option value="">Select</option>
                                @foreach($addresses as $address)
                                    <option value="{{ $address->id }}">
                                        {{ $address->street1 }}, {{ $address->street2 }}, {{ $address->city }}, {{ $address->state }}
                                    </option>
                                @endforeach
                                    <option value="0">Add new</option>
                                </select>
                            </div>
                        </div>
                        <div id="destination_address_div" style="display:none;">
                            <div class="form-group row">
                                <label for="street1" class="col-sm-5 col-form-label">Street 1</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="street1" name="destination_street1" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="street2" class="col-sm-5 col-form-label">Street 2</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="street2" name="destination_street2" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="city" class="col-sm-5 col-form-label">City</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="city" name="destination_city" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="state" class="col-sm-5 col-form-label">State</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="state_id" name="destination_state_id" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="zipcode" class="col-sm-5 col-form-label">Zip Code</label>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control cleartext" id="zip_code" name="destination_zip_code" value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-outline-primary btn_outline_frm" id="associateRideBtn" type="submit">Next</button>
                        </div>
                    </form>
                    <div class="clearfix">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for Ride types-->
    <div class="modal fade" id="rideTypeSelection" tabindex="-1" role="dialog" aria-labelledby="Ride Types" aria-hidden="true">
        <div class="modal-dialog" role="ride_type">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sigModalLabel">Select Ride Types</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    <div class="col-sm-7">
                        <select class="form-control" name="ride_type" id="ride_type">

                        </select>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-outline-primary btn_outline_frm" id="selectRideType" type="button">Schedule</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom_scripts')

<script>
$(document).ready(function() {
    $('.datepicker').datepicker({
        format: 'mm-dd-yyyy',
        autoclose: true
    });

    $(document).on("change", "#source_address", function(){
        if($(this).val() == '0'){
            $("#source_address_div").show();
        } else {
            $("#source_address_div").hide();
        }
    });
    $(document).on("change", "#destination_address", function(){
        if($(this).val() == '0'){
            $("#destination_address_div").show();
        } else {
            $("#destination_address_div").hide();
        }
    });

    function formatPhoneNumber(phoneNumberString) {
      var cleaned = ('' + phoneNumberString).replace(/\D/g, '')
      var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/)
      if (match) {
        return '(' + match[1] + ') ' + match[2] + '-' + match[3]
      }
      return null
    }

    $(".mask-phone").each(function(){
        var phNum = $(this).html();
        var formPhNum = formatPhoneNumber(phNum)
        $(this).html(formPhNum);
    });

});

    $('#dataTableAddresses').DataTable({
        "processing": true,
        "serverSide": true,
        ajax: "{{ route('address.passenger.datatable', $passenger->id ) }}",

        "columns": [
            { "data": "passenger_id" },
            { "data": "passenger_name" },
            { "data": "address_type" },
            { "data": "mobile_number" },
            { "data": "business_name" },
            { "data": "street" },
            { "data": "street_2" },
            { "data": "city" },
            { "data": "state" },
            { "data": "zip_code" }
        ]
    } );

    $(document).on("click", "#address_search_pp", function(){ 
        $('#dataTableAddresses').DataTable().clear().draw();
        $('#dataTableAddresses').DataTable().destroy();
        $('#dataTableAddresses').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
                "url": "{{ route('address.datatablepost') }}?"+$('#rides_search').serialize(),
                "type": "POST"
            },
        "columns": [
            { "data": "lawfirminfo" },
            { "data": "casemanager" },
            { "data": "showtrips" },
            { "data": "totalcharges" }
        ]
    } );
        } );
      
        
    $('#search_passenger').autocomplete({
        autofill: function(input, fill) {
            var data = {
                        "_token": "{{ csrf_token() }}",
                        "searchkey": encodeURIComponent(input.value)
                       }
            $("#pass_loader").show();
            $.ajax({
                method: 'post',
                dataType: 'json',
                data: data,
                url: '{{ route("address.autofill") }}',
                success: function(data) {
                    $("#pass_loader").hide();
                    fill(data);
                    $('.shac-menu').show();
                },
                error: function() {
                    fill();
                    $('.shac-menu').show();
                    $("#pass_loader").hide();
                }
            });
        },
        choose: function(input, item) {
            $('.shac-menu').hide();
            var passId = $(item).data().id;
            var dataP = {
                        "_token": "{{ csrf_token() }}",
                        "psid": encodeURIComponent(passId)
                       }
            $.ajax({
                method: 'post',
                dataType: 'json',
                data: dataP,
                url: '{{ route("address.autofilldetail") }}',
                success: function(data) {
                    var passenId = 'P'+("000" + data.id).slice(-3);
                    $('#passengerid').val(passenId);
                    $('#passenger_id_s').val(data.id);
                    $('#firstname').val(data.first_name);
                    $('#lastname').val(data.last_name);
                },
                error: function() {
                   
                }
            });
        },
    });

    $(document).on("change", "#address_type", function(){
        if($(this).val() == 'Other'){
            $(".location_other").show();
        } else {
            $(".location_other").hide();
        }
    });

    $('#addressForm').validate({
            rules: {
                location_type: {
                    required: true
                },
                mobile_number: {
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
                }
            }
        });


    jQuery('#addressForm').submit(function(e){
        e.preventDefault();
        jQuery.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
          }
        });
        jQuery.ajax({
            url: "{{ route('address.create') }}",
            method: 'post',
            data: $('#addressForm').serialize(),
            success: function(data){
                if(data.success){
                    jQuery('.cleartext').val('');
                    jQuery('.alert-danger').hide();
                    jQuery('.alert-success').show();
                    jQuery('.alert-success').html(data.success);
                    window.location.reload();
                }
                
                jQuery.each(data.errors, function(key, value){
                    jQuery('.alert-danger').show();
                    jQuery('.alert-success').hide();
                    jQuery('.alert-danger').append('<p>'+value+'</p>');
                });
            }
            
        });
    });

    $('#historyLogTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#historyLogTable').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('history_logs.passenger.datatable', $passenger->id ) }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'name'},
            {mData: 'created_at'},
            {mData: 'updated_at'},
            {mData: 'log'}
        ],
    });

    $('#historyLogTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by Name'></span>\n\
        </div>"
    );

    $('#rideDetailsTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#rideDetailsTable').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('ride.passenger.datatable', $passenger->id ) }}",
        aoColumns: [
            {mData: 'datetime_of_ride'},
            {mData: 'pickup'},
            {mData: 'dropoff'},
            {mData: 'amount'},
            {mData: 'status'}
        ],
    });

    $('#rideDetailsTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by Address'></span>\n\
        </div>"
    );

    $("#selectRideType").click(function (e) {
        var ride_type = $("#ride_type").val();
        var formTmp = $("#addressSelectForm")
        var formData = new FormData(formTmp[0]);
        $.ajax({
            url: "{{ route('uber.schedule') }}" + "/" + ride_type,
            type: 'post',
            data: formData,
            success: function(data) {
                data = JSON.parse(data);
                console.log(data);
                if (data.id) {
                    $('button[data-dismiss=modal]').trigger('click');
                    $('#rideTypeSelection').modal('hide');

                    id = $('#passenger_id').val();
                    linkObj = $('#associate_ride_link[data-id="'+id+'"]');
                    linkObj.text('Ride RD' + data.id + ' Associated');
                    linkObj.attr("href", "rides/" + data.id);
                }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(response){
                var errors = response.responseJSON.errors;
            }
        });
    });
    $("form#addressSelectForm").submit(function(e) {
        e.preventDefault();
        var associate_ride_type = $('input[name="associate_ride_type"]:checked').val()
        var associate_notes = $('#associate_notes').val();
        $('#ride_type_address').val(associate_ride_type);
        $('#notes_address').val(associate_notes);

        e.preventDefault();
        var formData = new FormData(this);
        if ($('#ride_type_address').val() == 'lyft') {
            $.ajax({
                url: $('#addressSelectForm').attr('action'),
                type: 'post',
                data: formData,
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if (data.id) {
                        $('button[data-dismiss=modal]').trigger('click');
                        $('#associateRides').modal('hide');
                        id = $('#passenger_id').val();
                        linkObj = $('#associate_ride_link[data-id="'+id+'"]');
                        linkObj.text('Ride Associated');
                        linkObj.attr("href", "rides/" + data.id);

                        source = encodeURI(data.source);
                        destination = encodeURI(data.destination);
                        url = "https://ride.lyft.com/request?rideType=lyft&partner=ENK6OFiXUzo_&pickup=" + source + "&destination=" + destination;
                        console.log("https://account.lyft.com/auth?v=ride&next=" + encodeURI(url));
                        window.open( "https://account.lyft.com/auth?v=ride&next=" + encodeURI(url), "_blank");
                    }
                },
                cache: false,
                contentType: false,
                processData: false,
                error: function(response){
                    var errors = response.responseJSON.errors;
                }
            });
        } else if ($('#ride_type_address').val() == 'uber') {
            $('#associateRides').modal('hide');
            $('#rideTypeSelection').modal('show');
        }
    });
    $('#associateRides').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?php echo url("passenger/details") ?>/' + id,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                $('#associate_pfirstname').val(data.firstname);
                $('#associate_plastname').val(data.lastname);
                $('#associate_puserId').val(data.userId);
                $('#associate_pId').val(data.id);

                var associate_puserId = $('#associate_puserId').val();
                var associate_pId = $('#associate_pId').val();

                $('#passenger_id_address').val(associate_puserId);
                $('#passenger_id').val(associate_pId);

                $.ajax({
                    url: '<?php echo url("passenger/address") ?>/' + associate_puserId,
                    type: 'get',
                    success: function(data) {
                        $(".source_address").html(data);
                    }
                })
            }
        });

        //$('#addressSelection').modal('show');
    });

    $('#rideTypeSelection').on('show.bs.modal', function(e) {
        var formTmp = $("#addressSelectForm")
        var formData = new FormData(formTmp[0]);
        $("#ride_type option").remove();
        $.ajax({
            url: "{{ route('uber.ridetypes') }}",
            type: 'post',
            data: formData,
            success: function(data) {
                //console.log(data);
                if (data.hasOwnProperty('auth_url')) {
                    console.log(data.auth_url);
                    window.open( data.auth_url, "_self");
                }
                data = JSON.parse(data);
                //console.log('Parsed Data ' + data);
                if (data.hasOwnProperty('products')) {

                    $.each(data.products, function(k, product) {
                        var o = new Option(product.display_name, product.product_id);
                        /// jquerify the DOM object 'o' so we can use the html method
                        $(o).html(product.display_name + ' (' +  product.description + ')');
                        $("#ride_type").append(o);
                    });

                }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(response){
                var errors = response.responseJSON.errors;
            }
        });
    });

    $( document ).ready(function () {
        if ("{{ app('request')->input('show_ride_types') }}" == "true") {
            $('#rideTypeSelection').modal('show');
        }
    });

    $('#invoiceDetailsTable').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('ride.passengerinvoice.datatable', $passenger->id ) }}",
        aoColumns: [
            {mData: 'bill_to'},
            {mData: 'invoice_id'},
            {mData: 'date'},
            {mData: 'amount'}
        ],
    });

    
</script>
@endsection
