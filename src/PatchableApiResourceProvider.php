<?php

namespace Brainstud\PatchableApiResource;

use Illuminate\Support\ServiceProvider;

class PatchableApiResourceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(
            'router',
            \Brainstud\PatchableApiResource\PatchableApiResourceRouter::class
        );
    }
}