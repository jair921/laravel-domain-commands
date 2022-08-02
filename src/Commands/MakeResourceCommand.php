<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\AppTrait;

class MakeResourceCommand extends \Illuminate\Foundation\Console\ResourceMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Resources';
}
