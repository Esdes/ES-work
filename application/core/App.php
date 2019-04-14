<?php

namespace application\core;

class App
{
	private $uri;

	private $router;

	public function run($uri)
	{
		$this->uri = $uri;

		$this->router = new Router($uri);

		$controller = $this->router->getController();
		
		$method = $this->router->getAction();

		$controller_class = 'application'.DS.'controllers'.DS.ucfirst($controller).'Controller';

		$controller_method = 'action'.ucfirst($method);

		$controller_params = $this->router->getParams();

		if(class_exists($controller_class))
		{
			if(method_exists($controller_class, $controller_method))
			{
				$controller_class = new $controller_class($controller,$method);

				if(!empty($controller_params))
				{
					call_user_func_array(array($controller_class,$controller_method), $controller_params);
				}
				else
				{
					$controller_class->$controller_method();
				}
			}
			else
			{
				View::errorCode(404);
			}
		}
		else 
		{
			View::errorCode(404);
		}

	}
}
