<?php

namespace App\Http\Controllers;

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
        $user = User::where('role_id', '!=', 1)->count();
        $order = Order::count();
        $complete = Order::where('status', 'completed')->count();
        return view('home', compact('user', 'order', 'complete'));
    }

    public function canvas()
    {
        return view('canvas.index');
    }
}
