<?php 
class load 
{
    static function view($viewFile, $viewVars = array()){
        extract($viewVars) ;
        $viewFileCheck = explode(".", $viewFile);
        if(!isset($viewFile[1])){
            $viewFile .=".php" ;
        }
        $viewFile = str_replace("::", "/", $subject);
        require_once $GLOBALS["config"]["path"]["app"]."views/{$viewFile}";
    }
}

?>