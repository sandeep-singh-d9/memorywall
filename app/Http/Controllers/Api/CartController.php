<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Model\Cart;
use Auth;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function storeCartData(Request $request)
    {
        try {
            DB::beginTransaction();
            $cartData = $request->get('cartData');
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
            return response()->json([
                'message' => 'cart created successfully',
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
    public function getCartData()
    {
        try {
            $cartData = Cart::where('user_id', Auth::id())->get();
            // $cartData = Cart::where('user_id', Auth::id())->where('status', '!=', 'ordered')->get();

            return response()->json([
                'data' => $cartData,
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
    public function updateCart(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $domImage = $request->get('domImage');
            $name = time() . '.png';
            $path = '/uploads/updatedImage/' . $name;
            \Image::make($domImage)->save(public_path('uploads/updatedImage/') . $name);

            Cart::whereId($id)->update([
                'canvasHeight' => $request->get('canvasHeight'),
                'canvasWidth' => $request->get('canvasWidth'),
                'imagePath' => $request->get('imagePath'),
                'domImage' => $path,
                'zoomValue' => $request->get('zoomValue'),
                'imageType' => $request->get('imageType'),
                'canvasType' => $request->get('canvasType'),
                'translateData' => $request->get('translateData'),
                'imageStyle' => $request->get('imageStyle'),
                'fileStatckImageWidth' => $request->get('fileStatckImageWidth'),
                'fileStatckImageHeight' => $request->get('fileStatckImageHeight'),
                'price' => $request->get('price'),
                'quantity' => $request->get('quantity'),
                'messageType' => $request->get('messageType'),
                'messageTo' => $request->get('messageTo'),
                'messageFrom' => $request->get('messageFrom'),
                'message' => $request->get('message'),
                'color' => $request->get('color'),
            ]);
            DB::commit();
            return response()->json([
                'message' => 'cart updated successfully!',
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
    public function addCart(Request $request)
    {
        try {
            DB::beginTransaction();
            $domImage = $request->get('domImage');
            $name = time() . '.png';
            $path = '/uploads/updatedImage/' . $name;
            \Image::make($domImage)->save(public_path('uploads/updatedImage/') . $name);

            Cart::create([
                'user_id' => Auth::id(),
                'canvasHeight' => $request->get('canvasHeight'),
                'canvasWidth' => $request->get('canvasWidth'),
                'imagePath' => $request->get('imagePath'),
                'domImage' => $path,
                'zoomValue' => $request->get('zoomValue'),
                'imageType' => $request->get('imageType'),
                'canvasType' => $request->get('canvasType'),
                'translateData' => $request->get('translateData'),
                'imageStyle' => $request->get('imageStyle'),
                'fileStatckImageWidth' => $request->get('fileStatckImageWidth'),
                'fileStatckImageHeight' => $request->get('fileStatckImageHeight'),
                'price' => $request->get('price'),
                'quantity' => $request->get('quantity'),
                'messageType' => $request->get('messageType'),
                'messageTo' => $request->get('messageTo'),
                'messageFrom' => $request->get('messageFrom'),
                'message' => $request->get('message'),
                'color' => $request->get('color'),
            ]);
            DB::commit();
            return response()->json([
                'message' => 'cart added successfully!',
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);
        }
    }
    public function updateQuantity(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $cartDetail = Cart::whereId($id)->where('user_id', Auth::id())->update([
                'quantity' => $request->get('quantity'),
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Quantity updated successfully!',
                'success' => true,
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);

        }
    }
    public function updateGiftOption(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $cartDetail = Cart::whereId($id)->where('user_id', Auth::id())->update([
                'messageType' => $request->get('messageType'),
                'messageTo' => $request->get('messageTo'),
                'messageFrom' => $request->get('messageFrom'),
                'message' => $request->get('message'),
            ]);
            DB::commit();

            return response()->json([
                'message' => 'Cart updated successfully!',
                'success' => true,
            ], 200);

        } catch (\Throwable $th) {
            return response()->json([
                'message' => $th->getMessage(),
                'success' => false,
            ], 500);

        }
    }
    public function removeCartItem(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            Cart::whereId($id)->delete();
            DB::commit();

            return response()->json([
                'message' => 'Item remove successfully!',
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
