<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\User;
use Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function signIn(Request $request)
    {
        try {
            $email = $request->get('username');
            $password = $request->get('password');
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

                    return response()->json([
                        'message' => 'login success',
                        'data' => $user,
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
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
}
