@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">{{$heading}}</h1>
            </div>
            <div class="col-lg-12 p-0">
                <form class="rts_form" id="rides_search" name="rides_search">
                    @csrf
                    <div class="form-group row p-0">
                        <div class="form-group col-sm-3">
                            <label for="passenger_name" class="col-form-label">Search by Passenger</label>
                            <input type="text" class="form-control" id="passenger_name" name="passenger_name" value="{{$pName}}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="passenger_id" class="col-form-label">Search by Passenger ID</label>
                            <input type="text" class="form-control" id="passenger_id" name="passenger_id">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="date_of_birth" class="col-form-label">Search by Date of Birth</label>
                            <input type="text" class="form-control datepicker" name="date_of_birth" id="date_of_birth" autocomplete="off" placeholder="mm-dd-yyyy">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="phone_number" class="col-form-label">Search by Phone Number</label>
                            <input type="text" class="form-control mask-phone" name="phone_number" id="phone_number" placeholder="(___) ___-____" value="" autocomplete="nope" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row p-0">
                        <div class="form-group col-sm-3">
                            <label for="date_of_birth" class="col-form-label">Search by Date of Loss</label>
                            <input type="text" class="form-control datepicker" name="date_of_loss" id="date_of_loss" autocomplete="off" placeholder="mm-dd-yyyy">
                        </div>
                        <div class="form-group col-sm-3">
                            <br><br>
                            <a href="" class="btn btn-link cancel_txt">Cancel</a>
                            <button class="btn btn-outline-primary btn_outline_frm" id="address_search_pp" type="button">Submit</button>
                        </div>
                        <div class="form-group col-sm-3">
                        </div>
                        <div class="form-group col-sm-3">
                        <br>
                            <div class="add_btn_wrap add_btn_wrap_add">
                                <a href="#addComment" data-toggle="modal" class="btn btn-outline-primary btn_filled" id=""><i class="fas fa-plus"></i> Add New Address</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="float-right"> 
                    </div>
                </form>
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a href="{{url('address/export/csv/'.$userType)}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('address/export/xlsx/'.$userType)}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTableRides" width="100%" cellspacing="0">
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
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Search Passenger by Name/Id</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cleartext" id="search_passenger" name="search_passenger" autocomplete="off" required>
                                <img src="{{ url('images/loader.gif') }}" id="pass_loader">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Passenger Id <span class="red">*</span></label>
                            <div class="col-sm-6">
                                <input type="hidden" class="cleartext" id="passenger_id_s" name="passenger_id_s" value="">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="passengerid" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Passenger First Name</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="firstname" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Passenger Last Name</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="lastname" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Passenger Date of Birth</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control-plaintext cleartext" id="dateofbirth" value="" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-6 col-form-label">Passenger Date of Loss</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control-plaintext cleartext" id="dateofloss" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Location Type <span class="red">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control cleartext" name="address_type" id="address_type" required>
                                    <option value="">Select</option>
                                    @foreach($locationType as $val)
                                        <option value="{{ $val }}">{{ $val }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row location_other" style="display:none;">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Other</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cleartext" id="address_type_other" name="address_type_other" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Phone Number <span class="red">*</span><br><span style="font-size:12px;">(if different from mobile phone)</span></label>

                            <div class="col-sm-6">
                                <input type="text" class="form-control mask-phone cleartext" id="phone_number" name="phone_number" placeholder="(___) ___-____" value="" autocomplete="nope" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Business Name <br><span style="font-size:12px;">(if appicable)</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cleartext" id="business_name" name="business_name" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Street 1 <span class="red">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cleartext" id="street1" name="street1" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Street 2 </label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cleartext" id="street2" name="street2" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">City <span class="red">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cleartext" id="city" name="city" value="" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">State <span class="red">*</span></label>
                            <div class="col-sm-6">
                                <select class="form-control" id="state_id" name="state_id" required>
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
                            <label for="staticEmail" class="col-sm-6 col-form-label">Zip Code <span class="red">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control cleartext" id="zip_code" name="zip_code" value="" required>
                            </div>
                        </div> 
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-6 col-form-label">Comments</label>
                            <div class="col-sm-6">
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
                            <button class="btn btn-outline-primary btn_outline_frm" id="addAddressBtn" >Submit</button>
                        </div>
                    </form>
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
});

    var tableCust = $('#dataTableRides').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 10,
        "serverMethod": "post",
        "ajax": {
            "url": "{{ route('address.datatable') }}?_token={{ csrf_token() }}",
            "data": function(data){
              var data_filter = $("#rides_search").serialize();
              data.data_filter = data_filter;
            }
          },
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
    });

    $('#address_search_pp').click( function() {
        tableCust.draw();
    });

    /*$(document).on("click", "#address_search_pp", function(){ 
        $('#dataTableRides').DataTable().clear().draw();
        $('#dataTableRides').DataTable().destroy();
        $('#dataTableRides').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                    "url": "{{ route('address.datatablepost') }}?"+$('#rides_search').serialize(),
                    "type": "POST"
                },
            "columns": [
                { "data": "passenger_id" },
                { "data": "passenger_name" },
                { "data": "address_type" },
                { "data": "mobile_number" },
                { "data": "business_name" },
                { "data": "street" },
                { "data": "city" },
                { "data": "state" },
                { "data": "zip_code" }
            ]
        });
    });*/
      
    function formatPhoneNumber(phoneNumberString) {
      var cleaned = ('' + phoneNumberString).replace(/\D/g, '')
      var match = cleaned.match(/^(\d{3})(\d{3})(\d{4})$/)
      if (match) {
        return '(' + match[1] + ') ' + match[2] + '-' + match[3]
      }
      return null
    }
    
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
                    console.log(data);
                    var passenId = 'P'+("000" + data.id).slice(-3);
                    $('#passengerid').val(passenId);
                    $('#passenger_id_s').val(data.id);
                    $('#firstname').val(data.first_name);
                    $('#lastname').val(data.last_name);
                    $('#dateofloss').val(data.date_of_loss);
                    $('#dateofbirth').val(data.dob);
                    var formPhNum = formatPhoneNumber(data.mobile_number)
                    $('#addressForm #phone_number').val(formPhNum);
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

</script>
@endsection