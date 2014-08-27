<?php

use entities\Config;

class ConfigModel extends CMS_Model {

	public function __construct(){
		parent::__construct('config');
	}

	public function getAllData(){
		
		$item = $this->findById(1);		
		return $this->builder->objectToArray($item);
	}
	
}