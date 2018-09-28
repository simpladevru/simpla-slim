<?php

namespace App\Providers;

use App\Components\ServiceProvider\ServiceProvider;
use App\Components\Settings;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->container['db'] = function () {

            $db_settings = Settings::load('db');
            $capsule = new \Illuminate\Database\Capsule\Manager;
            $capsule->addConnection($db_settings);
            $capsule->setAsGlobal();
            $capsule->bootEloquent();

            return $capsule;
        };
    }
}