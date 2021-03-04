<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\DomainTrait;

class MakeCollectionCommand extends \Illuminate\Console\GeneratorCommand
{
    use DomainTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:collection';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a collection for a given domain';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Collection';

    private string $domainSubFolder = 'Collections';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/collection.stub');
    }
}
