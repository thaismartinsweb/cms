<?php

class MenuModel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('menu');
	}
	
	public function getAllMenus(){
		
		$args = array('master' => 0);
		$itens = $this->findBy($args);
		$content = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = $this->builder->getArray($item);
				$content[]['subs'] = $this->getSubsMenus($item->getId());
			}
		}
		
		return $content;
		
	}
	
	public function getSubsMenus($id){
	
		$args  = array('master_id' => $id);
		$itens = $this->findBy($args);
		$content = false;

		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id" => $item->getId(),
						"title" => $item->getTitle(),
						"master" =>$item->getMaster(),
						"description" => $item->getDescription(),
						"image" => $item->getImage(),
						"special" => $item->isSpecial(),
						"subs" => $this->getSubsMenus($item->getId())
				);
			}
		}
	
		return $content;
	
	}

	public function getMenuById($id){

		$content = false;

		if(isset($id)){
			$item = $this->findById($id);
			

			if($item){
				$content = array(
						"id" => $item->getId(),
						"title" => $item->getTitle(),
						"master" =>$item->getMaster(),
						"description" => $item->getDescription(),
						"image" => $item->getImage(),
						"special" => $item->isSpecial(),
						"subs" => $this->getSubsMenus($item->getId())
				);
			}
		}

		return $content;
	
	}
	
	
}