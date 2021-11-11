<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\nursary;

class Stock extends Model
{

    protected $guarded = [];
    protected $dates = [
        'date',
        'created_at',
        'published_at'
    ];

    public function nursary()
    {
        return $this->belongsTo(nursary::class);
    }
}
