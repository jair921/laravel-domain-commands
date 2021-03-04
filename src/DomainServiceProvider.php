<?php

namespace Notiv\Console;

use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/domain-commands.php' => config_path('domain-commands.php'),
            ], 'domain-commands-config');

            $this->commands([
                \Notiv\Console\Commands\MakeActionCommand::class,
                \Notiv\Console\Commands\MakeCastCommand::class,
                \Notiv\Console\Commands\MakeCollectionCommand::class,
                \Notiv\Console\Commands\MakeControllerCommand::class,
                \Notiv\Console\Commands\MakeDTOCommand::class,
                \Notiv\Console\Commands\MakeEventCommand::class,
                \Notiv\Console\Commands\MakeJobCommand::class,
                \Notiv\Console\Commands\MakeListenerCommand::class,
                \Notiv\Console\Commands\MakeMailCommand::class,
                \Notiv\Console\Commands\MakeMiddlewareCommand::class,
                \Notiv\Console\Commands\MakeModelCommand::class,
                \Notiv\Console\Commands\MakeNotificationCommand::class,
                \Notiv\Console\Commands\MakeObserverCommand::class,
                \Notiv\Console\Commands\MakePolicyCommand::class,
                \Notiv\Console\Commands\MakeQueryBuilderCommand::class,
                \Notiv\Console\Commands\MakeRequestCommand::class,
                \Notiv\Console\Commands\MakeResourceCommand::class,
                \Notiv\Console\Commands\MakeRuleCommand::class,
                \Notiv\Console\Commands\MakeViewModelCommand::class,
            ]);
        }

        $this->mergeConfigFrom(__DIR__ . '/../config/domain-commands.php', 'domain-commands');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
    }
}
