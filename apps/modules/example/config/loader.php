<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces([
    'YG\Controllers'           => APP_PATH . '/controllers',
    'YG\Models'                => APP_PATH . '/models',
    'YG\Library'               => APP_PATH . '/library',
    
    'YG\Example\Models'        => APP_PATH . '/modules/example/models',
    'YG\Example\Controllers'   => APP_PATH . '/modules/example/controllers',
    'YG\Example\Forms'         => APP_PATH . '/modules/example/forms',
]);

$loader->register();

