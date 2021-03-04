<?php

namespace Notiv\Console;

use Illuminate\Console\Application;

class CommandLoader
{
    public static function loadCommands()
    {
        // TODO: make autoloader
        $commands = [
            Commands\MakeActionCommand::class,
            Commands\MakeCastCommand::class,
            Commands\MakeCollectionCommand::class,
            Commands\MakeComponentCommand::class,
            Commands\MakeControllerCommand::class,
            Commands\MakeDTOCommand::class,
            Commands\MakeEventCommand::class,
            Commands\MakeJobCommand::class,
            Commands\MakeListenerCommand::class,
            Commands\MakeMailCommand::class,
            Commands\MakeMiddlewareCommand::class,
            Commands\MakeModelCommand::class,
            Commands\MakeNotificationCommand::class,
            Commands\MakeObserverCommand::class,
            Commands\MakePolicyCommand::class,
            Commands\MakeQueryBuilderCommand::class,
            Commands\MakeRequestCommand::class,
            Commands\MakeResourceCommand::class,
            Commands\MakeRuleCommand::class,
            Commands\MakeViewModelCommand::class,
        ];

        Application::starting(function ($artisan) use ($commands) {
            foreach ($commands as $command) {
                $artisan->resolve($command);
            }
        });
    }
}
