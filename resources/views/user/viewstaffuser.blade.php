@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">{{$heading}}</h1>
            </div>
            <div class="col-lg-4">
                <div class="add_btn_wrap">
                    <a href="{{route('user.staff.create', $userType)}}" class="btn btn-outline-primary btn_filled" id=""><i class="fas fa-plus"></i> Add User</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a href="{{url('user/staff/export/csv/'.$userType)}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('user/staff/export/xlsx/'.$userType)}}">
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
                                <th>Lawfirm Name</th>
                                <th>Name</th>
                                <th>Email Address</th>
                                <th>Contact Number</th>
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
                    <div class="com_heading">Admin Comments</div>
                    <section class="comm_sec">
                        <div class="clearfix">&nbsp;</div>
                        <div id="previousComments"></div>
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
        ajax: "{{ route('user.staff.view.datatable', [$userType]) }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'lawfirm_name'},
            {mData: 'name'},
            {mData: 'email'},
            {mData: 'contact_number'},
            {mData: 'action', sortable: false},
        ],
    })

    $('#dataTable_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, Contact Number'></span>\n\
        </div>"
            );


    $('#addComment').on('show.bs.modal', function(e) {
        var id = $(e.relatedTarget).data('id');
        $.ajax({
            url: '<?php echo url("user/staff/details") ?>/' + id,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);
                $('#firstname').val(data.firstname);
                $('#lastname').val(data.lastname);
                $('#userId').val(data.userId);
                $('#commentForm').attr('action', data.formAction);

                var comments = data.comments;

                var html = '';
                if (comments.length) {
                    for (var i = 0; i < comments.length; i++) {
                        html += '<div class="comm_txt">' + comments[i].comment + '</div>';
                        html += '<div>' + comments[i].created_at + '</div>';
                        if(comments[i].document){
                            html += '<div><a target="_blank" href="../../../documents/' + comments[i].document + '">' + comments[i].document + '</a></div>';
                        }
                        html += '<div class="row"><div class="col-lg-12"><hr></div></div>';
                    }
                } else {
                    html += '<span>No previous comments</span>';
                }

                $('#previousComments').html(html);
            }
        })
    });

    /*$('#addCommentBtn').on('click', function() {
        var comment = $('#commentForm textarea[name=comment]').val();
        $.ajax({
            url: $('#commentForm').attr('action'),
            type: 'post',
            data: {comment: comment, _token: $('input[name=_token]').val()},
            success: function(data) {
                data = JSON.parse(data);
                //console.log(data);
                if (data.success) {
                    $('button[data-dismiss=modal]').trigger('click');
                    $('#commentForm textarea[name=comment]').val('');
                    $('#commentForm textarea[name=comment]').closest('div').find('.alert-msg').html('');
                }
            },
            error: function(response) {
                //console.log(response);
                var errors = response.responseJSON.errors;
                $('#commentForm textarea[name=comment]').closest('div').find('.alert-msg').html(errors.comment);
            }
        })
    });*/

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