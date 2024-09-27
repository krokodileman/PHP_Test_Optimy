<?php

declare(strict_types=1);

use App\Models\Database;
use App\Models\News;
use App\Repository\NewsRepository;
use App\Services\NewsService;
use Carbon\Carbon;

require __DIR__ . '/../bootstrap/Bootstrap.php';

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$config = require('../config.php');

// init db connection
(new Database(new \Illuminate\Database\Capsule\Manager()))->connection();

$repo = new  NewsRepository(new News());
$result = $repo->create(['title' => 'Title', 'body' => 'Body']);

var_export($result);

// $repo->addNews("Title {now()}", "Description {Carbon::now()}");


$news = new NewsService($repo);
