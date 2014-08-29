<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Table(name="type_page")
 * @Entity
 */
class TypePage
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
	 * @Column(type="string", length=300, nullable=true)
	 */
	private $description;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $page;
	
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
	
	public function setPage($page){
		$this->page = $page;
	}
	
	public function getPage(){
		return $this->page;
	}
	
	public function setImage($image){
		$this->image = $image;
	}
	
	public function getImage(){
		return $this->image;
	}
}