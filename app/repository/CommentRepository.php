<?php

declare(strict_types=1);

namespace App\Repository;

use App\Dtos\CommentData;
use App\Models\Comment;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class CommentRepository extends BaseRepository
{
    public function __construct(private Comment $comment)
    {
        parent::__construct($comment);
    }

    public function listComments(): Collection
    {
        return $this->comment->get()
            ->map(function ($comment) {

                return new CommentData(
                    $comment->id,
                    $comment->title,
                    $comment->body,
                );
            });
    }

    public function mapData(): ?Collection
    {
        /**
         * mapData implementation here
         */
        return new Collection();
    }
}
