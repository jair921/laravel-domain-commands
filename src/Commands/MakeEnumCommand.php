<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\DomainTrait;

class MakeEnumCommand extends \Illuminate\Console\GeneratorCommand
{
    use DomainTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:enum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an enum for a given domain';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Enum';

    private string $domainSubFolder = 'Enums';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/enum.stub');
    }
}
