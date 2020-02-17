@extends('layouts.app')

@section('content')
<script>
//Here Form validation [Start]
$(document).ready(function()
{
    $('#frm_role').formValidation({
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
		fields: {
            role_name:
            {
                message: 'Role name field required.',
                validators:
                    {
                        notEmpty:{message: 'Role name field required.'},
                    }
            },



		}
    });
});
//Here Form validation [End]
</script>

<div class="container-fluid">
    <!-- <div class="block-header">
        <h2>@lang('language.roles')</h2>
    </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Edit User Roles
                        <a href="/roles" class="btn btn-primary btn_save pull-right"><i class="material-icons-outlined">keyboard_backspace</i>Back</a>
                    </h2>
                </div>
                <div class="body">
                @include('Admin.errors.errorMessage')
                    {!! Form::model($rolesDetails, array('route' => array('roles.update', $rolesDetails->id), 'method' => 'PUT', 'name' => 'frm_role', 'id' => 'frm_role')) !!}
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Role Name</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('role_name') ? ' has-error' : '' }}">
                                <div class="form-line">
                                {!! Form::text('role_name', null ,['class'=>'form-control', 'placeholder' => 'Role Name']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('role_name') }}</small>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>&nbsp;</label>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            @foreach($menus as $key=>$value)
                                <div style="margin-bottom:20px;">
                                    <?php
$id = 'basic_checkbox_ ' . ($key + 1);
// dd($value->id);
?>
                                        <!-- <input type="checkbox" value="permissions[]" id="{{ $id }}"> -->
                                    {{  Form::checkbox('permissions[]',$value->id, $permission, array('id' =>$id)) }}
                                    @if($value->parent_id == null)
                                    <label for="{{ $id }}"><strong>
                                        {{ $value->menu }}
                                    </strong></label>
                                    @else
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for="{{ $id }}">
                                        {{ $value->menu }}
                                    </label>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="clearfix row">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>&nbsp;</label>
                            </div>
                        </div>
                        <div class="col-sm-4 text-left">
                        <button type="submit" class="btn btn-primary btn_save ">Update</button>
                        <!-- <button type="reset" class="btn blue_btn">@lang('language.reset')</button> -->
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection