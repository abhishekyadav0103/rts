@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">View Passenger Request</h1>
            </div>
            <div class="col-lg-4">
                <div class="add_btn_wrap">
                    <a href="#advanceSearch" data-toggle="modal" data-target="#advanceSearch" class="btn btn-outline-primary btn_filled" id="">Advance Search <i class="fa fa-filter"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if(session()->has('message-error'))
                <div class="alert alert-danger">
                    {{ session()->get('message-error') }}
                </div>
            @endif
            <div class="col-12">
                <div class="top-scroll-container">
                  <div>&nbsp;</div>
                </div>
                <div class="table-responsive table-responsive-passenger">
                    <table class="table table-striped" id="passengerTable" width="1260px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Passenger ID</th>
                                <th>Passenger Name</th>
                                @if(Auth::user()->isApprover())
                                <th>Lawfirm Name</th>
                                @endif
                                <th>Date of Loss</th>
                                <th>Passenger DOB</th>
                                <th>Status</th>   
                                <th>Amount Approved</th> 
                                <th>Registered Services</th>                            
                                <!-- <th>Lawfirm</th>
                                <th>Email Address</th> 
                                <th>Gender</th>
                                <th>Passenger DOB</th> 
                                <th>Mobile Number</th>
                                 <th>Amount Requested</th> 
                                <th>Amount Approved</th>
                                <th>Additional Specifications</th>
                                <th>Additional Services</th>
								<th>Registered Services</th> -->
                                <th>Created By</th>
                                <th style="width:130px;">Action</th>
                                <th style="width:0px;">Updated At</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid--> 
    <!-- /.content-wrapper--> 

    @include('partials.topnav_modal')

    <!-- Modal-->
    <div class="modal fade" id="addNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    <form method="get" action="" id="requestNoteForm">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger ID</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="passengerId" value="1103">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger First Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="firstname" value="John">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger Last Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="lastname" value="Doe">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Status</label>
                            <div class="col-sm-7" id="requestStatus"> <span class="badge badge-danger badge_active">Active</span> </div>
                        </div>
                        <div class="form-group row">
                            <label for="amount_requested" class="col-sm-5 col-form-label">Amount Requested</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="amount_requested" name="amount_requested" value="Doe">
                            </div>
                        </div>
                        @if(Auth::user()->isApprover())
                        <div class="form-group row">
                            <label for="amount_approved" class="col-sm-5 col-form-label">Amount Approved</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="amount_approved" value="" name="amount_approved">
                                <span class="alert-msg" id="amount_error"></span>
                            </div>
                        </div>
                        @endif
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Notes <span class="red">*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="notes" placeholder="Place your internal case or reference number here for easier access" required></textarea>
                                <span class="alert-msg" id="notes_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-outline-primary btn_outline_frm" id="addNotesBtn" type="button">Next</button>
                        </div>
                    </form>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="com_heading">Notes</div>
                    <section class="comm_sec">
                        <div class="clearfix">&nbsp;</div>
                        <div id="previousNotes"></div>
                    </section>
                </div>
            </div>
        </div>
    </div>

	<!--- -->
	<!-- Modal-->
    <div class="modal fade" id="showCard" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">                
                <div class="modal-body view_form">
						<div class="clearfix">&nbsp;</div>    
						<div class="clearfix">&nbsp;</div>   
                        <div class="form-group row">
							<table cellspacing=1 cellpadding=1 border=2 width='450px' align='center'>
								<tr>
									<td>
										<table cellspacing=4 cellpadding=4 border=0 width=100% align='center' style='font-size:12px'>
											<tr>
												<td width='50%' valign='top'><i><strong>Personal Injury<br>Prescription Insurance<br>Card</strong></i></td>
												<td><img src='{{ asset("/images/rlg.png") }}'></td>
											</tr>
											<tr>
												<td colspan=2><b>ID: <span id="passengerIdSC"></span></b></td>
											</tr>
											<tr>
												<td><b>RXBIN: GuidantRx</b></td>
												<td id="lastname" style='color:#a3238e'><b>Patient Name: <span id='patientname'></span></b></td>
											</tr>
											<tr>
												<td colspan=2><b>RXPCN: GuidantRx</b></td>
											</tr>
											<tr>
												<td colspan=2><b>RXGRP: <span id="lawfirm"></span></b></td>
											</tr>
											<tr>
												<td colspan=2 style='color:#a3238e'><strong>This card has been activated and ready for use</strong></td>
											</tr>
										</table>
									</td>
								</tr>
							</table>
								<!--<label for="staticEmail" class="col-sm-5 col-form-label" style='font-size:12px'>ID</label>
								<div class="col-sm-7">
									<input type="text" readonly class="form-control-plaintext" id="passengerIdSC" value="1103">
								</div>-->
                        </div>
                        <!--<div>
                            <label for="staticEmail" class="col-sm-5 col-form-label" style='font-size:12px'>RXBIN</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="firstname" value="GuidantRx">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label" style='font-size:12px'>RXPCN</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="lastname" value="GuidantRx">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label" style='font-size:12px'>RXGRP</label>
							<div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="lawfirm" value="GuidantRx">
                            </div>                            
                        </div>
                        <div class="form-group row">
                            <label for="amount_requested" class="col-sm-5 col-form-label" style='font-size:12px'>Patient Name</label>
							<div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="patientname" value="">
                            </div>
                        </div>        -->               
                         <div class="clearfix">&nbsp;</div>    
						 <div class="clearfix">&nbsp;</div>    
                        <div class="float-right">
                            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
						</div>                    
                    <div class="clearfix">&nbsp;</div>                    
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Under Writting-->
    <div class="modal fade" id="addUnderWritting" tabindex="-1" role="dialog" aria-labelledby="exampleUnderWritting" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleUnderWritting">Underwritting</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    <form method="post" action="{{ route('underwritting.save') }}" id="requestUnderWritting">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Passenger ID</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="passengerIdU" value="1103">
                                <input type="hidden" id="passengerIdUVal" name="passengerIdUVal">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Client First Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="firstnameU" value="" name="client_first_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Client Last Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="lastnameU" value="" name="client_last_name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Status</label>
                            <div class="col-sm-7" id="requestStatusU"> <span class="badge badge-danger badge_active">Active</span> </div>
                        </div>

                        @include('passenger.under_writting')

                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="signature" id="signature">
                                <hr>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-outline-primary btn_outline_frm" id="saveUnderWritting" type="button">Submit</button>
                        </div>
                    </form>
                    <div class="clearfix">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <!--Law firm details popup-->
    <div class="modal fade" id="lawfirmdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lawfModalLabel">Law Firm Details</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Law Firm Id</label>
                        <div class="col-sm-7">
                            <span id="lfirmid" class="lfirmdetail"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Name</label>
                        <div class="col-sm-7">
                            <span id="lfuname" class="lfirmdetail"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Firm Name</label>
                        <div class="col-sm-7">
                            <span id="lfname" class="lfirmdetail"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Email</label>
                        <div class="col-sm-7">
                            <span id="lfemail" class="lfirmdetail"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">State of License Issuance</label>
                        <div class="col-sm-7">
                            <span id="lfstateoli" class="lfirmdetail"></span>
                        </div>
                    </div>
                    <div class="float-right">
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Display signature in popup-->
    <div class="modal fade" id="sigdetails" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sigModalLabel">Signature</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    <div id="box">
                        <p class="sign-box">
                        <span class="top">Docusigned by <span id="docusigned_by" class="uppercase"></span></span>
                            <span id="sigimage" class="signaturedet"></span>
                            <span id="sigdate" class="signaturedet bottom">2019-04-15T16:21:30+00:00</span>
                            <br/>
                        </p>
                    </div> 
                    <div class="float-right">
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal popup for comments-->
    <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                    @if(Auth::user()->isAuthorizedUser())
                    Add Comment
                    @else
                    View Comment
                    @endif
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    @if(Auth::user()->isAuthorizedUser())
                    <form method="post" action="" id="commentForm" enctyped="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">First Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="pfirstname" value="John">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Last Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="plastname" value="Doe">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">User ID</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="puserId" value="001">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Comments <span class="red">*</span></label>
                            <div class="col-sm-7">
                                <textarea class="form-control" name="comment"></textarea>
                                <span class="alert-msg"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Upload Document </label>
                            <div class="col-sm-7">
                                <input type="file" style="width:100%;" name="document" id="document">
                                <span class="alert-msg"></span>
                            </div>
                        </div>
                        @if(Auth::user()->isAuthorizedUser())
                            <input type="hidden" id="status_pr" name="status" value="2">
                        @else
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Document Status</label>
                            <div class="col-sm-7">
                                <input type="radio" id="status_pu" name="status" value="1" checked> Public
                                <input type="radio" id="status_pr" name="status" value="2"> Private
                                <span class="alert-msg"></span>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <hr>
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-outline-primary btn_outline_frm" id="addCommentBtn" type="submit">Submit</button>
                        </div>
                    </form>
                    <div class="clearfix">&nbsp;</div>
                    <div class="clearfix">&nbsp;</div>
                    <div class="com_heading">Previous Comments</div>
                    @endif
                    <section class="comm_sec">
                        <div class="clearfix">&nbsp;</div>
                        <div id="previousComments"></div>                    
                    </section>
                </div>
            </div>
        </div>
    </div>

    <!-- Advacne Search Start-->
    <div class="modal fade" id="advanceSearch" tabindex="-1" role="dialog" aria-labelledby="advModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="advSearchModalLabel">
                    Advance Search
                    </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form col-lg-12 p-10">
                    <form id="frmadvacnesearch" name="frmadvacnesearch">
                        @csrf
                        <div class="form-group row p-0">
                            <div class="form-group col-sm-6">
                                <label for="passenger_id" class="col-form-label">Search by Passenger ID</label>
                                <input type="text" class="form-control" name="passenger_id">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="passenger_name" class="col-form-label">Search by Passenger</label>
                                <input type="text" class="form-control" name="passenger_name">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="date_of_birth" class="col-form-label">Search by Date of Loss</label>
                                <input type="text" class="form-control datepicker" name="date_of_loss"  autocomplete="off" placeholder="mm-dd-yyyy">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="date_of_birth" class="col-form-label">Search by Date of Birth</label>
                                <input type="text" class="form-control datepicker" name="date_of_birth" autocomplete="off" placeholder="mm-dd-yyyy">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="passenger_name" class="col-form-label">Search by Status</label>
                                <select class="form-control" name="passenger_status">
                                    <option value="">Select Status</option>
                                    <option value="Not Assigned">Not Assigned</option>
                                    <option value="Active">Active</option>
                                    <option value="Denied">Denied</option>
                                    <option value="Closed">Closed</option>
                                    <option value="Pending Payment">Pending Payment</option>
                                    <option value="Undertaking Provided">Undertaking Provided</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="passenger_name" class="col-form-label">Search by Approved Amount</label>
                                <input type="text" class="form-control" name="approved_amount">
                            </div>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                            <button class="btn btn-outline-primary btn_outline_frm" id="searchadvbtn" type="button">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Advance Search End -->
