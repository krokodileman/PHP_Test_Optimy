<?php

declare(strict_types=1);

namespace App;

use App\Models\Database;
use App\Models\News;
use App\Repository\NewsRepository;
use App\Services\NewsService;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$config = require __DIR__ . '/../config.php';

/**
 * Container to bind dependencies 
 */

$container = new Container();

$container->bind(
    Database::class,
    function () {
        return new Database(new \Illuminate\Database\Capsule\Manager());
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
    ->connection($config['connection']);
