<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasApiTokens, Notifiable;
    protected $fillable = [
        'first_name','last_name','email','password','mobile'
    ];
}
