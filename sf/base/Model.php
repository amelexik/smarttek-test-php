<?php

/**
 * Class Model
 * User: amelexik
 * Date: 13.11.2021
 */
Class Model
{
    private static $_models = [];
    protected $db;
    protected $table;

    public function __construct()
    {
        $this->db = Sf::app()->Db;
    }

    public static function model()
    {

        $className = get_called_class();
        if (isset(self::$_models[$className]))
            return self::$_models[$className];
        else {
            $model = self::$_models[$className] = new $className(null);
            return $model;
        }
    }
}