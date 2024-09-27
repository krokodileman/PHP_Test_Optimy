<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\News;
use App\Repository\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class NewsRepository extends BaseRepository
{

    public function __construct(private News $news)
    {
        parent::__construct($news);
    }

    public function listNews(): ?Collection
    {
        return $this->news
            ->with('comments')
            ->get();
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

        // deletes related comment
        $result->comments()->delete();

        // delete the parent record
        $result->delete();
    }
}
