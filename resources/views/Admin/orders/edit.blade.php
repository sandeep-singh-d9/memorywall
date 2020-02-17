@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                {!! Form::model($orders->order_detail, ['route' => ['orders.update', $orders->id], 'files'=> true, 'method' => 'put']) !!}
            <div class="card">
                <div class="header">
                    <h2>Edit order</h2>
                </div>
                <div class="body">
                    @include('Admin.errors.errorMessage')
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group{{ $errors->has('quantity') ? 'has-error' : '' }}">
                                <div class="form-line">
                                    {!! Form::text('quantity' , null ,['class' => 'form-control', 'placeholder' =>'quantity','required' => 'required']) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary pull-right btn_save">Save</button>
                            <button type="reset"
                                class="btn blue_btn pull-right spacebetween btn_edit">Reset</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
