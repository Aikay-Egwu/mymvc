<?php
    class router {
        private $routes ;
        /**
         * create basic routing functions
         */
        function __construct() {
            $this->routes = $GLOBALS["config"]["routes"];
            $route = $this->findRoute();
            print_r($route);
            if(class_exists($route["controller"])){
                $controller = new $route["controller"]();
                if(method_exists($controller, $route["method"])){
                    $controller->$route["method"]() ;
                }else{
                    error::show(404) ;
                }
                
            }else{
                error::show(404) ;
            }
        }
        
        private function routePath($route){
            if(is_array($route)){
                $route = $route['url'];
            }
            $parts = explode("/", $route) ;
            return $parts ;
        }
        
        /**
         * 
         * @param type $part
         */
        static function url($part){
            $parts = explode("/", $_SERVER["REQUEST_URI"]) ;
            if(($parts[1]) == $GLOBALS["config"]["path"]["index"]){
                $part++ ;
            }
            return (isset($parts[$part])) ? $parts[$part]:"" ;
        }
        
        private function findRoute(){
            foreach($this->routes as $route){
                $parts = $this->routePath($route) ;
                foreach($parts as $key => $value){
                    if($value != "*"){
                        if(router::url($key) !=  $value){
                            $allMatch = FALSE ;
                        }
                    }
                }
                if($allMatch){
                    return $route ;
                }
            }
            $uri_1 = router::url(1);
            $uri_2 = router::url(2);
            if($uri_1 == ""){
                $uri_1 = $GLOBALS["config"]["defaults"]["controller"] ;
            }
            if($uri_2 == ""){
                $uri_2 = $GLOBALS["config"]["defaults"]["method"] ;
            }
            $route = array(
                "controller" => $uri_1 ,
                "method" => $uri_2
            );
             return $route ;       
        }
    }
?>

