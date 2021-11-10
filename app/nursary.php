<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class nursary extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date',
        'created_at',
        'published_at'
    ];
}
