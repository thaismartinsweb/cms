<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Table(name="type_menu")
 * @Entity
 */
class TypeMenu
{

	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @Column(type="string", length=100)
	 */
	private $title;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $controller;


	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setController($controller){
		$this->controller = $controller;
	}
	
	public function getController(){
		return $this->controller;
	}
	
}