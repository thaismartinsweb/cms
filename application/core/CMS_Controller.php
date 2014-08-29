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
	
	protected function buildMessage($saved, $delete = false){
		
		if($saved){
			if($delete){
				$message['success'] = $this->lang->line('delete_success');
			} else {
				$message['success'] = $this->lang->line('save_success');;
			}
		} else {
			if($delete){
				$message['error'] = $this->lang->line('delete_error');
			} else {
				$message['error'] = $this->lang->line('save_error').' '.$this->lang->line('check_fields');;
			}	
		}
		
		return $message;
	}
	
	protected function renderAdmin($page, $data, $message = null){

		$configView = array("title"	=> $this->title,
				 			 "icon"	=> $this->icon,
							 "page"	=> $this->controller.'/'.$page,
							 "data"	=> $data,
							 "message" => $message);
		
		$this->template->setViewAdmin($configView);
	}

}