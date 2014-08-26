<?php

class Menu extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		$this->load->model('menumodel');
		$this->load->model('moduleactionmodel');

		$file['upload_path'] = UPLOAD_DIR . 'menu';
		$file['allowed_types'] = 'gif|jpg|png';
		$file['max_width']  = '1024';
		$file['max_height']  = '768';
			
		$this->load->library('upload', $file);
	}
	
	public function index(){
		
		$data = $this->getData();
		$data['itens'] = $this->menumodel->getAllMenus();
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
	
	
	public function save(){

		if($this->input->post()){
			
			$this->load->entities('menu');
			
			$item = new entities\Menu();
			$item->setTitle($this->input->post('title'));
			$item->setMaster($this->input->post('master'));
			$item->setDescription($this->input->post('description'));
			$item->setSpecial($this->input->post('special'));
			
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

			$saved = $this->menumodel->saveOrUpdate($item);
			$data = $this->getData();
			$data['base'] = $this->menumodel->getMenuById($saved->getId());

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

	public function edit($id, $msg = false){

		$data = $this->getData();
		$data['title'] .= ' | Editar';
		$data['base'] = $this->menumodel->getMenuById($id);
		
		if($msg){
			if($msg == SUCCESS){
				$data['success'] = $this->lang->line('save_success');
			} else if ($msg == DELETED){
				$data['success'] = $this->lang->line('delete_success');
			}
			
		} 

		$this->template->setViewAdmin($this->title, $this->controller.'/edit', $data);
	}
	
	public function remove($id = false, $image = false){

		$item = $this->menumodel->findById($id);

		if($image){
			if($item){
				$item->setImage(null);
				
				$saved = $this->menumodel->update($item);
				$data = $this->getData();
					
				if($saved){
					redirect('menu/edit/' . $saved->getId() . '/' . DELETED);
				} else {
					$data['error'][] = $this->lang->line('delete_error');
				}
			} else {
				$data = $this->getData();
				$data['error'][] = $this->lang->line('delete_error');
			}
		} else {
			$saved = $this->menumodel->delete($item);
			if($saved){
				redirect('menu');
			} else {
				$data = $this->getData();
				$data['error'][] = $this->lang->line('delete_error');
			}
		}

		$this->template->setViewAdmin($this->title, $this->controller.'/index', $data);
		
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
		
		$data['menu_parent'] = $this->menumodel->getAllMenus();

		return $data;
		
	}
}