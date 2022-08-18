<?php

namespace Jair921\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;

class MakeDomainCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:domain {domain}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an domain';

    public function handle(Filesystem $files)
    {
        $path = $this->buildPath();

        if (! $files->isDirectory($path)) {
            $files->makeDirectory($path, 0644, true, true);
        }
    }

    private function buildPath(): string
    {
        return app_path('Domain' ) . DIRECTORY_SEPARATOR . $this->argument('domain');
    }
}
