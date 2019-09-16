<?php

namespace App\Repository;


use Illuminate\Database\Eloquent\Model;

abstract class Repository
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function findAll()
    {
        return $this->model->query()->get();
    }

    public function findById($id)
    {
        return $this->model->query()->where("id", $id)->first();
    }

    public function update($id, $datasModified)
    {
        $this->getNamespaceModel()::where("id", $id)->update($datasModified);
    }

    public function remove($id)
    {
        $this->getNamespaceModel()::destroy($id);
    }

    public function create($newRegister)
    {
        return $this->getNamespaceModel()::create($newRegister);
    }

    private function getNamespaceModel()
    {
        return get_class($this->model);
    }
}