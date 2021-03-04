<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\DomainTrait;

class MakeCastCommand extends \Illuminate\Foundation\Console\CastMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Casts';
}
