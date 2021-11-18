<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nursary;
use App\Seed;

class Stock extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date_check',
        'created_at',
        'published_at'
    ];

    public function nursary()
    {
        return $this->belongsTo(nursary::class);
    }

    public function seed()
    {
        return $this->belongsTo(Seed::class);
    }
}
