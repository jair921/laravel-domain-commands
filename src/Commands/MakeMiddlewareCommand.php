<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\AppTrait;

class MakeMiddlewareCommand extends \Illuminate\Routing\Console\MiddlewareMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Middlewares';
}
