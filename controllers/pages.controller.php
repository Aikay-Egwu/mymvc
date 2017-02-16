<?php

class PagesController extends Controller {

	public function index(){
		$this->data['content'] = "This is information from the index function" ;
		//echo "Here will be a papeges list" ;
		$this->route();
	}

	public function admin_index(){
		$this->data['admin_content'] ="welcome to the admin page, you are blessed to be here" ;
		$this->route() ;
	}

	public function view(){

		$params = App::getRouter()->getParams();

		if(isset($params[0])){
			$alias = strtolower($params[0]);
			$this->data['view_content'] = "here will be a page with {$alias} alias from the view function" ;
			//$this->data['view_content'] = "The content for the view page" ;
		}else{
			$this->data['view_content'] = "The content for the view page without  params from the view function" ;
		}
	}

	public function gamed(){
		//return "I want to play a game "; 
		$this->data['game_content'] = "we are always playing" ;
		//$this->viewpage($this->data, null) ;
		$this->route();
	}
}