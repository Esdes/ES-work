<?php

namespace application\lib;

use PDO;

class Db_helper
{
	private $conn;

	public function __construct()
	{
		$this->connect();
	}

	private function connect()
	{
		$config = require_once 'application'.DS.'config'.DS.'db.php';

		$hdc='mysql:host='.$config['host'].';dbname='.$config['dbname'].';charset='.$config['charset'];

		$this->conn = new PDO(	$hdc, 
								$config['user'],
								$config['pass']
							 );

		if($this->conn)
			return $this;
		else
		{
			echo 'Database access error </br>';
			die();
		}
	}

	public function query($sql,$params = array())
	{
		$statement = $this->conn->prepare($sql);

		if(!empty($params))
		{
			foreach ($params as $key => $val) 
			{
				if(is_int($val))
					$type = PDO::PARAM_INT;
				elseif(is_null($val))
					$type = PDO::PARAM_NULL;
				else
					$type = PDO::PARAM_STR;
				
					$statement->bindValue(':'.$key,$val,$type);
			}
		}
		
		$statement->execute();

		return $statement;
	}

	public function row($sql,$params = array())
	{
		$statement = $this->query($sql,$params);

		if($statement === false)
			return [];

		return $statement->fetchALL();
	}

	public function col($sql,$params = array())
	{
		$statement = $this->query($sql,$params);

		if($statement === false)
			return [];
		
		return $statement->fetchColumn();
	}
}
