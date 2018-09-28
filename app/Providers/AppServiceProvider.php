<?php

namespace App\Providers;

use App\Components\ServiceProvider\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->container['settings']['displayErrorDetails'] = true;
    }
}