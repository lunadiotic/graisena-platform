<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Seed;
use App\Distribution;

class DistributionSeed extends Model
{
    protected $guarded = [];

    public function distribution()
    {
        return $this->belongsTo(Distribution::class);
    }

    public function seed()
    {
        return $this->belongsTo(Seed::class);
    }

}
