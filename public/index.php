<?php

use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Application;

error_reporting(E_ALL);

/**
 * Define some useful constants
 */
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/apps');

try {

    require  APP_PATH . "/config/services.php";

    $application = new Application($di);

    /**
     * Register application modules
     */
    $application->registerModules(
        [
            'yonetim' => [
                'className' => 'YG\Restoran\Yonetim\Module',
                'path'      =>  APP_PATH . '/modules/yonetim/Module.php'
            ],
            'siparis' => [
                'className' => 'YG\Restoran\Siparis\Module',
                'path'      =>  APP_PATH . '/modules/siparis/Module.php'
            ],

            'isyonetimi' => [
                'className' => 'YG\IsYonetimi\Module',
                'path'      =>  APP_PATH . '/modules/isyonetimi/Module.php'
            ]
        ]
    );

    echo $application->handle()
        ->getContent();

} catch (Exception $e) {
	echo $e->getMessage(), '<br>';
	echo nl2br(htmlentities($e->getTraceAsString()));
}
