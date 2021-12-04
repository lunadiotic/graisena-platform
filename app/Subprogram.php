<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subprogram extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date_start',
        'date_end',
        'created_at',
        'published_at'
    ];

    /**
     * Get the program that owns the Subprogram
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    /**
     * Get the user that owns the Subprogram
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
