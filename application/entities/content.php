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
	 * @ManyToOne(targetEntity="entities\menu")
     * @JoinColumn(name="menu_id", referencedColumnName="id", nullable=true)
	 */
	private $menu;
	
	/**
	 * @ManyToOne(targetEntity="entities\typepage")
     * @JoinColumn(name="type_page_id", referencedColumnName="id")
	 */
	private $type_page;

	/**
	 * @Column(type="string", length=100)
	 */
	private $title;

	/**
	 * @Column(type="string", length=300, nullable=true)
	 */
	private $description;
	
	/**
	 * @Column(type="text", nullable=true)
	 */
	private $content;
	
	/**
	 * @Column(type="string", length=100, nullable=true)
	 */
	private $image;
	
	/**
	 * @Column(type="datetime")
	 */
	private $date_created;
	
	/**
	 * @Column(type="integer", length=1)
	 */
	private $special;
	
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
	
	public function setMenu($menu = null){
		$this->menu = $menu;
	}
	
	public function getMenu(){
		return $this->menu;
	}
	
	public function setTypePage($page){
		$this->type_page = $page;
	}
	
	public function getTypePage(){
		return $this->type_page;
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
	
	public function setSpecial($special){
		$this->special = $special;
	}
	
	public function isSpecial(){
		return $this->special;
	}

}