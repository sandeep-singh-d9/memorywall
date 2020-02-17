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
                productImage: 
                {
                    message: '<?php echo __('language.productImage_required'); ?>',
                    validators: 
                        {
                            notEmpty:{message: '<?php echo __('language.productImage_required'); ?>'},
                           
                        }
                },
                	
					
		}
    });
});
//Here Form validation [End]
</script>
<div class="container-fluid">
    <!-- <div class="block-header">
        <h2>@lang('language.product')</h2>
    </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <!-- card Start -->
            {!! Form::open(['route' => 'products.store', 'files'=> true, 'id' => 'form', 'name' => 'form',
            'autocomplete' => 'off']) !!}
            <div class="card">
                <div class="header">
                    <h2>@lang('language.add') @lang('language.productAlert')
                        <a href="/products" class="btn btn-primary btn_save pull-right"><i
                                class="material-icons-outlined">keyboard_backspace</i> @lang('language.back')</a>
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
                                <div class="form-line">
                                    {!! Form::textarea('product_description', null ,['class'=>'form-control',
                                    'placeholder' => __('language.productDescription'), 'rows'=>3, 'required' => true,
                                    'id' => 'article-ckeditor']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('product_description') }}</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('product_description_arabic') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::textarea('product_description_arabic', null ,['class'=>'form-control',
                                    'placeholder' => __('language.productDescriptionArabic'), 'rows'=>3, 'id' =>
                                    'article-ckeditor1']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('product_description_arabic') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Category</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('category', $category, null ,['class'=>'form-control',
                                    'placeholder' => __('language.select').' '.__('language.category'), 'required' =>
                                    true]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('category') }}</small>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Status</label>
                            </div>
                        </div>
                        <?php if(Auth::user()->role_id != 2){ ?>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::select('status', [ 1 => __('language.active'), 0 =>
                                    __('language.inactive')], null ,['class'=>'form-control', 'placeholder' =>
                                    __('language.status'), 'required' => true]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Price</label>
                            </div>
                        </div>
                        <?php if(Auth::user()->role_id != 2){ ?>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('price', null ,['class'=>'form-control', 'placeholder' =>
                                    __('language.price'), 'min' => 0, 'required' => true]) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('status') }}</small>
                            </div>
                        </div>
                        <?php } ?>
                    </div>

                    <!-- Checkbox for product latest and futured -->
                    {{-- <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label> @lang('language.isLatest') </label>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('is_latest') ? ' has-error' : '' }}">
                    <div class="switch">
                        <label>
                            @lang('language.no')
                            {!! Form::checkbox('is_latest',null) !!}
                            <span class="lever"></span>
                            @lang('language.yes')
                        </label>
                        <!-- <label>OFF<input type="checkbox" checked=""><span class="lever"></span>ON</label> -->
                    </div>
                    <small class="text-danger">{{ $errors->first('is_latest') }}</small>
                </div>
            </div>
        </div>
        <div class="row clearfix">
            <div class="col-md-3 text-right">
                <div class="form-group">
                    <label> @lang('language.isFeatured') </label>
                </div>
            </div>

            <div class="col-md-4">
                <div class="form-group{{ $errors->has('is_futured') ? ' has-error' : '' }}">
                    <div class="switch">
                        <label>
                            @lang('language.no')
                            {!! Form::checkbox('is_futured',null) !!}
                            <span class="lever"></span>
                            @lang('language.yes')
                        </label>
                    </div>
                    <small class="text-danger">{{ $errors->first('is_futured') }}</small>
                </div>
            </div>
        </div>
        --}}


        <div class="row clearfix">
            <div class="col-md-3 text-right">
                <div class="form-group">
                    <label>@lang('language.productImage')</label>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group{{ $errors->has('attribute') ? ' has-error' : '' }}">
                    <div id="filediv">
                        <input type="file" id="file" name="product_image" accept=".gif, .jpg, .png" required>
                    </div>
                </div>
            </div>
            {{-- <button type="button" class="btn btn-warning" id="add_more">@lang('language.addMoreImage')</button> --}}
        </div>
        <div class="row clearfix">
            <div class="col-md-3 text-right">
                <div class="form-group">
                    <label>&nbsp;</label>
                </div>
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary btn_save">@lang('language.save')</button>
                <button type="reset" class="btn blue_btn spacebetween btn_edit">@lang('language.reset')</button>
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
    $(document).ready(function() {
    var max_fields_limit      = 100; //set limit for maximum input fields
    var x = 1; //initialize counter for text box
    var y = 1;
   

    $('.add_more_button_specification').click(function(e){ //click event on add more fields button having class add_more_button
        e.preventDefault();
        if(x < max_fields_limit){ //check conditions
            $('.input_fields_container_specification').append('<div class="row clearfix"><div class="col-sm-2"><div class="form-group"><div class="form-line"><input class="form-control" placeholder="@lang('language.key')" name="key_'+y+'" type="text"></div><small class="text-danger"></small></div></div><div class="col-sm-2"><div class="form-group"><div class="form-line"><input class="form-control" placeholder="@lang('language.keyArabic')" name="key_arabic_'+y+'" type="text"></div><small class="text-danger"></small></div></div><div class="col-sm-2"><div class="form-group"><div class="form-line"><input class="form-control" placeholder="@lang('language.value')" name="value_'+y+'" type="text"></div><small class="text-danger"></small></div></div><div class="col-sm-2"><div class="form-group"><div class="form-line"><input class="form-control" placeholder="@lang('language.valueArabic')" name="value_arabic_'+y+'" type="text"></div><small class="text-danger"></small></div></div><div class="col-sm-2"><div class="form-group"><button type="button" class="btn btn-danger remove_field add_more_button pull-right" >@lang('language.removeValue')</button></div></div></div>');
            y++;
        }

        $('.input_fields_container_specification').on("click",".remove_field", function(e){ //user click on remove text links
            e.preventDefault(); $(this).parent().parent().parent().remove(); y--;
        })
    });


});
</script>

<script>
    var abc = 0; // Declaring and defining global increment variable.
    $(document).ready(function() {
        $('#add_more').hide(); // hide add more product image button on click
        //  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
        $('#add_more').click(function() {
            $(this).before($("<div/>", {
                id: 'filediv'
            }).fadeIn('slow').append($("<input/>", {
                name: 'product_image[]',
                type: 'file',
                id: 'file',
                required: true
            }), $("<br/><br/>")));
            $('#add_more').hide(); // hide add more product image button on click
        });
        // Following function will executes on change event of file input to select different file.
        $('body').on('change', '#file', function() {
            if (this.files && this.files[0]) {
                abc += 1; // Incrementing global variable by 1.
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $(this).hide();
                $("#abcd" + abc).append($("<img/>", {
                    id: 'img',
                    src: "{{URL::asset('stop.png')}}",
                    alt: 'delete'
                }).click(function() {
                    $(this).parent().parent().remove();
                }));
            }
            $('#add_more').show(); // show add more product image button on click
        });
        // To Preview Image
        function imageIsLoaded(e) {
            $('#previewimg' + abc).attr('src', e.target.result);
        };
        $('#upload').click(function(e) {
            var name = $(":file").val();
            if (!name) {
                alert("First Image Must Be Selected");
                e.preventDefault();
            }
        });
    });
</script>
<script>
    CKEDITOR.replace( 'article-ckeditor' );
    CKEDITOR.replace( 'article-ckeditor1' );
</script>
@endsection