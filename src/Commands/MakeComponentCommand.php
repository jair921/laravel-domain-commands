<?php

namespace Notiv\Console\Commands;

use Illuminate\Support\Str;
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

    /**
     * Get the view name relative to the components directory.
     *
     * @return string view
     */
    protected function getView()
    {
        $name = str_replace('\\', '/', $this->getNameInput());

        return collect(explode('/', $name))
            ->map(function ($part) {
                return Str::kebab($part);
            })
            ->implode('.');
    }
}
