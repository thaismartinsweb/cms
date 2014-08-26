<?php

class Content extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		
		$this->load->model(array('moduleactionmodel', 'menumodel', 'contentmodel', 'typepagemodel'));

		$file['upload_path'] = UPLOAD_DIR . 'content';
		$file['allowed_types'] = 'gif|jpg|png';
		$file['max_width']  = '1024';
		$file['max_height']  = '768';
			
		$this->load->library('upload', $file);
	}
	
	public function index(){
		
		$data = $this->getData();
		$data['itens'] = $this->contentmodel->getAllContents();
		$data['menu'] = $this->moduleactionmodel->getAllActionsByModule('menu');
		$data['lang']['no_results'] = $this->lang->line('no_results');
		$data['lang']['last_content'] = $this->lang->line('last_content');
		
		$this->template->setViewAdmin($this->title, 'content/index', $data);
	}
	
	public function fresh(){
	
		$data = $this->getData();
		$data['title'] .= ' | Adicionar Novo';
		$data['base'] = array();
		$this->template->setViewAdmin($this->title, $this->controller.'/edit', $data);
	}
	
	public function edit($id, $msg = false){

		$data = $this->getData();
		$data['title'] .= ' | Editar Conteúdo';
		$data['base'] = $this->contentmodel->getContentById($id);
		
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
				
			$this->load->entities('content');
				
			$item = new entities\Content();
			$item->setTitle($this->input->post('title'));
			$item->setSpecial($this->input->post('special'));
			$item->setDescription($this->input->post('description'));
			$item->setContent($this->input->post('content'));
			$item->setPublished($this->input->post('published'));
			$item->setDateCreated();
			
			if($this->input->post('menu')){
				$menu = $this->menumodel->findById($this->input->post('menu'));
				$item->setMenu($menu);
			}
			
			if($this->input->post('type_page')){
				$page = $this->typepagemodel->findById($this->input->post('type_page'));
				$item->setTypePage($page);
			}

			if($this->input->post('id')){
				$item->setId($this->input->post('id'));
			}
	
			if(!empty($_FILES['image']['name'])){
				if($this->upload->do_upload('image')){
					$file = $this->upload->data();
					$item->setImage($file['file_name']);
				} else {
					$data['error'][] = $this->upload->display_errors();
				}
			}
	
			$saved = $this->contentmodel->saveOrUpdate($item);
			$data = $this->getData();
			$data['base'] = $this->contentmodel->getContentById($saved->getId());
	
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
	
		$data['menu'] = $this->menumodel->getAllMenus();
		$data['pages'] = $this->typepagemodel->getAllPages();
	
		return $data;
	
	}
}