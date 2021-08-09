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

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


Router::load('app/api.php')
    ->direct(Request::uri(), Request::method());
