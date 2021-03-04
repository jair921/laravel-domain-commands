<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\DomainTrait;

class MakeRuleCommand extends \Illuminate\Foundation\Console\RuleMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Rules';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/rule.stub');
    }
}
