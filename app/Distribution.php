<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nursery;
use App\DistributionSeed;

class Distribution extends Model
{
    protected $guarded = [];
    protected $dates = [
        'created_at',
        'published_at'
    ];

    public function nursery()
    {
        return $this->belongsTo(Nursery::class);
    }

    public function distribution_seeds()
    {
        return $this->hasMany(DistributionSeed::class);
    }
}
