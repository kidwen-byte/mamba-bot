<?php
session_start();

use app\engine\Autoload;
use app\engine\Render;
use app\engine\Request;

include "../config/config.php";
include "../engine/Autoload.php";

spl_autoload_register([new Autoload(), 'loadClass']);

$request = new Request();

$controllerName = $request->getControllerName() ?: 'index';
$actionName = $request->getActionName();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
  $controller = new $controllerClass(new Render());
  $controller->runAction($actionName);
} else {
  die("404");
}
