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

    public function addNews(string $title, string $body): bool
    {
        $news = $this->news;

        $news->title = $title;
        $news->created_at = Carbon::now();
        $news->body = $body;

        return $news->save();
    }

    /**
     * deletes a news, and also linked comments
     */
    public function deleteNews($id)
    {
        //     $comments = $this->newsModel->listComments();
        //     $idsToDelete = [];

        //     foreach ($comments as $comment) {
        //         if ($comment->getNewsId() == $id) {
        //             $idsToDelete[] = $comment->getId();
        //         }
        //     }

        //     foreach ($idsToDelete as $id) {
        //         CommentManager::getInstance()->deleteComment($id);
        //     }

        //     $db = DB::getInstance();
        //     $sql = "DELETE FROM `news` WHERE `id`=" . $id;
        //     return $db->exec($sql);
    }
}
