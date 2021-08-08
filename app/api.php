<?php

$router->get('books', 'BookController@index');
$router->post('books', 'BookController@store');