<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrderDetail extends Model
{
    use SoftDeletes;

    protected $fillable = ['order_id', 'canvas_height', 'canvas_width', 'imagePath', 'domImage', 'image_type', 'canvas_type', 'color', 'quantity', 'removed_by', 'remove_reason', 'price', 'discount', 'offer', 'tax_collected', 'grand_total', 'created_by', 'updated_by', 'messageType', 'messageTo', 'messageFrom', 'message'];

    protected $dates = ['deleted_at'];

    public function orderData()
    {
        return $this->belongsTo('App\Model\Order', 'order_id', 'id');
    }
}
