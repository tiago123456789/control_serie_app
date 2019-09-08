<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix("series")
    ->group(function () {

        Route::get("/", "SerieController@index")->name("serie");
        Route::get("/new", "SerieController@create")->name("serie.new");
        Route::post("/new", "SerieController@store")->name("serie.new");
        Route::delete("/{id}", "SerieController@remove")->name("serie.delete");
    });
