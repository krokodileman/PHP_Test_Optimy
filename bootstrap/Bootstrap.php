<?php

declare(strict_types=1);

namespace App;

use App\Models\Database;
use App\Models\News;
use App\Repository\NewsRepository;
use App\Services\NewsService;

error_reporting(E_ALL);

require __DIR__ . '/../vendor/autoload.php';

\Dotenv\Dotenv::createImmutable(__DIR__ . '/../')->load();


$config = require __DIR__ . '/../config.php';

/**
 * container for binding 
 */

$container = new Container();

$container->bind(
    Database::class,
    function () {
        return new Database(new \Illuminate\Database\Capsule\Manager());
    }
);

$container->bind(
    NewsRepository::class,
    function () {
        return  new NewsRepository(new News());
    }
);


$container->bind(
    NewsService::class,
    function () {
        return  new NewsService(new NewsRepository(new News()));
    }
);

/**
 * Wrapper that can be called anywhere in the app
 * container wrapped
 */
App::setContainer($container);


/**
 * resolve database manager dependency
 */
App::resolve(Database::class)
    ->connection($config['connection']['mysql']);
