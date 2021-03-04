<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\AppTrait;

class MakeJobCommand extends \Illuminate\Foundation\Console\JobMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Jobs';
}
