<?php

require __DIR__ . '/../vendor/autoload.php';

$app = new App\Components\App();

$app->provider([
    App\Providers\AppServiceProvider::class,
    App\Providers\DatabaseServiceProvider::class,
    App\Providers\RouterServiceProvider::class
]);

return $app;