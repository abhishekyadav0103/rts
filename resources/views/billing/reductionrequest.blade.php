@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Reduction Request</h1>
            </div>
            <div class="col-lg-4">
                <div class="add_btn_wrap">
                    
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="alert alert-success" id="reduce-success" style="display:none;"></div>
            <div class="alert alert-danger" id="reduce-error" style="display:none;"></div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped" id="loadreductionrequest" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Bill Amount</th>
                                <th>Actual Amount</th>
                                <th>Comments</th>
                                <th>Document</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid--> 
    <!-- /.content-wrapper-->
    <!--    <footer class="sticky-footer">
            <div class="container">
                <div class="text-center"> <small>Copyright © Your Website 2018</small> </div>
            </div>
        </footer>-->

    @include('partials.topnav_modal')

    <!-- Modal-->
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
    <!-- Modal-->

</div>
@endsection


@section('custom_scripts')
<script>

    $('#loadreductionrequest').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#loadreductionrequest').dataTable({
        "sorting" : true,
        "order": [[0, 'desc']],
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('bill.reduction.request.datatable') }}",
        aoColumns: [
            {mData: 'bill_amount'},
            {mData: 'amount_approved'},
            {mData: 'comment', sortable: false},
            {mData: 'document', sortable: false},
            {mData: 'status'},
            {mData: 'action', sortable: false},
        ],
    })

    $('#dataTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, Contact Number'></span>\n\
        </div>");
    var submitEvent;
    document.addEventListener('keydown', function(e) {
        if (e.keyCode == 13) {
            e.preventDefault();
        }
        submitEvent = e;
    })

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