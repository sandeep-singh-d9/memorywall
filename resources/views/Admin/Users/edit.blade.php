@extends('layouts.app')
@section('content')
<script>
    /*Here open popup of view all Faq detail*/
$(document).ready(function()
{
    $('#frm_user').formValidation({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {
                name:
                {
                    message: 'Please enter name.',
                    validators:
                        {
                            notEmpty:{message: 'Please enter name.'},
                        }
                },

                email:
                {
                    message: 'Please enter email.',
                    validators:
                        {
                            notEmpty:{message: 'Please enter email.'},
                            emailAddress: {message: 'Please enter valid email.'},
                        }
                },
                password:
                {
                    message: 'Please enter password.',
                    validators:
                        {
                            notEmpty:{message: 'Please enter password.'},

                        }
                },
                password_confirmation:
                {
                    message: 'Please enter confirm password.',
                    validators:
                        {
                            notEmpty:{message: 'Please enter confirm password.'},

                        }
                },
                phone:
                {
                    message: 'Please enter mobile number.',
                    validators:
                        {
                            notEmpty:{message: 'Please enter mobile number.'},

                        }
                },



		}
    });
});
</script>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>@lang('language.edit') @lang('language.user')
                        <a href="/users" class="btn btn-primary btn_save pull-right"><i
                                class="material-icons-outlined">keyboard_backspace</i> @lang('language.back')</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    {!! Form::model($users , ['route' => ['users.update', $users->id,],'name' => 'frm_user','id' =>
                    'frm_user', 'method' => 'put']) !!}
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('name' , null ,['class' => 'form-control', 'placeholder' =>'Name','required' => 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Email</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('email') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::email('email' , null ,['class' => 'form-control', 'placeholder' =>'Email', 'readonly' => 'true']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Password</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('password') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::input('password','password' , null ,['class' => 'form-control',
                                    'placeholder' =>'Password']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::input('password', 'password_confirmation' , null ,['class' =>
                                    'form-control', 'placeholder' =>'Reset password']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Country Code</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('country_code') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('country_code', $country_code, $users->country_code, ['class' =>
                                    'form-control']);
                                    !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Mobile</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('phone') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::number('phone' , null ,['class' => 'form-control', 'placeholder'
                                    =>'Mobile number','required' => 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Role</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('role_id') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('role_id',$roles); !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="1">
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>&nbsp;</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn_save">Save</button>
                            <button type="reset"
                                class="btn blue_btn  spacebetween btn_edit">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
