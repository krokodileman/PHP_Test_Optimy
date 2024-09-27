<?php

declare(strict_types=1);

use App\App;
use App\Repository\NewsRepository;
use App\Services\NewsService;

require __DIR__ . '/../bootstrap/Bootstrap.php';


$news = App::resolve(NewsService::class)->mapData();


foreach ($news as $key => $n) {

    echo ("############ NEWS " . $n->title . " ############\n");
    echo ($n->body . "\n");


    $n->comment->each(function ($comment) {
        echo ("Comment " . $comment->id . " : " . $comment->body . "\n");
    });
};
