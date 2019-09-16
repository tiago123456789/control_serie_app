<?php

namespace App\Repository;


use App\Model\Season;

class SeasonRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(new Season());
    }

    public function findAllBySerieId($serieId)
    {
        return $this->model->where("serie_id", $serieId)->get();
    }
    public function findBySerieId($serieId)
    {
        return $this->model->where("serie_id", $serieId)->first();
    }
}