@extends('layouts.app')

@section('content')
<script>
    //Here Form validation [Start]
$(document).ready(function()
{
    $('#frm_category').formValidation({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {	
            category_name: 
                {
                    message: '<?php echo __('language.categoryName_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.categoryName_required'); ?>'},
                        }
                },
                category_name_arabic: 
                {
                    message: '<?php echo __('language.categoryName_arabic_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.categoryName_arabic_required'); ?>'},
                        }
                },
                status: 
                {
                    message: '<?php echo __('language.status_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.status_required'); ?>'},
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
                    <h2>@lang('language.add') @lang('language.category')
                        <a href="/category" class="btn btn-primary btn_save pull-right"><i class="material-icons-outlined">keyboard_backspace</i> @lang('language.back')</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    {!! Form::open(['route' => 'category.store', 'files' => true, 'id' => 'frm_category', 'name' =>
                    'frm_category']) !!}
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Category Name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('category_name') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('category_name', null ,['class'=>'form-control', 'placeholder' =>
                                    __('language.categoryName')]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('category_name') }}</small>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('category_name_arabic') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('category_name_arabic', null ,['class'=>'form-control', 'placeholder'
                                    => __('language.categoryNameArabic')]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('category_name_arabic') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Select Parent Category</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('parent_category') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('parent_category', $parentCategory, null,['class'=>'form-control',
                                    'placeholder' => __('language.parentCategory')]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('parent_category') }}</small>
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
                                    {!! Form::select('status', [ 1 => __('language.active'), 0 =>
                                    __('language.inactive')], null ,['class'=>'form-control', 'placeholder' =>
                                    __('language.status')]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Choose Image</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('category_image') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    <input type="file" id="category_image" class="form-control" name="category_image">
                                </div>
                                <small class="text-danger">{{ $errors->first('category_image') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="" id="preview" height="60px">
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>&nbsp;</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary btn_save">@lang('language.save')</button>
                            <button type="reset"
                                class="btn blue_btn  spacebetween btn_edit">@lang('language.reset')</button>
                        </div>
                    </div>
                    {!! Form::Close() !!}
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#preview').hide();
        $('#category_image').change(function () {
            readURL(this);
        })
    });
    function readURL(input) {
        $('#preview').show();
        if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#preview').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
        }
    }   
</script>
@endsection