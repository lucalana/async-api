<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NbaService
{
    public function getTeams(?string $division = null, ?string $conference = null)
    {
        $params = array_filter(get_defined_vars());
        return Http::nbaApi()
            ->get('/v1/teams', $params)
            ->json();
    }
}
