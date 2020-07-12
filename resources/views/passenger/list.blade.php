@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Passenger List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a href="{{url('passenger/export/csv')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('passenger/export/xlsx')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="passengerListTable" width="1150px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Passenger Name</th>
                                <th>Email Address</th>
                                <th>Date of Loss</th>                                
                                <th>Lawfirm Name</th>
                                <th>Passenger Mobile No.</th>
                                <th>Passenger Alternate No.</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>   

@include('partials.topnav_modal')

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
@endsection
@section('custom_scripts')
<script>

    $('#passengerListTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });
  
    $('#passengerListTable').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('passenger_list.datatable') }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'name'},
            {mData: 'email'}, 
            //{mData: 'dob'},
            {mData: 'date_of_loss'},           
            {mData: 'lawfirm_name'},
            {mData: 'mobile_number'},
            {mData: 'alternate_mobile_number'},
            {mData: 'status'},
        ],
    })

    $('#passengerTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, DOB and Mobile Number'></span>\n\
        </div>"
            );

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
</script>
@endsection
