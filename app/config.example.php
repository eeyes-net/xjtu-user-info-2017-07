<?php

return [
    'cas_server' => [
        'host' => 'cas.eeyes.net',
        'port' => 443,
        'context' => '',
        'validation' => false,
    ],
    'users' => [
    ],
    'user_info_server' => [
        'url' => '',
        'auth' => function ($func_name, $params) {
        },
    ],
    'get_user_photo' => function ($stu_id) {
    },
];
