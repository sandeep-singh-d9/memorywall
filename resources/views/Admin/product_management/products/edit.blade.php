@extends('layouts.app')

@section('content')
<script>
    //Here Form validation [Start]
$(document).ready(function()
{
    $('#form').formValidation({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {	
                product_name: 
                {
                    message: '<?php echo __('language.productName_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.productName_required'); ?>'},
                        }
                },
                product_name_arabic: 
                {
                    message: '<?php echo __('language.productName_arabic_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.productName_arabic_required'); ?>'},
                        }
                },
                product_code: 
                {
                    message: '<?php echo __('language.productCode_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.productCode_required'); ?>'},
                        }
                },
                category: 
                {
                    message: '<?php echo __('language.category_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.category_required'); ?>'},
                        }
                },
                <?php if(Auth::user()->id != 1){ ?>
                status: 
                {
                    message: '<?php echo __('language.status_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.status_required'); ?>'},                           
                        }
                },
            <?php } ?>
                			
		}
    });
});
//Here Form validation [End]
</script>
<?php 
$remove = [];
?>
<div class="container-fluid">
    <!-- <div class="block-header">
        <h2>@lang('language.product')</h2>
    </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- card Start -->
            {!! Form::model($product, ['route' => ['products.update', $product->id], 'files'=> true, 'method' => 'put',
            'id' => 'form', 'name' => 'form', 'autocomplete' => 'off']) !!}
            <div class="card">
                <div class="header">
                    <h2>@lang('language.edit') @lang('language.productAlert')
                        <a href="/products" class="btn btn-primary btn_save pull-right">
                            <i class="material-icons-outlined">keyboard_backspace</i> @lang('language.back')</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>@lang('language.productName') </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('product_name', null ,['class'=>'form-control', 'placeholder' =>
                                    __('language.productName'), 'required' => true]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('product_name') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('product_name_arabic') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('product_name_arabic', null ,['class'=>'form-control', 'placeholder'
                                    => __('language.productNameArabic')]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('product_name_arabic') }}</small>
                            </div>
                        </div>
                    </div>


                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>@lang('language.productDescription') </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('product_description') ? ' has-error' : '' }}">
                                <div>
                                    {!! Form::textarea('product_description', null ,['class'=>'form-control',
                                    'placeholder' => __('language.productDescription'), 'required' => true,
                                    'id'=>'article-ckeditor']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('product_description') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('product_description_arabic') ? ' has-error' : '' }}">
                                <div>
                                    {!! Form::textarea('product_description_arabic', null ,['class'=>'form-control',
                                    'placeholder' => __('language.productDescriptionArabic'),
                                    'id'=>'article-ckeditor1']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('product_description_arabic') }}</small>
                            </div>
                        </div>
                    </div>


                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Product @lang('language.category') </label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('category', $category,
                                    $product->category_id,['class'=>'form-control', 'placeholder' =>
                                    __('language.select').' '.__('language.category'), 'required' => true]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('category') }}</small>
                            </div>
                        </div>
                    </div>



                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Select Status</label>
                            </div>
                        </div>
                        <?php if(Auth::user()->role_id != 2){ ?>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('status', [ 1 => __('language.active'), 0 =>
                                    __('language.inactive')], null ,['class'=>'form-control', 'placeholder' =>
                                    __('language.select').' '.__('language.status'), 'required' => true]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Checkbox for product latest and futured -->

                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>@lang('language.productImage')</label>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group{{ $errors->has('attribute') ? ' has-error' : '' }}">
                                <?php $required = 'required'; ?>
                                <?php $required = ''; ?>
                                <div class="imageBox">
                                    <div id="ab">
                                        <img id="previewimg" src="{{$product->product_image}}" style="float: left" />
                                        <img id="img" src="/stop.png" alt="delete"
                                            onclick="removeImage('{{$product->product_image}}')" style="float: left">
                                    </div>
                                </div>
                                <div id="filediv">
                                    <!-- <input name="file[]" type="file" id="file"/> -->
                                    <input type="file" id="file" name="product_image" accept=".gif, .jpg, .png"
                                        {{$required}}>
                                </div>
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
                            <button type="submit" class="btn btn-primary btn_save">@lang('language.save')</button>
                            <button type="reset"
                                class="btn blue_btn spacebetween btn_edit">@lang('language.reset')</button>
                        </div>
                    </div>
                </div>
                <!-- card End -->
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script>
    var abc = 0; // Declaring and defining global increment variable.
    var removeImagesArray = []
    $(document).ready(function() {
       
        // Following function will executes on change event of file input to select different file.
        $('body').on('change', '#file', function() {
            if (this.files && this.files[0]) {
                $('#ab').remove();
                var x = $('.imageBox').remove();
                $(this).parent().before("<div class='imageBox'><div id='abcd' class='abcd'><img id='previewimg' src='' style='float:left;' /></div></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $("#abcd").append($("<img/>", {
                    id: 'img',
                    src: "{{URL::asset('stop.png')}}",
                    alt: 'delete',
                    style: 'float:left;'
                }).click(function() {
                    $(this).parent().remove();
                }));
            }
             // show add more product image button on click
        });
        // To Preview Image
        function imageIsLoaded(e) {
            $('#previewimg').attr('src', e.target.result);
        };
        $('#upload').click(function(e) {
            var name = $(":file").val();
            if (!name) {
                alert("First Image Must Be Selected");
                e.preventDefault();
            }
        });
    });
function removeImage (key, value) {
        $('#ab').remove();
}
</script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
        CKEDITOR.replace( 'article-ckeditor1' );
        
</script>
@endsection