<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cross-Origin Resource Sharing (CORS) Configuration
    |--------------------------------------------------------------------------
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['GET, POST, PUT'],

    'allowed_origins' => ['https://ti054e02.agussbn.my.id', 'https://ti054e03.agussbn.my.id'], // <- ganti dengan domain tertentu untuk keamanan

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    'supports_credentials' => false,

];
