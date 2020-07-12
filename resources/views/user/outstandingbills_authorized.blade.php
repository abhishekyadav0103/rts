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
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>Passenger Name</th>
                              <!--  <th>Initial Sign-up Date</th>
                                <th>Last Activity Date</th>-->
                                <th style="">Amount Outstanding</th>
                                <th>Total Paid</th>
                                <th style="text-align:center;">Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
            <p class="botton_text_bill">* Current balance may not reflect transaction not yet processed.</p>
        </div>
    </div>
</div>

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
                            <input type="text" class="form-control" name="amount" id="payamount" readonly>
                            <span class="payment_text">If you need to discuss payment options, please call us at 1-833-RUBY-RIDES or email us at info@rubylegalgroup.com and reference User ID: [<span id="ins_user_id"></span>]</span>
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
            {mData: 'passenger_id'},
            {mData: 'passenger_name'},          
            {mData: 'amount_outstanding', searchable: false},
            {mData: 'total_current_charges', searchable: false},
            {mData: 'action', searchable: false},
        ],
    })

	// {mData: 'created_at', searchable: false},
	// {mData: 'updated_at', searchable: false},

    var submitEvent;
    document.addEventListener('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
        submitEvent = e;
    })

    $('#paymentModal').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var outsAmount = $(e.relatedTarget).data('amt');
        var insUserId = $(e.relatedTarget).data('pid');
        var validateUrl = '<?php echo route('payment.validate') ?>/' + id;
        $('#payamount').val(outsAmount);
        $('#ins_user_id').html(insUserId);
        var url = '<?php echo route('payment.paypal') ?>/' + id;
        $('#paymentBtn').on('click', function() {
            $(this).unbind(submitEvent);

			//alert(validateUrl);

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

        $('#updateBillBtn').on('click', function() {
            $(this).unbind(submitEvent);

            $.ajax({
                url: url,
                method: 'post',
                data: {_token: $('#updateBillForm input[name=_token]').val(), amount: $('#updateBillForm input[name=amount]').val()},
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
