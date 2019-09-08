<?php

namespace App\Http\Controllers;

use App\Http\Requests\SerieRequest;
use App\Model\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SerieController extends Controller
{

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
        Serie::create($newSerie);
        return Redirect::route("serie")
            ->with("success", "New serie created successful!");
    }

    public function remove($id)
    {
        Serie::destroy($id);
        return Redirect::route("serie")
            ->with("success", "Serie removed successful!");
    }
}
