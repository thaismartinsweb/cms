<?php

class Usermodel extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function findAll(){
		return $this->doctrine->em->getRepository('user')->findAll();
	}
	
	public function save(){
		echo 'Entrou save..';
	}
	
}