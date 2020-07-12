@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Law Firm Users</h1>
            </div>
<!--            <div class="col-lg-4">
                <div class="add_btn_wrap">
                    <button class="btn btn-outline-primary btn_filled" id="" type="button"><i class="fas fa-plus"></i> Add User</button>
                </div>
            </div>-->
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a href="{{url('user/lawfirm/export/csv')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('user/lawfirm/export/xlsx')}}">
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
                                <th>Law Firm ID</th>
                                <th>Name</th>
<!--                                <th style="text-align:center">Law Firm "Internal Comment"<br/>
                                    (A-F scale)</th>-->
                                <th>Title</th>
                                <th>Firm Name</th>
                                <th>Email Address</th>
                                <th>State of License Issuance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
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
                    <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                </div>
                <div class="modal-body view_form">
                    <form method="post" action="" id="commentForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">First Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="firstname" value="John">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Last Name</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="lastname" value="Doe">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">User ID</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="userId" value="001">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-5 col-form-label">Law Firm ID</label>
                            <div class="col-sm-7">
                                <input type="text" readonly class="form-control-plaintext" id="lawFirmId" value="LF001">
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
                                <input type="file" name="document" id="document">
                                <span class="alert-msg"></span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-5 col-form-label">Document Status</label>
                            <div class="col-sm-7">
                                <input type="radio" id="status_pu" name="status" value="1" checked> Public
                                <input type="radio" id="status_pr" name="status" value="2"> Private
                                <span class="alert-msg"></span>
                            </div>
                        </div>
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
                    <section class="comm_sec">
                        <div class="clearfix">&nbsp;</div>
                        <div id="previousComments"></div>
                        <!--<div class="comm_txt">Approved and status is Active now</div>-->
                        <!--                        <div>03-05-2018 09:08:21</div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <hr>
                                                    </div>
                                                </div>-->
                        <!--                        <div class="comm_txt">Lorem ipsum comments will come here</div>
                                                <div>03-05-2018 09:08:21</div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="comm_txt">Lorem ipsum comments will come here</div>
                                                <div>03-05-2018 09:08:21</div>
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <hr>
                                                    </div>
                                                </div>
                                                <div class="comm_txt">Lorem ipsum comments will come here</div>
                                                <div>03-05-2018 09:08:21</div>-->
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom_scripts')
<script>

    $('#dataTable').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#dataTable').dataTable({
//         "sorting" : true,
//        "order": [[1, 'asc']],
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.lawfirm.datatable') }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'name'},
            {mData: 'title'},
            {mData: 'firm_name'},
            {mData: 'email'},
            {mData: 'license_issuance_state'},
            {mData: 'action', sortable: false},
        ],
//        "language": {
////            "lengthMenu": '_MENU_ bản ghi trên trang',
////            "search": '<i class="fa fa-search"></i>',
//            "searchPlaceholder": "Search by Passenger ID, Name, Email, Gender, DOB, Mobile Number, Status",
//        },
//        "oLanguage": {
//            "sSearch": "<span>YOUR SEARCH TITLE HERE:</span> _INPUT_" //search
//        }
    })

    $('#dataTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Title, Firm Name, Email, State of License Issuance'></span>\n\
        </div>"
            );

    $('#addComment').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?php echo url("user/lawfirm/details") ?>/' + id,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);
                $('#userId').val(data.userId);
                $('#lawFirmId').val(data.lawFirmId);
                $('#commentForm').attr('action', data.formAction);

                var comments = data.comments;

                var html = '';
                if (comments.length) {
                    for (var i = 0; i < comments.length; i++) {
                        html += '<div class="comm_txt">' + comments[i].comment + '</div>';
                        html += '<div>' + comments[i].created_at + '</div>';
                        html += '<div><a target="_blank" href="../../documents/' + comments[i].document + '">' + comments[i].document + '</a></div>';
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

</script>
@endsection
