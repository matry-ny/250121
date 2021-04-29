<?php

return [
    'db' => [
        'host' => 'db',
        'user' => 'skillup_user',
        'password' => 'skillup_pwd',
        'name' => 'skillup_db',
    ],
    'views' => [
        'dir' => __DIR__ . '/../views',
        'ext' => '.php',
        'layouts' => [
            'dir' => __DIR__ . '/../views/layouts',
            'default' => 'main',
            'guest' => 'guest',
        ],
    ],
    'viewsDir' => __DIR__ . '/../views'
];
