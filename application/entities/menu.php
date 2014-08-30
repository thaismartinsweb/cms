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
	 * @OneToMany(targetEntity="entities\menu", mappedBy="master")
	 */
	private $children;
	
	/**
	 * @ManyToOne(targetEntity="entities\menu", inversedBy="children")
     * @JoinColumn(name="master_id", referencedColumnName="id", nullable=true)
	 */
	private $master;
	
	/**
	 * @ManyToOne(targetEntity="entities\typemenu")
     * @JoinColumn(name="type_menu_id", referencedColumnName="id", nullable=true)
	 */
	private $type_menu;

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
	
	/**
	 * @Column(type="integer", length=1)
	 */
	private $special;
	
	/**
	 * @Column(type="integer", length=1)
	 */
	private $exibition;
	
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setMaster($master){
		$this->master = $master;
	}
	
	public function getMaster(){
		return $this->master;
	}
	
	public function setTypeMenu($type_menu){
		$this->type_menu = $type_menu;
	}
	
	public function getTypeMenu(){
		return $this->type_menu;
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
	
	public function setSpecial($special){
		$this->special = $special;
	}
	
	public function getSpecial(){
		return $this->special;
	}
	
	public function setExibition($exibition){
		$this->exibition = $exibition;
	}
	
	public function getExibition(){
		return $this->exibition;
	}

}