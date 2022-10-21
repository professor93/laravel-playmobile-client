<?php

namespace Uzbek\LaravelPlaymobileClient\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Uzbek\LaravelPlaymobileClient\LaravelPlaymobileClient
 */
class LaravelPlaymobileClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Uzbek\LaravelPlaymobileClient\LaravelPlaymobileClient::class;
    }
}
