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
            <div class="alert alert-success" id="reduce-success" style="display:none;"></div>
            <div class="alert alert-danger" id="reduce-error" style="display:none;"></div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Law Firm Name</th>
                                <th style="">Amount Outstanding</th>
                                <!-- <th style="">Limit</th>
                                <th>Client Name</th> -->
                                <!--<th style="text-align:center;">New Passengers<br/>--> 
                                <!--<small>in a trailing past 30 days vs 90 days</small></th>-->
                                <!-- <th style="">Avg. Reduction %</th> -->
                                <th style="text-align:center;">Avg. Time to pay in months</th> 
                                <!--<th>State</th>--> 
                                <!--<th style="text-align:center;">No. of open cases</th>-->
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

<!--Reduce Bill Popup-->
<div class="modal fade" id="reduceBill" tabindex="-1" role="dialog" aria-labelledby="reduceBillModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reduceBillModalLabel">Reduce Bill</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
            </div>
            <div class="modal-body view_form">
                <form method="post" id="reduceBillForm" action="{{route('bill.reducebillcomment')}}" enctyped="multipart/form-data">
                    {{ csrf_field() }} 
                    <!--<p>Demo PayPal form - Integrating paypal in laravel</p>-->
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Client Name</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control" id="client_name" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Limit </label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control" name="limit" id="limit">
                            <span class="alert-msg"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Due Month</label>
                        <div class="col-sm-7">
                            <input type="text" readonly class="form-control" name="due_month" id="due_month">
                            <span class="alert-msg"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Requested Amount <span class="red">*</span></label></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="requested_amount" id="requested_amount" required>
                            <span class="alert-msg"></span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="staticEmail" class="col-sm-5 col-form-label">Comments <span class="red">*</span></label></label>
                        <div class="col-sm-7">
                            <textarea name="comment" id="comment" class="form-control" required></textarea>
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
                    <div class="modal-footer">
                        <input type="hidden" name="passengerId" id="passengerId">
                        <input type="hidden" name="lawfirmId" id="lawfirmId">
                        <input type="hidden" name="created_on" id="created_on">
                        <input type="hidden" name="billId" id="billId">
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
                        <button class="btn btn-outline-primary btn_outline_frm" id="updateBillBtnReduce" type="submit">Submit</button>
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
            //{mData: 'transportation_limit'},
            //{mData: 'passenger_name'},
            {mData: 'avg_time_to_pay'},
            //{mData: 'action', sortable: false, visible: viewActionColumn},
        ],
        "order": [[1, 'asc']]
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

//    $('#dataTable_filter label').append("\
//        <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, Contact Number'></span>\n\
//        </div>"
//            );

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


    $('#reduceBill').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        var status = $(e.relatedTarget).data('title');
        $.ajax({
            url: '<?php echo url("bill/reducebill") ?>/' + id,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                var passengerId = data.passenger_id;
                $('#passengerId').val(passengerId);
                $('#billId').val(data.bill_id);
                $('#client_name').val(data.lawfirm_name);
                $('#limit').val(data.limit);
                $('#due_month').val(data.due_month);
                $('#lawfirmId').val(data.lawfirm_id);
                $('#created_on').val(data.created_on);
            }
        })
    });

    $("form#reduceBillForm").submit(function(e) {
        e.preventDefault();
        var comment = $('#reduceBillForm textarea[name=comment]').val();
        var formData = new FormData(this);
        $.ajax({
            url: $('#reduceBillForm').attr('action'),
            type: 'post',
            data: formData,
            success: function(data) {
                data = JSON.parse(data);
                if (data.status) {
                    $('#dataTable').DataTable().ajax.reload();
                    $('#reduce-error').hide();
                    $('#reduce-success').html(data.msg);
                    $('#reduce-success').show();
                    $('button[data-dismiss=modal]').trigger('click');
                    $('#commentForm textarea[name=comment]').val('');
                    $('#commentForm textarea[name=comment]').closest('div').find('.alert-msg').html('');
                    $('#document').val('');
                } else {
                    $('#reduce-success').hide();
                    $('#reduce-error').html(data.msg);
                    $('#reduce-error').show();
                }
                setTimeout(function(){
                    $('#reduce-success').hide();
                    $('#reduce-error').hide();
                }, 2000);
            },
            cache: false,
            contentType: false,
            processData: false,
            error: function(response){
                var errors = response.responseJSON.errors;
                $('#commentForm textarea[name=comment]').closest('div').find('.alert-msg').html(errors.comment);
            }
        })
    });

</script> 
@endsection
