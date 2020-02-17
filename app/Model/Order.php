<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'transaction_id', 'order_no', 'invoice_no', 'status', 'payment_method', 'ordered_at', 'in_progress_at', 'shipped_at', 'completed_at', 'cancel_reason', 'cancelled_by', 'cancelled_at', 'price', 'discount', 'offer', 'tax_collected', 'grand_total', 'shipping_id', 'created_by', 'updated_by', 'ip'];

    protected $dates = ['deleted_at'];

    public function shippingAddress()
    {
        return $this->belongsTo('App\Model\shippingAddress', 'shipping_id', 'id');
    }
    public function orderDetails()
    {
        return $this->hasMany('App\Model\OrderDetail', 'order_id', 'id');
    }
}
