<?php

namespace App\Service;

use App\Exceptions\LogicNegociationException;
use App\Exceptions\MessageException;
use App\Exceptions\NotFoundException;
use App\Repository\SerieRepository;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\DB;

class SerieService
{

    private $repository;

    private $seasonService;

    private $episodeService;

    function __construct(
        SerieRepository $repository, SeasonService $seasonService, EpisodeService $episodeService
    )
    {
        $this->repository = $repository;
        $this->seasonService = $seasonService;
        $this->episodeService = $episodeService;
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

    public function findById($id)
    {
        $serie = $this->repository->findById($id);
        if (!$serie) {
            throw new NotFoundException(MessageException::NOT_FOUND);
        }
        return $serie;
    }

    public function create($newRegister)
    {
        DB::transaction(function() use($newRegister) {
            $serieCreated = $this->repository->create($newRegister);
            $numberSeason = $newRegister["number_season"];
            $numberEpisodePerSeason = $newRegister["number_episode"];
            for ($indice = 0; $indice < $numberSeason; $indice++) {
                $number = ($indice + 1);
                $seasonCreated = $this->seasonService->create(
                    [ "number" => $number, "serie_id" => $serieCreated["id"] ]
                );
                for ($indice2 = 0; $indice2 < $numberEpisodePerSeason; $indice2++) {
                    $numberEpisode = ($indice2 + 1);
                    $this->episodeService->create(
                        [ "number" => $numberEpisode, "season_id" => $seasonCreated["id"] ]
                    );
                }
            }
        });
    }

    public function update($id, $datasModified)
    {
        $this->findById($id);
        $this->repository->update($id, $datasModified);
    }

    public function remove($id)
    {
        $this->findById($id);
        $serieHasSeasonRegister = $this->seasonService->findBySerieId($id);
        if ($serieHasSeasonRegister) {
            throw new LogicNegociationException(MessageException::SERIE_HAS_SEASON);
        }
        $this->repository->remove($id);
    }

}