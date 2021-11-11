<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Stock;

class nursary extends Model
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
}
