<?php

namespace App\Http\Controllers;

use App\Service\EpisodeService;
use App\Service\SeasonService;

class SeasonController extends Controller
{
    private $service;

    private $episodeService;

    function __construct(SeasonService $service, EpisodeService $episodeService)
    {
        $this->service = $service;
        $this->episodeService = $episodeService;
    }

    public function findAllEpisodesBySeasonId($seasonId)
    {
        $episodes = $this->episodeService->findAllBySeasonId($seasonId);
        return view("episode.index", compact("episodes", "seasonId"));
    }

    public function index($serieId)
    {
        $seasons = $this->service->findAllBySerieId($serieId);
        return view("season.index", compact("seasons"));
    }
}
