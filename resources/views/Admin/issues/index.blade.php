@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <!-- <div class="block-header">
                <h2>@lang('language.category')</h2>
            </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('Admin.errors.errorMessage')
            <div class="card">
                <div class="header">
                    <h2>Issues
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Order no</th>
                                    <th>Issue no</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($issues) and (count($issues) > 0))
                                @foreach($issues as $key => $value)

                                <tr>
                                    <td>{{ $key+1 }} </td>
                                    <td> {{ $value->user ? $value->user->first_name.' '.$value->user->last_name : '' }} </td>
                                    <td>{{ $value->order_no }}
                                    </td>
                                    <td>
                                        {{ $value->issue_no }}
                                    </td>
                                    <td>
                                        {{ $value->subject }}
                                    </td>
                                    <td>
                                        {{ $value->message }}
                                    </td>
                                    <td>
                                        <img src="{{ $value->imagePath }}" width="100px" alt="" srcset="">
                                    </td>
                                    <td>
                                        {{ $value->status }}
                                    </td>
                                    <td width="15%" style="text-align: center;">
                                        <a href="{{ route('issues.edit',  $value->id) }}" class="tool_tip">
                                            <i data-original-title="Edit" data-toggle="tooltip"
                                                data-placement="top" class="material-icons-outlined">edit</i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                                @else
                                <!-- <tr><td colspan="3" align="center">record not found</td></tr> -->
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Basic Examples -->
</div>

<script>
    function confirmDelete() {
        return confirm("Are you sure want to delete this code.");
    }
</script>
@endsection
