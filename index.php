<?php 
//Front controller
session_start();

//incluyo liberria Request de Symfony, para obtener información del path y los párametros
use Symfony\Component\HttpFoundation\Request;
require __DIR__ . '/vendor/autoload.php'; 
require __DIR__ . '/config/config.php' ;
$request = Request::createFromGlobals(); //creo objeto Request

//obtengo nombre controlador y action

$url = explode('/', $request->getPathInfo());
$controller = isset($url[1])?$url[1]:null;
$action = isset($url[2])?$url[2]:null;

$con= new config();
$config= $con->getConfiguracion();
/*
$request->query->all(); to get all GET params and 
$request->request->all(); to get all POST params.
*/

if(empty($_SESSION['MENU'])){ // si no hay nadie logueado seteo barra default
	$_SESSION['MENU'] = "index_menu.html";
}

if(class_exists($controller)){ // si existe el controlador, creo y lo ejecuto
	$c = new $controller();
	$c->run($action);	
}else{
	if(empty($controller)){
		echo twig()->render('index.html', array('user_menu' => $_SESSION['MENU'],'configuracion' => $config));
	}else{
		echo twig()->render('error.html', array('msj' =>  'Pagina inexistente.'));
	}
}



?>