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
	
		$data['controller'] = 'content';
		$data['last_content'] = $this->lang->line('last_content');
		$data['lang']['no_results'] = $this->lang->line('no_results');
	
		$this->renderAdmin('index', $data);
	}
	
}