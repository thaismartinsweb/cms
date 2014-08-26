<?php

class Config extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		$this->load->model('configmodel');
		
		$file['upload_path'] = UPLOAD_DIR . 'config';
		$file['allowed_types'] = 'gif|jpg|png';
		$file['max_width']  = '1024';
		$file['max_height']  = '768';
			
		$this->load->library('upload', $file);
	}
	
	public function index(){

		$data = $this->getData();
		$this->template->setViewAdmin($this->title, 'config/index', $data);
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
		$data['lang']['change'] = $this->lang->line('change');
		$data['lang']['delete'] = $this->lang->line('delete');
		$data['lang']['save'] = $this->lang->line('save');
		$data['base'] = $this->configmodel->getConfigData();
		
		return $data;
		
	}
}