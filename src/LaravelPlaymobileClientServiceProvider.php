<?php

namespace Uzbek\LaravelPlaymobileClient;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelPlaymobileClientServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         */
        $package->name('laravel-playmobile-client')->hasConfigFile();
        $this->app->singleton(LaravelPlaymobileClient::class, function () {
            return new LaravelPlaymobileClient(config('playmobile-client'));
        });
    }
}
