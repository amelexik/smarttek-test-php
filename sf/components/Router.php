<?php
/**
 * Class Router
 * User: amelexik
 * Date: 13.11.2021
 */
class Router extends Component
{
    /**
     * @var string
     */
    public string $defaultController = 'site';

    /**
     * @var string
     */
    public string $defaultAction = 'index';

    /**
     * @var string
     */
    protected string $_uri;

    /**
     * @var string
     */
    protected string $_controller;

    /**
     * @var string
     */
    protected string $_action;

    /**
     * @var false|string[]
     */
    protected $_params;

    /**
     * @var string
     */
    protected string $_methodPrefix = 'action';

    /**
     * Router constructor.
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);
        $this->_uri = urldecode(trim($_SERVER['REQUEST_URI'], '/'));

        // Get defaults
        $this->_controller = $this->defaultController;
        $this->_action = $this->defaultAction;

        $uri_parts = explode('?', $this->_uri);

        // controller/action/param1/param2/.../...
        $path = $uri_parts[0];

        $path_parts = explode('/', $path);

        if (count($path_parts)) {
            // Get controller - next element of array
            if (current($path_parts)) {
                $this->_controller = strtolower(current($path_parts));
                array_shift($path_parts);
            }
            // Get action
            if (current($path_parts)) {
                $this->_action = strtolower(current($path_parts));
                array_shift($path_parts);
            }

            // Get params - all the rest
            $this->_params = $path_parts;

        }

    }

    /**
     * @param $location
     */
    public static function redirect($location)
    {
        header("Location: $location");
        die();
    }

    /**
     * @return string
     */
    public function getUri(): string
    {
        return $this->_uri;
    }


    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->_controller;
    }

    /**
     * @return string
     */
    public function getAction(): string
    {
        return $this->_action;
    }

    /**
     * @return false|string[]
     */
    public function getParams()
    {
        return $this->_params;
    }

    /**
     * @return string
     */
    public function getMethodPrefix(): string
    {
        return $this->_methodPrefix;
    }

}