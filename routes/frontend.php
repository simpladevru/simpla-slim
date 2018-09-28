<?php

use App\Http\Controllers\HomeController;

$this->get('/', HomeController::class . ':index');