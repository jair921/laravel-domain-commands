<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\AppTrait;

class MakeNotificationCommand extends \Illuminate\Foundation\Console\NotificationMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Notifications';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->option('markdown')
                        ? $this->resolveStubPath('/stubs/markdown-notification.stub')
                        : $this->resolveStubPath('/stubs/notification.stub');
    }
}
