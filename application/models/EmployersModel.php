<?php

namespace application\models;

use application\core\Model;

use application\core\View;

class EmployersModel extends Model 
{
	public $error;

	const VAL_ONLINE_PROFILE = 5*60;

	const COUNT_DEFAULT = 10;

	const VAL_ONLINE=30*60;


	public function logout()
	{
		unset($_SESSION['user']);
		View::redirect('/');
	}

#Orders

	public function getOrdersList($page=1)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `service_order`
			 WHERE `confirmed`=0
			 AND `id_worker` IS NULL
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);
	
		return $list;
	}

	public function getOrderById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `service_order` 
			 WHERE `id`=:id", $mas
			);
	
		return $list;
	}

	public function getOrdersCategoryList($id_category,$page=1)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'id_category' => $id_category,
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `service_order` 
			 WHERE `id_category`=:id_category
			 AND `confirmed`=0
			 AND `id_worker` IS NULL
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);
	
		return $list;
	}

	public function getOrdersCategoryCount($id_category)
	{
		$mas = array(
			'id_category' =>$id_category
		);

		$cnt = $this->db->col(
			"SELECT count(`id`) 
			 FROM `service_order` 
			 WHERE `id_category`=:id_category",$mas
			);

		return $cnt;
	}

	public function gelOrdersEmployer($id)
	{
		$mas = array(
			'id' =>$id
		);

		$cnt = $this->db->row(
			"SELECT * 
			 FROM `service_order` 
			 WHERE `id_employer`=:id",$mas
			);

		return $cnt;
	}

	public function getEmployerByOrderId($id_order)
	{
		$mas = array(
			'id' => $id_order
		);

		$query = $this->db->col(
			"SELECT `user`.`id`
			 FROM `user`,`service_order`
			 WHERE `service_order`.`id`=:id
			 AND `user`.`id`=`service_order`.`id_employer`
			 LIMIT 1",$mas
		);

		return $query;
	}
#change rating employer

	public function addRate($id_order)
	{
		$mas = array(
			'id_employer' => $this->getEmployerByOrderId($id_order)			
		);

		$query = $this->db->query(
			"UPDATE `user`
			 SET `rating`= `rating`+1
			 WHERE `id`=:id_employer",$mas
		);

		$mas = array(
			'id' => $id_order
		);

		$upd = $this->db->query(
			"UPDATE `service_order`
			 SET `rate_exist`= 1
			 WHERE `id`=:id",$mas
		);

		return $query;
	}

	public function minusRate($id_order)
	{
		$mas = array(
			'id_employer' => $this->getEmployerByOrderId($id_order)			
		);

		$query = $this->db->query(
			"UPDATE `user`
			 SET `rating`= `rating`-1
			 WHERE `id`=:id_employer",$mas
		);

		$mas = array(
			'id' => $id_order
		);

		$upd = $this->db->query(
			"UPDATE `service_order`
			 SET `rate_exist`= 1
			 WHERE `id`=:id",$mas
		);

		return $query;
	}

	public function isWorker_order($id,$id_order)
	{
		$mas = array(
			'id' => $id,
			'id_order' => $id_order
		);

		$cnt = $this->db->col(
			"SELECT count(`user`.`id`)
			 FROM (`user`
			 INNER JOIN
			 `service_order` 
			 ON `user`.`id`=`service_order`.`id_worker`)
			 WHERE `service_order`.`id`=:id_order
			 AND `user`.`id`=:id",$mas
			);

		return $cnt;
	}

	public function addOrderWorkerById($id_order)
	{
		$mas = array(
			'id_order' => $id_order,
			'id_worker' => $_SESSION['user']
		);

		$query = $this->db->query(
			"UPDATE `service_order`
			 SET `id_worker`= :id_worker
			 WHERE `id`=:id_order",$mas
		);

		$masId = array(
			'id' => $_SESSION['user']
		);

		$upd = $this->db->query(
			"UPDATE `user`
			 SET `free`= `free`+1
			 WHERE `id`=:id",$masId
		);

		return $query;
	}

	public function isFreeOrder($id)
	{
		$mas = array(
			'id' => $id
		);

		$query = $this->db->col(
			"SELECT count(`id`)
			 FROM `service_order`
			 WHERE `id`=:id
			 AND `id_worker` IS NULL",$mas
		);

		return $query;
	}

