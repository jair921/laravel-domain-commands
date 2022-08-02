<?php

namespace Jair921\Console\Commands;

use Jair921\Console\Commands\Traits\DomainTrait;

class MakeCastCommand extends \Illuminate\Foundation\Console\CastMakeCommand
{
    use DomainTrait;

    private string $domainSubFolder = 'Casts';
}
