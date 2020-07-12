@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container-fluid"> 
    <!-- Breadcrumbs-->
    <div class="row">
      <div class="col-lg-8 p-0">
        <h1 class="page_title">Edit</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <form class="rts_form" method="POST" action="">
          @csrf
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">First Name <span class="red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="John" name="firstname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Last Name <span class="red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Doe" name="lastname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Supervisor Name <span class="red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Shane Warne" name="supervisorname" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Email Address <span class="red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="john.doe@gmail.com" name="emailaddress" value="">
            </div>
          </div>
          <div class="form-group row">
            <label for="" class="col-sm-3 col-form-label">Contact Number <span class="red">*</span></label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="(541) 754-3010" name="contactnumber" value="">
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <hr>
            </div>
          </div>
          <div class="float-right"> <a href="{{route('passenger_request.index')}}" class="btn btn-link cancel_txt">Cancel</a>
            <button class="btn btn-outline-primary btn_outline_frm" id="" type="button">Save</button>
          </div>
        </form>
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
          <a class="btn btn-outline-primary btn_outline_frm" href="login.html">Logout</a> </div>
      </div>
    </div>
  </div>
</div>
@endsection