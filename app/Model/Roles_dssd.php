<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $fillable = ['role_name', 'role_name_arabic', 'created_by', 'permissions'];
}
