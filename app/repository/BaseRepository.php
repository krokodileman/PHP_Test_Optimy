<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    public function __construct(protected Model $model) {}


    /**
     * add a record in news table
     * returns boolean
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }
    public function update() {}
    public function delete() {}
    public function find() {}

    // abstract protected function getModel(): Model;
}
