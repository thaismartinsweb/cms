<?php

namespace entities;

use Doctrine\ORM\Mapping as ORM;

/**
 * @Entity
 * @Table(name="user")
 *
 */
class User
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
	private $user_group_id;

	/**
	 * @Column(type="string", length=100)
	 */
	private $name;

	/**
	 * @Column(type="string", length=100)
	 */
	private $email;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $login;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $password;
	
	/**
	 * @Column(type="string", length=100)
	 */
	private $image;

	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setGroupId($id){
		$this->user_group_id = $id;
	}
	
	public function getGroupId(){
		return $this->user_group_id;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setEmail($email){
		$this->email = $email;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setLogin($login){
		$this->login = $login;
	}
	
	public function getLogin(){
		return $this->login;
	}
	
	public function setPassword($password){
		$this->password = $password;
	}
	
	public function setImage($image){
		$this->image = $image;
	}
	
	public function getImage(){
		return $this->image;
	}
	
}