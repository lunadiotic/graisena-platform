<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $guarded = [];
    protected $dates = [
        'created_at',
        'published_at'
    ];

    /**
     * Get all of the subprogram for the Program
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subprogram()
    {
        return $this->hasMany(Subprogram::class);
    }
}
