<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\Model\shippingAddress;
use App\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function registerCustomer(Request $request)
    {
        try {
            $userData = User::where('email', $request->get('email'))->where('role_id', 3)->first();
            if ($userData) {
                return response()->json([
                    'message' => 'User already exist, try to login!',
                    'success' => false,
                ], 500);

            }
            DB::beginTransaction();
            User::create([
                'first_name' => $request->get('firstname'),
                'last_name' => $request->get('lastname'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'role_id' => 3,
                'dob' => $request->get('dob'),
                'gst_number' => $request->get('gst_number'),
                'password' => \Hash::make($request->get('password')),
            ]);
            DB::commit();

            if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {
                $user = Auth::user();
                $token = $user->createToken('memory_wall')->accessToken;

                return response()->json([
                    'message' => 'Register successfully!',
                    'data' => $user,
                    'accessToken' => $token,
                ], 200);
            }

            return response()->json([
                'message' => 'register successfully!',
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
    public function getUserDetail()
    {
        try {
            $user = User::whereId(Auth::id())->first();
            $address = shippingAddress::where('user_id', Auth::id())->get();

            return response()->json([
                'user' => $user,
                'address' => $address,
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => true,
            ], 500);

        }
    }
}
