<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Helpers\NamespaceResolver;
use Jair921\Console\Commands\Traits\AppTrait;

class MakeControllerCommand extends \Illuminate\Routing\Console\ControllerMakeCommand
{
    use AppTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:controller-domain';

    private string $appSubFolder = 'Controllers';

    /**
     * Replace the namespace for the given stub.
     *
     * @param string $stub
     * @param string $name
     *
     * @return $this
     */
    protected function replaceNamespace(&$stub, $name)
    {
        $searches = [
            ['DummyNamespace', 'BaseControllerNamespace', 'NamespacedDummyUserModel'],
            ['{{ namespace }}', '{{ baseControllerNamespace }}', '{{ namespacedUserModel }}'],
            ['{{namespace}}', '{{baseControllerNamespace}}', '{{namespacedUserModel}}'],
        ];

        foreach ($searches as $search) {
            $stub = str_replace(
                $search,
                [$this->getNamespace($name), $this->baseControllerNamespace(), $this->userProviderModel()],
                $stub
            );
        }

        return $this;
    }

    /**
     * Build the replacements for a parent controller.
     *
     * @return array
     */
    protected function buildParentReplacements()
    {
        $parentModelClass = NamespaceResolver::resolveDomainNamespace(
            $this->option('parent'),
            NamespaceResolver::MODEL
        );

        if (!class_exists($parentModelClass)) {
            if ($this->confirm("A {$parentModelClass} model does not exist. Do you want to generate it?", true)) {
                $this->call('make:model', ['name' => $this->option('parent')]);
            }
        }

        return [
            'ParentDummyFullModelClass' => $parentModelClass,
            '{{ namespacedParentModel }}' => $parentModelClass,
            '{{namespacedParentModel}}' => $parentModelClass,
            'ParentDummyModelClass' => class_basename($parentModelClass),
            '{{ parentModel }}' => class_basename($parentModelClass),
            '{{parentModel}}' => class_basename($parentModelClass),
            'ParentDummyModelVariable' => lcfirst(class_basename($parentModelClass)),
            '{{ parentModelVariable }}' => lcfirst(class_basename($parentModelClass)),
            '{{parentModelVariable}}' => lcfirst(class_basename($parentModelClass)),
        ];
    }

    /**
     * Build the model replacement values.
     *
     * @return array
     */
    protected function buildModelReplacements(array $replace)
    {
        $modelClass = NamespaceResolver::resolveDomainNamespace(
            $this->option('model'),
            NamespaceResolver::MODEL
        );

        if (!class_exists($modelClass)) {
            if ($this->confirm("A {$modelClass} model does not exist. Do you want to generate it?", true)) {
                $this->call('make:model', ['name' => $this->option('model')]);
            }
        }

        return array_merge($replace, [
            'DummyFullModelClass' => $modelClass,
            '{{ namespacedModel }}' => $modelClass,
            '{{namespacedModel}}' => $modelClass,
            'DummyModelClass' => class_basename($modelClass),
            '{{ model }}' => class_basename($modelClass),
            '{{model}}' => class_basename($modelClass),
            'DummyModelVariable' => lcfirst(class_basename($modelClass)),
            '{{ modelVariable }}' => lcfirst(class_basename($modelClass)),
            '{{modelVariable}}' => lcfirst(class_basename($modelClass)),
        ]);
    }

    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function baseControllerNamespace()
    {
        return config('domain-commands.base_controller');
    }
}
