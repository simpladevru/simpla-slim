<?php

namespace App\Providers;

use App\Components\ServiceProvider\ServiceProvider;

class RouterServiceProvider extends ServiceProvider
{
    public function register()
    {
        require __DIR__ . '/../../routes/routes.php';
    }
}