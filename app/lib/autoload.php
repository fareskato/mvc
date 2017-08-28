<?php
namespace PHPMVC\LIB;
/**
 * Class Autoload
 * @package PHPMVC\LIB
 */
class Autoload
{
    /**
     * @param $className
     */
    public static function autoload($className)
    {
        $className = str_replace('PHPMVC','',$className);
        $className = str_replace('\\','/', $className);
        $className = APP_PATH . strtolower($className) . '.php';
        if(file_exists($className)){
            require_once $className;
        }
    }
}

spl_autoload_register(__NAMESPACE__ . '\AutoLoad::autoload');