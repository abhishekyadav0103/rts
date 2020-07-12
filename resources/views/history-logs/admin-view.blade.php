@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">History Logs</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a id="export_csv" href="{{url('history-logs/export/csv')}}">
                        <button class="btn btn-outline-primary btn_filled" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a id="export_excel" href="{{url('history-logs/export/xlsx')}}">
                        <button class="btn btn-outline-primary btn_filled" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="historyLogTable" width="1260px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action By</th>
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

    $('#historyLogTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    historyTable = $('#historyLogTable').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('history_logs.datatable') }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'name'},
            {mData: 'created_at'},
            {mData: 'updated_at'},
            {mData: 'created_by'},
            {mData: 'log'}
        ],
    })

    $('#historyLogTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by Name, Action'></span>\n\
        </div>"
    );

    $("#historyLogTable_filter input").keyup( function (e) {
        searchValue = this.value;

        $('#export_excel').attr('href', function(index, attr) {
              return attr.replace(/\?searchValue=.*$/, '') + '?searchValue=' + searchValue;
        });
        $('#export_csv').attr('href', function(index, attr) {
              return attr.replace(/\?searchValue=.*$/, '') + '?searchValue=' + searchValue;
        });
    } );
</script>
@endsection
