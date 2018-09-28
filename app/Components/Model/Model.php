<?php

namespace App\Components\Model;

use App\Components\App;

/**
 * Class Model
 * @package App\Components\Model
 */
abstract class Model extends \Illuminate\Database\Eloquent\Model
{
    /**
     * Model constructor.
     * @param array $attributes
     * @throws \Exception
     */
    public function __construct(array $attributes = []) {
        $this->makeDb();
        parent::__construct($attributes);
    }

    /**
     * @throws \Exception
     */
    public function makeDb()
    {
        $container = App::getInstance()->getContainer();

        if(! $container->has('make_db') && $container->has('db') ) {
            $container['make_db'] = true;
            $container->get('db');
        }
    }
}