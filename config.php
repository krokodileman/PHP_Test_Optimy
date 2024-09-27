<?php

defined('DBDRIVER') or define('DBDRIVER', $_ENV['DB_CONNECTION']);
defined('DBHOST') or define('DBHOST', $_ENV['DB_HOST']);
defined('DBNAME') or define('DBNAME', $_ENV['DB_DATABASE']);
defined('DBUSER') or define('DBUSER', $_ENV['DB_USERNAME']);
defined('DBPASS') or define('DBPASS', $_ENV['DB_PASSWORD']);
defined('DBPORT') or define('DBPORT', $_ENV['DB_PORT']);


return [
    'connection' => [
        'driver' => $_ENV['DB_CONNECTION'],
        'host' => $_ENV['DB_HOST'],
        'database' => $_ENV['DB_DATABASE'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'port' => $_ENV['DB_PORT'],
        'charset' => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix' => '',
    ],

];
