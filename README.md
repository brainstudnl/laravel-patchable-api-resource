To install add the following to bootstrap/app.php:
```
$app->singleton(
    'router',
    \Brainstud\PatchableApiResource\PatchableApiResourceRouter::class
);