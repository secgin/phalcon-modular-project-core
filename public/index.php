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
                'className' => 'YG\Main\Module',
                'path'      =>  APP_PATH . '/modules/main/Module.php'
            ],
        ]
    );

    echo $application->handle()
        ->getContent();

} catch (Exception $e) {
	echo $e->getMessage(), '<br>';
	echo nl2br(htmlentities($e->getTraceAsString()));
}
