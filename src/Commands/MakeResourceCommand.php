<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\AppTrait;

class MakeResourceCommand extends \Illuminate\Foundation\Console\ResourceMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Resources';
}
