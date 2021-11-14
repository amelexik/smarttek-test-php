<?php
/*
 * Copyright (c) 2021. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

define('DS', DIRECTORY_SEPARATOR);

define('ROOT', dirname(dirname(__FILE__)));
define('SF_PATH', ROOT . DS . 'sf');
define('SF_BASE_PATH', ROOT . DS . 'sf' . DS . 'base');
define('SF_COMPONENTS_PATH', ROOT . DS . 'sf' . DS . 'components');
define('APP_PATH', ROOT . DS . 'app');
define('CONFIG_PATH', ROOT . DS . 'app' . DS . 'config');
define('CONTROLLERS_PATH', ROOT . DS . 'app' . DS . 'controllers');
define('SERVICES_PATH', ROOT . DS . 'app' . DS . 'services');
define('MODEL_PATH', ROOT . DS . 'app' . DS . 'model');
define('VIEWS_PATH', ROOT . DS . 'app' . DS . 'views');
define('LAYOUT_PATH', ROOT . DS . 'app' . DS . 'views' . DS . 'layouts');

class Sf
{
    private static $_app;

    /**
     * @param null $config
     * @return WebApp
     */
    public static function createWebApp($config = null): WebApp
    {

        return new WebApp($config);
    }

    /**
     * @return mixed
     */
    public static function app()
    {
        return self::$_app;
    }

    /**
     * @param $app
     * @throws Exception
     */
    public static function setApp($app)
    {
        if (!self::$_app)
            self::$_app = $app;
        else
            throw new Exception('App can bee run once!');
    }

    /**
     * @param $class_name
     */
    public static function autoload($class_name)
    {
        $directories = [
            SF_PATH,
            SF_BASE_PATH,
            SF_COMPONENTS_PATH,
            CONTROLLERS_PATH,
            SERVICES_PATH,
            MODEL_PATH
        ];

        foreach ($directories as $directory) {
            if (file_exists($file = $directory . DS . $class_name . '.php')) {
                require_once($file);
                return;
            }
        }
    }
}

spl_autoload_register(['Sf', 'autoload']);