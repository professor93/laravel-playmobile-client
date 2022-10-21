<?php

namespace Uzbek\LaravelPlaymobileClient\Commands;

use Illuminate\Console\Command;

class LaravelPlaymobileClientCommand extends Command
{
    public $signature = 'laravel-playmobile-client';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
