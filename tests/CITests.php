<?php

class CITest extends PHPUnit_Framework_TestCase {
    
	protected $CI;

    public function setUp() {
      $this->CI = &get_instance();
    }

    public function testGetPost(){
      $_SERVER['REQUEST_METHOD'] = 'GET';
      $_GET['foo'] = 'bar';
      $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }
    
}