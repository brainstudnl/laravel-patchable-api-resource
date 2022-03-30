# Laravel Patchable API Resource

`laravel-patchable-api-resource` is a faster way to register patchable API resources in your routes file.

By registering a route as `patchable-api-resource` it differentiates between `PUT` and `PATCH` and calls the `update()` or `patch()` method on your controller.

## Installation
Require the package
```bash
composer require brainstud/laravel-patchable-api-resource
```

Add the following to `bootstrap/app.php`:

```php
$app->singleton(
    'router',
    \Brainstud\PatchableApiResource\PatchableApiResourceRouter::class
);

## Usage
Registering a patchable API-resource works the same as the default `Route::apiResource` and `Route::apiResources` methods.

```php
// api.php

Route::patchableApiResources([
    'items' => ItemsController::class,
]);

Route::patchableApiResource('items', ItemController::class);
```

## License
laravel-patchable-api-resource is open-sourced software licensed under the [MIT Licence](LICENSE)