<?php

class CMS_Model extends CI_Model {
	
	private $em;
	private $repository;
	private $entity;
	private $class;
	
	public function __construct($entity = false){
		parent::__construct();
		$this->buildManagers($entity);		
	}
	
	private function buildManagers($entity){
		if($entity){
			$this->em =  $this->doctrine->em;
			$this->repository =  $this->em->getRepository('entities\\' . $entity);
			$this->entity = ucfirst($entity);
			$this->class = 'entities\\' . $this->entity;
		}
	}
	
	public function findAll(){
		return $this->repository->findAll();
	}
	
	public function findById($id, $repository = false){
		
		$return = false;
		
		if($id){
			if($repository){
				$return = $this->em->getRepository('entities\\' . $repository)->find($id);
			} else {
				$return = $this->repository->find($id);
			}
		}
		
		return $return;
	}
	
	public function findOneBy($args, $repository = false){
		
		$return = false;
		
		if(is_array($args)){
			if($repository){
				$return = $this->em->getRepository('entities\\' . $repository)->findOneBy($args);
			} else {
				$return = $this->repository->findOneBy($args);
			}
		}
		
		return $return;
	}
	
	
	public function find($args, $repository = false){
	
		$return = false;
	
		if(is_array($args)){
			if($repository){
				$return = $this->em->getRepository('entities\\' . $repository)->find($args);
			} else {
				$return = $this->repository->find($args);
			}
		}
		
		return $return;
	}


	public function findBy($args, $repository = false){
	
		$return = false;
	
		if(is_array($args)){
			if($repository){
				$return = $this->em->getRepository('entities\\' . $repository)->findBy($args);
			} else {
				$return = $this->repository->findBy($args);
			}
		}
		
		return $return;
	}

	public function save($entity){

		if($this->isInstanceOf($entity)){
			$this->em->persist($entity);
		    $this->em->flush();
		    return $entity;
		}
		
		return false;
	}
	
	public function update($entity){
		
		if($this->isInstanceOf($entity)){
			$this->em->merge($entity);
			$this->em->flush();
			return $entity;
		}
		
		return false;
	}
	
	public function saveOrUpdate($entity){
		
		if($entity->getId()){
			return $this->update($entity);
		} else {
			return $this->save($entity);
		}
		
	}
	
	public function delete($entity){
		
		if($this->isInstanceOf($entity)){
			$this->em->remove($entity);
			$this->em->flush();
			return true;
		}
		
		return false;
	}
	
	public function executeQuery($query, $args = false, $array = false){
	
		$qr = $this->em->createQuery($query);
	
		if($args && is_array($args)){
			$qr->setParameters($args);
		}
	
		if($array){
			$return = $qr->getResult(\Doctrine\ORM\AbstractQuery::HYDRATE_ARRAY);
		} else {
			$return = $qr->getResult();
		}
	
		return $return;
	}
	
	private function isInstanceOf($instance){
	
		if($instance instanceof $this->class){
			return true;	
		}
		
		return false;
	}
	
}