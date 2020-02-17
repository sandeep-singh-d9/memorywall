<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Mail;

class EmailController extends Controller
{
    public function order_email($order, $orderData, $shippingId, $email)
    {
        try {
            $subject = 'Your Order';
            $name = env('MAIL_FROM_NAME');
            $from = env('MAIL_FROM_ADDRESS');
            $emails = [$email, 'amit.d9ithub@gmail.com'];

            $email = Mail::send('mail.order', ['order' => $order, 'orderData' => $orderData, 'shippingId' => $shippingId], function ($message) use ($name, $subject, $emails, $from) {
                $message->from($from, $name);
                $message->to($emails)->subject($subject);
            });
            return true;
        } catch (\Throwable $th) {
            dd($th);
            return $th;
        }
    }
}
