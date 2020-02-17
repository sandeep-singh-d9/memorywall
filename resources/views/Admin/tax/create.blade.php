@extends('layouts.app')

@section('content')
<script>
//Here Form validation [Start]
$(document).ready(function()
{
    $('#frm_tax').formValidation({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {	
                tax_name: 
                {
                    message: '<?php echo __('language.taxName_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.taxName_required'); ?>'},
                        }
                },
                tax_name_arabic: 
                {
                    message: '<?php echo __('language.taxName_arabic_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.taxName_arabic_required'); ?>'},
                        }
                },
                tax_rate: 
                {
                    message: '<?php echo __('language.taxRate_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.taxRate_required'); ?>'},
                        }
                },
                status: 
                {
                    message: '<?php echo __('language.status'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.status'); ?>'},
                        }
                }, 			
					
		}
    });
});
//Here Form validation [End]
</script>

<div class="container-fluid">
            <!-- <div class="block-header">
                <h2>@lang('language.tax')</h2>
            </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>@lang('language.create') @lang('language.tax')
                        <a href="/tax" class="btn btn-primary btn_save pull-right">@lang('language.back')</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    {!! Form::open(['route' => 'tax.store','name' => 'frm_tax','id' => 'frm_tax']) !!}
                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('tax_name') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::text('tax_name', null ,['class'=>'form-control', 'placeholder' => __('language.taxName')]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('tax_name') }}</small>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('tax_name_arabic') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::text('tax_name_arabic', null ,['class'=>'form-control', 'placeholder' => __('language.taxNameArabic')]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('tax_name_arabic') }}</small>
                                </div>
                            </div>

                        </div>


                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('tax_description') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::textarea('tax_description', null ,['class'=>'form-control', 'placeholder' => __('language.taxDescription'), 'rows'=>3]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('tax_description') }}</small>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('tax_description_arabic') ? ' has-error' : '' }}">
                                        <div class="form-line">
                                        {!! Form::textarea('tax_description_arabic', null ,['class'=>'form-control', 'placeholder' => __('language.taxDescriptionArabic'), 'rows'=>3]) !!}
                                        </div>
                                        <small class="text-danger">{{ $errors->first('tax_description_arabic') }}</small>
                                    </div>
                            </div>

                        </div>

                        <div class="row clearfix">
                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('tax_rate') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::number('tax_rate', null ,['class'=>'form-control', 'placeholder' => __('language.taxRate'), 'min' => 0]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('tax_rate') }}</small>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::select('status', [ 1 => __('language.active'), 0 => __('language.inactive')], null ,['class'=>'form-control', 'placeholder' => __('language.status')]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('status') }}</small>
                                </div>
                            </div>

                        </div>


                        <div class="clearfix">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary pull-right btn_save">@lang('language.save')</button>
                                    <button type="reset" class="btn blue_btn pull-right spacebetween btn_edit">@lang('language.reset')</button>
                                </div>
                            </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
