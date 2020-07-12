@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Paid Bills</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="export_wrap">
                    <a href="{{url('bill/paid/export/xlsx')}}">
                        <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
                    </a>
                    <a href="{{url('bill/paid/export/xlsx')}}">
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
                                <th>Amount</th>
                                <!--<th>Limit</th>-->
                                <!--<th>Due Month</th>-->
                                <th>Mode of Payment</th>
                                <th>Date of Payment</th>
                                <th>Paid By</th>
                            </tr>
                        </thead>
<!--                        <tbody>
                            <tr>
                                <td>Jones Day</td>
                                <td>$2620</td>
                                <td>$900</td>
                                <td>October</td>
                                <td>Credit Card</td>
                                <td>09/02/2018</td>
                                <td>Hary Day</td>
                            </tr>
                            <tr>
                                <td>Hogan Lovells</td>
                                <td>$2543</td>
                                <td>$950</td>
                                <td>November</td>
                                <td>Net Banking</td>
                                <td>08/16/2018</td>
                                <td>Jasmine</td>
                            </tr>
                            <tr>
                                <td>Hogan Lovells</td>
                                <td>$2767</td>
                                <td>$950</td>
                                <td>November</td>
                                <td>Debit Card</td>
                                <td>08/16/2018</td>
                                <td>Jasmine</td>
                            </tr>
                            <tr>
                                <td>Jones Day</td>
                                <td>$2620</td>
                                <td>$900</td>
                                <td>October</td>
                                <td>Paypal</td>
                                <td>09/02/2018</td>
                                <td>Hary Day</td>
                            </tr>
                            <tr>
                                <td>Jones Day</td>
                                <td>$2620</td>
                                <td>$900</td>
                                <td>October</td>
                                <td>Credit Card</td>
                                <td>09/02/2018</td>
                                <td>Hary Day</td>
                            </tr>
                            <tr>
                                <td>Hogan Lovells</td>
                                <td>$2543</td>
                                <td>$950</td>
                                <td>November</td>
                                <td>Net Banking</td>
                                <td>08/16/2018</td>
                                <td>Jasmine</td>
                            </tr>
                            <tr>
                                <td>Hogan Lovells</td>
                                <td>$2767</td>
                                <td>$950</td>
                                <td>November</td>
                                <td>Debit Card</td>
                                <td>08/16/2018</td>
                                <td>Jasmine</td>
                            </tr>
                            <tr>
                                <td>Jones Day</td>
                                <td>$2620</td>
                                <td>$900</td>
                                <td>October</td>
                                <td>Paypal</td>
                                <td>09/02/2018</td>
                                <td>Hary Day</td>
                            </tr>
                            <tr>
                                <td>Hogan Lovells</td>
                                <td>$2767</td>
                                <td>$950</td>
                                <td>November</td>
                                <td>Debit Card</td>
                                <td>08/16/2018</td>
                                <td>Jasmine</td>
                            </tr>
                            <tr>
                                <td>Jones Day</td>
                                <td>$2620</td>
                                <td>$900</td>
                                <td>October</td>
                                <td>Paypal</td>
                                <td>09/02/2018</td>
                                <td>Hary Day</td>
                            </tr>
                        </tbody>-->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('partials.topnav_modal')

<!-- /.container-fluid--> 
<!-- /.content-wrapper-->
<!--    <footer class="sticky-footer">
        <div class="container">
            <div class="text-center"> <small>Copyright © Your Website 2018</small> </div>
        </div>
    </footer>-->
<!-- Scroll to Top Button--> 
<!--<a class="scroll-to-top rounded" href="#page-top"> <i class="fa fa-angle-up"></i> </a> </div>-->
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
        ajax: "{{ route('bill.paid.datatable') }}",
        aoColumns: [
            {mData: 'lawfirm_name'},
            {mData: 'amount'},
            {mData: 'payment_mode', sortable: false, searchable: false},
            {mData: 'payment_date'},
            {mData: 'paid_by'},
        ],
    })

//    $('#dataTable_filter label').append("\
//            <span class='far fa-question-circle header_ico' data-toggle='tooltip' data-placement='right' title='Search by ID, Name, Email, Contact Number'></span>\n\
//        </div>"
//            );

</script>
@endsection