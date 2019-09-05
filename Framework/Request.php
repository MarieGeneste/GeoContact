<?php

/*
 * Class building an incoming HTTP request
 * 
 * Based on Baptiste Pesquet tutorial
 */
class Request {

    /** Parameters array of the request */
    private $parameters;

    /**
     * Constructor
     * 
     * @param array $parameters Request parameters
     */
    public function __construct($parameters) {
        $this->parameters = $parameters;
    }

    /**
     * Return true if the parameters exist in the request
     * 
     * @param string $name Parameter name
     * @return bool True if parameters exist and don't return null
     */
    public function parameterExist($name) {
        return (isset($this->parameters[$name]) && $this->parameters[$name] != "");
    }

    /**
     * Return the asked parameter value
     * 
     * @param string $name Parameter name
     * @return string Parameter value
     * @throws Exception If the parameter don't exist in the request
     */
    public function getParameter($name) {
        if ($this->parameterExist($name)) {
            return $this->parameters[$name];
        }
        else {
            throw new Exception("Paramètre '$name' absent de la requête");
        }
    }

}

