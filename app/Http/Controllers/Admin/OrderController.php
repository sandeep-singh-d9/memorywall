<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\EmailSMSController;
use App\Http\Controllers\Controller;
use App\Model\Order;
use App\Model\OrderDetail;
use DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(EmailSMSController $EmailSMSController)
    {
        $this->EmailSMSController = $EmailSMSController;
    }

    public function index()
    {
        $orders = Order::get();

        return view('Admin.orders.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return response()->json($request->get('shipingId'));
        // dd($request);
        try {
            $value = [
                'status' => $request->get('status'),
                $request->get('status') . '_at' => date('Y-m-d H:i'),
            ];

            $order = Order::whereId($request->get('orderId'))->update($value);
            $user = Order::whereId($request->get('orderId'))->first();
            $email = $user->users->email;
            $subject = 'order status';
            $this->EmailSMSController->order_status($request->get('status'), $email, $subject);
            return response()->json([
                'success' => __('language.order') . ' ' . __('language.alertMessage.statusChange'),
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->with('error', __('language.alertMessage.internalServerError'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orders = Order::whereId($id)->first();

        return view('Admin.Orders.edit', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function ordersDetails($id)
    {
        try {
            $OrdersDetail = OrderDetail::where('order_id', $id)->get();

            return view('Admin.orders.ordersdetails', compact('OrdersDetail'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
        }
    }
    public function download_image($name, $id)
    {
        try {
            $OrderDetail = OrderDetail::whereId($id)->first();
            $path = '';
            if ($name == 'original') {
                $path = $OrderDetail->imagePath;
                $image = file_get_contents("https://logos-download.com/wp-content/uploads/2016/09/Laravel_logo.png");
                        file_put_contents(public_path('img/a.png'), $image);

                $contents = file_get_contents($path);
                \Storage::disk('public/uploads/original')->put(time() . '.jpg', $contents);

            } else {
                $path = public_path($OrderDetail->domImage);
                return \Response::download($path);
            }
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
