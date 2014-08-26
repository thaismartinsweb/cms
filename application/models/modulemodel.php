<?php

use entities\Module;

class ModuleModel extends CMS_Model {
	
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
		
		$args = array("module" => $module->getId());
		$itens = $this->findBy($args, 'moduleaction');
		
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

	private function getModuleByController($controller){

		$args = array("control" => $controller);
		$itens = $this->findBy($args);
		
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