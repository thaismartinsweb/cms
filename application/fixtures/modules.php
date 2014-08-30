<?php

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class Modules extends AbstractFixture implements OrderedFixtureInterface {
	
	private $data;
	
	public function __construct(){

		$data = array(
				0 => array(
					'title' => 'Home',
					'controller' =>'cms',
					'icon' => 'home',
					'color' => 'primary'
				),
				1 => array(
						'title' => 'Dados do Site',
						'controller' =>'config',
						'icon' => 'cogs',
						'color' => 'success'
				),
				2 => array(
						'title' => 'Menu',
						'controller' => 'menu',
						'icon' => 'tasks',
						'color' => 'info'
				),
				3 => array(
						'title' => 'Conteúdo',
						'controller' => 'content',
						'icon' => 'quote-left',
						'color' => 'inverse'
				),
				4 => array(
						'title' => 'Galeria de Fotos',
						'controller' => 'photogallery',
						'icon' => 'camera-retro',
						'color' => 'warning'
				),
				5 => array(
						'title' => 'Fotos',
						'controller' => 'photo',
						'icon' => 'picture',
						'color' => 'danger'
				),
				6 => array(
						'title' => 'Galeria de Videos',
						'controller' => 'videogallery',
						'icon' => 'film',
						'color' => 'primary'
				),
				7 => array(
						'title' => 'Videos',
						'controller' => 'video',
						'icon' => 'play',
						'color' => 'success'
				),
				8 => array(
						'title' => 'Categoria de Produtos',
						'controller' => 'productcategory',
						'icon' => 'tags',
						'color' => 'info'
				),
				9 => array(
						'title' => 'Produtos',
						'controller' => 'product',
						'icon' => 'glass',
						'color' => 'inverse'
				),
				10 => array(
						'title' => 'Contatos',
						'controller' => 'form',
						'icon' => 'envelope-alt',
						'color' => 'warning'
				),
				11 => array(
						'title' => 'Ajuda',
						'controller' => 'help',
						'icon' => 'info',
						'color' => 'danger'
				)
		);

		$this->data = $data;
	}
	
	public function load(ObjectManager $manager){
		
		$this->loadModules($manager);
		$this->loadActions($manager);
	}
	
	public function loadModules(ObjectManager $manager){
		
		if(is_array($this->data)){
			foreach($this->data as $data){
				
				$item = new entities\module();
				
				$item->setTitle($data['title']);
				$item->setController($data['controller']);
				$item->setIcon($data['icon']);
				$item->setColor($data['color']);
				
				$manager->persist($item);

				$this->addReference("module-".$data['controller'], $item);
			}
			
			$manager->flush();
		}
	}
	
	public function loadActions(ObjectManager $manager){
		
		$datas[0] = $this->getReference("module-menu");
		$datas[1] = $this->getReference("module-content");
		$datas[2] = $this->getReference("module-photogallery");
		$datas[3] = $this->getReference("module-photo");
		$datas[4] = $this->getReference("module-videogallery");
		$datas[5] = $this->getReference("module-video");
		$datas[6] = $this->getReference("module-productcategory");
		$datas[7] = $this->getReference("module-product");

		if(is_array($datas)){
			$i = 0;
				
			foreach($datas as $data){
		
				$new = new entities\moduleaction();
				$new->setTitle('Adicionar Novo');
				$new->setModule($datas[$i]);
				$new->setIcon('plus-square-o');
				$new->setMethod('fresh');
		
				$edit = new entities\moduleaction();
				$edit->setTitle('Gerenciar Todos');
				$edit->setModule($datas[$i]);
				$edit->setIcon('pencil-square-o');
				$edit->setMethod('index');
		
				$manager->persist($new);
				$manager->persist($edit);
		
				$i++;
			}
				
			$manager->flush();
		}
		
	}
	
	public function getOrder(){
		
		return 1;
	}
	
}