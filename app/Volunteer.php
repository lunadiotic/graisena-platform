<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $guarded = [];
    protected $dates = [
        'date_of_birth',
        'created_at',
        'published_at'
    ];

    public function getGender()
    {
        switch ($this->gender) {
            case 'm':
                return 'Laki-laki';
                break;

            case 'f':
                return 'Perempuan';
                break;
        }
    }

    public function getMarital()
    {
        switch ($this->stats_of_marital) {
            case 'm':
                return "Menikah";
                break;
            case 'd':
                return "Cerai";
                break;
            case 'w':
                return "Cerai Mati";
                break;
            default:
                return "Lajang";
                break;
        }
    }

    public function getJob()
    {
        switch ($this->stats_of_job) {
            case 'w':
                return "Bekerja";
                break;
            case 'n':
                return "Tidak Bekerja";
                break;
            default:
                return "Pelajar";
                break;
        }
    }

    public function getStatus()
    {
        return $this->active ? 'Aktif' : 'Non-Aktif';
    }

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
