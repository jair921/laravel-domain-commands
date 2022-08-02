<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\AppTrait;

class MakeMiddlewareCommand extends \Illuminate\Routing\Console\MiddlewareMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Middlewares';
}
