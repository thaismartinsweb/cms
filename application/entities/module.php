<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="module")
 *
 */
class Module
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
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $icon;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $color;

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
	
	public function setIcon($icon){
		$this->icon = $icon;
	}
	
	public function getIcon(){
		return $this->icon;
	}
	
	public function setColor($color){
		$this->color = $color;
	}
	
	public function getColor(){
		return $this->color;
	}

}