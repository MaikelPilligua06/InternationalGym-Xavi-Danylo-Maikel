<?php
session_start();
$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'Permisos';
$controllerName = $controller. "Controller";

require_once "controllers/" . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->$action();

?>
