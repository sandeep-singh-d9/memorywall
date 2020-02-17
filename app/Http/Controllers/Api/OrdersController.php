<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use App\Model\shippingAddress;
use Auth;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function __construct(EmailController $emailController)
    {
        $this->emailcontroller = $emailController;
    }
    public function placeOrder(Request $request)
    {
        try {
            $checkoutType = $request->get('checkoutType');
            $firstname = $request->get('firstname');
            $lastname = $request->get('lastname');
            $email = $request->get('email');
            $mobile = $request->get('mobile');
            $address = $request->get('address');
            $country = $request->get('country');
            $state = $request->get('state');
            $city = $request->get('city');
            $zipcode = $request->get('zipcode');
            $landmark = $request->get('landmark');
            $area = $request->get('area');
            $address_type = $request->get('address_type');
            $billingMethod = $request->get('billingMethod');
            $canvasHeight = $request->get('canvasHeight');
            $canvasWidth = $request->get('canvasWidth');
            $imagePath = $request->get('imagePath');
            $color = $request->get('color');
            $imageType = $request->get('imageType');
            $canvasType = $request->get('canvasType');
            $quantity = $request->get('quantity');
            // $domImage = $request->get('domImage');
            $price = $request->get('price');
            $grand_total = $request->get('grand_total');
            $messageType = $request->get('messageType');
            $to = $request->get('to');
            $From = $request->get('From');
            $message = $request->get('message');
            $total = $request->get('total');
            $GST = $request->get('GST');

            $shippingId = '';
            if ($request->get('shippingId')) {
                $shippingId = $request->get('shippingId');
            } else {
                // this portion for shipping address
                DB::beginTransaction();
                $shippingAddress = shippingAddress::create([
                    'user_id' => Auth::id(),
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'mobile' => $mobile,
                    'email' => $email,
                    'zipcode' => $zipcode,
                    'address' => $address,
                    'address' => $address,
                    'area' => $area,
                    'landmark' => $landmark,
                    'city' => $city,
                    'state' => $state,
                    'address_type' => $address_type,
                    'created_by' => $checkoutType != 'guest' ? Auth::id() : 0,
                ]);
                DB::commit();
                $shippingId = $shippingAddress->id;
            }

            // this portion for save order
            // $order_no = rand(111111111111111, 999999999999999);
            $allOrder = Order::get();
            if (count($allOrder) > 0) {
                $order_no = Order::max('order_no') + 1;
                $invoiceDetail = Order::latest()->first();
                $i = explode('CGAD', $invoiceDetail->invoice_no);

                $number = intval($i[1]) + 1;
                $invoice_no = 'CGAD' . $number;
                $transaction_id = Order::max('transaction_id') + 1;

            } else {
                $order_no = 1100;
                $invoice_no = 'CGAD2237';
                $transaction_id = rand(111111111111111, 999999999999999);
            }
            $order = Order::create([
                'user_id' => Auth::id(),
                'transaction_id' => $transaction_id,
                'order_no' => $order_no,
                'invoice_no' => $invoice_no,
                'status' => 'ordered',
                'price' => $total,
                'tax_collected' => $GST,
                'payment_method' => $billingMethod,
                'ordered_at' => Carbon::now(),
                'grand_total' => $grand_total,
                'shipping_id' => $shippingId,
                'created_by' => $checkoutType != 'guest' ? Auth::id() : 0,
            ]);

            DB::commit();
            $orderData = $request->get('allCartValue');
            foreach ($orderData as $key => $value) {
                if (Auth::user()) {
                    $path = $value['domImage'];
                } else {
                    $domImage = $value['domImage'];
                    $name = time() . '.png';
                    $path = '/uploads/updatedImage/' . $name;
                    \Image::make($domImage)->save(public_path('uploads/updatedImage/') . $name);
                }

                $orderDetail = OrderDetail::create([
                    'order_id' => $order->id,
                    'canvas_height' => $value['canvasHeight'],
                    'canvas_width' => $value['canvasWidth'],
                    'imagePath' => $value['imagePath'],
                    'domImage' => $path,
                    'image_type' => $value['imageType'],
                    'canvas_type' => $value['canvasType'],
                    'grand_total' => $request->get('grand_total'),
                    'messageType' => isset($value['messageType']) ? $value['messageType'] : '',
                    'messageTo' => isset($value['messageTo']) ? $value['messageTo'] : '',
                    'messageFrom' => isset($value['messageFrom']) ? $value['messageFrom'] : '',
                    'message' => isset($value['message']) ? $value['message'] : '',
                    'color' => $value['color'],
                    'quantity' => $value['quantity'],
                    'price' => $value['price'],
                ]);
                DB::commit();
                // if (isset($value['id'])) {
                //     Cart::whereId($value['id'])->delete();
                //     DB::commit();
                // }
            }
            // $c_data = [];
            // if ($billingMethod == 'ccavenue') {
            //     $c_data['transaction_id'] = $transaction_id;
            //     $c_data['merchant_id'] = env('MERCHANT_ID');
            //     $c_data['order_id'] = $order_no;
            //     $c_data['amount'] = $grand_total;
            //     $c_data['currency'] = 'INR';
            //     $c_data['redirect_url'] = 'http://memorywall.in/ccavenueResponse';
            //     $c_data['cancel_url'] = 'http://memorywall.in/cancelResponse';
            //     $c_data['language'] = 'EN';
            //     $c_data['billing_name'] = $firstname . ' ' . $lastname;
            //     $c_data['billing_address'] = $landmark . ' ' . $area . ' ' . $address;
            //     $c_data['billing_city'] = $city;
            //     $c_data['billing_state'] = $state;
            //     $c_data['billing_zip'] = $zipcode;
            //     $c_data['billing_zip'] = $zipcode;
            //     $c_data['billing_country'] = $country;
            //     $c_data['billing_tel'] = $mobile;
            //     $c_data['billing_email'] = $email;
            //     $merchant_data = '';
            //     $working_key = env('WORKING_KEY'); //Shared by CCAVENUES
            //     $access_code = env('ACCESS_CODE'); //Shared by CCAVENUES

            //     foreach ($c_data as $key => $value) {
            //         $merchant_data .= $key . '=' . urlencode($value) . '&';
            //     }

            //     $encrypted_data = $this->encrypt($merchant_data, $working_key);
            //     return response()->json([
            //         'message' => 'Order place successfully',
            //         'order_no' => $order_no,
            //         'encrypted_data' => $encrypted_data,
            //         'access_code' => $access_code,
            //         'success' => true,
            //     ], 200);
            // }

            // $email = $this->emailcontroller->order_email($order, $orderData, $shippingId, $email);

            return response()->json([
                'message' => 'Order place successfully',
                'order_no' => $order_no,
                'success' => true,
            ], 200);

        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
    public function encrypt($plainText, $key)
    {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        $encryptedText = bin2hex($openMode);
        return $encryptedText;
    }
    public function hextobin($hexString)
    {
        $length = strlen($hexString);
        $binString = "";
        $count = 0;
        while ($count < $length) {
            $subString = substr($hexString, $count, 2);
            $packedString = pack("H*", $subString);
            if ($count == 0) {
                $binString = $packedString;
            } else {
                $binString .= $packedString;
            }

            $count += 2;
        }
        return $binString;
    }

    public function getOrder(Request $request)
    {
        try {
            $id = Auth::id();
            $orders = Order::where('user_id', $id)->get();
            $allOrder = [];
            foreach ($orders as $key => $value) {

                $value['shippingAddress'] = $value->shippingAddress;
                $value['orderDetails'] = $value->orderDetails;
                // array_push($allOrder, $value);
            }
            // dd($orders);
            return response()->json([
                'message' => 'get',
                'data' => $orders,
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);

        }
    }
    public function getOrderDetails(Request $request, $id)
    {
        try {
            $orders = Order::whereId($id)->get();
            $allOrder = [];
            foreach ($orders as $key => $value) {
                $value['shippingAddress'] = $value->shippingAddress;
                $value['orderDetails'] = $value->orderDetails;
            }
            array_push($allOrder, $value);
            return response()->json([
                'message' => 'get',
                'data' => $allOrder,
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);

        }
    }
}
