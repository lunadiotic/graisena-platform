<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\Distribution;
use App\DistributionSeed;

class Nursary extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date',
        'created_at',
        'published_at'
    ];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function distributions()
    {
        return $this->hasMany(Distribution::class);
    }

    public function distribution_seeds()
    {
        return $this->hasMany(DistributionSeed::class);
    }
}
