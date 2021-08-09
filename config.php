<?php

return [
    'database' => [
        'name' => 'hub',
        'username' => 'root',
        'password' => 'root',
        'connection' => 'mysql:host=localhost;port:8889',
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
