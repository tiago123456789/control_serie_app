<?php

namespace App\Http\Controllers;

use App\Service\EpisodeService;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{

    private $service;

    public function __construct(EpisodeService $service)
    {
        $this->service = $service;
    }

    public function markWatched($seasonId, Request $request)
    {
        $ids = $request->watched;
        $this->service->markWatched($ids);
        return redirect()->route("season.episodes", [ "seasonId" => $seasonId ])
            ->with("success", "Episodes marked as watched success!");

    }
}
