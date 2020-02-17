@extends('layouts.app')
@section('content')
<script>
    //Here Form validation [Start]
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
                    message: 'Name is required.',
                    validators:
                        {
                            notEmpty:{message: 'Name is required.'},
                        }
                },
                email:
                {
                    message: 'Email field is required.',
                    validators:
                        {
                            notEmpty:{message: 'Email field is required.'},
                            emailAddress: {message: 'Please provide valid email address.'},
                        }
                },
                password:
                {
                    message: 'Password field is required.',
                    validators:
                        {
                            notEmpty:{message: 'Password field is required.'},

                        }
                },
                password_confirmation:
                {
                    message: 'Confirm password field is required.',
                    validators:
                        {
                            notEmpty:{message: 'Confirm password field is required.'},

                        }
                },
                mobile_number:
                {
                    message: 'Mobile number field is required.',
                    validators:
                        {
                            notEmpty:{message: 'Mobile number field is required.'},

                        }
                },



		}
    });
});
//Here Form validation [End]
</script>
<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>User
                        <a href="/users" class="btn btn-primary btn_save pull-right"><i
                                class="material-icons-outlined">keyboard_backspace</i> Back</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    {!! Form::open(['route' => 'users.store','name' => 'frm_user','id' => 'frm_user']) !!}
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('name') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('name' , null ,['class' => 'form-control', 'placeholder' =>'name','id' => 'name']) !!}
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
                                    {!! Form::email('email' , null ,['class' => 'form-control', 'placeholder' =>'email','required' => 'required']) !!}
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
                                    'placeholder' =>'password','required' => 'required']) !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::input('password', 'password_confirmation' , null ,['class' =>
                                    'form-control', 'placeholder' =>'confirm password','required' => 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Select Country Code</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('country_code') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('country_code',$country_code,966, ['class' =>
                                    'form-control','required' => 'required']); !!}
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
                                    =>'mobile number','required' => 'required']) !!}
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
                                    {!! Form::select('role_id', $roles, 2); !!}
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
