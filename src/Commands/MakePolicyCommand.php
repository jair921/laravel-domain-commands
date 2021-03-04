<?php

namespace Notiv\Console\Commands;

use Illuminate\Support\Str;
use Notiv\Console\Commands\Helpers\NamespaceResolver;
use Notiv\Console\Commands\Traits\DomainTrait;

class MakePolicyCommand extends \Illuminate\Foundation\Console\PolicyMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Policies';

    /**
     * Build the class with the given name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function buildClass($name)
    {
        $baseClass = \get_parent_class(\get_parent_class($this));
        $stub = $baseClass::buildClass($name);

        $model = $this->option('model');

        return $model ? $this->replaceModel($stub, $model) : $stub;
    }

    /**
     * Replace the model for the given stub.
     *
     * @param string $stub
     * @param string $model
     *
     * @return string
     */
    protected function replaceModel($stub, $model)
    {
        $namespacedModel = NamespaceResolver::resolveDomainNamespace($model, NamespaceResolver::MODEL);

        $model = class_basename(trim($namespacedModel, '\\'));

        $dummyUser = class_basename($this->userProviderModel());

        $dummyModel = Str::camel($model) === 'user' ? 'model' : $model;

        $replace = [
            'NamespacedDummyModel' => $namespacedModel,
            '{{ namespacedModel }}' => $namespacedModel,
            '{{namespacedModel}}' => $namespacedModel,
            'DummyModel' => $model,
            '{{ model }}' => $model,
            '{{model}}' => $model,
            'dummyModel' => Str::camel($dummyModel),
            '{{ modelVariable }}' => Str::camel($dummyModel),
            '{{modelVariable}}' => Str::camel($dummyModel),
            'DummyUser' => $dummyUser,
            '{{ user }}' => $dummyUser,
            '{{user}}' => $dummyUser,
            '$user' => '$' . Str::camel($dummyUser),
        ];

        $stub = str_replace(
            array_keys($replace),
            array_values($replace),
            $stub
        );

        return str_replace(
            "use {$namespacedModel};\nuse {$namespacedModel};",
            "use {$namespacedModel};",
            $stub
        );
    }
}
