<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Table(name="content")
 * @Entity
 */
class Content
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
	private $menu_id;
	
	/**
	 * @Column(type="integer")
	 */
	private $type_page_id;

	/**
	 * @Column(type="string", length=100)
	 */
	private $title;

	/**
	 * @Column(type="string", length=300, nullable=true)
	 */
	private $description;
	
	/**
	 * @Column(type="string", length=2000)
	 */
	private $content;
	
	/**
	 * @Column(type="string", length=100, nullable=true)
	 */
	private $image;
	
	/**
	 * @Column(type="datetime", nullable=false)
	 */
	private $date_created;
	
	/**
	 * @Column(type="integer", length=1)
	 */
	private $published;
	
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setMenuId($id){
		$this->menu_id = $id;
	}
	
	public function getMenuId(){
		return $this->menu_id;
	}
	
	public function setTypePageId($id){
		$this->type_page_id = $id;
	}
	
	public function getTypePageId(){
		return $this->type_page_id;
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
	
	public function setContent($content){
		$this->content = $content;
	}
	
	public function getContent(){
		return $this->content;
	}
	
	public function setImage($image){
		$this->image = $image;
	}
	
	public function getImage(){
		return $this->image;
	}
	
	public function setDateCreated(){
		$this->date_created = new \DateTime("now");
	}
	
	public function getDateCreated(){
		return $this->date_created->format('d/m/Y H:i');
	}
	
	public function setPublished($published){
		$this->published = $published;
	}
	
	public function getPublished(){
		return $this->published;
	}

}