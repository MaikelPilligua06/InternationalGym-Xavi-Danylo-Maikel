<?php
session_start();

ini_set('display_errors', 1); //Mostramos los errores
ini_set('display_startup_errors', 1); //Mostramos los errores al iniciar session
error_reporting(E_ALL);

$publicActions = ['login', 'loginProcess'];

$action = $_GET['action'] ?? 'index';
$controller = $_GET['controller'] ?? 'Rutinas';
$controllerName = $controller . "Controller";

if (!isset($_SESSION['usuario']) && !in_array($action, $publicActions)) {
    header("Location: index.php?controller=Auth&action=login");
    exit;
}

require_once "controllers/" . $controllerName . ".php";

$controllerObj = new $controllerName();
$controllerObj->$action();

?>
