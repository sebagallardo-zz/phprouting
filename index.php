<?php 
//opcional
session_start();

//incluyo liberria Request de Symfony, para obtener información del path y los párametros
require '/vendor/autoload.php'; 
require 'controller.php';
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals();

//obtengo nombre del controlador y el action si los recibi.

$url = explode('/', $request->getPathInfo());
$controller = isset($url[1])?$url[1]:null;
$action = isset($url[2])?$url[2]:null;

if(class_exists($controller)){   // si existe el controlador, creo y lo ejecuto
	$c = new $controller();
	$c->run($action);	
}else{
	if(empty($controller)){ //si esta vacio, es el / (puede implementarse un controlador index también)
		echo 'index';
	}else{                  //controlador no definido.
		echo 'ups, nothing here.';
	}
}
?>
