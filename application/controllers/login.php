<?php

class Login extends CMS_Controller {

	public function __construct(){
		parent::__construct(false);
		$this->load->entities('user');
		$this->lang->load('login');
	}
	
	public function index(){
		
		if($this->input->post('login')){
			$data['login'] = $this->input->post('login');
		}

		$data = $this->lang->language;

		$this->load->view('login/index', $data);
	}
	
	public function enter(){
	
		if($this->input->post('email') && $this->input->post('password')){
			$user = new User();
			$user->setEmail($this->input->post('email'));
			$user->setPassword($this->input->post('password'));
			redirect('user');
		}
	
		$data = $this->lang->language;
	
		$this->load->view('login/index', $data);
	}
	
}