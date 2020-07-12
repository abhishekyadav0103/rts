@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container-fluid"> 
    <!-- Breadcrumbs-->
    <div class="row">
      <div class="col-lg-8 p-0">
        <h1 class="page_title">Case Managers</h1>
      </div>
      <div class="col-lg-4">
        <div class="add_btn_wrap">
          <button class="btn btn-outline-primary btn_filled" id="" type="button"><i class="fas fa-plus"></i> Add User</button>
        </div>
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
                <th>User ID</th>
                <th>Name</th>
                <th>Email Address</th>
                <th>Contact Number</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>CM001</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/activate_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Activate" /></a> <a href="" data-toggle="modal" data-target="#addNotes"><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM002</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/deactivate_icon.png" width="14" height="14" alt="Deactivate" data-toggle="tooltip" data-placement="bottom" title="Deactivate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM003</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/activate_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Activate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM004</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/deactivate_icon.png" width="14" height="14" alt="Deactivate" data-toggle="tooltip" data-placement="bottom" title="Deactivate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM005</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/activate_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Activate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM006</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/deactivate_icon.png" width="14" height="14" alt="Deactivate" data-toggle="tooltip" data-placement="bottom" title="Deactivate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM007</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/activate_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Activate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM008</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/deactivate_icon.png" width="14" height="14" alt="Deactivate" data-toggle="tooltip" data-placement="bottom" title="Deactivate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM009</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/activate_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Activate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
              </tr>
              <tr>
                <td>CM010</td>
                <td>John Doe</td>
                <td><a href="mailto:johndoe@gmail.com">johndoe@gmail.com</a></td>
                <td><a href="">1-541-754-3010</a></td>
                <td class="grid_ico"><a href=""><img src="{{ asset('/images/') }}/edit_icon.png" width="14" height="14" alt="Edit" data-toggle="tooltip" data-placement="bottom" title="Edit" /></a> <a href=""><img src="{{ asset('/images/') }}/deactivate_icon.png" width="14" height="14" alt="Deactivate" data-toggle="tooltip" data-placement="bottom" title="Deactivate" /></a> <a href=""><img src="{{ asset('/images/') }}/comment_icon.png" width="16" height="14" alt="Notes" data-toggle="tooltip" data-placement="bottom" title="Notes" /></a></td>
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
  <a class="scroll-to-top rounded" href="#page-top"> <i class="fa fa-angle-up"></i> </a> 
  <!-- Logout Modal-->
  <div class="modal fade" id="addComment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Comment</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        <div class="modal-body view_form">
          <form>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">First Name</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" id="" value="John">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">Last Name</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" id="" value="Doe">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">User ID</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" id="" value="001">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">Law Firm ID</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" id="" value="LF001">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-5 col-form-label">Comments</label>
              <div class="col-sm-7">
                <textarea class="form-control"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <hr>
              </div>
            </div>
            <div class="float-right">
              <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
              <button class="btn btn-outline-primary btn_outline_frm" id="" type="button">Submit</button>
            </div>
          </form>
          <div class="clearfix">&nbsp;</div>
          <div class="clearfix">&nbsp;</div>
          <div class="com_heading">Admin Comments</div>
          <section class="comm_sec">
            <div class="clearfix">&nbsp;</div>
            <div class="comm_txt">Approved and status is Active now</div>
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
            <div>03-05-2018 09:08:21</div>
            <div class="row">
              <div class="col-lg-12">
                <hr>
              </div>
            </div>
            <div class="comm_txt">Lorem ipsum comments will come here</div>
            <div>03-05-2018 09:08:21</div>
          </section>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal-->
  <div class="modal fade" id="addNotes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Notes</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
        </div>
        <div class="modal-body view_form">
          <form>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">Passenger ID</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" id="" value="1103">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">Passenger First Name</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" id="" value="John">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">Passenger Last Name</label>
              <div class="col-sm-7">
                <input type="text" readonly class="form-control-plaintext" id="" value="Doe">
              </div>
            </div>
            <div class="form-group row">
              <label for="staticEmail" class="col-sm-5 col-form-label">Status</label>
              <div class="col-sm-7"> <span class="badge badge-danger badge_active">Active</span> </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-5 col-form-label">Notes</label>
              <div class="col-sm-7">
                <textarea class="form-control"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12">
                <hr>
              </div>
            </div>
            <div class="float-right">
              <button class="btn btn-outline-primary btn_outline_frm" id="" type="button" data-dismiss="modal">Close</button>
              <button class="btn btn-outline-primary btn_outline_frm" id="" type="button">Submit</button>
            </div>
          </form>
          <div class="clearfix">&nbsp;</div>
          <div class="clearfix">&nbsp;</div>
          <div class="com_heading">Case Manager Notes</div>
          <section class="comm_sec">
            <div class="clearfix">&nbsp;</div>
            <div class="comm_txt">Approved and status is Active now</div>
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
            <div>03-05-2018 09:08:21</div>
            <div class="row">
              <div class="col-lg-12">
                <hr>
              </div>
            </div>
            <div class="comm_txt">Lorem ipsum comments will come here</div>
            <div>03-05-2018 09:08:21</div>
          </section>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection