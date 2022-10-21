<?php

// config for Uzbek/LaravelPlaymobileClient
return [
    'token_lifetime' => env('PLAYMOBILE_TOKEN_DURATION', 24 * 3600 * 30),

    'api_url' => env('PLAYMOBILE_URL'),
    'email' => env('PLAYMOBILE_USERNAME'),
    'password' => env('PLAYMOBILE_PASSWORD'),
    'originator' => env('PLAYMOBILE_ORIGINATOR'),

    'proxy_url' => env('PLAYMOBILE_PROXY_URL'),
    'proxy_proto' => env('PLAYMOBILE_PROXY_PROTO'),
    'proxy_host' => env('PLAYMOBILE_PROXY_HOST'),
    'proxy_port' => env('PLAYMOBILE_PROXY_PORT'),
];
