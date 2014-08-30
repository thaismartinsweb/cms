<?php

class Menu extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		$this->load->model(array('menumodel', 'typemenumodel','moduleactionmodel'));
	}
	
	public function index($message = false){
		
		$data = $this->getData();
		$data['itens'] = $this->menumodel->getAllData();
		$data['menu'] = $this->moduleactionmodel->getAllActionsByModule('menu');
		
		if($message){
			if($message ==  DELETED){
				$message['success'] = $this->lang->line('delete_success');
			}
		}

		$this->renderAdmin('index', $data, $message);
	}

	public function fresh(){
		
		$data = $this->getData();
		$this->renderAdmin('edit', $data);
	}
	
	
	public function save(){

		if($this->input->post()){
			
			$this->load->entities('menu');
			
			$item = new entities\Menu();
			$this->builder->postToObject($item);
			$saved = $this->menumodel->saveOrUpdate($item);
			$data = $this->getData();
			$data['base'] = $this->menumodel->getMenuById($saved->getId());
			
			if($saved){
				redirect($this->controller.'/edit/' . $saved->getId() . '/' . SUCCESS);
			} else {
				$data['error'][] = $this->lang->line('save_error') . ' ' . $this->lang->line('check_fields');
			}
			
			$this->renderAdmin('edit', $data);
			
		} else {
			redirect($this->controller);
		}
	}

	public function edit($id, $action = false){

		$data = $this->getData();
		$data['base'] = $this->menumodel->getMenuById($id);

		$message = $this->buildMessage($action, ($action == DELETED));

		$this->renderAdmin('edit', $data, $message);
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
					$message['error'][] = $this->lang->line('delete_error');
				}
			} else {
				$data = $this->getData();
				$message['error'][] = $this->lang->line('delete_error');
			}
		} else {
			$saved = $this->menumodel->delete($item);
			
			if($saved){
				redirect('menu/' . DELETED);
			} else {
				$data = $this->getData();
				$message['error'][] = $this->lang->line('delete_error');
			}
		}

		$this->renderAdmin('index', $data, $message);
		
	}
	
	public function getData(){

		$data['lang']['no_item'] = $this->lang->line('no_item');
		$data['lang']['change'] = $this->lang->line('change');
		$data['lang']['delete'] = $this->lang->line('delete');
		$data['lang']['save'] = $this->lang->line('save');
		$data['lang']['add_new'] = $this->lang->line('add_new');
		$data['lang']['itens'] = $this->lang->line('itens');
		$data['lang']['actions'] = $this->lang->line('actions');
		$data['lang']['success'] = $this->lang->line('success');
		$data['lang']['error'] = $this->lang->line('error');
		$data['lang']['no_results'] = $this->lang->line('no_results');
		$data['lang']['last_content'] = $this->lang->line('last_content');
		
		$data['controller'] = $this->controller;
		$data['menu_parent'] = $this->menumodel->getAllData();
		$data['type_menu'] = $this->typemenumodel->getAllData();

		return $data;
		
	}
}