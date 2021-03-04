<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Helpers\NamespaceResolver;
use Notiv\Console\Commands\Traits\DomainTrait;

class MakeListenerCommand extends \Illuminate\Foundation\Console\ListenerMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Listeners';

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $stub = parent::buildClass($name);

        if ($this->option('event')) {
            $this->replaceEvent($stub);
        }

        return $stub;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        if ($this->option('queued')) {
            return $this->option('event')
                        ? $this->resolveStubPath('/stubs/listener-queued.stub')
                        : $this->resolveStubPath('/stubs/listener-queued-duck.stub');
        }

        return $this->option('event')
                    ? $this->resolveStubPath('/stubs/listener.stub')
                    : $this->resolveStubPath('/stubs/listener-duck.stub');
    }

    protected function replaceEvent(&$stub)
    {
        $eventName = $this->getClassName($this->option('event'));

        $stub = str_replace(['{{ event }}', '{{event}}'], $eventName, $stub);

        $eventNamespace = NamespaceResolver::resolveDomainNamespace(
            $this->option('event'),
            NamespaceResolver::EVENT
        );

        if (!class_exists($eventNamespace)) {
            if ($this->confirm("A {$eventNamespace} event does not exist. Do you want to generate it?", true)) {
                $this->call('make:event', ['name' => $this->option('event')]);
            }
        }

        $stub = str_replace(['{{ eventNamespace }}', '{{eventNamespace}}'], $eventNamespace, $stub);

        return $this;
    }
}
