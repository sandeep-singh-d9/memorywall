@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Order details</h2>
                </div>
                <div class="body">
                    @foreach($OrdersDetail as $key => $orderDetail)
                    <div class="order_detail p-0">
                        <h4><b>Name:</b> {{ $orderDetail->orderData->shippingAddress->firstname. ' ' . $orderDetail->orderData->shippingAddress->lastname }} </h4>
                        <h4><b>Order Date:</b> {{ $orderDetail->orderData->ordered_at }} </h4>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Id</th>
                                            <th class="text-center">Original Image</th>
                                            <th class="text-center">Updated Image</th>
                                            <th class="text-center">Product Size</th>
                                            <th class="text-center">Canvas Wrap</th>
                                            <th class="text-center">Canvas Edge</th>
                                            <th class="text-center">Quantity</th>
                                            @if($orderDetail->image_type == 'color')
                                                <th class="text-center">Color Code</th>
                                            @endif
                                            <th class="text-center">Price</th>
                                            <!-- <th class="text-center">Discount</th>
                                            <th class="text-center">Tax</th> -->
                                            <th class="text-center">Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{ $key+1 }}</td>
                                            <td class="text-center">
                                                <img src="{{ $orderDetail->imagePath}}" alt="" title="" style="height:100px">
                                                <a href="/download_image/original/{{ $orderDetail->id}}" target="_blank">download</a>
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ $orderDetail->domImage}}" alt="" title="" style="height:100px">
                                                <a href="/download_image/domImage/{{ $orderDetail->id}}" target="_blank">download</a>
                                            </td>
                                            <td class="text-center">{{  $orderDetail->canvas_height }} x {{  $orderDetail->canvas_width }}</td>
                                            <td class="text-center">{{ $orderDetail->image_type }}</td>
                                            <td class="text-center">{{  $orderDetail->image_type }}</td>
                                            <td class="text-center">{{ $orderDetail->quantity }}</td>
                                            @if($orderDetail->image_type == 'color')
                                                <td class="text-center">{{ $orderDetail->color }}</td>
                                            @endif
                                            <td class="text-center">{{  $orderDetail->price }}</td>
                                            <!-- <td class="text-center">{{ $orderDetail->discount }}</td>
                                            <td class="text-center">{{  $orderDetail->tax_collected }}</td> -->
                                            <td class="text-center">{{ $orderDetail->grand_total }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
