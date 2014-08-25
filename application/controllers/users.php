<?php

class Users extends CMS_Controller {

	public function __construct(){
		parent::__construct(false);
		$this->load->entities('user');
		$this->load->model('usermodel');
	}
	
	public function index(){
		
		$users = $this->usermodel->findAll();
		
		$data['users'] = $users;
		$this->load->view('user/list', $data);
	}
	
	public function insert(){
		
	}
	
	public function edit($user_id){
		
	}
	
	public function delete($user_id){
	
	}
	
}