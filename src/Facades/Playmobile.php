<?php

namespace Uzbek\LaravelPlaymobileClient\Facades;

use Illuminate\Support\Facades\Facade;
use Uzbek\LaravelPlaymobileClient\LaravelPlaymobileClient;

/**
 * @see \Uzbek\LaravelPlaymobileClient\LaravelPlaymobileClient
 */
class Playmobile extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return LaravelPlaymobileClient::class;
    }
}
