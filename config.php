<?php

return [
    'database' => [
        'DB_NAME' => 'hub',
        'DB_USER' => 'root',
        'DB_PASS' => 'root',
        'CONNECTION' => 'mysql:host=localhost;port:8889',
        'OPTIONS' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    ]
];
