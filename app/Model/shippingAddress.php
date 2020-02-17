<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class shippingAddress extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'firstname', 'lastname', 'email', 'mobile', 'zipcode', 'address', 'area', 'landmark', 'city', 'state', 'address_type', 'created_by', 'updated_by', 'country'];

    protected $dates = ['deleted_at'];
}
