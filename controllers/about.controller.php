<?php 

class AboutController extends Controller {


	public function __construct($data = array()){

		parent::__construct($data) ;
		$this->model = new Message();

	}

	public function index(){
		$this->data['about_content'] = "welcome to the about page" ;
		$this->data['about_contents'] = "We started this work in the days of old" ;

		$this->route();
	}

	public function church(){

		$this->route() ;
	}
}