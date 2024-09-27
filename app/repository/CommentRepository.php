<?php

declare(strict_types=1);

namespace App\Repository;

use App\Dtos\CommentData;
use App\Models\Comment;
use App\Repository\BaseRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class CommentRepository extends BaseRepository
{

    public function __construct(private Comment $comment)
    {
        parent::__construct($comment);
    }


    public function addCommentForNews($body, $newsId)
    {
        $db = DB::getInstance();
        $sql = "INSERT INTO `comment` (`body`, `created_at`, `news_id`) VALUES('" . $body . "','" . date('Y-m-d') . "','" . $newsId . "')";
        $db->exec($sql);
        return $db->lastInsertId($sql);
    }

    public function deleteComment($id)
    {
        $db = DB::getInstance();
        $sql = "DELETE FROM `comment` WHERE `id`=" . $id;
        return $db->exec($sql);
    }
}
