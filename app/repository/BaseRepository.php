<?php

namespace App\Repository;

use App\Dtos\CommentData;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

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

    /**
     * deletes a news, and also linked comments
     */

    public function delete($id)
    {
        $result = $this->model->find($id);
        return $result->delete();
    }

    public function find(int $id): Model
    {
        return $this->model->find($id);
    }

    /**
     * get record list
     */
    public function lists(): Collection
    {
        return $this->model
            ->get()
            ->map(function ($comment) {

                return new CommentData(
                    $comment->id,
                    $comment->body,
                    $comment->created_at,
                    $comment->news_id
                );
            });
    }
}
