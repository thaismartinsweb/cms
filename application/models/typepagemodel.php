<?php

class TypePageModel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('typepage');
	}
	
	public function getAllData(){
		
		$itens = $this->findAll();
		return $this->builder->objectToArray($item);
	}
	
	
}