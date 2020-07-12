@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Outstanding Bills</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a href="{{url('bill/outstanding/export/csv')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('bill/outstanding/export/xlsx')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="1200px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Law Firm Name</th>
                                <th style="">Amount Outstanding</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.topnav_modal')
@endsection


@section('custom_scripts') 
<script>
    var viewActionColumn = '<?php echo $viewActionColumn ?>';

    $('#dataTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#dataTable').dataTable({
        //         "sorting" : true,
        //        "order": [[1, 'asc']],
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('bill.outstanding.datatable') }}", aoColumns: [
            {mData: 'lawfirm_name'},
            {mData: 'amount_outstanding', searchable: false},
            {mData: 'action', sortable: false}
        ],
    })

    var submitEvent;
    document.addEventListener('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
        submitEvent = e;
    })
</script> 
@endsection
