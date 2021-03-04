<?php

namespace Notiv\Console\Commands\Traits;

trait DomainTrait
{
    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return config('domain-commands.domain_namespace');
    }

    /**
     * Get the destination class path.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getPath($name)
    {
        return $this->laravel['path'] . '/' . str_replace('\\', '/', $name) . '.php';
    }

    /**
     * Get the default namespace for the class.
     *
     * @param string $rootNamespace
     *
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return "{$rootNamespace}\\" . $this->getDomainName($this->argument('name')) . '\\' . $this->domainSubFolder;
    }

    /**
     * Resolve the fully-qualified path to the stub.
     *
     * @param string $stub
     *
     * @return string
     */
    protected function resolveStubPath($stub)
    {
        return file_exists($customPath = $this->laravel->basePath(trim($stub, '/')))
            ? $customPath
            : dirname(__DIR__, 1) . $stub;
    }

    /**
     * Get the desired class name from the input.
     *
     * @return string
     */
    protected function getNameInput()
    {
        return $this->getClassName($this->argument('name'));
    }

    /**
     * Get the desired domain name from the input.
     *
     * @param mixed $name
     *
     * @return string
     */
    protected function getDomainName($name)
    {
        // TODO: checks
        return \explode(':', trim($name))[0];
    }

    /**
     * Get the desired domain name from the input.
     *
     * @param mixed $name
     *
     * @return string
     */
    protected function getClassName($name)
    {
        // TODO: checks
        return \explode(':', trim($name))[1];
    }
}
