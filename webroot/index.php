<?php 
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL); 

define ('DS', DIRECTORY_SEPARATOR);
define ('ROOT', dirname(dirname(__FILE__))); //var/www/html/mymvc
define('VIEWS_PATH', ROOT.DS.'views');

require_once ROOT.DS.'libs'.DS.'init.php' ;
//echo $_SERVER['REQUEST_URI'] ;
//exit ;

/*$router = new Router($_SERVER['REQUEST_URI']);
echo '<pre>';
print_r('Route: '.$router->getRoute().PHP_EOL) ;
print_r('Language: '.$router->getLanguage().PHP_EOL) ;
print_r('Controller: '.$router->getController().PHP_EOL) ;
print_r('Actio to be called: '.$router->getMethodPrefix().$router->getAction().PHP_EOL) ;
echo "Params" ;
print_r($router->getParams());*/
//Session::setFlash('This is a warning message');
App::run($_SERVER['REQUEST_URI']);
//$router = new Router($_SERVER['REQUEST_URI']);

//print_r($router);