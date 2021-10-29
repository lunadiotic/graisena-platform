<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date',
        'created_at',
        'published_at'
    ];
}
