<?php 

class Controller {

	protected $data ;

	protected $model ;

	protected $params ;

    protected $route ;

public function __construct($data = array()){
    
	$this->data = $data ;
    $this->params = App::getRouter()->getParams();
	$this->route = App::getRouter()->getRoute();

}

    /**
     * Gets the value of data.
     *
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Gets the value of model.
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Gets the value of params.
     *
     * @return mixed
     */
    public function getParams()
    {
        return $this->params;
    }

    public function viewpage($data, $object){
        $view_object = new View($data, $object);
        $view_object->render();

    }

    protected function route(){

        $view_object = new View($this->data, null);
        $content = $view_object->render();

       
       
        $layout_path = VIEWS_PATH.DS.$this->route.'.html';
        $layout_view_object = new View(compact('content'), $layout_path);
        echo $layout_view_object->render(); 
    }
}