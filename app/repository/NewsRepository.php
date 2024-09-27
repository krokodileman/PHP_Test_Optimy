<?php

declare(strict_types=1);

namespace App\Repository;

use App\Dtos\NewsData;
use App\Models\News;
use App\Repository\BaseRepository;
use Illuminate\Support\Collection;

class NewsRepository extends BaseRepository
{

    public function __construct(private News $news)
    {
        parent::__construct($news);
    }

    /**
     * get news list
     */
    public function listNews(): ?Collection
    {
        return $this->news->get()
            ->map(function ($comment) {

                return new NewsData(
                    $comment->id,
                    $comment->title,
                    $comment->body,
                );
            });
    }

    /**
     * deletes a news, and also linked comments
     */
    public function deleteNews($id)
    {
        $result = $this->news
            ->where('id', $id)
            ->with('comments')
            ->first();

        /** throw error for empty result */
        if (empty($result)) {
            throw new \Exception('No record found');
        }

        // deletes related comment
        $result->comments()->delete();

        // delete the parent record
        $result->delete();
    }
}
