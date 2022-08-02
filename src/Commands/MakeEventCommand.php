<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\DomainTrait;

class MakeEventCommand extends \Illuminate\Foundation\Console\EventMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Events';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/event.stub');
    }
}
