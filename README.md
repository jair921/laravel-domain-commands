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

> _Not a good solution, but i don't know how else I can register commands after everything_

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

## Domain Commands

- `make:model <domain:model>`

  Create a new Eloquent model class

  _Example:_ `php artisan make:model User:User`

  **Options:**

  - `--force` Create the class even if the model already exists
  - `-a, --all` Generate a migration, seeder & factory for the model
  - `-f, --factory` Create a new factory for the model
  - `-m, --migration` Create a new migration file for the model
  - `-s, --seed` Create a new seeder file for the model
  - `-p, --pivot` Indicates if the generated model should be a custom intermediate table model

- `make:action <domain:action>`

  Create an action for a given domain

  _Example:_ `php artisan make:action User:CreateUserAction`

- `make:dto <domain:dto>`

  Create a dto for a given domain

  _Example:_ `php artisan make:dto User:CreateUserDTO`

  > You should install https://github.com/spatie/data-transfer-object for convenience

  **Options:**

  - `-r, --request` DTO file with static fromRequest method

- `make:cast <domain:cast>`

  Create a new custom Eloquent cast class

  _Example:_ `php artisan make:cast User:JsonCast`

- `make:collection <domain:collection>`

  Create a collection for a given domain

  _Example:_ `php artisan make:collection User:UserCollection`

- `make:event <domain:event>`

  Create a new event class

  _Example:_ `php artisan make:event User:UserCreatedEvent`

- `make:listener <domain:listener>`

  Create a new event listener class

  _Example:_ `php artisan make:listener User:SendSlackMessage -e User:UserCreatedEvent --queued`

  **Options:**

  - `--queued` Indicates the event listener should be queued
  - `-e, --event=<domain:event>` The event class being listened for

- `make:observer <domain:observer>`

  Create a new observer class

  _Example:_ `php artisan make:observer User:UserObserver -m User:User`

  **Options:**

  - `-m, --model=<domain:model>` The model that the observer applies to

- `make:policy <domain:policy>`

  Create a new policy class

  _Example:_ `php artisan make:policy User:UserPolicy -m User:Post`

  **Options:**

  - `-m, --model=<domain:model>` The model that the policy applies to
  - `-g, --guard=<domain:model>` The guard that the policy relies on

- `make:query-builder <domain:query-builder>`

  Create a query builder for a given domain

  _Example:_ `php artisan make:query-builder User:UserQueryBuilder`

- `make:rule <domain:rule>`

  Create a new validation rule

  _Example:_ `php artisan make:rule User:PasswordMinlengthRule`

  **Options:**

  - `-i, --implicit` Generate an implicit rule

---

## Application Commands

- `make:controller <domain:controller>`

  Create a new controller class

  _Example:_ `php artisan make:controller User:UserController`

  **Options:**

  - `--force` Create the class even if the controller already exists
  - `--api` Exclude the create and edit methods from the controller
  - `-i, --invokable` Generate a single method, invokable controller class
  - `-m <domain:model>, --model=<domain:model>` Generate a resource controller for the given model
  - `-p <domain:model>, --parent=<domain:model>` Generate a nested resource controller class
  - `-r, --resource` Generate a resource controller class

- `make:request <domain:request>`

  Create a new form request class

  _Example:_ `php artisan make:request User:LoginRequest`

- `make:job <domain:job>`

  Create a new job class

  _Example:_ `php artisan make:job User:SendMessageJob`

  **Options:**

  - `--sync` Indicates that job should be synchronous

- `make:mail <domain:mail>`

  Create a new email class

  _Example:_ `php artisan make:mail User:WelcomeUser`

  **Options:**

  - `-f, --force` Create the class even if the mailable already exists
  - `-m, --markdown[=MARKDOWN]` Create a new Markdown template for the mailable

- `make:notification <domain:notification>`

  Create a new notification class

  _Example:_ `php artisan make:notification User:InvoicePaid`

  **Options:**

  - `-f, --force` Create the class even if the notification already exists
  - `-m, --markdown[=MARKDOWN]` Create a new Markdown template for the notification

- `make:middleware <domain:middleware>`

  Create a new middleware class

  _Example:_ `php artisan make:middleware User:AuthMiddleware`

- `make:resource <domain:resource>`

  Create a new resource class

  _Example:_ `php artisan make:resource User:UserResource`

  **Options:**

  - `-c, --collection` Create a resource collection

- `make:component <domain:component>`

  Create a new view component class

  _Example:_ `php artisan make:component User:UserComponent`

  **Options:**

  - `--force` Create the class even if the component already exists
  - `--inline` Create a component that renders an inline view

- `make:view-model <domain:view-model>`

  Create a view-model for a given app

  _Example:_ `php artisan make:view-model User:UsersViewModel`

---

## Database Commands

- `make:factory <domain:factory>`

  Create a new model factory

  _Example:_ `php artisan make:factory UserFactory`

  **Options:**

  - `-m <domain:model>, --model=<domain:model>` Bind factory to the model

---

## TODO:

- **ADD TESTS**
- `make:model --auth` ?
- `make:state [domain:name]`
- `make:{http query builder} [app:name]`
- `make:enum`

## Thanks

- https://stitcher.io/blog/laravel-beyond-crud-01-domain-oriented-laravel and https://stitcher.io/blog/organise-by-domain
- https://github.com/signifly/laravel-domain-commands
