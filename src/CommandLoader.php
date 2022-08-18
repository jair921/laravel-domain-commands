<?php

namespace Jair921\Console;

use Illuminate\Console\Application;

class CommandLoader
{
    public static function loadCommands(): array
    {
        return [
            Commands\MakeDomainCommand::class,
            Commands\MakeDomainCrud::class,
            Commands\MakeCastCommand::class,
            Commands\MakeCollectionCommand::class,
            Commands\MakeComponentCommand::class,
            Commands\MakeControllerCommand::class,
            Commands\MakeDTOCommand::class,
            Commands\MakeEventCommand::class,
            Commands\MakeFactoryCommand::class,
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
            Commands\MakeEnumCommand::class,
        ];
    }
}
