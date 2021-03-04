<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\DomainTrait;

class MakeActionCommand extends \Illuminate\Console\GeneratorCommand
{
    use DomainTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:action';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an action for a given domain';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Action';

    private string $domainSubFolder = 'Actions';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/action.stub');
    }
}
