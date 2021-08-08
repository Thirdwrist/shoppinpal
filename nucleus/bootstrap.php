<?php

use App\Nucleus\Database\Connection;
use App\Nucleus\App;

/**
 * Bind configurations to the app container
 */
App::bind('config', require 'config.php');

/**
 * Bind the database connection instance to the container 
 */
App::bind('database', Connection::make(App::get('config')['database']));

/**
 * Bind validation rules
 */
App::bind('validate', require 'app/rules.php');
