<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Helpers\NamespaceResolver;
use Jair921\Console\Commands\Traits\DomainTrait;

class MakeObserverCommand extends \Illuminate\Foundation\Console\ObserverMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Observers';

    /**
     * Get the fully-qualified model class name.
     *
     * @param string $model
     *
     * @return string
     */
    protected function parseModel($model)
    {
        return NamespaceResolver::resolveDomainNamespace($model, NamespaceResolver::MODEL);
    }
}