# Category
	public function getCategoryList() 
	{
		$list = $this->db->row(
			"SELECT * 
			FROM `category`"
		);
	
		return $list;
	}

	public function getCategoryById($id_category)
	{
		$mas = array(
			'id_category' => $id_category
		);

		$category = $this->db->row(
			"SELECT * 
			 FROM `category` 
			 WHERE `id`=:id_category",$mas
			);

		return $category;
	}

#Employers

	public function  getEmployersCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) 
			 FROM `user` 
			 WHERE `type`=1"
			);

		return $cnt;
	}

	public function isEmployer($id)
	{
		$mas = array(
			'id' => $id
		);

		$cnt = $this->db->col(
			"SELECT count(`id`) 
			 FROM `user`
			 WHERE `id`=:id
			 AND `type`=1",$mas
		);
	
		return $cnt;
	}

	public function getEmployersList($page=1)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `user`
			 WHERE `type` = 1
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);
	
		return $list;
	}

	public function getEmployer_orderById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT `login`,`type`
			 FROM (`user`
			 INNER JOIN
			 `service_order` 
			 ON `user`.`id`=`service_order`.`id_employer`)
			 WHERE `service_order`.`id`=:id", $mas
			);
	
		return $list;
	}

	public function getEmployersCategoryCount($id_category)
	{
		$mas = array(
			'id_category' =>$id_category
		);

		$cnt = $this->db->col(
			"SELECT count(`id`) 
			 FROM `user` 
			 WHERE `id_category`=:id_category
			 AND `type`=1",$mas
			);

		return $cnt;
	}

	public function getUsersMessage($login)
	{
		$mas = array(
			'login' => $login
		);

		$list = $this->db->row(
			"SELECT `content`, `data`,
			 `id_user`, `id_comentator`
			 FROM `coment`, `user`
			 WHERE `user`.`login`=:login
			 AND `user`.`id`=`coment`.`id_user`",$mas
			);

		return $list;
	}

	public function getEmployerByLoginList($login)
	{
		$mas = array(
			'login' => $login
		);

		$list = $this->db->row(
			"SELECT *
			 FROM `user`
			 WHERE `login`=:login",$mas
			);

		return $list;
	}

	public function getEmployersCategoryList($id_category,$page=1)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'id_category' => $id_category,
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `user` 
			 WHERE `id_category`=:id_category
			 AND `type`=1
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);
	
		return $list;
	}

	public function getUserByLogin($login)
	{
		$mas = array(
			'login' => $login
		);

		$list = $this->db->col(
			"SELECT `id`
			 FROM `user`
			 WHERE `login`=:login",$mas
			);

		return $list;
	}
#online/offline


	public function setUserOnline($id)
	{
		$mas = array(
			'id' => $id,
			't' => date('Y-m-d H:i:s',time())
		);

		$query = $this->db->query(
			"UPDATE `user`
			 SET `online`= :t
			 WHERE `id`=:id",$mas
		);

		return $query;
	}

	public function setUserOffline($id)
	{
		$mas = array(
			'id' => $id,
			'data' => date('Y-m-d H:i:s',time())
		);

		$query = $this->db->query(
			"UPDATE `user`
			 SET `online`= :data
			 WHERE `id`=:id",$mas
		);

		$this->logout();

		return $query;
	}

	public function isOnline($id)
	{
		if(time()-strtotime($this->getTimeOnline($id))<self::VAL_ONLINE)
			return true;
		return false;
	}

	public function getTimeOnline($id)
	{
		$mas = array(
			'id' => $id
		);

		$query = $this->db->col(
			"SELECT `online`
			FROM `user`
			WHERE `id`=:id",$mas
		);
		return $query;
	}

	public function Online($id)
	{
		if(time()-strtotime($this->getTimeOnline($id))<self::VAL_ONLINE_PROFILE)
			return true;
		return false;
	}

}

?>
