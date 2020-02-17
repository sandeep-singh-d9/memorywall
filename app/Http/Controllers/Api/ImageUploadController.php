<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\LibraryAsset;
use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function imageUpload(Request $request)
    {
        try {
            $imageName = time() . '.' . $request->image->extension();
            $path = '/uploads/images/';
            $request->image->move(public_path($path), $imageName);

            $imageExist = LibraryAsset::find(1);

            // if ($imageExist) {
            //     LibraryAsset::whereId(1)->update([
            //         'image' => $path . '/' . $imageName,
            //     ]);
            // } else {
            //     LibraryAsset::create([
            //         'userId' => 1,
            //         'image' => $path . '/' . $imageName,
            //     ]);

            // }
            // $imageData = LibraryAsset::whereId(1)->first();
            $imageData = $path . $imageName;
            return response()->json([
                'image' => $imageData,
                'success' => true,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'data' => $th->getMessage(),
                'success' => false,
            ], 500);
        }

    }
    public function merchantData(Request $request)
    {
        try {
            $merchant_data = '';
            $working_key = '311415912283E0B3EFF22E8FB9BEEF0F'; //Shared by CCAVENUES
            $access_code = 'AVBH88GJ10AF65HBFA'; //Shared by CCAVENUES

            foreach ($request->all() as $key => $value) {
                $merchant_data .= $key . '=' . urlencode($value) . '&';
            }
            $encrypted_data = $this->encrypt($merchant_data, $working_key);
            return response()->json([
                'data' => $encrypted_data,
                'success' => true,
            ], 200);

            return view('ccavenue', compact('encrypted_data', 'access_code'));

        } catch (\Throwable $th) {
            //throw $th;
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
    public function ccavenueResponse(Request $request)
    {
        \Log::info($request);
    }
    public function cancelResponse(Request $request)
    {
        \Log::info($request);
    }
}
