<?php

class Builder {
	
	private $ci;
	public $errors;
	
	public function __construct(){
		$this->ci = &get_instance();
	}
	
	public function objectToArray($entity){
		
		if($entity){
			$rClass = new ReflectionClass($entity);
			$array = false;
			
			if($this->allowArray($rClass)){
				foreach($rClass->getProperties() as $property){
					$array[] = $this->getArray($entity, $rClass, $property);
				}
			}
			
			return $array;
		}
		
	}
	
	public function postToObject($entity){
		
		$rClass = new ReflectionClass($entity);
		
		if($this->allowPost($rClass)){
			foreach($rClass->getProperties() as $property){
				$this->setPost($entity, $rClass, $property);
			}
		}
	}
	
	private function setPost($entity, $class, $property){
		
		$method = $this->buildMethod($property, 'set');
		$rMethod = $class->getMethod($method);
		
		if($this->existsData($class, $property, $rMethod)){
			if($method == IMAGE_METHOD){
				$this->setImage($entity);
			} else {
				$post = $this->ci->input->post($property->getName());
				
				if($post){
					$entity->$method($post);
				}
			}
		}
	}
	
	private function getArray($entity, $class, $property){
		
		$method = $this->buildMethod($property, 'get');
		$rMethod = $class->getMethod($method);
		
		if($this->existsData($class, $property, $rMethod)){
			return $entity->$method();
		}
		
		return false;
	}

	private function buildMethod($property, $type){
		
		$name = explode('_', $property->getName());
		
		if(is_array($name)){
			$method = $type;
			foreach($name as $item){
				$method .= ucfirst($item);
			}
		} else {
			$method = $type . ucfirst($property->getName());
		}
		
		return $method;
	}
	
	private function setImage($entity){
		
		if(!empty($_FILES['image']['name'])){
			
			$file['upload_path'] = UPLOAD_DIR . 'config';
			$file['allowed_types'] = 'gif|jpg|png';
			$file['max_width']  = '1024';
			$file['max_height']  = '768';
				
			$this->ci->load->library('upload', $file);
			
			
			if($this->upload->do_upload('image')){
				$file = $this->ci->upload->data();
				$entity->setLogo($file['file_name']);
			} else {
				$this->errors[] = $this->ci->upload->display_errors();
			}
		}
		
	}

	private function allowPost($class){
		
		if(strpos($class->getName(), DOCTRINE_NAMESPACE) !== false){
			if($this->ci->input->post()){
				return true;
			}
		}

		return false;
	}
	
	private function allowArray($class){
	
		if(strpos($class->getName(), DOCTRINE_NAMESPACE) !== false){
			return true;
		}
	
		return false;
	}
	
	private function existsData($class, $property, $method){
	
		if($class->hasProperty($property->getName()) && $class->hasMethod($method->getName())
		&& $method->isPublic()){
			return true;
		}
	
		return false;
	}
}
