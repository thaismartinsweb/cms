<?php

use entities\Module;

class Modulemodel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('module');
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
	
	private function getModuleAction(Module $module){
		
		$query = "select ma from entities\\moduleaction ma where ma.module_id = :module";
		$args = array("module" => $module->getId());
		
		$itens = $this->executeQuery($query, $args, false, 'moduleaction');
		
		$content = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"title" => $item->getTitle(),
						"method" => $item->getMethod(),
						"icon" => $item->getIcon()
				); 
			}
		}

		return $content;
	}
	
	
}