<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\AppTrait;

class MakeComponentCommand extends \Illuminate\Foundation\Console\ComponentMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Components';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/view-component.stub');
    }
}
