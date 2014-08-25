<?php

class Menu extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		$this->load->model('menumodel');
	}
	
	public function index(){
		
		$data = $this->getData();
		$data['itens'] = $this->menumodel->getAllMenus();
		$data['menu'] = $this->moduleactionmodel->getAllMenus();
		$data['lang']['no_results'] = $this->lang->line('no_results');
		
		$this->template->setViewAdmin($this->title, 'menu/index', $data);
	}
	
	
	public function save(){

		if($this->input->post()){
			
			$this->load->entities('config');
			
			$config = new entities\Config();
			$config->setTitle($this->input->post('title'));
			$config->setEmail($this->input->post('email'));
			$config->setContact($this->input->post('contact'));
			$config->setAddress($this->input->post('address'));
			
			if($this->input->post('id')){
				$config->setId($this->input->post('id'));
			}	
			
			if(!empty($_FILES['logo']['name'])){
				
				if($this->upload->do_upload('logo')){
					$file = $this->upload->data();
					$config->setLogo($file['file_name']);
				} else {
					$data['error'][] = $this->upload->display_errors();
				}
			}

			$saved = $this->configmodel->saveOrUpdate($config);
			$data = $this->getData();
			
			if($saved){
				$data['success'] = $this->lang->line('save_success');
			} else {
				$data['error'][] = $this->lang->line('save_error') . ' ' . $this->lang->line('check_fields');
			}
			
			$this->template->setViewAdmin($this->title, 'config/index', $data);
			
		} else {
			redirect('config');
		}
	}
	
	public function remove(){
				
		$config = $this->configmodel->findById(1);

		if($config){
			$config->setLogo(null);
			
			$saved = $this->configmodel->update($config);
			$data = $this->getData();
				
			if($saved){
				$data['success'] = $this->lang->line('delete_success');
			} else {
				$data['error'][] = $this->lang->line('delete_error') . 'aqui';
			}
		} else {
			$data = $this->getData();
			$data['error'][] = $this->lang->line('delete_error');
		}
		
		$this->template->setViewAdmin($this->title, 'config/index', $data);
		
	}
	
	public function getData(){

		$data['title'] = $this->title;
		$data['icon']  = $this->icon;
		$data['controller'] = $this->controller;
		
		return $data;
		
	}
}