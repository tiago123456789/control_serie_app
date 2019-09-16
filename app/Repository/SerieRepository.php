<?php

namespace App\Repository;


use App\Model\Serie;

class SerieRepository extends Repository
{

    public function __construct()
    {
        parent::__construct(new Serie());
    }
}