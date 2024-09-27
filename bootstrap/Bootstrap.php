<?php

declare(strict_types=1);

namespace App;

use App\Models\Database;
use App\Models\News;
use App\Repository\NewsRepository;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

// init db connection
// new Database();


App::setContainer(new Container());

App::container()->bind(
    NewsRepository::class,
    function () {
        return new News();
    }
);

// $container->bind(News::class, function () {});
// /**
//  * Register the error handler
//  */
// $whoops = new \Whoops\Run;
// if ($environment !== 'production') {
//     $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
// } else {
//     $whoops->pushHandler(function ($e) {
//         echo 'Todo: Friendly error page and send an email to the developer';
//     });
// }
// $whoops->register();

// throw new \Exception;
