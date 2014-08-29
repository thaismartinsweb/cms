<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Template {
	
	private $ci;
	
	public function __construct(){
		$this->ci =& get_instance();
	}
	
	public function setViewLogin($view, $data){
		 
	}
	
	public function setViewAdmin($args){
		
		// Gera dados
		$error['content'] = $this->ci->lang->line('404_content');
		$side['itens'] = $this->getModuleSide();
		$data['page_title'] = $args['title'];
		$data['title'] = $args['title'];
		$data['icon'] = $args['icon'];

		// Insere o conteúdo
		if($this->existsView($args['page'])){
			$data['content'] = $this->ci->load->view($args['page'], $args['data'], true);
		} else {
			$data['page_title'] = $this->ci->lang->line('404_title');
			$data['title'] = $this->ci->lang->line('404_title');
			$data['icon'] = 'warning-sign';
			$data['content'] = $this->ci->load->view('404', $error, true);
		}
		
		// Insere paginas padrões da tela de admin
		$data['head'] = $this->ci->load->view('admin/head', null, true);
		$data['top'] = $this->ci->load->view('admin/top', null, true);
		$data['side'] = $this->ci->load->view('admin/side', $side, true);
		$data['message'] = $this->ci->load->view('admin/message', $args, true);
		$data['footer'] = $this->ci->load->view('admin/footer', null, true);

		// Executa Template
		$this->ci->load->view('admin', $data);
	}
	
	private function existsView($view){
		
		$file = VIEW_DIR . $view . EXT;;
		
		if(file_exists($file)){
			return true;
		}
		
		return false;
	}
	
	private function getModuleSide(){
		
		$this->ci->load->model('modulemodel');
		return $this->ci->modulemodel->getAllModules();
	}
	
}