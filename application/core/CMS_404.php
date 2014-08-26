<?php

class CMS_404 extends CMS_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	
	public function index(){

		$this->output->set_status_header('404');
		
		$data['title'] = $this->lang->line('404_title');
		$data['content'] = $this->lang->line('404_content');

		$this->load->library('template');
		
		$this->template->setViewAdmin($data['title'], '404', $data);
	}
}