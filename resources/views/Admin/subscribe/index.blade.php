@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="block-header">
        <h2>@lang('language.orders')</h2>
    </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('Admin.errors.errorMessage')
            <div class="card">
                <div class="header">
                    <h2>Subscribers
                    <!-- <a href="{{URL::to('products/create')}}" class="pull-right btn btn-primary">@lang('language.create')</a> -->
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribe as $key => $value)
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $value->email }}</td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
