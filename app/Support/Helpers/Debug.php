<?php

namespace App\Support\Helpers;

class Debug
{
    public static function printR($val, $die = false)
    {
        echo '<pre>' . print_r($val, 1) . '</pre>';
        if( $die) {
            die();
        }
    }
}