</div>
@endsection

@section('custom_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script> 
<script src="{{asset('js')}}/signature_pad_canvas.js"></script>

<script type="text/javascript">
$(function() {
  var tableContainer = $(".table-responsive");
  var tableResp = $(".table-responsive table");
  var topScrollContainer = $(".top-scroll-container");
  var topScrollDiv = $(".top-scroll-container div");

  var tableWidth = tableResp.width();
  topScrollDiv.width(tableWidth);

  topScrollContainer.scroll(function() {
    tableContainer.scrollLeft(topScrollContainer.scrollLeft());
  });
})
var signaturePad = new SignaturePad(document.getElementById('signature-pad'), {
    backgroundColor: 'rgba(255, 255, 255, 0)',
    penColor: 'rgb(0, 0, 0)',
    velocityFilterWeight: .7,
    minWidth: 0.5,
    maxWidth: 2.5,
    throttle: 16, // max x milli seconds on event update, OBS! this introduces lag for event update
    minPointDistance: 3,
});

var clearButton = document.getElementById('clear');

clearButton.addEventListener('click', function(event) {
    signaturePad.clear();
});

/*******************************************************/
$('#saveUnderWritting').on('click', function() {
    var data = signaturePad.toDataURL('image/png');
    if(signaturePad.isEmpty()){
        alert("Please provide your signature.");
        return false;
    } else {
        $("#signature").val(data);
        $('#requestUnderWritting').submit();
        return true;
    }
});

</script>

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
                min: 500
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
            street2: {
                required: true
            },
            city: {
                required: true
            },
            state_id: {
                required: true
            },
            zip_code: {
                required: true
            }
        }
    });

