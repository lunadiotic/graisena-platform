<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $guarded = [];

    /**
     * Get the province that owns the Volunteer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function province()
    {
        return $this->belongsTo(Province::class);
    }

    /**
     * Get the regency that owns the Volunteer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function regency()
    {
        return $this->belongsTo(Regency::class);
    }
}
