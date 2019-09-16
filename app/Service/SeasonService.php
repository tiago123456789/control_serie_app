<?php

namespace App\Service;

use App\Exceptions\MessageException;
use App\Exceptions\NotFoundException;
use App\Repository\SeasonRepository;

class SeasonService
{

    private $repository;

    function __construct(SeasonRepository $repository)
    {
        $this->repository = $repository;
    }

    public function findAllBySerieId($serieId)
    {
        return $this->repository->findAllBySerieId($serieId);
    }

    public function findBySerieId($serieId)
    {
        return $this->repository->findBySerieId($serieId);
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
        return $this->repository->create($newRegister);
    }

    public function remove($id)
    {
        $this->findById($id);
        $this->repository->remove($id);
    }

}