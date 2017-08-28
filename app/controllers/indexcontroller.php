<?php
/**
 * Created by PhpStorm.
 * User: fkato
 * Date: 27.08.17
 * Time: 15:38
 */

namespace PHPMVC\Controllers;
class IndexController extends AbstractController
{
    public function defaultAction()
    {
        $this->_view();
    }

    public function addAction(){
        $this->_view();
    }

}