<?php

namespace App\Components;

use Slim\Container;
use App\Components\ServiceProvider\ServiceProviderInterface;

/**
 * Class App
 * @package App\Components
 */
class App extends \Slim\App
{
    /** @var self */
    private static $instance;

    /** @var Container|\Pimple\Container */
    private static $container;

    /** @var array */
    protected $loadedProviders = [];

    public function __construct($container = [])
    {
        parent::__construct($container);

        static::$instance = $this;
        static::$container = $this->getContainer();
    }

    /**
     * @return App
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static;
        }
        return static::$instance;
    }

    /**
     * @param $services
     * @param array $values
     */
    public function provider($services, array $values = [])
    {
        foreach( (array)$services as $service) {
            $this->register($service, $values);
        }
    }

    /**
     * @param $service
     * @param array $values
     */
    private function register($service, array $values = [])
    {
        $provider = $this->resolveProvider($service, $values);
        $provider->register();
    }

    /**
     * @param $provider
     * @param array $values
     * @return ServiceProviderInterface|mixed|string
     */
    private function resolveProvider($provider, array $values = [])
    {
        if( is_object($provider) && !empty($this->loadedProviders[get_class($provider)]) ) {
            return $this->loadedProviders[get_class($provider)];
        }

        if( is_string($provider) && class_exists($provider) ) {
            $provider = new $provider($this);
        }

        if(! $provider instanceof ServiceProviderInterface ) {
            throw new \InvalidArgumentException('Service not implements interface');
        }

        foreach ($values as $key => $value) {
            static::$container[$key] = $value;
        }

        return $this->loadedProviders[get_class($provider)] = $provider;
    }
}