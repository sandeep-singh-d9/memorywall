<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\shippingAddress;
use Auth;
use DB;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    public function getShippingAddress()
    {
        try {
            $shippingAddress = shippingAddress::where('user_id', Auth::id())->get();

            return response()->json([
                'message' => 'success',
                'shippingAddress' => $shippingAddress,
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);

        }
    }
    public function storeShippingAddress(Request $request)
    {
        try {
            DB::beginTransaction();
            shippingAddress::create([
                'user_id' => Auth::id(),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'address' => $request->get('address'),
                'country' => $request->get('country'),
                'state' => $request->get('state'),
                'city' => $request->get('city'),
                'zipcode' => $request->get('zipcode'),
                'landmark' => $request->get('landmark'),
                'area' => $request->get('area'),
                'address_type' => $request->get('address_type'),
                'created_by' => Auth::id(),
            ]);
            DB::commit();
            $shippingAddress = shippingAddress::where('user_id', Auth::id())->get();
            return response()->json([
                'message' => 'Address added successfully!',
                'shippingAddress' => $shippingAddress,
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);

        }
    }
    public function updateShippingAddress(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            shippingAddress::whereId($id)->update([
                'user_id' => Auth::id(),
                'firstname' => $request->get('firstname'),
                'lastname' => $request->get('lastname'),
                'email' => $request->get('email'),
                'mobile' => $request->get('mobile'),
                'address' => $request->get('address'),
                'country' => $request->get('country'),
                'state' => $request->get('state'),
                'city' => $request->get('city'),
                'zipcode' => $request->get('zipcode'),
                'landmark' => $request->get('landmark'),
                'area' => $request->get('area'),
                'address_type' => $request->get('address_type'),
                'created_by' => Auth::id(),
            ]);
            DB::commit();
            $shippingAddress = shippingAddress::where('user_id', Auth::id())->get();
            return response()->json([
                'message' => 'Address updated successfully!',
                'shippingAddress' => $shippingAddress,
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
    public function deleteShippingAddress(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            shippingAddress::whereId($id)->delete();

            DB::commit();

            $shippingAddress = shippingAddress::where('user_id', Auth::id())->get();

            return response()->json([
                'message' => 'Address updated successfully!',
                'shippingAddress' => $shippingAddress,
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
