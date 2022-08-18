<?php

namespace Jair921\Console;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/domain-commands.php' => config_path('domain-commands.php'),
            ], 'domain-commands-config');

            $this->commands(CommandLoader::loadCommands());
        }

        $this->mergeConfigFrom(__DIR__ . '/../config/domain-commands.php', 'domain-commands');
    }
}
