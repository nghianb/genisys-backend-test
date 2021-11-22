<?php

namespace App\Http\Controllers;

use App\Models\ShortenUrl;
use App\Models\Visit;
use Illuminate\Support\Facades\DB;

class ShortenUrlAnalyticController extends Controller
{
    public function showPageView(ShortenUrl $shortenUrl)
    {
        $pageViews = Visit::where('shorten_url_id', $shortenUrl->id)
            ->groupByRaw('Date(created_at)')
            ->select(DB::raw('Date(created_at) as date, count(*) as views'))
            ->get();

        return response()->json($pageViews);
    }

    public function showDevice(ShortenUrl $shortenUrl)
    {
        $deviceNames = collect([
            'desktop',
            'mobile',
            'tablet'
        ]);

        return response()->json($deviceNames->map(function ($deviceName) use ($shortenUrl) {
            return [
                'device' => $deviceName,
                'count' => $shortenUrl->visitors()
                    ->whereHas('device', function ($query) use ($deviceName) {
                        return $query->where('kind', $deviceName);
                    })
                    ->count()
            ];
        }));
    }
}
