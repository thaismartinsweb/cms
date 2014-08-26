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
		$data['lang']['no_results'] = $this->lang->line('no_results');
		$data['lang']['last_content'] = $this->lang->line('last_content');
		
		$this->template->setViewAdmin($this->title, $this->controller.'/index', $data);
	}
	
	public function fresh(){
	
		$data = $this->getData();
		$data['title'] .= ' | Adicionar Novo';
		$data['base'] = array();
		$this->template->setViewAdmin($this->title, $this->controller.'/edit', $data);
	}
	
	public function edit($id, $msg = false){

		$data = $this->getData();
		$data['title'] .= ' | Editar';
		$data['base'] = $this->photogallerymodel->getPhotoGalleryById($id);
		
		if($msg){
			if($msg == SUCCESS){
				$data['success'] = $this->lang->line('save_success');
			} else if ($msg == DELETED){
				$data['success'] = $this->lang->line('delete_success');
			}
			
		} 

		$this->template->setViewAdmin($this->title, $this->controller.'/edit', $data);

	}
	
	
	public function save(){
	
		if($this->input->post()){
				
			$this->load->entities('photogallery');
				
			$item = new entities\PhotoGallery();
			$item->setTitle($this->input->post('title'));
			$item->setDescription($this->input->post('description'));
			$item->setExibition($this->input->post('order'));

			if($this->input->post('id')){
				$item->setId($this->input->post('id'));
			}
			var_dump($item);
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
		$data['lang']['success'] = $this->lang->line('success');
		$data['lang']['error'] = $this->lang->line('error');
	
		return $data;
	
	}
}