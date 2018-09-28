<?php

namespace App\Components\ServiceProvider;

use App\Components\App;
use Slim\Container;

/**
 * Class ServiceProvider
 * @package App\Components\ServiceProvider
 */
class ServiceProvider implements ServiceProviderInterface
{
    /** @var App */
    protected $app;

    /** @var Container|\Pimple\Container */
    protected $container;

    public function __construct(App $app)
    {
        $this->app = $app;
        $this->container = $app->getContainer();
    }

    public function register() { }
}