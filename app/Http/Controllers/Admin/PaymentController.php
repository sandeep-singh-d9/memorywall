<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Payment;
use DB;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function ccavenueResponse(Request $request)
    {
        try {
            $workingKey = env('WORKING_KEY'); //Working Key should be provided here.
            $encResponse = $request->get("encResp"); //This is the response sent by the CCAvenue Server
            $rcvdString = $this->decrypt($encResponse, $workingKey); //Crypto Decryption used as per the specified working key.
            $order_status = "";
            $decryptValues = explode('&', $rcvdString);
            $dataSize = sizeof($decryptValues);
            $paymentResponse = [];
            for ($i = 0; $i < $dataSize; $i++) {
                $information = explode('=', $decryptValues[$i]);

                $paymentResponse[0][$information[0]] = $information[1];

            }
            DB::beginTransaction();
            foreach ($paymentResponse as $key => $value) {
                Payment::create([
                    'order_id' => $value['order_id'],
                    'tracking_id' => $value['tracking_id'],
                    'bank_ref_no' => $value['bank_ref_no'],
                    'order_status' => $value['order_status'],
                    'failure_message' => $value['failure_message'],
                    'payment_mode' => $value['payment_mode'],
                    'card_name' => $value['card_name'],
                    'status_code' => $value['status_code'],
                    'status_message' => $value['status_message'],
                    'currency' => $value['currency'],
                    'amount' => $value['amount'],
                    'billing_name' => $value['billing_name'],
                    'billing_address' => $value['billing_address'],
                    'billing_city' => $value['billing_city'],
                    'billing_state' => $value['billing_state'],
                    'billing_zip' => $value['billing_zip'],
                    'billing_country' => $value['billing_country'],
                    'billing_tel' => $value['billing_tel'],
                    'billing_email' => $value['billing_email'],
                    'delivery_name' => $value['delivery_name'],
                    'delivery_address' => $value['delivery_address'],
                    'delivery_city' => $value['delivery_city'],
                    'delivery_state' => $value['delivery_state'],
                    'delivery_zip' => $value['delivery_zip'],
                    'delivery_country' => $value['delivery_country'],
                    'delivery_tel' => $value['delivery_tel'],
                    'vault' => $value['vault'],
                    'offer_type' => $value['offer_type'],
                    'offer_code' => $value['offer_code'],
                    'discount_value' => $value['discount_value'],
                    'mer_amount' => $value['mer_amount'],
                    'eci_value' => $value['eci_value'],
                    'retry' => $value['retry'],
                    'response_code' => $value['response_code'],
                    'billing_notes' => $value['billing_notes'],
                    'trans_date' => $value['trans_date'],
                    'bin_country' => $value['bin_country'],
                ]);
                DB::commit();
            }

            return view('successReponse');
        } catch (\Throwable $th) {
            DB::rollBack();
            \Log::info($th);
        }
    }
    public function cancelResponse(Request $request)
    {
        try {
            $workingKey = env('WORKING_KEY'); //Working Key should be provided here.
            $encResponse = $request->get("encResp"); //This is the response sent by the CCAvenue Server
            $rcvdString = $this->decrypt($encResponse, $workingKey); //Crypto Decryption used as per the specified working key.
            $order_status = "";
            $decryptValues = explode('&', $rcvdString);
            $dataSize = sizeof($decryptValues);
            $paymentResponse = [];
            for ($i = 0; $i < $dataSize; $i++) {
                $information = explode('=', $decryptValues[$i]);

                $paymentResponse[0][$information[0]] = $information[1];

            }
            DB::beginTransaction();
            foreach ($paymentResponse as $key => $value) {
                Payment::create([
                    'order_id' => $value['order_id'],
                    'tracking_id' => $value['tracking_id'],
                    'bank_ref_no' => $value['bank_ref_no'],
                    'order_status' => $value['order_status'],
                    'failure_message' => $value['failure_message'],
                    'payment_mode' => $value['payment_mode'],
                    'card_name' => $value['card_name'],
                    'status_code' => $value['status_code'],
                    'status_message' => $value['status_message'],
                    'currency' => $value['currency'],
                    'amount' => $value['amount'],
                    'billing_name' => $value['billing_name'],
                    'billing_address' => $value['billing_address'],
                    'billing_city' => $value['billing_city'],
                    'billing_state' => $value['billing_state'],
                    'billing_zip' => $value['billing_zip'],
                    'billing_country' => $value['billing_country'],
                    'billing_tel' => $value['billing_tel'],
                    'billing_email' => $value['billing_email'],
                    'delivery_name' => $value['delivery_name'],
                    'delivery_address' => $value['delivery_address'],
                    'delivery_city' => $value['delivery_city'],
                    'delivery_state' => $value['delivery_state'],
                    'delivery_zip' => $value['delivery_zip'],
                    'delivery_country' => $value['delivery_country'],
                    'delivery_tel' => $value['delivery_tel'],
                    'vault' => $value['vault'],
                    'offer_type' => $value['offer_type'],
                    'offer_code' => $value['offer_code'],
                    'discount_value' => $value['discount_value'],
                    'mer_amount' => $value['mer_amount'],
                    'eci_value' => $value['eci_value'],
                    'retry' => $value['retry'],
                    'response_code' => $value['response_code'],
                    'billing_notes' => $value['billing_notes'],
                    'trans_date' => $value['trans_date'],
                    'bin_country' => $value['bin_country'],
                ]);
                DB::commit();
            }
            return view('cancelPayment');

        } catch (\Throwable $th) {
            \Log::info($th);
        }
    }
    /*
     * @param1 : Encrypted String
     * @param2 : Working key provided by CCAvenue
     * @return : Plain String
     */
    public function decrypt($encryptedText, $key)
    {
        $key = $this->hextobin(md5($key));
        $initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
        $encryptedText = $this->hextobin($encryptedText);
        $decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
        return $decryptedText;
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
    public function paymentDetail(Request $request, $id)
    {
        try {
            $payment = Payment::where('order_id', $id)->first();

            return view('Admin.orders.paymentDetail', compact('payment'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error','Internal server error!');
        }
    }

}
