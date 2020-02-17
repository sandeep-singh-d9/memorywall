<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function ccavenueResponse(Request $request)
    {
        try {
            $workingKey = '311415912283E0B3EFF22E8FB9BEEF0F'; //Working Key should be provided here.
            $encResponse = $request->get("encResp"); //This is the response sent by the CCAvenue Server
            $rcvdString = $this->decrypt($encResponse, $workingKey); //Crypto Decryption used as per the specified working key.
            $order_status = "";
            $decryptValues = explode('&', $rcvdString);
            $dataSize = sizeof($decryptValues);

            \Log::info($dataSize);
            // \Log::info($rcvdString);
            \Log::info($request);

            return view('successReponse');
        } catch (\Throwable $th) {
            \Log::info($th);
        }
    }
    public function cancelResponse(Request $request)
    {
        try {
            \Log::info($request);
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

}
