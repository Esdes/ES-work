<?php

define('DS',DIRECTORY_SEPARATOR);

/*define var with parent path directory*/
define('ROOT', $_SERVER['DOCUMENT_ROOT']);

require_once ROOT.DS.'application'.DS.'lib'.DS.'Dev.php';

//spl_autoload_register
require_once ROOT.DS.'application'.DS.'lib'.DS.'init.php';

use application\core\App;

$uri = $_SERVER['REQUEST_URI'];

session_start();

$app = new App();
$app->run($uri);
