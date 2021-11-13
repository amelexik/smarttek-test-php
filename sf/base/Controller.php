<?php

/**
 * Class Controller
 * User: amelexik
 * Date: 13.11.2021
 */
class Controller
{

    public $layout = 'main';

    protected $_data;

    protected $_model;

    protected $_params;

    public function __construct($data = array())
    {
        $this->_data = $data;
        $this->_params = Sf::app()->Router->getParams();
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->_model;
    }

    /**
     * @return mixed
     */
    public function getParams()
    {
        return $this->_params;
    }

}