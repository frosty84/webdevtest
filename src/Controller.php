<?php

namespace webdev\src;

/**
 * Class Controller
 * @package CodeTest\Src\Core
 */
abstract class Controller implements ControllerInterface
{
    //array of arguments
    protected $args;

    /**
     * Controller constructor.
     * @param $args
     */
    public function __construct($args)
    {
        $this->args = $args;
    }

    /**
     * Returns GET/POST argument value by name
     * @param $name
     * @return null
     */
    public function getArgument($name)
    {
        return isset($this->args[$name]) ? $this->args[$name] : null;
    }
}

