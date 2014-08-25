<?php
require_once '../../../config/defines.php';
require_once '../../doctrine.php';

$em = new Doctrine();
return $em->helperSet;