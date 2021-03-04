<?php

namespace Notiv\Console\Commands;

use Notiv\Console\Commands\Traits\AppTrait;

class MakeMailCommand extends \Illuminate\Foundation\Console\MailMakeCommand
{
    use AppTrait;

    private string $appSubFolder = 'Mails';

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->option('markdown')
                        ? $this->resolveStubPath('/stubs/markdown-mail.stub')
                        : $this->resolveStubPath('/stubs/mail.stub');
    }
}
