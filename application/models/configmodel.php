<?php

use entities\Config;

class ConfigModel extends CMS_Model {

	public function __construct(){
		parent::__construct('config');
	}

	public function getConfigData(){
		
		$item = $this->findById(1);
		$content = false;
		
		if($item){
			$content = array(
					"id" => $item->getId(),
					"title" => $item->getTitle(),
					"logo" =>$item->getLogo(),
					"email" => $item->getEmail(),
					"contact" => $item->getContact(),
					"address" => $item->getAddress()
			);
		}
		
		return $content;
	}
	
}