<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\DomainTrait;

class MakeDTOCommand extends \Illuminate\Console\GeneratorCommand
{
    use DomainTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:dto';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a dto for a given domain';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'DTO';

    private string $domainSubFolder = 'DTO';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/dto.stub');
    }
}
