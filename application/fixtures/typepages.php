<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TypePages extends AbstractFixture implements OrderedFixtureInterface {
	
	private $data;
	
	public function __construct(){

		$data = array(
				0 => array(
					'title' => 'Página com imagem destaque no topo',
					'description' => 'Modelo de página com uma imagem grande em destaque no topo',
					'page' =>'simple_page_top',
					'image' => 'page_top.png'
				)
		);
		
		$this->data = $data;
	}
	
	public function load(ObjectManager $manager){
		
		if(is_array($this->data)){
			foreach($this->data as $data){
				
				$item = new entities\typepage();
				
				$item->setTitle($data['title']);
				$item->setDescription($data['description']);
				$item->setPage($data['page']);
				$item->setImage($data['image']);
				
				$manager->persist($item);
			}
			
			$manager->flush();
		}
	}
	
	public function getOrder(){
		
		return 3;
	}
	
}