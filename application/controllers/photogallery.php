<?php

class PhotoGallery extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		
		$this->load->model(array('moduleactionmodel', 'photogallerymodel'));
	}
	
	public function index(){
		
		$data = $this->getData();
		$data['itens'] = $this->photogallerymodel->getAllGalleries();
		$data['menu'] = $this->moduleactionmodel->getAllActionsByModule('menu');
		
		$this->renderAdmin('index', $data);
	}
	
	public function fresh(){
	
		$data = $this->getData();
		$this->renderAdmin('edit', $data);
	}
	
	public function edit($id, $message = false){

		$data = $this->getData();
		$data['base'] = $this->photogallerymodel->getPhotoGalleryById($id);
		
		if($message){
			if($message == SUCCESS){
				$data['success'] = $this->lang->line('save_success');
			} else if ($message == DELETED){
				$data['success'] = $this->lang->line('delete_success');
			}
			
		} 

		$this->renderAdmin('edit', $data);

	}
	
	
	public function save(){
	
		if($this->input->post()){
				
			$this->load->entities('photogallery');
				
			$item = new entities\PhotoGallery();
			$this->builder->postToObject($item);
			$saved = $this->photogallerymodel->saveOrUpdate($item);
			$data = $this->getData();
			$data['base'] = $this->photogallerymodel->getPhotoGalleryById($saved->getId());
	
			if($saved){
				redirect($this->controller.'/edit/' . $saved->getId() . '/' . SUCCESS);
			} else {
				$data['error'][] = $this->lang->line('save_error') . ' ' . $this->lang->line('check_fields');
			}
				
			$this->template->setViewAdmin($this->title, $this->controller.'/edit', $data);
				
		} else {
			redirect($this->controller);
		}
	}
	
	public function getData(){
	
		$data['title'] = $this->title;
		$data['icon']  = $this->icon;
		$data['controller'] = $this->controller;
	
		$data['lang']['no_item'] = $this->lang->line('no_item');
		$data['lang']['change'] = $this->lang->line('change');
		$data['lang']['delete'] = $this->lang->line('delete');
		$data['lang']['save'] = $this->lang->line('save');
		$data['lang']['add_new'] = $this->lang->line('add_new');
		$data['lang']['itens'] = $this->lang->line('itens');
		$data['lang']['actions'] = $this->lang->line('actions');
		
		$data['lang']['no_results'] = $this->lang->line('no_results');
		$data['lang']['last_content'] = $this->lang->line('last_content');
	
		return $data;
	
	}
}