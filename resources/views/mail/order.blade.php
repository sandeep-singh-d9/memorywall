<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
</head>
<body>
    Your Order Id :{{ $order['order_no'] }}
    <p>Price : <i class="fas fa-rupee-sign"></i>{{ $order['price'] }} Rs.</p>
    <p>Paymnt method :<i class="fas fa-rupee-sign"></i> {{ $order['payment_method'] }} Rs.</p>
    <p>Shipping charge :<i class="fas fa-rupee-sign"></i> {{ $order['price'] < 299 ? '50.00' : '00.00' }} Rs.</p>
    <p>GST(%) : <i class="fas fa-rupee-sign"></i> {{ $order['tax_collected'] }} Rs.</p>
    <p>Grand total :<b><i class="fas fa-rupee-sign"></i> {{ $order['grand_total'] }} Rs.</b></p>

    <table class="table color_gey">
        <tbody>
            @foreach($orderData as $value)
            <tr>
                <td style="width:20%"><img src=" {{ $value['domImage'] }} " style="width:130px;"></td>
                <td class="inner_cartdetail">
                    <p><b>Canvas Print</b></h4>
                    <p>Size: {{ $value['canvasHeight'] . ' x '. $value['canvasWidth'] }} (inches) </p>
                    <p>Canvas Wrap: {{ $value['canvasType'] }} </p>
                    <p>Canvas Edging: {{ $value['imageType'] }} </p>
                    <p>Inclusion: Hanging Hardware</p>
                </td>
                <td style="width:15%">
                    <p>Price <br/><i class="fas fa-rupee-sign"></i> {{ $value['price'] }}</p>
                </td>
                <td style="width:15%">
                    <p>Quantity <br/>{{ $value['quantity'] }} Nos.</p>
                </td>
                <td style="width:15%">
                    <p>SubTotal <br/><i class="fas fa-rupee-sign"></i> {{ $value['price'] }}</p>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
