<?php 


class App {
	protected static $router ;



    /**
     * Gets the value of router.
     *
     * @return mixed
     */
    public static function getRouter()
    {
        return self::$router;
    }

    public static function db(){
        return new Database ;
    }

    public static function run($uri){
    	self::$router = new Router($uri);

    	$controller_class = ucfirst(self::$router->getController()).'Controller';
    	$controller_method = strtolower(self::$router->getMethodPrefix().self::$router->getAction());
        //echo "Controller Method : $controller_method <br>" ; 

        //echo $controller_class ;
        //echo $controller_method ;
        //exit ;

    	//calling routers method
    	$controller_object = new $controller_class();

    	if(method_exists($controller_object, $controller_method)){

            //$result = $controller_object->$controller_method();
    		//controllers acton may return a view path
            //$view_path = $controller_object->$controller_method();
    		$content = $controller_object->$controller_method();

            //echo $view_path ;
    		//$view_object = new View($controller_object->getData(), $content);
    		//$content  = $view_object->render() ;

    	}else{
            echo "404 ERROR<br>PAGE '".self::$router->getAction()."' NOT FOUND" ;
    		throw new Exception('Method '.$controller_method .' of '. $controller_class . ' does not exist' ) ;
    	}

        //var_dump($content) ;
    	/*$layout = self::$router->getRoute() ;
    	$layout_path = VIEWS_PATH.DS.$layout.'.html';
    	$layout_view_object = new View(compact('content'), $layout_path);
    	echo $layout_view_object->render();*/
    }
}