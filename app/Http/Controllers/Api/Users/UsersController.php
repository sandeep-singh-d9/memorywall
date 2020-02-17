<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use App\User;
use App\Model\Subscribe;
use Auth;
use DB;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function updateUser(Request $request)
    {
        try {
            $user = Auth::user();
            $oldPassword = $request->get('oldPassword');
            $newPassword = $request->get('newPassword');
            DB::beginTransaction();
            User::whereId(Auth::id())->update([
                'first_name' => $request->get('first_name'),
                'last_name' => $request->get('last_name'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'gst_number' => $request->get('gst_number'),
                'dob' => $request->get('dob'),
                // 'password' => \Hash::make($request->get('newPassword')),
            ]);
            if ($oldPassword != null && $newPassword != null && !(\Hash::check($oldPassword, $user->password))) {
                return response()->json([
                    'message' => 'Old Password is wrong',
                    'success' => false,
                ], 500);
            }
            if ($oldPassword != null && $newPassword != null) {
                User::whereId(Auth::id())->update([
                    'password' => \Hash::make($request->get('newPassword')),
                ]);
            }
            DB::commit();
            return response()->json([
                'message' => 'User updated successfully',
                'success' => true,
            ], 200);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);

        }
    }
    public function subscribe(Request $request)
    {
        try {
            Subscribe::create([
                'email' => $request->get('email')
            ]);
            return response()->json([
                'message' => 'Thanks for subcribed',
                'success' => true
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false
            ],500);
        }
    }
}
