<?php

/**
 * 
 * All API routes live here, each http request is matched to it's corresponding controller method that 
 * handles the request and returns an appropriate response
 * 
 */

$router->get('api/books', 'BookController@index');

$router->post('api/books', 'BookController@store');

$router->get('api/docs/json', 'BookController@json');