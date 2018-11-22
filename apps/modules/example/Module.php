<?php
namespace YG\Restoran\Yonetim;

use Phalcon\Mvc\ModuleDefinitionInterface;

class Module implements ModuleDefinitionInterface
{
    public function registerAutoloaders(\Phalcon\DiInterface $di = null)
    {
        require __DIR__ . "/config/loader.php";
    }

    public function registerServices(\Phalcon\DiInterface $di)
    {
        require __DIR__ . "/config/services.php";
    }
}