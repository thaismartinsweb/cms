<?php

class Menumodel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('menu');
	}
	
	public function getAllMenus(){
		
		$query = 'select m from entities\\menu m where m.master_id is null';
		$itens = $this->executeQuery($query);
		$content = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id" => $item->getId(),
						"title" => $item->getTitle(),
						"menu_id" =>$item->getMasterId(),
						"content" => $item->getContent(),
						"subs" => $this->getSubsMenus($item->getId())
				);
			}
		}
		
		return $content;
		
	}
	
	public function getSubsMenus($id){
	
		$query = 'select m from entities\\menu m where m.master_id = :master';
		$args  = array('master' => $id);
		$itens = $this->executeQuery($query, $args);
		$content = false;

		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id" => $item->getId(),
						"title" => $item->getTitle(),
						"menu_id" =>$item->getMasterId(),
						"content" => $item->getContent(),
						"subs" => $this->getSubsMenus($item->getId())
				);
			}
		}
	
		return $content;
	
	}
	
	
}