<?php

require 'vendor/autoload.php';
require 'nucleus/bootstrap.php';

use App\Nucleus\{Router, Request};

/**
 * -----Front Controller----
 * 
 * All requests to the application goes through here first, then it distributes
 * it to the rest of the application for processing then returns an appropriate response. 
 */


Router::load('app/api.php')
    ->direct(Request::uri(), Request::method());
