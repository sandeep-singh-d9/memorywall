<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocode extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'promocode', 'discount', 'discount_type', 'status', 'created_by', 'updated_by',
    ];
}
