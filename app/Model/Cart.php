<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cart extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'canvasHeight', 'canvasWidth', 'imagePath', 'color', 'zoomValue', 'imageType', 'canvasType', 'translateData', 'imageStyle', 'fileStatckImageWidth', 'fileStatckImageHeight', 'price', 'quantity', 'domImage', 'messageType', 'messageTo', 'messageFrom', 'message', 'status',
    ];
}
