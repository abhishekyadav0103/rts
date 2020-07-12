@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Reduction Threshold</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="rts_form" id="reduction_threshhold" name="reduction_threshhold" method="POST" action="{{route('bill.reduction.save')}}">
                    @csrf
                    <div class="form-group row {{ $errors->has('lawfirm') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Law Firm Name <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <select class="form-control" name="lawfirm" id="lawfirm_reduction">
                                <option value="">Please Select</option>

                                @foreach($lawfirms as $id => $lawfirm)
                                <option {{old('lawfirm') == $id ? 'selected' : ''}} value='{{$id}}'>{{$lawfirm}}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('lawfirm', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-form-label">Current Percentage </label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" readonly="readonly" name="defaultsetpercentage" value="" id="defaultsetpercentage">
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('percentage') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">New Percentage <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" maxlength="6" placeholder="" name="percentage" value="{{old('percentage')}}">
                            {!! $errors->first('percentage', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group row {{ $errors->has('comment') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-3 col-form-label">Comments <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="comment" id="comment">{{old('comment')}}</textarea>
                            {!! $errors->first('comment', '<span class="alert-msg">:message</span>') !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <hr>
                        </div>
                    </div>
                    <div class="float-right"> <a href="{{route('bill.reduction')}}" class="btn btn-link cancel_txt">Cancel</a>
                        <button class="btn btn-outline-primary btn_outline_frm" id="" type="submit">Submit</button>
                    </div>
                </form>
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
</div>
@endsection