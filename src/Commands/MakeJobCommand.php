<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\AppTrait;

class MakeJobCommand extends \Illuminate\Foundation\Console\JobMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Jobs';
}
