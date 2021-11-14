<?php

/**
 * Class Request
 * User: amelexik
 * Date: 13.11.2021
 */
class Request extends Component
{


    /**
     * @return bool
     */
    public function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    /**
     * @param $name
     * @param null $defaultValue
     * @return null
     */
    public function getParam($name, $defaultValue = null)
    {
        return isset($_GET[$name]) ? $_GET[$name] : (isset($_POST[$name]) ? $_POST[$name] : $defaultValue);
    }

    /**
     * @param $name
     * @param null $defaultValue
     * @return null
     */
    public function getPost($name, $defaultValue = null)
    {
        return isset($_POST[$name]) ? $_POST[$name] : $defaultValue;
    }

    /**
     * @param $name
     * @param null $defaultValue
     * @return null
     */
    public function getFile($name, $defaultValue = null)
    {
        return isset($_FILES[$name]) ? $_FILES[$name] : $defaultValue;
    }
}