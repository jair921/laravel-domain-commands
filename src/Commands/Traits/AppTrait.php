<?php

namespace Notiv\Console\Commands\Traits;

trait AppTrait
{
    /**
     * Get the root namespace for the class.
     *
     * @return string
     */
    protected function rootNamespace()
    {
        return config('domain-commands.app.default_amespace');
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
        return "{$rootNamespace}\\" . $this->getAppName($this->argument('name')) . '\\' . $this->appSubFolder;
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
     * Get the full namespace for a given class, without the class name.
     *
     * @param string $name
     *
     * @return string
     */
    protected function getNamespace($name)
    {
        return trim(implode('\\', array_slice(explode('\\', 'App\\' . $name), 0, -1)), '\\');
    }

    /**
     * Replace the class name for the given stub.
     *
     * @param string $stub
     * @param string $name
     *
     * @return string
     */
    protected function replaceClass($stub, $name)
    {
        $class = \class_basename($name);

        return str_replace(['DummyClass', '{{ class }}', '{{class}}'], $class, $stub);
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
     * Get the desired app name from the input.
     *
     * @param mixed $name
     *
     * @return string
     */
    protected function getAppName($name)
    {
        // TODO: checks
        return \explode(':', trim($name))[0];
    }

    /**
     * Get the desired app name from the input.
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
