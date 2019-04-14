<?php

spl_autoload_register(function($class)
	{
		$path = str_replace('\\', DS, $class.'.php');

		$path= ROOT.DS.$path;

		if(file_exists($path))
		{
			require_once $path;
		}
	});
