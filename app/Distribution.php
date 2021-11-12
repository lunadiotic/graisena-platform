<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distribution extends Model
{
    protected $guarded = [];
    protected $dates = [
        'created_at',
        'published_at'
    ];

    public function nursary()
    {
        return $this->belongsTo(nursary::class);
    }
}
