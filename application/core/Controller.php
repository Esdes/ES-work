<?php 
	
namespace application\core;

use application\core\View;

use application\lib\Online;

class Controller
{
	protected $controller;
	protected $method;
	protected $view;
	protected $model;
	
	public function __construct($controller,$method)
	{
		$this->controller = $controller;

		$this->method = $method;

		$this->view = new View($controller,$method);

		$this->model = $this->loadModel($controller);
	}
	
	public function loadModel($name)
	{
		$path = 'application'.DS.'models'.DS.ucfirst($name).'Model';

		if(class_exists($path))
		{
			return new $path();
		}
	}
}
