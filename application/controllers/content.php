<?php

class Content extends CMS_Controller {
	
	public function __construct(){
		parent::__construct(false);
		$this->title = 'Content';
		$this->icon = 'edit';
	}
	
	public function index(){
		
	}
	
	public function edit($id){
		
		$this->load->model('contentmodel');
		
		$item = $this->contentmodel->findById($id);
		
		$data['itens'] = false;
		
		if($item){
				$content[] = array(
									"id"      => $item->getId(),
									"menu_id" => $item->getMenuId(),
									"type_page_id" => $item->getTypePageId(),
									"title"   => $item->getTitle(),
									"description" => $item->getDescription(),
									"content" => $item->getContent(),
									"image"   => $item->getImage(),
									"date"    => $item->getDateCreated(),
									"published" => $item->getPublished()
									);
				$data['itens'] = $content;
		}
		
		$data['title'] = $this->title;
		$data['icon'] = $this->icon;
		
		
		$data['lang']['no_result'] = $this->lang->line('no_result');
	
		$this->template->setViewAdmin($this->title, 'content/list', $data);

	}
}