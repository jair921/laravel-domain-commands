<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\DomainTrait;

class MakeQueryBuilderCommand extends \Illuminate\Console\GeneratorCommand
{
    use DomainTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:query-builder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a query builder for a given domain';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'QueryBuilder';

    private string $domainSubFolder = 'QueryBuilders';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/query-builder.stub');
    }
}
