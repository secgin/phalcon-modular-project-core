<?php

use Phalcon\Loader;

$loader = new Loader();

$loader->registerNamespaces([
    'YG\Controllers'           => APP_PATH . '/controllers',
    'YG\Models'                => APP_PATH . '/models',
    'YG\Library'               => APP_PATH . '/library',
    
    'YG\Main\Models'        => APP_PATH . '/modules/main/models',
    'YG\Main\Controllers'   => APP_PATH . '/modules/main/controllers',
    'YG\Main\Forms'         => APP_PATH . '/modules/main/forms',
]);

$loader->register();

