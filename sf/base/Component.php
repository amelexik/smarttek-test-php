<?php

/**
 * Class Component
 * User: amelexik
 * Date: 13.11.2021
 */
class Component
{
    public function __construct($config)
    {
        if (is_array($config) && !empty($config)) {
            foreach ($config as $key => $value) {
                $this->{$key} = $value;
            }
        }
    }

    public function __set($name, $value)
    {
        if (!isset($this->{$name}))
            throw new Exception("Param $name is Wrong");
        $this->{$name} = $value;
    }
}