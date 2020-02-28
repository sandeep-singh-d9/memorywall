<?php

namespace App\Http\Controllers;

use App\Helpers\CommonHelper;
use App\Model\Order;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
    //    {
    //        $this->middleware('auth');
    //    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        // $orderChart = DB::table('orders')->select(DB::raw('sum(grand_total) as `grand_total`'), DB::raw('count(id) as `total_order`'), DB::raw("DATE_FORMAT(created_at, '%M') as new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
        //     ->groupBy('year', 'month')
        //     ->get();
        $orderData = [];
        for ($i = 1; $i <= 12; $i++) {
            $order = CommonHelper::getOrder($i);
            $orderData[] = $order;
        }
        $orderArray = [['Month', 'Total Order', 'Total Amount']];
        $months = ['Jan', 'Feb', 'Mar', 'April', 'May', 'June', 'July', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'];
        foreach ($orderData as $key => $value) {
            $array = array($months[$key], $value->total_order, $value->grand_total);
            array_push($orderArray, $array);
        }
        $orderChart = json_encode($orderArray);
        $user = User::where('role_id', '!=', 1)->count();
        $order = Order::count();
        $complete = Order::where('status', 'completed')->count();
        return view('home', compact('user', 'order', 'complete', 'orderChart'));
    }

    public function canvas()
    {
        return view('canvas.index');
    }
}
