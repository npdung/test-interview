<?php

namespace App\View\Composers;

use App\Models\FootballMatch;
use Roots\Acorn\View\Composer;

class App extends Composer
{
    /**
     * List of views served by this composer.
     *
     * @var array
     */
    protected static $views = [
        '*',
    ];

    /**
     * Retrieve the site name.
     */
    public function siteName(): string
    {
        return get_bloginfo('name', 'display');
    }

    public function with()
    {
        $filter = request('filter', 'all');

        $query = FootballMatch::with(
            [
                'competition.country',
                'homeTeam',
                'awayTeam'
            ]
        );

        switch ($filter) {
            case 'live':
                $query->whereIn('status_id', [2, 3, 4, 5, 6, 7]);
                break;
            case 'finished':
                $query->where('status_id', 8);
                break;
            case 'scheduled':
                $query->where('status_id', 1);
                break;
            case 'all':
            default:
                break;
        }

        $liveCount = FootballMatch::whereIn('status_id', [2, 3, 4, 5, 6, 7])->get()->count();

        $matches = $query->get();

        $competitions = $matches->groupBy(function($match) {
            return $match->competition->id;
        })->map(function($groupedMatches) {
            return [
                'info' => $groupedMatches->first()->competition,
                'matches' => $groupedMatches,
            ];
        });

        return [
            'competitions' => $competitions,
            'liveCount' => $liveCount,
            'filter' => $filter,
        ];
    }
}
