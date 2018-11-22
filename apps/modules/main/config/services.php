<?php
use Phalcon\Mvc\View;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;

$di->set('view', function () {
    $config = $this->getConfig();

    $view = new View();

    $view->setViewsDir(APP_PATH . "/modules/main/views/");
    $view->setMainView(APP_PATH . "/views/index");
    $view->setPartialsDir(APP_PATH. "/views/partials/");

    $view->registerEngines([
        '.volt' => function ($view) {
            $config = $this->getConfig();

            $volt = new VoltEngine($view, $this);

            $volt->setOptions([
                'compiledPath' => $config->application->cacheDir . 'volt/',
                'compiledSeparator' => '_'
            ]);

            return $volt;
        }
    ]);

    return $view;
}, true);

$di->set('dispatcher', function () {
    $config = $this->getConfig();

    $dispatcher = new Dispatcher();
    $dispatcher->setDefaultNamespace("YG\Main\Controllers");
    return $dispatcher;
});