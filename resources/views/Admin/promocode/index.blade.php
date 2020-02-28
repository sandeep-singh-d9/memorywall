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
                    <h2>Promocode <a href="{{URL::to('promocodes/create')}}"
                            class="pull-right btn btn-primary"> Add promocode</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Promocode</th>
                                    <th>Discount</th>
                                    <th>Discount type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($promocodes) and (count($promocodes) > 0))
                                @php
                                    $i = 1;
                                @endphp
                                @foreach($promocodes as $key => $value)

                                <tr>
                                    <!-- <td>{{ $key+1 }} </td> -->
                                    <td>{{ $i }}</td>
                                    <td>{{ $value->promocode }}
                                    </td>
                                    <td>
                                        {{ $value->discount }}
                                    </td>
                                    <td>
                                        {{ $value->discount_type }}
                                    </td>
                                    <td>
                                        <div class="switch">
                                            <label><input type="checkbox"
                                                    onclick="customChangeStatus(this.value, <?php echo $value->id; ?>, 'promocodes' )"
                                                    value="{{$value->status}}"
                                                    <?php if ($value->status == '1') {echo 'checked';}?>><span
                                                    class="lever"></span></label>
                                        </div>
                                    </td>
                                    <td width="15%" style="text-align: center;">
                                        <a href="{{ route('promocodes.edit',  $value->id) }}" class="tool_tip">
                                            <i data-original-title="Edit" data-toggle="tooltip"
                                                data-placement="top" class="material-icons-outlined">edit</i>
                                        </a>
                                        @if($value->id)
                                        <?php $route = URL::to('promocodes/' . $value->id);
$token = csrf_token();
?>
                                        <a href="#" class="tool_tip"
                                            onclick="deleteValue('<?php echo $route; ?>', this)">
                                            <i class="material-icons-outlined iconDelete"
                                                data-original-title="Delete" data-toggle="tooltip"
                                                data-placement="top">delete</i>

                                        </a>
                                        @endif
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
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