<?php

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\Common\ClassLoader;

class Doctrine {
	
	public $em;
	
	public $helperSet;
	
	public function __construct (){
		 $paths = array(ENTITIES_DIR);
		 $namespace = 'entities';
		 $models_path = APP_DIR;

		 $isDevMode = true;  
		
		 // the connection configuration  
		 $dbParams = array(  
		   'driver'   => 'pdo_mysql',
		   'host'     => DB_HOSTNAME,
		   'user'     => DB_USER,
		   'password' => DB_PASS,
		   'dbname'   => DB_DATA,
// 		   'charset'  => CHARSET,
// 		   'driverOptions' => array(
// 		       'charset'   => CHARSET,
// 		    ),
		 ); 
		
		 // Any way to access the EntityManager from your application  
		 $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);  
		 $em = EntityManager::create($dbParams, $config);  
		 
		 $helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(  
		   'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),  
		   'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)  
		 ));
		 
		 $loader = new ClassLoader($namespace, $models_path);
		 $loader->register();
		 
		 $this->em = $em;
		 $this->helperSet = $helperSet;
	}
}