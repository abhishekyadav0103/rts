@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Lawfirm List</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a href="{{url('lawfirm/export/csv')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('lawfirm/export/xlsx')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="lawfirmListTable" width="1260px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Lawfirm Name</th>
                                <th>Lawfirm ID</th>
                                <th>Active Since</th>
                                <th>Total Outstanding</th>
                                <th>Total Paid</th>
                                <th>Total Lawfirm Users</th>
                                <th>Open Cases</th>
                                <th>Closed Cases</th>
                                <th>Avg. Reduction %</th>
                                <th>Drop %</th>
                                <th>New Cases past 30 days vs 90 days</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>   

@include('partials.topnav_modal')
@endsection

@section('custom_scripts')
<script>

    $('#lawfirmListTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });
  
    $('#lawfirmListTable').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('lawfirm.datatable') }}",
        aoColumns: [
            {mData: 'name'},
            {mData: 'code'},
            {mData: 'created_at'},
            {mData: 'total_outstanding'},
            {mData: 'total_paid'},
            {mData: 'total_lawfirm_users'},
            {mData: 'open_cases'},
            {mData: 'closed_cases'},
            {mData: 'avg_reduction'},
            {mData: 'drop'},
            {mData: 'new_cases'},
            {mData: 'action'},
        ],
    })

    $('#lawfirmTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, DOB and Mobile Number'></span>\n\
        </div>"
    );
</script>
@endsection
