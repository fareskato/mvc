<?php
/**
 * Created by PhpStorm.
 * User: fkato
 * Date: 27.08.17
 * Time: 13:20
 */

namespace PHPMVC;

if(!defined('DS')){
    define('DS', DIRECTORY_SEPARATOR);
}

require_once '..'. DS . 'app' . DS . 'config.php';
require_once APP_PATH . DS . 'lib' . DS .'autoload.php';


use PHPMVC\LIB\FrontController;

$fcon = new FrontController();
$fcon->dispatch();





