<?php namespace Laravie\Quemon;

use Orchestra\Foundation\Support\Providers\ModuleServiceProvider;

class QuemonServiceProvider extends ModuleServiceProvider
{
    /**
     * The application or extension namespace.
     *
     * @var string|null
     */
    protected $namespace = 'Laravie\Quemon\Http\Controllers';

    /**
     * The application or extension group namespace.
     *
     * @var string|null
     */
    protected $routeGroup = 'laravie/quemon';

    /**
     * The fallback route prefix.
     *
     * @var string
     */
    protected $routePrefix = '/';

    protected function loadRoutes()
    {
        $path = realpath(__DIR__);
        $this->loadBackendRoutesFrom("{$path}/Http/backend.php");
    }
}
