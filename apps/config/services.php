<?php
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as FlashSession;

$di = new \Phalcon\Di\FactoryDefault();

$di->setShared('config', function () {
    $config = include APP_PATH . '/config/config.php';

    return $config;
});

$di->set('router', function () {
    $router = new \Phalcon\Mvc\Router();

    $router->setDefaultModule("example-module");


    return $router;
});

$di->setShared('url', function () {
    $config = $this->getConfig();

    $url = new UrlResolver();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

$di->set('db', function () {
    $config = $this->getConfig();
    return new DbAdapter([
        'host' => $config->database->host,
        'username' => $config->database->username,
        'password' => $config->database->password,
        'dbname' => $config->database->dbname,
        'charset' => $config->database->charset
    ]);
});

$di->set('session', function () {
    $session = new SessionAdapter();
    $session->start();
    return $session;
});

$di->set('flash', function () {
    return new FlashSession([
        'error' => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice' => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});
