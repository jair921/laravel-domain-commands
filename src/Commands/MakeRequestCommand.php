<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\AppTrait;

class MakeRequestCommand extends \Illuminate\Foundation\Console\RequestMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Requests';
}
