<?php

namespace Notiv\Console\Commands;

use Illuminate\Support\Str;
use Notiv\Console\Commands\Traits\DomainTrait;
use Symfony\Component\Console\Input\InputOption;

class MakeModelCommand extends \Illuminate\Foundation\Console\ModelMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Models';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $baseCommand = \get_parent_class(\get_parent_class($this));

        if ($baseCommand::handle() === false && !$this->option('force')) {
            return false;
        }

        if ($this->option('all')) {
            $this->input->setOption('factory', true);
            $this->input->setOption('seed', true);
            $this->input->setOption('migration', true);
        }

        if ($this->option('factory')) {
            $this->createFactory();
        }

        if ($this->option('migration')) {
            $this->createMigration();
        }

        if ($this->option('seed')) {
            $this->createSeeder();
        }
    }

    /**
     * Create a model factory for the model.
     */
    protected function createFactory()
    {
        $factory = Str::studly($this->getNameInput());

        $this->call('make:factory', [
            'name' => "{$factory}Factory",
            '--model' => $this->argument('name'),
        ]);
    }

    /**
     * Create a migration file for the model.
     */
    protected function createMigration()
    {
        $table = Str::snake(Str::pluralStudly(class_basename($this->getNameInput())));

        if ($this->option('pivot')) {
            $table = Str::singular($table);
        }

        $this->call('make:migration', [
            'name' => "create_{$table}_table",
            '--create' => $table,
        ]);
    }

    /**
     * Create a seeder file for the model.
     */
    protected function createSeeder()
    {
        $seeder = Str::studly(class_basename($this->getNameInput()));

        $this->call('make:seeder', [
            'name' => "{$seeder}Seeder",
        ]);
    }

    /**
     * Get the console command options.
     *
     * @return array
     */
    protected function getOptions()
    {
        return [
            ['all', 'a', InputOption::VALUE_NONE, 'Generate a migration, seeder, factory for the model'],
            ['factory', 'f', InputOption::VALUE_NONE, 'Create a new factory for the model'],
            ['force', null, InputOption::VALUE_NONE, 'Create the class even if the model already exists'],
            ['migration', 'm', InputOption::VALUE_NONE, 'Create a new migration file for the model'],
            ['seed', 's', InputOption::VALUE_NONE, 'Create a new seeder file for the model'],
            ['pivot', 'p', InputOption::VALUE_NONE, 'Indicates if the generated model should be a custom intermediate table model'],
        ];
    }
}
