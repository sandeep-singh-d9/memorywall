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
                    <h2>Orders
                    <!-- <a href="{{URL::to('products/create')}}" class="pull-right btn btn-primary">@lang('language.create')</a> -->
                    </h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Payment mothod</th>
                                    <th>Subtotal</th>
                                    <th>Tax</th>
                                    <!-- <th>Discount</th> -->
                                    <th>Grandtotal</th>
                                    <th>status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ $key + 1 }} </td>
                                    <td>{{ $order->shippingAddress->firstname. ' ' . $order->shippingAddress->lastname }}</td>
                                    <td>{{ $order->ordered_at }}</td>
                                    <td>{{ $order->payment_method = 1 ? 'Cash On Delivery' : 'Card' }}</td>
                                    <td>{{ $order->price }}</td>
                                    <td>{{ $order->tax_collected }}</td>
                                    <!-- <td>{{ $order->discount }}</td> -->
                                    <td>{{ $order->grand_total }}</td>
                                    <td id="statusChange">{{ ucfirst(str_replace('_',' ', $order->status)) }}</td>
                                    <td style="text-align: center;">
                                        <select class="form-control" id="status" onchange="onChageSelect('<?php echo $order->id ?>')">
                                            <option value="ordered" <?php if ($order->status == 'ordered') {echo "selected";}?>> Ordered </option>
                                            <option value="in_progress" <?php if ($order->status == 'in_progress') {echo "selected";}?>> In-progress </option>
                                            <option value="shipped" <?php if ($order->status == 'shipped') {echo "selected";}?>> Shipped </option>
                                            <option value="completed" <?php if ($order->status == 'completed') {echo "selected";}?>> Completed </option>
                                            <option value="cancelled" <?php if ($order->status == 'cancelled') {echo "selected";}?>> cancelled </option>
                                        </select>
                                        <i class="material-icons">
                                            <!-- <a href="{{ route('orders.edit', $order->id) }}" data-toggle="tooltip"  data-placement="top" data-original-title="Edit" class="tool_tip">edit
                                            </a> -->
                                        </i>
                                        <i class="material-icons">
                                            <a href="/ordersDetails/{{$order->id}}" id="modal_id" >shopping_cart
                                            </a>
                                        </i>
                                        <i class="material-icons">
                                            <a href="javascript:void(0)" id="modal_id" data-toggle="modal"  data-target="#addressModal_{{ $order->id }}" >location_on</a>
                                        </i>
                                    </td>

                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

     @foreach($orders as $order)
    <!-- #END# Basic Examples -->

    <div class="modal fade" id="addressModal_{{ $order->id }}" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title" id="defaultModalLabel">Order details</h4>
                </div>
                <div class="modal-body table_data">
                    <strong>Name</strong> : {{ $order->shippingAddress->firstname. ' ' . $order->shippingAddress->lastname }}<br>
                    <strong>Order date</strong> : {{ $order->ordered_at }} <br>
                    <br>
                    <br>

                    <table class="table table-bordered" >
                        <tbody class="table_space ">
                            <tr>
                                <th><strong>Mobile : </strong></th>
                                <td> {{  $order->shippingAddress->mobile }}</td>
                            </tr>
                            <tr>
                                <th> <strong>Email :</strong> </th>
                                <td> {{ $order->shippingAddress->email }} </td>
                            </tr>
                            <tr>
                                <th> <strong>Zipcode :</strong> </th>
                                <td> {{ $order->shippingAddress->zipcode }} </td>
                            </tr>
                            <tr>
                                <th> <strong> Area : </strong> </th>
                                <td> {{ $order->shippingAddress->area }} </td>
                            </tr>
                            <tr>
                                <th> <strong>Landmark :</strong> </th>
                                <td>{{ $order->shippingAddress->landmark }} </td>
                            </tr>
                            <tr>
                                <th> <strong> Address : </strong> </th>
                                <td>{{ $order->shippingAddress->address }}</td>
                            </tr>
                            <tr>
                                <th> <strong>City :</strong> </th>
                                <td>{{ $order->shippingAddress->city }} </td>
                            </tr>
                            <tr>
                                <th> <strong>State</strong> </th>
                                <td>{{ $order->shippingAddress->state }} </td>
                            </tr>
                            <tr>
                                <th> <strong>Country</strong> </th>
                                <td>{{ $order->shippingAddress->country }} </td>
                            </tr>
                            <tr>
                                <th> <strong>Address type :</strong> </th>
                                <td>{{ $order->shippingAddress->address_type }} </td>
                            </tr>
                            @if($order->shippingAddress->messageType != '')
                                <tr>
                                    <th> <strong>Gift option type :</strong> </th>
                                    <td>{{ $order->shippingAddress->messageType }} </td>
                                </tr>
                                <tr>
                                    <th> <strong>To :</strong> </th>
                                    <td>{{ $order->shippingAddress->to }} </td>
                                </tr>
                                <tr>
                                    <th> <strong>From :</strong> </th>
                                    <td>{{ $order->shippingAddress->From }} </td>
                                </tr>
                                <tr>
                                    <th> <strong>Message :</strong> </th>
                                    <td>{{ $order->shippingAddress->message }} </td>
                                </tr>
                            @endif

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-right btn_save" data-dismiss="modal" id="modal_close">Close</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<script>
$('#modal_close').on('click',function(){
    $('#defaultModal').modal('hide');
})
    function confirmDelete() {
        return confirm("Delete this message.");
    }

    function onChageSelect (orderId) {
        $('#errorAlertMessage').empty('')
        $conf = confirm("Are you want to change the status!")
        if($conf) {
            $.ajax({
                type: "POST",
                url: '/orders',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "status": $('#status').val(),
                    "orderId": orderId,
                },
                success: function(msg){
                    str = $('#status').val()
                    var res = str.replace("_", " ");
                    $('#statusChange').text(res)

                    $('#errorAlertMessage').append('<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+msg.success+'</div>');
                },
                error: function(request,msg,error) {
                    $('#errorAlertMessage').append('<div class="alert alert-danger alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>'+error+'</div>');
                }
            })
        }
    }
</script>
@endsection

<style>
    .btn-group.bootstrap-select.form-control{
        width: 55% !important;
    }
</style>