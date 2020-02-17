@extends('layouts.app')

@section('content')
<script>
//Here Form validation [Start]
$(document).ready(function()
{
    $('#frm_attributes').formValidation({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {	
                attribute: 
                {
                    message: '<?php echo __('language.attribute_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.attribute_required'); ?>'},
                        }
                },
                attribute_arabic: 
                {
                    message: '<?php echo __('language.attribute_arabic_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.attribute_arabic_required'); ?>'},
                        }
                },
                
					
					
		}
    });
});
//Here Form validation [End]
</script>
<div class="container-fluid">
            <!-- <div class="block-header">
                <h2>@lang('language.attributes')</h2>
            </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>@lang('language.create') @lang('language.productAlert') @lang('language.attribute')
                        <a href="/attributes" class="btn btn-primary btn_save pull-right">@lang('language.back')</a> 
                    </h2>
                </div>
                <div class="body">
                @include('Admin.errors.errorMessage')
                    {!! Form::open(['route' => 'attributes.store', 'id' => 'frm_attributes', 'name' => 'frm_attributes', 'autocomplete' => 'off']) !!}
                        <div class="row clearfix">
                            <div class="col-sm-4">
                                <div class="form-group{{ $errors->has('attribute') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::text('attribute', null ,['class'=>'form-control', 'placeholder' => __('language.attributes')]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('attribute') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group{{ $errors->has('attribute_arabic') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::text('attribute_arabic', null ,['class'=>'form-control', 'placeholder' => __('language.attributeArabic')]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('attribute_arabic') }}</small>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group{{ $errors->has('value') ? ' has-error' : '' }}">
                                    <div class="form-line">
                                    {!! Form::text('value[]', null ,['class'=>'form-control', 'placeholder' => __('language.value')]) !!}
                                    </div>
                                    <small class="text-danger">{{ $errors->first('value') }}</small>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <div class="form-group">
                                    <button type="button" class="btn btn-primary add_more_button" >@lang('language.addValue')</button>
                                </div>
                            </div>
                        </div>
                        <!-- for multiple fields -->
                        <div class="input_fields_container">
                        </div>
                        <div class="row clearfix">
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
<script>
    $(document).ready(function() {
    var max_fields_limit      = 100; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    $('.add_more_button').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            x++; //counter increment
            $('.input_fields_container').append('<div class="row clearfix"><div class="col-sm-4"></div><div class="col-sm-3"></div><div class="col-sm-3"><div class="form-group"><div class="form-line"><input type="text" name="value[]" class="form-control" placeholder="@lang('language.value')" /></div></div></div><div class="col-sm-2"><a href="#" class="remove_field btn btn-danger" style="margin-left:10px;">-</a></div></div>'); //add input field
        }
    });  
    $('.input_fields_container').on("click",".remove_field", function(e){ //user click on remove text links
        e.preventDefault(); $(this).parent().parent().remove(); x--;
    })
});
</script>
@endsection
