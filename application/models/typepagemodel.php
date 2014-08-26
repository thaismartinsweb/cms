<?php

class TypePageModel extends CMS_Model {
	
	public function __construct(){
		parent::__construct('typepage');
	}
	
	public function getAllPages(){
		
		$itens = $this->findAll();
		$content = false;

		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id" => $item->getId(),
						"title" => $item->getTitle(),
						"description" => $item->getDescription(),
						"content" => $item->getContent(),
						"image" => $item->getImage()
				);
			}
		}
		
		return $content;
		
	}
	
	
}