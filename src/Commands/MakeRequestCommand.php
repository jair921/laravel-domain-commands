<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\AppTrait;

class MakeRequestCommand extends \Illuminate\Foundation\Console\RequestMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Requests';
}
