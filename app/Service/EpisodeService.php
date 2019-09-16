<?php

namespace App\Service;

use App\Exceptions\MessageException;
use App\Exceptions\NotFoundException;
use App\Repository\EpisodeRepository;

class EpisodeService
{

    private $repository;

    function __construct(EpisodeRepository $repository)
    {
        $this->repository = $repository;
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
        $this->repository->create($newRegister);
    }

    public function remove($id)
    {
        $this->findById($id);
        $this->repository->remove($id);
    }

}