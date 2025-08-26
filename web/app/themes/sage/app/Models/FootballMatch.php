<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class FootballMatch extends Model
{
    public $incrementing = false;

    protected $table = 'matches';
    protected $keyType = 'string';

    protected $casts = [
        'home_scores' => 'array',
        'away_scores' => 'array',
        'match_time' => 'datetime',
    ];

    public function getStatusLabelAttribute()
    {
        return match($this->status_id) {
            1 => 'Not started',
            2 => 'First half',
            3 => 'Half-time',
            4 => 'Second half',
            5 => 'Overtime',
            6 => 'Overtime(deprecated)',
            7 => 'Penalty Shoot-out',
            8 => 'End',
            9 => 'Delay',
            default => 'Unknown',
        };
    }

    public function getCurrentTimeAttribute()
    {
        if (!in_array($this->status_id, [2, 4, 5, 6, 7])) {
            return null;
        }

        $now = Carbon::now();
        $start = $this->match_time;

        $elapsed = round($start->diffInMinutes($now));

        $minute = null;

        if ($this->status_id == 2) {
            $minute = $elapsed;
        }

        if ($this->status_id == 4 && $elapsed >= 45 + 15) {
            $elapsed -= 15;
            $minute = $elapsed;
        }

        if ($this->status_id == 5 && $elapsed >= 45 + 15 + 45) {
            $elapsed -= 15 + 45;
            $minute = $elapsed;
        }

        if ($minute === null || $minute > 140) {
            return '---';
        }

        return "$minute'";
    }

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'competition_id');
    }

    public function homeTeam()
    {
        return $this->belongsTo(Team::class, 'home_team_id');
    }

    public function awayTeam()
    {
        return $this->belongsTo(Team::class, 'away_team_id');
    }
}
