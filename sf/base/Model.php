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
    protected string $table;

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

    /**
     * Fetch records
     * @param int $limit
     * @return mixed
     */
    public function getAll($limit = 10)
    {
        $query = "SELECT * FROM {$this->table} LIMIT 0,{$limit}";
        return $this->db->queryAll($query);
    }
}