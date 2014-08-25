<?php

class CMS_Controller extends CI_Controller {
	
	protected $title;
	protected $icon;
	protected $controller;
	
	public function __construct ($isAdmin = true){
		parent::__construct();
		$this->isLogged($isAdmin);
		$this->buildTitle();
	}
	
	public function isLogged($isAdmin){
		if($isAdmin){
			$logged = $this->session->userdata('logged');
			
			if(!isset($logged) || !$logged){
				redirect('login');
			}
		}
	}
	
	private function buildTitle(){
		
		$this->controller = $this->router->fetch_class();
		
		if($this->controller){
			$this->load->model('modulemodel');
			$module = $this->modulemodel->findOneBy(array('controller' => $this->controller));
			
			if($module){
				$this->title = $module->getTitle();
				$this->icon  = $module->getIcon(); 
			}
		}
		
	}

}