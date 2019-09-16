<?php

namespace App\Repository;


use App\Model\Episode;

class EpisodeRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(new Episode());
    }

    public function markWatched(array $ids)
    {
        $this->model->whereIn("id", $ids)->update([ "watched" => true ]);
    }

    public function findAllBySeasonId($seasonId)
    {
        return $this->model->where("season_id", $seasonId)->get();
    }
}