<?php

namespace App\Http\Controllers;

use App\Exceptions\ControlSerieException;
use App\Http\Requests\SerieRequest;
use App\Model\Serie;
use App\Service\SerieService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SerieController extends Controller
{

    private $service;

    function __construct(SerieService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        $series = Serie::query()->orderBy("name")->get();
        return view("serie.index", compact("series"));
    }

    public function create()
    {
        return view("serie.new");
    }

    public function store(SerieRequest $request)
    {
        $newSerie = $request->except("_token");
        $this->service->create($newSerie);
        return Redirect::route("serie")
            ->with("success", "New serie created successful!");
    }

    public function remove($id)
    {
        try {
            $this->service->remove($id);
            return Redirect::route("serie")
                ->with("success", "Serie removed successful!");
        } catch(ControlSerieException $e) {
            return back()->withErrors([ $e->getMessage() ]);
        }
    }

    public function update($id, Request $request)
    {
        $datasModified = $request->except("_token");
        $this->service->update($id, $datasModified);
        return response()->json("",  204);
    }
}
