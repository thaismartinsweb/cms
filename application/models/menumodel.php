<?php

class MenuModel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('menu');
	}
	
	public function getAllData(){
		
		$args = array('menu_id' => 0);
		$itens = $this->findBy($args);
		$content = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = $this->builder->objectToArray($item);
				$content[]['subs'] = $this->getSubsMenus($item->getId());
			}
		}
		
		return $content;
		
	}
	
	public function getSubsMenus($id){
	
		$args  = array('menu_id' => $id);
		$itens = $this->findBy($args);
		$content = false;

		if($itens){
			foreach($itens as $item){
				$content[] = $this->builder->objectToArray($item);
				$content[]['subs'] = $this->getSubsMenus($item->getId());
			}
		}
		
		return $content;
	
	}

	public function getMenuById($id){

		$content = false;

		if(isset($id)){
			$item = $this->findById($id);
			
			if($item){
				$content = $this->builder->objectToArray($item);
				$content['subs'] = $this->getSubsMenus($item->getId());
			}
		}

		return $content;
	
	}
	
	
}