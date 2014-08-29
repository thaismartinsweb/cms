<?php

define('DB_HOSTNAME', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'teste123');
define('DB_DATA', 'admin');

define('CHARSET', 'utf8');

define('BASE_DIR', '/var/www/admin/');
define('CORE_DIR', BASE_DIR . 'system/core/');
define('APP_DIR', BASE_DIR . 'application/');
define('LIB_DIR', APP_DIR . 'libraries/');

define('COMPOSER_DIR', LIB_DIR . 'vendors/');
define('DOCTRINE_DIR', COMPOSER_DIR . 'doctrine/');
define('DOCTRINE_NAMESPACE', 'entities');

define('CONTROLLER_DIR', APP_DIR . 'controller/');
define('VIEW_DIR', APP_DIR . 'views/');
define('MODEL_DIR', APP_DIR . 'models/');
define('ENTITIES_DIR', APP_DIR . 'entities/');

define('WEBROOT_DIR', 'webroot/');
define('CSS_DIR', WEBROOT_DIR .'css/');
define('JS_DIR', WEBROOT_DIR . 'js/');
define('IMAGES_DIR', WEBROOT_DIR . 'images/');
define('ICONS_DIR', WEBROOT_DIR . 'icon/');

define('UPLOAD_DIR', './public/');
define('PUBLIC_DIR', 'public/');

define('SUCCESS', 'success');
define('DELETED', 'deleted');

define('GET_METHOD', 'get');
define('SET_METHOD', 'set');
define('IMAGE_METHOD', SET_METHOD . 'Image');