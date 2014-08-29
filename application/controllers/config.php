<?php

class Config extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		$this->load->entities('config');
		$this->load->model('configmodel');
	}
	
	public function index(){

		$data = $this->getData();
		$this->renderAdmin('index', $data);
	}
	
	public function save(){

		if($this->input->post()){

			$item = new entities\Config();
			$this->builder->postToObject($item);
			
			$saved = $this->configmodel->saveOrUpdate($item);
			$message = $this->buildMessage($saved);
			$data = $this->getData();
			
			$this->renderAdmin('index', $data, $message);
			
		} else {
			redirect('config');
		}
	}
	
	public function remove(){
				
		$config = $this->configmodel->findById(1);

		if($config){
			$config->setLogo(null);
			
			$saved = $this->configmodel->update($config);
			$message = $this->buildMessage($saved);
			$data = $this->getData();
			
		} else {
			$data = $this->getData();
			$message = $this->buildMessage(false, true);
		}
		
		$this->renderAdmin('index', $data, $message);
	}
	
	public function getData(){
		
		$data['controller'] = $this->controller;
		$data['lang']['change'] = $this->lang->line('change');
		$data['lang']['delete'] = $this->lang->line('delete');
		$data['lang']['save'] = $this->lang->line('save');
		$data['lang']['success'] = $this->lang->line('success');
		$data['lang']['error'] = $this->lang->line('error');
		
		$data['base'] = $this->configmodel->getAllData();

		return $data;
		
	}
}