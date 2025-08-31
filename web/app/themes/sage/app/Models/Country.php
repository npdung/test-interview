<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public $incrementing = false;

    protected $table = 'countries';
    protected $keyType = 'string';
}
