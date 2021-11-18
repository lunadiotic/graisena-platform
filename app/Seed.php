<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;
use App\DistributionSeed;

class Seed extends Model
{
    protected $guarded = [];

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function distribution_seeds()
    {
        return $this->hasMany(DistributionSeed::class);
    }
}
