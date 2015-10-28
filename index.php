<?php 
//Front controller
session_start();

//incluyo liberria Request de Symfony, para obtener información del path y los párametros
require '/vendor/autoload.php'; 
require 'controller.php';
use Symfony\Component\HttpFoundation\Request;
$request = Request::createFromGlobals(); //creo objeto Request

//obtengo nombre controlador y action

$url = explode('/', $request->getPathInfo());
$controller = isset($url[1])?$url[1]:null;
$action = isset($url[2])?$url[2]:null;

/*
$request->query->all(); to get all GET params and 
$request->request->all(); to get all POST params.
*/


if(class_exists($controller)){ // si existe el controlador, creo y lo ejecuto
	$c = new $controller();
	$c->run($action);	
}else{
	if(empty($controller)){
		echo 'index';
	}else{
		echo 'ups, nothing here.';
	}
}



?>