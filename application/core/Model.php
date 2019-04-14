<?php
	
namespace application\core;

use application\lib\Db_helper;

abstract class Model 
{
	protected $db;

	function __construct()
	{
		$this->db = new Db_helper();
	}

	public abstract function setUserOnline($id);

#user offline 
	public abstract function setUserOffline($id);

	public abstract function isOnline($id);

	public abstract function getTimeOnline($id);

	public abstract function logout();
	
}
?>
