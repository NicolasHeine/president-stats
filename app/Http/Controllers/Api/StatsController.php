<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\StatsCollection;
use App\Models\Stats;
use Illuminate\Http\Request;

class StatsController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $stats = new Stats($request->type);

        return new StatsCollection(
            resource: $stats->getStats()
        );
    }
}
