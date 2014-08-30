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
					$array[$property->getName()] = $this->getArray($entity, $rClass, $property);
				}
			}
			
			return $array;
		}
		
	}
	
	public function postToObject($entity){
		
		$rClass = new ReflectionClass($entity);
		
		if($this->allowPost($rClass)){
			foreach($rClass->getProperties() as $property){
				$this->buildPost($entity, $rClass, $property);
			}
		}
	}
	
	private function buildPost($entity, $class, $property){
		
		$method = $this->buildMethod($property, 'set');
		
		
		if($this->existsData($class, $property, $method)){
			if($method == IMAGE_METHOD){
				$this->setImage($entity, $class);
			} else {
				$this->setPost($entity, $property, $method);
			}
		}
	}
	
	private function setPost($entity, $property, $method){
		
		$post = $this->ci->input->post($property->getName());
		
		if(!empty($post)){
			if($this->isEntity($property)){
				$this->setEntity($entity, $method, $property, $post);
			} else {
				$entity->$method($post);
			}
		}
	}
	
	private function setEntity($entity, $method, $property, $post){
		
		$model = str_replace('_', '', $property->getName()).'model';
		
		if($this->ci->load->model($model)){
			$subEntity = $this->ci->$model->findById($post);
			$entity->$method($subEntity);
		}

	}
	
	private function isEntity($property){
		
		$file = ENTITIES_DIR . str_replace('_', '', $property->getName()). EXT;

		if(is_file($file)){
			return true;
		}
		
		return false;
	}
	
	private function getArray($entity, $class, $property){
		
		$method = $this->buildMethod($property, 'get');
		
		if($this->existsData($class, $property, $method)){
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
	
	private function setImage($entity, $class){
		
		if(!empty($_FILES['image']['name'])){
			
			$path = str_replace(DOCTRINE_NAMESPACE . '\\', '', strtolower($class->getName()));
			$file['upload_path'] = UPLOAD_DIR . $path;
			$file['allowed_types'] = 'gif|jpg|png';
			$file['max_width']  = '1024';
			$file['max_height']  = '768';

			$this->ci->load->library('upload', $file);
			
			if($this->ci->upload->do_upload('image')){
				$file = $this->ci->upload->data();
				$entity->setImage($file['file_name']);
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
	
		if($class->hasProperty($property->getName()) && $class->hasMethod($method)){
			
			$rMethod = $class->getMethod($method);
			
			if($rMethod->isPublic()){
				return true;
			}
		}
	
		return false;
	}
}
