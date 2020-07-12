@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 p-0">
        <h1 class="page_title">Passenger Request</h1>
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
                <th>Email Address</th>
                <th>Passenger DOB</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>P001</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P002</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P003</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P004</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P005</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P006</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P007</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P008</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P009</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
              <tr>
                <td>P010</td>
                <td>John Doe</td>
                <td>john.doe@gmail.com</td>
                <td>09/02/1987</td>
                <td><a href=""><img src="{{ asset('/images/') }}/asso_icon.png" width="17" height="14" alt="Schedule a ride" data-toggle="tooltip" data-placement="bottom" title="Associate/Schedule a ride" /></a></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.container-fluid--> 
  <!-- /.content-wrapper--> 
  
  <!-- Scroll to Top Button--> 
  <a class="scroll-to-top rounded" href="#page-top"> <i class="fa fa-angle-up"></i> </a> 
  <!-- Logout Modal-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-outline-primary btn_outline_frm" type="button" data-dismiss="modal">Close</button>
          <a class="btn btn-outline-primary btn_outline_frm" href="{{ url('/admin/login') }}">Logout</a> </div>
      </div>
    </div>
  </div>
</div>
@endsection