</script> 

<script>

    $('#passengerTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    var viewActionColumn = '<?php echo $viewActionColumn ?>';
    
    var passengerTable = $('#passengerTable').DataTable({
        "sorting" : false,
        "order": [[9, 'desc']],
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: {
          "url": "{{ route('passenger_request.datatable') }}",
          "data": function(data){
            var data_filter = $("#frmadvacnesearch").serialize();
            data.data_filter = data_filter;
          }
        },
        aoColumns: [
            {mData: 'id'},
            {mData: 'name'},
            @if(Auth::user()->isApprover())
            {mData: 'lawfirm_name'},
            @endif
            {mData: 'date_of_loss'},
            {mData: 'dob'},
            {mData: 'status', visible: true},      
            {mData: 'amount_approved'},  
            {mData: 'registered_services'},    
            {mData: 'created_by'},
            {mData: 'action', sortable: false, visible: viewActionColumn},
            {mData: 'updated_at', "visible": false,},

            /*{mData: 'lawfirm_name', visible: false},
            {mData: 'email'},
            {mData: 'gender'},
            {mData: 'dob'},
            {mData: 'mobile_number'},
            {mData: 'transportation_limit'},
           
            {mData: 'additional_specs', sortable: false},
            {mData: 'additional_services', sortable: false},
			{mData: 'registered_services'},*/
            
        ],
    });

    $(document).on("click", "#searchadvbtn", function(){
        passengerTable.draw();
        $('button[data-dismiss=modal]').trigger('click');
    });

    $('#passengerTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, Gender, DOB, Mobile Number and Registered services'></span>\n\
        </div>"
            );

    $('#addNotes').on('show.bs.modal', function(e) {
        $("#notes_error").html('');
        var id = $(e.relatedTarget).data('id');
        var status = $(e.relatedTarget).data('title');
		var service = $(e.relatedTarget).data('service');

		if(service == ""){
				service=1;
		}

        $.ajax({
            url: '<?php echo url("passenger/request/details") ?>/' + id + '/' + status+ '/' + service,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                var passengerId = data.id;
                var passId = passengerId.replace(/<[^>]*>?/gm, '');
                $('#passengerId').val(passId);
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);
                $('#requestStatus').html(data.status);
                $('#amount_requested').val(data.transportation_limit);
                $('#amount_approved').val(data.amount_approved);
                $('#requestNoteForm').attr('action', data.formAction);

                var notes = data.notes;

                var html = '';
                if (notes.length) {
                    for (var i = 0; i < notes.length; i++) {
                        html += '<div class="comm_txt">' + notes[i].comment + '</div>';
                        html += '<div>' + notes[i].formatted_created_at + '</div>';
                        html += '<div class="row"><div class="col-lg-12"><hr></div></div>';
                    }
                } else {
                    html += '<span>No previous notes</span>';
                }

                $('#previousNotes').html(html);
            }
        })
    });

 $('#showCard').on('show.bs.modal', function(e) {	 	
        var id = $(e.relatedTarget).data('id');
        var status = $(e.relatedTarget).data('title');

        $.ajax({
            url: '<?php echo url("passenger/request/details") ?>/' + id + '/' + status,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                var passengerId = data.id;
                var passId = passengerId.replace(/<[^>]*>?/gm, '');
                $('#passengerIdSC').html(passId);
                $('#lawfirm').html(data.lawfirm);
                $('#patientname').html(data.firstname+" "+data.lastname);
                $('#requestStatusSC').html(data.status);
                $('#amount_requestedSC').html(data.transportation_limit);
                $('#amount_approvedSC').html(data.amount_approved);
                $('#requestNoteFormSC').html('action', data.formAction);

                var notes = data.notes;

                var html = '';
                if (notes.length) {
                    for (var i = 0; i < notes.length; i++) {
                        html += '<div class="comm_txt">' + notes[i].notes + '</div>';
                        html += '<div>' + notes[i].formatted_created_at + '</div>';
                        html += '<div class="row"><div class="col-lg-12"><hr></div></div>';
                    }
                } else {
                    html += '<span>No previous notes</span>';
                }

                $('#previousNotes').html(html);
            }
        })
    });


    $('#addUnderWritting').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var status = $(e.relatedTarget).data('title');
        $.ajax({
            url: '<?php echo url("passenger/request/detailsunderwritting") ?>/' + id,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                var passengerId = data.id;
                var passId = passengerId.replace(/<[^>]*>?/gm, '');
                $('#passengerIdU').val(passId);
                $('#passengerIdUVal').val(id);
                $('#firstnameU').val(data.firstname);
                $('#lastnameU').val(data.lastname);
                $('#requestStatusU').html(data.status);

                $('#date_of_loss').val(data.date_of_loss);
                $('#client_dob').val(data.dob);
                $('#law_firm_name').val(data.lawfrmname);
                $('#law_firm_email').val(data.lemail);
            }
        })
    });
    
    $('#addNotesBtn').on('click', function() {
        var amountApproved = $('#amount_approved').val();
        var reqAmount = $('#amount_requested').val();
        if(parseFloat(amountApproved) > parseFloat(reqAmount)){
            $("#amount_error").html("Amount Approved cannot be greater than Requested Amount.");
            return false;
        }

        var notes = $('#requestNoteForm textarea[name=notes]').val();
        if(notes == ''){
            $("#notes_error").html("The notes field is required.");
            return false;
        }
        
        $.ajax({
            url: $('#requestNoteForm').attr('action'),
            type: 'get',
            data: {notes: notes, amount_approved: amountApproved},
            success: function(data) {
                window.location.reload();
            },
            error: function(response) {
                //console.log(response);
                var errors = response.responseJSON.errors;
                $('#requestNoteForm textarea[name=notes]').closest('div').find('.alert-msg').html(errors.notes);
            }
        })
    });

    function displayLawfirm(lawfirmUserID){
        $('.lfirmdetail').html('');
        $.ajax({
            url: '<?php echo url("user/lawfirm/detailspopup") ?>/' + lawfirmUserID,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                $('#lfirmid').html(data.lawFirmId);
                $('#lfuname').html(data.user_fullname);
                $('#lfname').html(data.lawfirm_name);
                $('#lfemail').html(data.email);
                $('#lfstateoli').html(data.lawfirm_state);
            }
        });
        $('#lawfirmdetails').modal('show');
    }

    function displaySignature(passId){
        $('.signaturedet').html('');
        $.ajax({
            url: '<?php echo url("passenger/request/signaturepopup") ?>/' + passId,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                route = "<?php echo route('signature_path'); ?>/";

                var signImage = '<img src="' + route + data.signature_image_path+'">';
                $('#docusigned_by').html(data.docusigned_by);
                $('#sigimage').html(signImage);
                $('#sigdate').html(data.created_at);
                //$('#sigid').html(data.id);
            }
        });
        $('#sigdetails').modal('show');
    }


    $('#addComment').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?php echo url("passenger/details") ?>/' + id,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                $('#pfirstname').val(data.firstname);
                $('#plastname').val(data.lastname);
                $('#puserId').val(data.userId);
                $('#commentForm').attr('action', data.formAction);

                var comments = data.comments;

                var html = '';
                if (comments.length) {
                    for (var i = 0; i < comments.length; i++) {
                        html += '<div class="comm_txt">' + comments[i].comment + '</div>';
                        html += '<div>' + comments[i].formatted_created_at + '</div>';
                        html += '<div><a target="_blank" href="../documents/' + comments[i].document + '">' + comments[i].document + '</a></div>';
                        html += '<div class="row"><div class="col-lg-12"><hr></div></div>';
                    }
                } else {
                    html += '<span>No previous comments</span>';
                }

                $('#previousComments').html(html);
            }
        })
    });

    $("form#commentForm").submit(function(e) {
        e.preventDefault();
        var comment = $('#commentForm textarea[name=comment]').val();
        var formData = new FormData(this);
        $.ajax({
            url: $('#commentForm').attr('action'),
            type: 'post',
            data: formData,
            success: function(data) {
                data = JSON.parse(data);
                //console.log(data);
                if (data.success) {
                    $('button[data-dismiss=modal]').trigger('click');
                    $('#commentForm textarea[name=comment]').val('');
                    $('#commentForm textarea[name=comment]').closest('div').find('.alert-msg').html('');
                    $('#document').val('');
                    $('#status_pu').prop('checked', 'checked');
                }
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(response){
                //console.log(response);
                var errors = response.responseJSON.errors;
                $('#commentForm textarea[name=comment]').closest('div').find('.alert-msg').html(errors.comment);
            }
        })
    });


    $("#requestUnderWritting").validate();
</script>
@endsection
