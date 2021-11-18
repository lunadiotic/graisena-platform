<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Nursary;
use App\DistributionSeed;

class Distribution extends Model
{
    protected $guarded = [];
    protected $dates = [
        'created_at',
        'published_at'
    ];

    public function nursary()
    {
        return $this->belongsTo(Nursary::class);
    }

    public function distribution_seeds()
    {
        return $this->belongsTo(DistributionSeed::class);
    }
}
