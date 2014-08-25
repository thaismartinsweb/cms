<?php

class Contentmodel extends CMS_Model {

	public function __construct(){
		parent::__construct('content');
	}
	
	public function getAllContents(){
		
		$itens = $this->contentmodel->findAll();
		$data['itens'] = false;
		
		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id"      => $item->getId(),
						"menu_id" => $item->getMenuId(),
						"title"   => $item->getTitle(),
						"date"    => $item->getDateCreated(),
						"published" => $item->getPublished()
				);
			}
			$data['itens'] = $content;
		}
	}
	
	public function getLastContents(){
		
	}
	
}