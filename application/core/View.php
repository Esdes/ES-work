<?php

namespace application\core;

class View 
{
	protected $path;
	protected $controller;
	protected $method;
	public $layout='default';

	public function __construct($controller,$method) 
	{
		$this->controller = $controller;

		$this->method = $method;

		$this->path = $this->controller.DS.$this->method;
	}

	public function generate($title, $params=array())
	{
		extract($params);

		$views_path = 'application'.DS.'views'.DS.$this->path.'.view.php';

		if(file_exists($views_path))
		{
			$layout_path = 'application'.DS.'views'.DS.'layouts'.DS.$this->layout.DS.$this->layout.'.php';

			if(file_exists($layout_path))
			{		
				ob_start();
				require_once $views_path;
				$content = ob_get_clean();

				require_once $layout_path;
			}
			else
			{				
				$this->errorCode(404);
			}
		}
		else
		{			
			$this->errorCode(404);
		}
	}

	public static function redirect($url)
	{
		header('Location:'.$url);
		die();
	}

	public function message_json($status,$message)
	{
		die(json_encode(['status'=>$status,'message'=>$message]));
	}

	public static function errorCode($code)
	{
		http_response_code($code);
		$path_errors='application'.DS.'views'.DS.'errors'.DS.$code.'.php';
		if(file_exists($path_errors))
			require_once $path_errors;
		die;
	}
}
	
	