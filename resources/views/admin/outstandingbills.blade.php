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
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="1200px" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Law Firm Name</th>
                                <th style="">Amount Outstanding</th>
                                <th style="">Passenger by status type</th>
                                <th style="text-align:center;">New Passengers<br/><small>in a trailing past 30 days vs 90 days</small></th> 
                                <th style="">Total amount Paid</th>
                                <th style="">Avg. Reduction %</th>
                                <th style="text-align:center;">Avg. Time to pay in months</th> 
                                <th>State</th>
                                <th style="text-align:center;">No. of open cases</th>
                                <!-- <th>Action</th> -->
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('partials.topnav_modal') 

<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Payment Form</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body view_form">
                <form method="post" id="paymentForm" action="{{route('payment.paypal')}}">
                    {{ csrf_field() }} 
                    <!--<p>Demo PayPal form - Integrating paypal in laravel</p>-->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Enter Amount</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="amount">
                            <span class="alert-msg"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-outline-primary btn_outline_frm" id="paymentBtn" type="button">Pay with Paypal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateBillModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Outstanding Bill</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body view_form">
                <form method="post" id="updateBillForm" action="">
                    {{ csrf_field() }} 
                    <!--<p>Demo PayPal form - Integrating paypal in laravel</p>-->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Current Amount</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control-plaintext" id="currentAmount" value="">
                            <input type="hidden" id="rid" name="rid" value="">
                            <input type="hidden" id="pid" name="pid" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Updated Amount <span class="red">*</span></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="amount">
                            <span class="alert-msg"></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-outline-primary btn_outline_frm" id="updateBillBtn" type="button">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



@section('custom_scripts') 
<script>
    var viewActionColumn = '<?php echo $viewActionColumn ?>';

    $('#dataTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    function format ( d ) {
        var childTable = '';
        childTable += '<table cellpadding="5" cellspacing="0" border="0" style="padding-left:50px;width:100%;">';
        childTable +=  '<tr>'+
                '<th>Client Name</th>'+
                '<th>Limit</th>'+
                '<th>Ride Amount</th>'+
                '<th>Action</th>'+
            '</tr>';
        childTable += d.passenger; 
        childTable += '</table>';

        return childTable;
    }

    var table = $('#dataTable').DataTable({
        //         "sorting" : true,
        //        "order": [[1, 'asc']],
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('bill.outstanding.datatable') }}", aoColumns: [
            {
                "className":      'details-control',
                "orderable":      false,
                "mData":           null,
                "defaultContent": '', 
                "sortable": false
            },
            {mData: 'lawfirm_name'},
            {mData: 'amount_outstanding', searchable: false},
            {mData: 'passenger_by_status', sortable: false, searchable: false},
            {mData: 'new_passenger', searchable: false},
            {mData: 'amount_paid', searchable: false},
            {mData: 'avg_reduction', searchable: false},
            {mData: 'avg_time_to_pay', searchable: false},
            {mData: 'state', searchable: false},
            {mData: 'open_cases', searchable: false}
            //{mData: 'action', sortable: false, visible: viewActionColumn},
        ],
    });

    $('#dataTable tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );
 
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );

    var submitEvent;
    document.addEventListener('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
        submitEvent = e;
    })

    $('#paymentModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var validateUrl = '<?php echo route('payment.validate') ?>/' + id;
        var url = '<?php echo route('payment.paypal') ?>/' + id;
        $('#paymentBtn').on('click', function() {
            $(this).unbind(submitEvent);

            $.ajax({
                url: validateUrl,
                method: 'post',
                data: {_token: $('#paymentForm input[name=_token]').val(), amount: $('#paymentForm input[name=amount]').val()},
                success: function(data) {
                    $('#paymentForm').attr('action', url);
                    $('#paymentForm').submit();
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    $('#paymentForm input[name=amount]').closest('div').find('.alert-msg').html(errors.amount);
                }
            });
        });
    });

    $('#updateBillModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var url = '{{ route("bill.outstanding.update", ":id") }}';
        url = url.replace(':id', id);

        $('#currentAmount').val($(e.relatedTarget).data('value'));
        $('#updateBillForm input[name=amount]').val($(e.relatedTarget).data('requested'));
        $('#rid').val($(e.relatedTarget).data('rid'));
        $('#pid').val($(e.relatedTarget).data('pid'));

        $('#updateBillBtn').on('click', function() {
            $(this).unbind(submitEvent);

            $.ajax({
                url: url,
                method: 'post',
                data: {_token: $('#updateBillForm input[name=_token]').val(), amount: $('#updateBillForm input[name=amount]').val(), rid:$('#rid').val(), pid:$('#pid').val()},
                success: function(data) {
                    window.location.reload();
                },
                error: function(response) {
                    var errors = response.responseJSON.errors;
                    $('#updateBillForm input[name=amount]').closest('div').find('.alert-msg').html(errors.amount);
                }
            });
        });
    });

</script> 
@endsection
