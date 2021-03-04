# Laravel Domain Commands

# Installation

```
composer require notiv/laravel-domain-commands
```

Add `CommandLoader::loadCommands()` to `app/Console/Kernel.php`

```diff
<?php

...
+use Notiv\Console\CommandLoader;

class Kernel extends ConsoleKernel
{
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

+       CommandLoader::loadCommands();

        require base_path('routes/console.php');
    }
}
```

> *Not a good solution, but i don't know how else I can register commands after everything*

Add `"Domain\\": "app/Domain/"` to `composer.json`

```diff
"autoload": {
  "psr-4": {
      "App\\": "app/",
+     "Domain\\": "app/Domain/",
      "Database\\Factories\\": "database/factories/",
      "Database\\Seeders\\": "database/seeders/"
  }
},
```

You can publish config, if you want
```
php artisan vendor:publish --tag="domain-commands-config"
```


## TODO:
- **ADD TESTS**
- `make:model --auth` ?
- `make:state [domain:name]`
- `make:{http query builder} [app:name]`


## Thanks
- https://stitcher.io/blog/laravel-beyond-crud-01-domain-oriented-laravel and https://stitcher.io/blog/organise-by-domain
- https://github.com/signifly/laravel-domain-commands
