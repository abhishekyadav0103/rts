@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <div class="container-fluid"> 
        <!-- Breadcrumbs-->
        <div class="row">
            <div class="col-lg-8 p-0">
                <h1 class="page_title">Email settings</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form class="rts_form" method="POST" action="{{route('email_settings.save')}}" id="email_settings">
                    @csrf
                    <div class="form-group row {{ $errors->has('email_frequency') ? 'has-error' : '' }}">
                        <label for="" class="col-sm-4 col-form-label">Set Email Receiving Preference <span class="red">*</span></label>
                        <div class="col-sm-4">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="email_frequency" id="inlineRadio1" value="weekly" {{old('email_frequency', @$emailSetting->email_frequency)== 'weekly' || @$not_set == true ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineRadio1">Weekly</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="email_frequency" id="inlineRadio2" value="monthly" {{old('email_frequency', @$emailSetting->email_frequency)== 'monthly' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineRadio1">Monthly</label>
                            </div>
                            <!--div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="email_frequency" id="inlineRadio3" value="yearly" {{old('email_frequency', @$emailSetting->email_frequency)== 'yearly' ? 'checked' : ''}}>
                                <label class="form-check-label" for="inlineRadio1">Yearly</label>
                            </div-->
                            <div class="clearfix"></div>
                            {!! $errors->first('email_frequency', '<span class="alert-msg">:message</span>') !!} </div>
                    </div>

                    <!--div class="form-group row">

                        <div class="col-sm-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="disable_all_mails" value="1" {{old('disable_all_mails', @$emailSetting->disable_all_mails)== 1 ? 'checked' : ''}}>
                                    <label class="form-check-label" for=""> If you do not wish to receive emails, unsubscribe here </label>
                            </div>
                            <div class="clearfix"></div>
                            {!! $errors->first('disable_all_mails', '<span class="alert-msg">:message</span>') !!}
                        </div>

                    </div-->
                    <div class="row">
                        <div class="col-lg-12">
                            <hr/>
                        </div>
                    </div>
                    <div class="float-right">
                        <a href="{{route('email_settings.index')}}" class="btn btn-link cancel_txt">Cancel</a>
                        <button class="btn btn-outline-primary btn_outline_frm" id="saveEmailSettings" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@include('partials.topnav_modal')


