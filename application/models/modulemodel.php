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
				$content[] = $this->builder->objectToArray($item);
// 				$content[]['actions'] = $this->getModuleAction($item);
			}
		}
		return $content;
	}
	
	private function getModuleAction(Module $module){
		
		$this->load->model('moduleactionmodel');
		$args = array("module" => $module);
		$itens = $this->moduleactionmodel->findBy($args);

		$content = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = $this->builder->objectToArray($item);
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
				$content[] = $this->builder->objectToArray($item);
			}
		}

		return $content;
	}
	
	
}