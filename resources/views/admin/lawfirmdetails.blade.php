@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">{{ $lawfirm->name }} Detail</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                </div>
            </div>
        </div>
        @if(count($lawfirmClientStatuses))
            @foreach($lawfirmClientStatuses as $statuses)
            <div class="row">
                <div class="col-12">
                @if($statuses->application_id == 1)
                    <h2 class="sub_title">RTS Summary</h2>
                @else
                    <h2 class="sub_title">RX Summary</h2>
                @endif
                    <div class="table-responsive">
                        <table class="table table-striped" width="1200px" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Active</th>
                                    <th>Denied</th>
                                    <th>Close Paid</th>
                                    <th>Closed Paid Pending Payment</th>
                                    <th>Undertaking Provided</th>
                                    <th>Under Review</th>
                                </tr>
                            </thead>
                            <tr>
                                <td>{{ $statuses->active_request}}</td>
                                <td>{{ $statuses->denied_request}}</td>
                                <td>{{ $statuses->closed_request}}</td>
                                <td>{{ $statuses->pending_request}}</td>
                                <td>{{ $statuses->undertaking_provided}}</td>
                                <td>{{ $statuses->under_review}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            @endforeach
        @endif
        <div class="row">
            <div class="col-12">
            <h2 class="sub_title">Authorized Users</h2>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable_authorized_user" width="1200px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Title</th>
                                <th>Email Address</th>
                                <!--th>Bar Number</th-->
                                <th>State of License Issuance</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <h2 class="sub_title">Lawfirm Users</h2>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable_regular_user" width="1200px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User Title</th>
                                <th>Email Address</th>
                                <!--th>Bar Number</th-->
                                <th>State of License Issuance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div class="row">
            <div class="col-12">
            <h2 class="sub_title">Passenger List</h2>
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable_passenger_request" width="1200px" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Passenger Name</th>
                                <th>Status</th>
                                <th>Email Address</th>
                                <th>Passenger DOB</th>
                                <th>SSN</th>
                                <th>Passenger Mobile Number</th>
                                <th>Passenger Alternate Number</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <br/>
        <br/>
        <div style="text-align:center;"><img src="{{ url('images/loader.gif') }}" id="pass_loader"></div>
        
        <div id="passenger_details" style="display:none;">
            <h2 class="sub_title">Dashboard</h2>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">See Bills</label>
                <div class="col-sm-3">
                    <span class="text_grey" id="dashboard_1"></span>
                </div>
                <label for="staticEmail" class="col-sm-2 col-form-label">% Reduction</label>
                <div class="col-sm-3">
                    <span class="text_grey" id="dashboard_2"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Average Time to Pay</label>
                <div class="col-sm-3">
                    <span class="text_grey" id="dashboard_3"></span>
                </div>
                <label for="staticEmail" class="col-sm-2 col-form-label">Total Outstanding</label>
                <div class="col-sm-3">
                    <span class="text_grey" id="dashboard_4"></span>
                </div>
            </div>
            <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Total Charged by Passenger</label>
                <div class="col-sm-3">
                    <span class="text_grey" id="dashboard_5"></span>
                </div>
                <label for="staticEmail" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-3">
                    <span class="text_grey"></span>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">
                    <label class="col-form-label">Call Center Professional Comments</label>
                    <div id="call_center_prof_comments"></div>
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Bookkeeper Comments</label> 
                    <div id="bookkeeper_comments"></div>
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Case Manager Comments</label>
                    <div id="case_mgr_comments"></div>
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Admin Comments</label> 
                    <div id="admin_comments"></div>
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Lawfirm Comments</label> 
                    <div id="lawfirm_comments"></div>
                </div>
                <div class="col-sm-3">
                    <label class="col-form-label">Other Comments</label> 
                    <div id="other_comments"></div>
                </div>
            </div>
        </div>
        <h2 class="sub_title">Reduction Threshold</h2>
        <label class="col-form-label">Reduction Percentage: {{ !empty($lawfirm->default_reduction_percentage) ? $lawfirm->default_reduction_percentage : 10 }}</label>
        <br>
        <label class="col-form-label bold">Reduction Threshold Comments:</label>
        <div class="container-fluid">
            <div class="form-group row">
                <div class="col-sm-6">
                    @foreach($redThresholdCm as $redThresholdCmmnt)
                        <div class="text_grey">{{ $redThresholdCmmnt->comment }}</div>
                        <div>{{ date('n-d-Y H:i:s', strtotime($redThresholdCmmnt->created_at)) }}</div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            <h2 class="sub_title">Lawfirm Notes</h2>
                <div class="table-responsive">
                    @if(!empty($lawfirm->notes))
                        {{ $lawfirm->notes }}
                    @else
                        No notes available.
                    @endif
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
                    </section>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('custom_scripts')
<script>

    //Authorized User
    $('#dataTable_authorized_user').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#dataTable_authorized_user').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.lawfirm.id.user.datatable', [$lawfirm->id, 1]) }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'title'},
            {mData: 'email'},
            /*{mData: 'bar_number'},*/
            {mData: 'license_issuance_state'}
        ],
    })

    $('#dataTable_authorized_user_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Title, Email, State of License Issuance'></span>\n\
        </div>"
            );

    //Regular User
    $('#dataTable_regular_user').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#dataTable_regular_user').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('user.lawfirm.id.user.datatable', [$lawfirm->id, 0]) }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'title'},
            {mData: 'email'},
            /*{mData: 'bar_number'},*/
            {mData: 'license_issuance_state'},
            {mData: 'action', sortable: false},
        ],
    })

    $('#dataTable_regular_user label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Title, Email, State of License Issuance'></span>\n\
        </div>"
            );

    $('#dataTable_passenger_request').tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    $('#dataTable_passenger_request').dataTable({
        pageLength: 10,
        processing: true,
        serverSide: true,
        ajax: "{{ route('passenger_request.lawfirm.id.datatable', $lawfirm->id) }}",
        aoColumns: [
            {mData: 'id'},
            {mData: 'name'},
            {mData: 'status'},
            {mData: 'email'},
            {mData: 'dob'},
            {mData: 'ssn'},
            {mData: 'mobile_number'},
            {mData: 'alternate_number'}
        ],
    })

    $('#dataTable_passenger_request_filter label').append("\
            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, Gender, DOB and Mobile Number'></span>\n\
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
        });
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


    $('#dataTable_passenger_request tbody').on('click', 'tr', function () {
        var id = this.id;
        $("#pass_loader").show();
        $.ajax({
            url: '<?php echo url("user/lawfirm/passenger") ?>/' + id,
            type: 'get',
            success: function(data) {
                data = JSON.parse(data);

                $('#dashboard_1').html(data.dashboard_1);
                $('#dashboard_2').html(data.dashboard_2);
                $('#dashboard_3').html(data.dashboard_3);
                $('#dashboard_4').html(data.dashboard_4);
                $('#dashboard_5').html(data.dashboard_5);
                $('#call_center_prof_comments').html(data.call_center_prof_comments);
                $('#bookkeeper_comments').html(data.bookkeeper_comments);
                $('#case_mgr_comments').html(data.case_mgr_comments);
                $('#admin_comments').html(data.admin_comments);
                $('#lawfirm_comments').html(data.lawfirm_comments);
                $('#other_comments').html(data.other_comments);

                $('#passenger_details').show();
                $("#pass_loader").hide();
            },
            error: function() {
                $('#passenger_details').hide();
                $("#pass_loader").hide();
            }
        })
    });

</script>
@endsection
