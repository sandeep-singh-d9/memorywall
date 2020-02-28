<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id', 'tracking_id', 'bank_ref_no', 'order_status', 'failure_message', 'payment_mode', 'card_name', 'status_code', 'status_message', 'currency', 'amount', 'billing_name', 'billing_address', 'billing_city', 'billing_state', 'billing_zip', 'billing_country', 'billing_tel', 'billing_email', 'delivery_name', 'delivery_address', 'delivery_city', 'delivery_state', 'delivery_zip', 'delivery_country', 'delivery_tel', 'vault', 'offer_type', 'offer_code', 'discount_value', 'mer_amount', 'eci_value', 'retry', 'response_code', 'billing_notes', 'trans_date', 'bin_country',
    ];
}
