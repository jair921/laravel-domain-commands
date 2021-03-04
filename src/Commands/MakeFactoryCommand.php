<?php

namespace Notiv\Console\Commands;

use Illuminate\Support\Str;
use Notiv\Console\Commands\Helpers\NamespaceResolver;

class MakeFactoryCommand extends \Illuminate\Database\Console\Factories\FactoryMakeCommand
{
    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $factory = class_basename(Str::ucfirst(str_replace('Factory', '', $name)));

        $namespaceModel = NamespaceResolver::resolveDomainNamespace($this->option('model'), NamespaceResolver::MODEL);

        $model = class_basename($namespaceModel);

        if (Str::startsWith($namespaceModel, $this->rootNamespace() . 'Models')) {
            $namespace = Str::beforeLast('Database\\Factories\\' . Str::after($namespaceModel, $this->rootNamespace() . 'Models\\'), '\\');
        } else {
            $namespace = 'Database\\Factories';
        }

        $replace = [
            '{{ factoryNamespace }}' => $namespace,
            'NamespacedDummyModel' => $namespaceModel,
            '{{ namespacedModel }}' => $namespaceModel,
            '{{namespacedModel}}' => $namespaceModel,
            'DummyModel' => $model,
            '{{ model }}' => $model,
            '{{model}}' => $model,
            '{{ factory }}' => $factory,
            '{{factory}}' => $factory,
        ];

        $parent = \get_parent_class(\get_parent_class($this));

        return str_replace(
            array_keys($replace),
            array_values($replace),
            $parent::buildClass($name)
        );
    }
}
