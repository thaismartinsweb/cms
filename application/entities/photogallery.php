<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="photo_gallery")
 *
 */
class PhotoGallery
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
	 * @Column(type="string", length=500)
	 */
	private $description;
	
	/**
	 * @Column(type="integer", nullable=true)
	 */
	private $exibition;
	
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
	
	public function setExibition($exibition){
		$this->exibition = $exibition;
	}
	
	public function getExibition(){
		return $this->exibition;
	}

}