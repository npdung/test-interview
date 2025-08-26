<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public $incrementing = false;

    protected $table = 'teams';
    protected $keyType = 'string';

    public function competition()
    {
        return $this->belongsTo(Team::class, 'competition_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }
}
