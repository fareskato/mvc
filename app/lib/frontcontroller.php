<?php
/**
 * Created by PhpStorm.
 * User: fkato
 * Date: 27.08.17
 * Time: 14:09
 */

namespace PHPMVC\LIB;

use PHPMVC\Controllers\AbstractController;

class FrontController
{
    const NOT_FOUND_ACTION = 'notFoundAction';
    const NOT_FOUND_CONTROLLER = 'PHPMVC\Controllers\\NotFoundController';

    private $_controller = 'index';
    private $_action = 'default';
    private $_params = array();

    /**
     * FrontController constructor.
     */
    public function __construct()
    {
        return $this->_parsUrl();
    }

    /**
     * handle the url
     */
    private function _parsUrl()
    {
        $url = explode('/',trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 3);
        if(isset($url[0]) && $url[0] != '' ){
            $this->_controller = $url[0];
        }
        if(isset($url[1]) && $url[1] != '' ){
            $this->_action = $url[1];
        }
        if(isset($url[2]) && $url[2] != '' ){
            $this->_params = explode('/',$url[2]);
        }

    }

    /**
     * Create instance of controller
     */
    public function dispatch(){
        $controllerClassName = 'PHPMVC\Controllers\\' . ucfirst($this->_controller . 'Controller');
        $actionName = $this->_action . 'Action';
        if(!class_exists($controllerClassName)){
            $controllerClassName = self::NOT_FOUND_CONTROLLER;
        }
        $controller = new $controllerClassName();
        if(!method_exists($controller, $actionName)){
            $this->_action = $actionName = self::NOT_FOUND_ACTION ;
        }
        $controller->setController($this->_controller);
        $controller->setAction($this->_action);
        $controller->setParams($this->_params);
        $controller->$actionName();



    }

}