<?php

use App\Nucleus\Database\Connection;
use App\Nucleus\App;

/**
 * Bind configurations to the app container
 */
App::bind('config', require 'config.php');

/**
 * Bind DB connection instance to the container with respect to the app environment
 */
$config = $GLOBALS['ENV'] == 'testing'? $GLOBALS : App::get('config')['database'];
App::bind('database', Connection::make($config));

/**
 * Bind validation rules
 */
App::bind('validate', require 'app/rules.php');
