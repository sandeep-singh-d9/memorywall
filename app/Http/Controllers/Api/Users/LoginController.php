<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function signIn(Request $request)
    {
        try {
            $email = $request->get('username');
            $password = $request->get('password');
            $cartData = $request->get('cartData');
            $customer = User::where('email', $email)->where('role_id', 3)->first();
            if ($customer) {
                if (!(\Hash::check($password, $customer->password))) {
                    return response()->json([
                        'message' => 'Password is wrong',
                        'success' => false,
                    ], 500);
                }
                if (Auth::attempt(['email' => $email, 'password' => $password])) {
                    $user = Auth::user();
                    $token = $customer->createToken('memory_wall')->accessToken;

                    if ($cartData) {
                        foreach ($cartData as $key => $value) {
                            $domImage = $value['domImage'];
                            $name = time() . $key . '.png';
                            $path = '/uploads/updatedImage/' . $name;
                            \Image::make($domImage)->save(public_path('uploads/updatedImage/') . $name);

                            Cart::create([
                                'user_id' => Auth::id(),
                                'domImage' => $path,
                                'canvasHeight' => $value['canvasHeight'],
                                'canvasWidth' => $value['canvasWidth'],
                                'imagePath' => $value['imagePath'],
                                'zoomValue' => $value['zoomValue'],
                                'imageType' => $value['imageType'],
                                'canvasType' => $value['canvasType'],
                                'translateData' => $value['translateData'],
                                'imageStyle' => $value['imageStyle'],
                                'fileStatckImageWidth' => $value['fileStatckImageWidth'],
                                'fileStatckImageHeight' => $value['fileStatckImageHeight'],
                                'price' => $value['price'],
                                'quantity' => $value['quantity'],
                                'messageType' => isset($value['messageType']) ? $value['messageType'] : '',
                                'messageTo' => isset($value['messageTo']) ? $value['messageTo'] : '',
                                'messageFrom' => isset($value['messageFrom']) ? $value['messageFrom'] : '',
                                'message' => isset($value['message']) ? $value['message'] : '',
                                'color' => $value['color'],
                            ]);
                            DB::commit();
                        }

                    }

                    $cartData = Cart::where('user_id', Auth::id())->get();
                    return response()->json([
                        'message' => 'login success',
                        'data' => $user,
                        'cartData' => 'cartData',
                        'accessToken' => $token,
                    ], 200);
                }
            } else {
                return response()->json([
                    'message' => 'Account not found',
                    'success' => false,
                ], 500);
            }
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
}
