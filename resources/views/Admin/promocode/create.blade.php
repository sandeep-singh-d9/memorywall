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
    <!-- <div class="block-header">
                <h2>@lang('language.category')</h2>
            </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Create Promocode
                        <a href="/category" class="btn btn-primary btn_save pull-right"><i class="material-icons-outlined">keyboard_backspace</i> Back</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    {!! Form::open(['route' => 'promocodes.store', 'files' => true, 'id' => 'frm_promocode', 'name' =>
                    'frm_promocode']) !!}
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Promocode</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('promocode') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('promocode', null ,['class'=>'form-control', 'placeholder' =>
                                    'Promocode']) !!}
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
                                    'Inactive'], null ,['class'=>'form-control', 'placeholder' =>
                                    'Status']) !!}
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
                            <button type="submit" class="btn btn-primary btn_save">Save</button>
                            <button type="reset"
                                class="btn blue_btn  spacebetween btn_edit">Reset</button>
                        </div>
                    </div>
                    {!! Form::Close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
