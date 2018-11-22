<?php

use Phalcon\Config;

return new Config([
    'database' => [
        'adapter' => 'Mysql',
        'host' => 'localhost',
        'username' => '',
        'password' => '',
        'dbname' => '',
        'charset' => 'utf8'
    ],
    'application' => [
        'cacheDir'              => BASE_PATH . '/cache/',
        'baseUri'               => '/'
    ]
]);
