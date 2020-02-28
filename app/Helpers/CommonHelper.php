<?php

namespace App\Helpers;

use App\Model\Order;
use DB;

class CommonHelper
{

    public static function getOrder($month)
    {
        // dd($month);
        
        $columns = array(
            DB::Raw('count(id) as total_order'),
            DB::Raw('sum(grand_total) as grand_total'),
            DB::Raw('YEAR(created_at) year'),
            DB::Raw('MONTH(created_at) month'),
        );

        $order = Order::whereMonth('created_at', $month);
        $order = $order->first($columns);
        // dd($order->first($columns));
        return $order;
    }

}
