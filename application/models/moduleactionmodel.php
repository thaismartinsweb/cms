<?php

use entities\Module;

class Moduleactionmodel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('moduleaction');
	}
	
	public function getAllModules(){
	
		$itens = $this->findAll();
		$content = false;
	
		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id" => $item->getId(),
						"title" => $item->getTitle(),
						"controller" =>$item->getController(),
						"icon" => $item->getIcon(),
						"color" => $item->getColor(),
						"actions" => $this->getModuleAction($item)
				);
			}
		}
	
		return $content;
	}
	
	public function getAllActionsByModule($controller){
		
		// $query = "select ma from entities\\moduleaction ma where ma.module_id = :module";
		// $args = array("module" => 1);
		
		// $itens = $this->executeQuery($query, $args, false, 'moduleaction');
		
		$content = false;
		
		// if($itens){
		// 	foreach($itens as $item){
		// 		$content[] = array(
		// 				"title" => $item->getTitle(),
		// 				"method" => $item->getMethod(),
		// 				"icon" => $item->getIcon()
		// 		); 
		// 	}
		// }

		return $content;
	}
	
	
}