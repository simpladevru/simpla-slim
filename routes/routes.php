<?php

$this->app->group('', function() {
    require_once 'frontend.php';
});

$this->app->group('/admin', function() {
    require_once 'backend.php';
});