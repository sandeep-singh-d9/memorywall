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
                    <h2>Edit Issue
                        <a href="/issues" class="btn btn-primary btn_save pull-right"><i class="material-icons-outlined">keyboard_backspace</i> Back</a>
                    </h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    {!! Form::model($issue, ['route' => ['issues.update', $issue->id], 'method' =>
                    'put', 'name' => 'frm_promocode', 'id' => 'frm_promocode', 'files' => true]) !!}
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Order no.</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{ $issue->order_no }}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Issue no.</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{ $issue->issue_no }}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Subject</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{ $issue->subject }}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Message</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            {{ $issue->message }}
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Image</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <img src="{{ $issue->imagePath }}" width="100px" alt="" srcset="">
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <label>Response</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group{{ $errors->has('response') ? ' has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::textarea('response', null ,['class'=>'form-control', 'placeholder' =>'Response']) !!}
                                </div>
                                <small class="text-danger">{{ $errors->first('response') }}</small>
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
                            <button type="submit" class="btn btn-primary btn_save">Send</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
