<?php

class Cms extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
	}
	
	public function index(){
		
		$this->load->model('contentmodel');
		$this->load->model('modulemodel');
		
		$data['itens'] = $this->contentmodel->getAllContents();		
		$data['menu'] = $this->modulemodel->getAllModules();	
			
		$data['title'] = $this->title;
		$data['icon'] = $this->icon;
		$data['last_content'] = $this->lang->line('last_content');
		$data['lang']['no_results'] = $this->lang->line('no_results');
	
		$this->template->setViewAdmin($this->title, 'cms/index', $data);
	}
	
}