<?php

/**
 * 
 * All API routes live here, each http request is matched to it's corresponding controller method that 
 * handles the request and returns an appropriate response
 * 
 */

$router->get('books', 'BookController@index');
$router->post('books', 'BookController@store');