<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TypeMenus extends AbstractFixture implements OrderedFixtureInterface {
	
	private $data;
	
	public function __construct(){

		$data = array(
				0 => array(
					'title' => 'Conteúdo',
					'controller' => 'conteudo'
				),
				1 => array(
					'title' => 'Notícias',
					'controller' => 'noticias'
				),
				2 => array(
						'title' => 'Produtos',
						'controller' => 'produtos'
				),
				3 => array(
						'title' => 'Galeria de Fotos',
						'controller' => 'fotos'
				),
				4 => array(
						'title' => 'Galeria de Videos',
						'controller' => 'videos'
				),
				5 => array(
						'title' => 'Contato',
						'controller' => 'contato'
				)
		);
		
		$this->data = $data;
	}
	
	public function load(ObjectManager $manager){
		
		if(is_array($this->data)){
			foreach($this->data as $data){
				
				$item = new entities\typemenu();
				
				$item->setTitle($data['title']);
				$item->setController($data['controller']);
				
				$manager->persist($item);
			}
			
			$manager->flush();
		}
	}
	
	public function getOrder(){
		
		return 2;
	}
	
}