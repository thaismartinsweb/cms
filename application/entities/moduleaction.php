<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="module_action")
 *
 */
class ModuleAction
{

	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;

	/**
	 * @Column(type="integer")
	 */
	private $module_id;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $title;

	/**
	 * @Column(type="string", length=100)
	 */
	private $method;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $icon;

	public function setId($id){
		$this->id = $id;
	}

	public function getId(){
		return $this->id;
	}

	public function setModuleId($module_id){
		$this->module_id = $module_id;
	}

	public function getModuleId(){
		return $this->$module_id;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getTitle(){
		return $this->title;
	}

	public function setMethod($method){
		$this->method = $method;
	}

	public function getMethod(){
		return $this->method;
	}
	
	public function setIcon($icon){
		$this->icon = $icon;
	}
	
	public function getIcon(){
		return $this->icon;
	}

}