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
          <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/csv_icon.png" width="13" height="14" alt="CSV" /> Export to CSV</button>
          <button class="btn btn-outline-primary btn_filled" id="" type="button"><img src="{{ asset('/images/') }}/xls_icon.png" width="13" height="14" alt="XLS" /> Export to Excel</button>
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
                <th>Limit</th>
                <th>Due Month</th>
                <th>Mode of Payment</th>
                <th>Date of Payment</th>
                <th>Paid By</th>
              </tr>
            </thead>
            <tbody>
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
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid--> 
  <!-- /.content-wrapper-->
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center"> <small>Copyright © Your Website 2018</small> </div>
    </div>
  </footer>
  <!-- Scroll to Top Button--> 
  <a class="scroll-to-top rounded" href="#page-top"> <i class="fa fa-angle-up"></i> </a> </div>
@endsection