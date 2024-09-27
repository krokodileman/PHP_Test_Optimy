<?php

use App\App;
use App\Repository\NewsRepository;
use App\Services\NewsService;
use Carbon\Carbon;

function printNewsData()
{
    $news = App::resolve(NewsService::class)->mapData();

    foreach ($news as $key => $n) {

        echo ("############ NEWS " . $n->title . " ############\n");
        echo ($n->body . "\n");

        $n->comment->each(function ($comment) {
            echo ("Comment " . $comment->id . " : " . $comment->body . "\n");
        });
    };
}

/** Uncomment below codes to test NewsRepository*/

/**
 *  @param - array
 */

// App::resolve(NewsRepository::class)->create([
//     'title' => 'News Title',
//     'body' => 'TestDescription',
//     'created_at' => Carbon::now(),
// ]);


/**
 *  @param - int 
 */
// App::resolve(NewsRepository::class)->delete(1);


App::resolve(NewsRepository::class)->deleteNews(3);
