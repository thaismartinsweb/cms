<?php

class TypePageModel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('typepage');
	}
	
	public function getAllData(){
		
		$itens = $this->findAll();
		$content = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = $this->builder->objectToArray($item);
			}
		}
		
		return $content;
	}
	
	
}