<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template {
	
	private $ci;
	
	public function __construct(){
		$this->ci =& get_instance();
	}
	
	public function setViewLogin($view, $data){
		 echo 'view login';
	}
	
	public function setViewAdmin($pageTitle, $view, $dataView){
	
		// Insere paginas padrões da tela de admin
		$data['header'] = $this->ci->load->view('admin/header', array('page_title' => $pageTitle), true);
		$data['top'] = $this->ci->load->view('admin/top', null, true);

		$side['itens'] = $this->getModuleSide();
		
		$data['side'] = $this->ci->load->view('admin/side', $side, true);
		$data['footer'] = $this->ci->load->view('admin/footer', null, true);
	
		// Insere o conteúdo
		if(!empty($view)){
			$data['content'] = $this->ci->load->view($view, $dataView, true);
		} else {
			$data['content'] = $this->ci->load->view('404', '', true);
		}

		// Executa Template
		$this->ci->load->view('admin', $data);
	
	}
	
	private function getModuleSide(){
		
		$this->ci->load->model('modulemodel');
		return $this->ci->modulemodel->getAllModules();
	}
	
}