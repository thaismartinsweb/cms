<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="menu")
 *
 */
class Menu
{

	/**
	 * @Id
	 * @Column(type="integer")
	 * @GeneratedValue(strategy="AUTO")
	 */
	private $id;
	
	/**
	 * @Column(type="integer", nullable=true, nullable=true)
	 */
	private $master_id;

	/**
	 * @Column(type="string", length=100)
	 */
	private $title;

	/**
	 * @Column(type="string", length=500, nullable=true)
	 */
	private $description;

	/**
	 * @Column(type="string", length=100, nullable=true)
	 */
	private $image;
	
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setMaster($id){
		$this->master_id = $id;
	}
	
	public function getMaster(){
		return $this->master_id;
	}
	
	public function setTitle($title){
		$this->title = $title;
	}
	
	public function getTitle(){
		return $this->title;
	}
	
	public function setDescription($description){
		$this->description = $description;
	}
	
	public function getDescription(){
		return $this->description;
	}
	
	public function setImage($image){
		$this->image = $image;
	}
	
	public function getImage(){
		return $this->image;
	}

}