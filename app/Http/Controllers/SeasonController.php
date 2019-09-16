<?php

namespace App\Http\Controllers;

use App\Service\SeasonService;

class SeasonController extends Controller
{
    private $service;

    function __construct(SeasonService $service)
    {
        $this->service = $service;
    }

    public function index($serieId)
    {
        $seasons = $this->service->findAllBySerieId($serieId);
        return view("season.index", compact("seasons"));
    }
}
