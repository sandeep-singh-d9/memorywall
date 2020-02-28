@extends('layouts.app')

@section('content')
<script>
    //Here Form validation [Start]
$(document).ready(function()
{
    $('#frm_promocode').formValidation({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {
            promocode:
                {
                    message: 'Promocode is required!',
                    validators:
                        {
                            notEmpty:{message: 'Promocode field is required!'},
                        }
                },
            discount:
                {
                    message: 'Discount is requred!',
                    validators:
                        {
                            notEmpty:{message: 'Discount field is re'},
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
                    <h2>Edit Promocode
                        <a href="/promocodes" class="btn btn-primary btn_save pull-right"><i class="material-icons-outlined">keyboard_backspace</i> Back</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    {!! Form::model($promocode, ['route' => ['promocodes.update', $promocode->id], 'method' =>
                    'put', 'name' => 'frm_promocode', 'id' => 'frm_promocode', 'files' => true]) !!}
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Promocode</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('promocode') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('promocode', null ,['class'=>'form-control', 'placeholder' =>'Promocode']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('promocode') }}</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('discount', null ,['class'=>'form-control', 'placeholder'
                                    => 'Discount']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('discount') }}</small>
                            </div>
                        </div>

                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Select discount type</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('discount_type') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('discount_type', [ 'price' => 'Price', 'percentage' =>
                                    'Percentage'], null ,['class'=>'form-control', 'placeholder' =>'Discount type']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('discount_type') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Select Status</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('status', [ 1 => 'Active', 0 =>
                                    'Inactive'], null ,['class'=>'form-control', 'placeholder' =>'Select status']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>&nbsp;</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn_save">Update</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
