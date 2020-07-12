@extends('layouts.app')

@section('content')
<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 p-0">
        <h1 class="page_title">RX Register</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <form class="rts_form" method="post" action="" id="lawfirm">
            @csrf
            <div class="sub_title">Law Firm Details</div>
            <div class="form-group row {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Law Firm Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Law Firm Name" name="name" value="{{old('name',$user->name)}}">
                    {!! $errors->first('name', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('firstname') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">First Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" value="{{old('firstname',$user->firstname)}}">
                    {!! $errors->first('firstname', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('lastname') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Last Name <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" value="{{old('firstname',$user->lastname)}}">
                    {!! $errors->first('lastname', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Law Firm Email Address <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="example@example.com" name="email" value="{{old('email',$user->statement_email)}}">
                    {!! $errors->first('email', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('contact_number') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Primary Contact Number <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="mask-phone form-control" placeholder="(___) ___-____" name="contact_number" value="{{old('contact_number',$user->contact_number)}}">
                    {!! $errors->first('contact_number', '<span class="alert-msg">:message</span>') !!} </div>
                <div class="col-sm-3"><i class="far fa-question-circle header_ico help_txt" data-toggle="tooltip" data-placement="right" title="e.g. (541) 754-3010"></i></div>
            </div>
            <div class="form-group row {{ $errors->has('address1') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Street 1 <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Street 1" name="address1" value="{{old('address1',$user->street1)}}">
                    {!! $errors->first('address1', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('address2') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Street 2</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="Street 2" name="address2" value="{{old('address2',$user->street2)}}">
                    {!! $errors->first('address2', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('city') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">City <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="City" name="city" value="{{old('city',$user->city)}}">
                    {!! $errors->first('city', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('state') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">State <span class="red">*</span></label>
                <div class="col-sm-4">
                    <select class="form-control" name="state">
                        <option value=''>Please Select</option>

                        @foreach($states as $id => $state)

                        <option {{$user->state_id == $id ? 'selected' : ''}} value='{{$id}}'>{{$state}}</option>

                        @endforeach

                    </select>
                    {!! $errors->first('state', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('zip') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">ZIP Code <span class="red">*</span></label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" placeholder="ZIP Code" maxlength="10" name="zip" value="{{old('zip',$user->zip_code)}}">
                    {!! $errors->first('zip', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
            <div class="form-group row {{ $errors->has('notes') ? 'has-error' : '' }}">
                <label for="" class="col-sm-3 col-form-label">Notes <!-- <span class="red">*</span> --></label>
                <div class="col-sm-4">
                    <textarea class="form-control" name="notes" >{{old('notes',$user->notes)}}</textarea>
                    {!! $errors->first('zip', '<span class="alert-msg">:message</span>') !!} </div>
            </div>
			
			<div class="form-group {{ $errors->has('agree') ? 'has-error' : '' }}">
				<div class="form-check">
					<label class="form-check-label login_tc">
						<input class="form-check-input" type="checkbox" name="rxagree" {{old('agree') ? ' checked' : ''}}>
                    With submission of this form, I agree to Ruby Legal Group 
							<a href="{{url('terms')}}">terms and conditions.</a></label>
                                    {!! $errors->first('agree', '<br><span class="alert-msg">:message</span>') !!}
				</div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <hr/>
                </div>
            </div>
            <div class="float-right">
                <a href="{{route('login')}}" class="btn btn-outline-primary btn_outline_frm">Cancel</a>
                <button class="btn btn-outline-primary btn_outline_frm" id="saveLawFirm" type="button">Submit</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>
  <!-- /.container-fluid--> 
  <!-- /.content-wrapper--> 
  
@endsection