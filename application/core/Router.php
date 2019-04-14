<?php

namespace application\core;

use application\core\View;

class Router 
{
    #our routes in file routes.php
    private $routes = array();
    private $uri;
    private $controller_class;
    private $controller_method;
    private $params = array();

    public function __construct($uri) 
    {
    	$this->uri = $uri;

        $routePath = ROOT.DS.'application'.DS.'config'.DS.'routes.php';
        $this->routes = require_once($routePath);

        $this->run();
    }

	# check uri and find controller/action/params
    public function run() 
    {
        $uri = trim($this->uri, '/');

        foreach ($this->routes as $route => $path) 
        {
            if (preg_match('#^'.$route.'$#', $uri))
            {
                $route = preg_replace('#^'.$route.'$#',  $path, $uri);
             
                $segments = explode('/',$route);

                $this->controller_class = array_shift($segments);

                $this->controller_method = array_shift($segments);
                
                $this->params = $segments;
            }
        }
    }


    public function getController()
    {
    	return $this->controller_class;
    }

    public function getAction()
    {
    	return $this->controller_method;
    }

    public function getParams()
    {
    	return $this->params;
    }

}