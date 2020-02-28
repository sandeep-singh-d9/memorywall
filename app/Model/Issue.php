<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{
    protected $fillable = [
        'user_id', 'order_id', 'order_no', 'issue_no', 'subject', 'message', 'imagePath', 'status', 'response',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
