<?php

// config for Uzbek/LaravelPlaymobileClient
return [
    'token_lifetime' => env('PLAYMOBILE_TOKEN_DURATION', 24 * 3600 * 30),

    'base_url' => env('PLAYMOBILE_URL', 'https://playmobile.uz/api/v1/'),
    'username' => env('PLAYMOBILE_USERNAME', 'username'),
    'password' => env('PLAYMOBILE_PASSWORD', 'password'),
    'originator' => env('PLAYMOBILE_ORIGINATOR', 3900),

    'proxy_url' => env('PLAYMOBILE_PROXY_URL'),
    'proxy_proto' => env('PLAYMOBILE_PROXY_PROTO'),
    'proxy_host' => env('PLAYMOBILE_PROXY_HOST'),
    'proxy_port' => env('PLAYMOBILE_PROXY_PORT'),
];
