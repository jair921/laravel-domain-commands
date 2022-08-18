<?php

namespace Jair921\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Filesystem\Filesystem;

class MakeDomainCrud extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'make:crud {Entity}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create an CRUD over domain';

    public function handle(Filesystem $files)
    {
        $entity = $this->argument('Entity');
        $this->call('make:domain', ['domain' => $entity]);
        $this->call("make:model {$entity}:{$entity}");
        $this->call("make:dto {$entity}:{$entity}Data");

        $this->call("make:action {$entity}:Create{$entity}Action");
        $this->call("make:action {$entity}:Destroy{$entity}Action");
        $this->call("make:action {$entity}:Update{$entity}Action");

        $this->call("make:query-builder {$entity}:{$entity}QueryBuilder");
    }

    private function buildPath(): string
    {
        return app_path('Domain' . DIRECTORY_SEPARATOR . $this->argument('domain'));
    }
}
