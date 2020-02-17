<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LibraryAsset extends Model
{
    protected $fillable = [
        'userId', 'image',
    ];
}
