<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="config")
 *
 */
class Config
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
	 * @Column(type="string", length=100, nullable=true)
	 */
	private $image;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $email;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $contact;
	
	/**
	 * @Column(type="string", length=200)
	 */
	private $address;
	
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

	public function setImage($image){
		$this->image = $image;
	}

	public function getImage(){
		return $this->image;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setContact($contact){
		$this->contact = $contact;
	}
	
	public function getContact(){
		return $this->contact;
	}
	
	public function setAddress($address){
		$this->address = $address;
	}
	
	public function getAddress(){
		return $this->address;
	}

}