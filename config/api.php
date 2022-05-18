<?php

return [
    'winthor' => [
        'url'      => env('WINTHOR_API_URL', 'https://api1.evolusom.com.br'),
        'login'    => env('WINTHOR_API_LOGIN', ''),
        'password' => env('WINTHOR_API_PASSWORD', ''),
    ],
    'portal'  => [
        'url' => env('PORTAL_API_URL', 'https://portal.evolusom.com.br/api/'),
    ]
];
