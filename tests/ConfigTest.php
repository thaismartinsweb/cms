<?php

require 'CITests' . EXT;

class ConfigTest extends CITest {

	public function testCreateConfig() {
		
		$this->CI->load->model('configmodel');
		
		$this->buildConfig();
		
		$configSaved = $this->CI->configmodel->getConfigData();
		
		$this->assertEquals(1, $configSaved['id']);
		$this->assertEquals(6, count($configSaved));
	}
	
	public function testUpdateConfig() {
		$this->CI->load->model('configmodel');
		$config = $this->CI->configmodel->getConfigData();
		$this->assertEquals(6, count($config));
	}
	
	public function buildConfig(){
		
		$this->CI->load->entities('config');
		$this->CI->load->model('configmodel');
		
		$config = new entities\Config();
		$config->setTitle('Teste');
		$config->setEmail('teste@teste.com.br');
		$config->setContact('112222-2222');
		$config->setAddress('Rua Teste, 123');
		$config->setLogo('teste.jpg');
		
		$this->CI->configmodel->saveOrUpdate($config);
	}
	
}