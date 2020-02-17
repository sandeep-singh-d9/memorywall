<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SMSTemplate extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'sms_body', 'status', 'created_by', 'updated_by'];

    protected $dates = ['deleted_at'];
}
