<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\AppTrait;

class MakeViewModelCommand extends \Illuminate\Console\GeneratorCommand
{
    use AppTrait;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:view-model';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a view-model for a given app';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'ViewModel';

    private string $appSubFolder = 'ViewModels';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/view-model.stub');
    }
}
