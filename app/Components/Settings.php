<?php

namespace App\Components;
use Slim\Collection;

/**
 * Class Settings
 * @package App\Components
 */
class Settings
{
    /**
     * @param $key
     * @return mixed|null
     */
    public static function load($key)
    {
        $settings = static::getInstance();

        if( !empty($settings[$key]) ) {
            return $settings[$key];
        }

        $file = __DIR__ . '/../../config/'. $key . '.php';

        if( file_exists($file) ) {
            return $settings[$key] = require $file;
        }

        return null;
    }

    /**
     * @return Collection
     */
    public static function getInstance()
    {
        return App::getInstance()->getContainer()['settings'];
    }
}