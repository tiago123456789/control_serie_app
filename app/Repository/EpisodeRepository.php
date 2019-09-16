<?php

namespace App\Repository;


use App\Model\Episode;

class EpisodeRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(new Episode());
    }
}