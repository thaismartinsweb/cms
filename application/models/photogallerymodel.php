<?php

class PhotoGalleryModel extends CMS_Model {

	public function __construct(){
		parent::__construct('photogallery');
	}

	public function getAllGalleries(){

		$itens = $this->findAll();
		$content = false;

		if($itens){
			foreach($itens as $item){
				$content[] = array(
						"id"      => $item->getId(),
						"title"   => $item->getTitle(),
						"description" => $item->getDescription(),
						"exibition"    => $item->getExibition()
				);
			}
		}

		return $content;
	}
	
	public function getPhotoGalleryById($id){

		$item = $this->findById($id);
		$content = false;

		if($item){
			$content = array(
					"id"      => $item->getId(),
					"title"   => $item->getTitle(),
					"description" => $item->getDescription(),
					"exibition"    => $item->getExibition()
			);
		}

		return $content;
	}

}