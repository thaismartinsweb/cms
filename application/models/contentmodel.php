<?php

class Contentmodel extends CMS_Model {

	public function __construct(){
		parent::__construct('content');
	}
	
	public function getAllContents(){
		
		$itens = $this->contentmodel->findAll();
		$content = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id"      => $item->getId(),
						"menu_title" => $this->getTitleMenu($item->getMenu()),
						"title"   => $item->getTitle(),
						"date"    => $item->getDateCreated()
				);
			}
		}
		
		return $content;
	}
	
	public function getLastContents($limit = 10){
		
	}
	
	public function getContentById($id){
		
		$item = $this->findById($id);
		$content = false;
		
		if($item){
			$content = array(
					"id"      => $item->getId(),
					"menu_title" => $this->getTitleMenu($item->getMenu()),
					"menu" => $item->getMenu(),
					"type_page" => $item->getTypePage()->getId(),
					"title"   => $item->getTitle(),
					"description" => $item->getDescription(),
					"content" => $item->getContent(),
					"image"   => $item->getImage(),
					"date"    => $item->getDateCreated(),
					"published" => $item->getPublished(),
					"special" => $item->isSpecial()
			);
		}
		
		return $content;
	}
	
	private function getTitleMenu($menu){

		if($menu){
			
			$this->load->model('menumodel');
			
			$menu = $this->menumodel->findById($menu->getId());

			if($menu){
				return $menu->getTitle();
			}
		}

		return '-';
	}
	
}