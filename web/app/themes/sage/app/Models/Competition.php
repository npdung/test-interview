<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    public $incrementing = false;

    protected $table = 'competitions';
    protected $keyType = 'string';

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function matches()
    {
        return $this->hasMany(FootballMatch::class, 'competition_id');
    }
}
