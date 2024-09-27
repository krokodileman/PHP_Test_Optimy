<?php

defined('DBDRIVER') or define('DBDRIVER', $_ENV['DB_CONNECTION']);
defined('DBHOST') or define('DBHOST', $_ENV['DB_HOST']);
defined('DBNAME') or define('DBNAME', $_ENV['DB_DATABASE']);
defined('DBUSER') or define('DBUSER', $_ENV['DB_USERNAME']);
defined('DBPASS') or define('DBPASS', $_ENV['DB_PASSWORD']);
defined('DBPORT') or define('DBPORT', $_ENV['DB_PORT']);
