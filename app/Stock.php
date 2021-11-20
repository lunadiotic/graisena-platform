<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nursery;
use App\Seed;

class Stock extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date_check',
        'created_at',
        'published_at'
    ];

    public function nursery()
    {
        return $this->belongsTo(Nursery ::class);
    }

    public function seed()
    {
        return $this->belongsTo(Seed::class);
    }
}
