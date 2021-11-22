<?php

use Illuminate\Routing\PendingResourceRegistration;
use Illuminate\Routing\Router;

class PatchableApiResourceRouter extends Router
{
    /**
     * Register an array of API resource controllers with a separate put and patch.
     *
     * @param array $resources
     * @param array $options
     * @return void
     */
    public function patchableApiResources(array $resources, array $options = []): void
    {
        foreach ($resources as $name => $controller) {
            $this->patchableApiResource($name, $controller, $options);
        }
    }

    /**
     * Route an API resource to a controller with a separate put and patch.
     *
     * @param $name
     * @param $controller
     * @param array $options
     */
    public function patchableApiResource($name, $controller, array $options = [])
    {
        $only = ['index', 'show', 'store', 'update', 'patch', 'destroy'];

        if (isset($options['except'])) {
            $only = array_diff($only, (array) $options['except']);
        }

        if ($this->container && $this->container->bound(ResourceRegistrar::class)) {
            $registrar = $this->container->make(ResourceRegistrar::class);
        } else {
            $registrar = new ResourceRegistrar($this);
        }

        return new PendingResourceRegistration(
            $registrar, $name, $controller, array_merge([
                'only' => $only,
            ], $options)
        );
    }
}