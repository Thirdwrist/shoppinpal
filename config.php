<?php

return [
    'database' => [
        'name' => 'hub',
        'username' => 'root',
        'password' => '',
        'connection' => 'mysql:host=127.0.0.1;port:8889',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
