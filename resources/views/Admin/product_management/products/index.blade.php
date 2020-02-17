@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <!-- <div class="block-header">
                <h2>@lang('language.product')</h2>
            </div> -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            @include('Admin.errors.errorMessage')
            <div class="card">
                <div class="header">
                    <h2>@lang('language.product') <a href="{{URL::to('products/create')}}"
                            class="pull-right btn btn-primary">@lang('language.addValue')
                            @lang('language.productAlert')</a>
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>@lang('language.id')</th>
                                    <th>@lang('language.productName')</th>
                                    <th>@lang('language.productDescription')</th>
                                    <th>@lang('language.tax')</th>
                                    <!-- <th>@lang('language.price')</th>
                                    <th>@lang('language.weight')</th> -->
                                    <?php if(Auth::user()->id == 1){ ?>
                                    <th>@lang('language.status')</th>
                                    <?php } ?>
                                    <th>@lang('language.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($products) and (count($products) > 0))
                                @php
                                $i =1;
                                @endphp
                                @foreach($products as $product)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <!-- <td >{{ $product->id }} </td> -->
                                    <td>{{ $product->product_name }}</td>
                                    <td>{!! $product->product_description !!}</td>
                                    <td>{{ $product->tax_id ? $product->getTax->tax_rate . ' %' : '' }}</td>
                                    <!-- <td>{{ $product->price }}</td>
                                        <td>{{ $product->weight }}</td> -->
                                    <!-- <td>{{ ucfirst($product->status ? 'Active' : 'Inactive') }}</td> -->
                                    <?php if(Auth::user()->role_id != 2){ ?>
                                    <td>
                                        <div class="switch">
                                            <label><input type="checkbox"
                                                    onclick="customChangeStatus(this.value, <?php echo $product->id; ?>, 'products' )"
                                                    value="{{$product->status}}"
                                                    <?php if ($product->status == '1') {echo 'checked';}?>><span
                                                    class="lever"></span></label>
                                        </div>
                                    </td>
                                    <?php } ?>
                                    <td width="15%" style="text-align: center;">
                                        <a href="{{ route('products.edit', $product->id) }}" class="tool_tip">
                                            <i class="material-icons-outlined" data-toggle="tooltip" data-placement="top"
                                                data-original-title="{{ __('language.edit')}}">edit</i>
                                        </a>
                                        @if($product->id)
                                        <?php $route = URL::to('products/'.$product->id);
                                            $token = csrf_token();
                                        ?>
                                        <a href="#" class="tool_tip"
                                            onclick="deleteValue('<?php echo $route; ?>', this)">
                                            <i class="material-icons-outlined iconDelete" data-toggle="tooltip"
                                                data-placement="top"
                                                data-original-title="{{ __('language.delete')}}">delete</i>
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
        return confirm("<?php echo __('language.deleteMessage'); ?>");
    }
</script>
@endsection