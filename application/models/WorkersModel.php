<?php

namespace application\models;

use application\core\Model;

use application\core\View;

class WorkersModel extends Model 
{
	public $error;

	const VAL_ONLINE_PROFILE = 5*60;

	const COUNT_DEFAULT = 10;

	const VAL_ONLINE = 30*60;

	public function logout()
	{
		unset($_SESSION['user']);
		View::redirect('/');
	}

// Category
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
//Skill(subcategory)
	public function getSubCategoryList() 
	{
		$list = $this->db->row(
			"SELECT * 
			 FROM `skill`"
			);
	
		return $list;
	}

	public function getSubCategoryByWorkerList($login) 
	{
		$mas = array(
			'login' =>$login
		);

		$list = $this->db->row(
			"SELECT `skill`.`id`,`skill`.`name`
			 FROM ((`user`
			 INNER JOIN
			 `category_skill` 
			 ON `user`.`id`=`category_skill`.`id_worker`)
			 INNER JOIN
			 `skill`
			 ON
			 `skill`.`id`=`category_skill`.`id_skill`)
			 WHERE `user`.`login`=:login
			 AND `category_skill`.`exist`=1",$mas
			);
	
		return $list;
	}

	public function getSubCategoryByCategoryList($id_category) 
	{
		$mas = array(
			'id_category' => $id_category
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `skill`
			 WHERE `id_category`=:id_category",$mas
			);
		return $list;
	}
//User(workers)

	public function getWorkerByLoginList($login)
	{
		$mas = array(
			'login' => $login
		);

		$list = $this->db->row(
			"SELECT *
			 FROM `user`
			 WHERE `login`=:login
			 AND `type`=2",$mas
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

	public function getWorkersCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) AS `count`
			 FROM `user` 
			 WHERE `type`= 2"
			);

		return $cnt;
	}

	public function getUsersMessage()
	{
		$list = $this->db->row(
			"SELECT * 
			 FROM `user`"
			);

		return $list;
	}

	public function getWorkers($count = self::COUNT_DEFAULT)
	{
		$mas = array(
			'cnt' => $count
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `user` 
			 WHERE `type`= 2 
			 ORDER BY `rating` DESC
			 LIMIT :cnt", $mas
			);

		return $list;
	}

	public function getWorkersCategoryCount($id_category)
	{
		$mas = array(
			'id_category' =>$id_category
		);

		$cnt = $this->db->col(
			"SELECT count(`id`) 
			 FROM `user` 
			 WHERE `id_category`=:id_category
			 AND `type`=2",$mas
			);

		return $cnt;
	}

	public function getWorkersCategoryList($id_category,$page=1) 
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
			 AND `type`=2
			 ORDER BY `rating` DESC
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);
	
		return $list;
	}

	public function getWorkersSubCategoryCount($id_category,$id_subcategory)
	{
		$mas = array(
			'id_category' => $id_category,
			'id_subcategory' => $id_subcategory
		);

		$cnt = $this->db->col(
			"SELECT count(`user`.`id`)
			 FROM `user`,`category_skill` 
			 WHERE `category_skill`.`id_category` = :id_category
			 AND `category_skill`.`id_skill` = :id_subcategory
			 AND `category_skill`.`id_worker`=`user`.`id`
			 AND `exist`=1", $mas
			);
	
		return $cnt;
	}

	public function getWorkersSubCategoryList($id_category,$id_subcategory,$page) 
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		intval($offset);

		$mas = array(
			'id_category' => $id_category,
			'id_subcategory' => $id_subcategory,
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT `user`.`id_category`,`login`,
			 `online`, `free`, `rating`
			 FROM ((`user`
			 INNER JOIN `category`
			 ON
			 `user`.`id_category` = `category`.`id`)
			 INNER JOIN `category_skill`
			 ON `category_skill`.`id_skill`)
			 WHERE `category_skill`.`id_category` = :id_category
			 AND `category_skill`.`id_skill` = :id_subcategory
			 AND `category_skill`.`id_worker`=`user`.`id`
			 AND `exist`=1
			 AND `user`.`type`=2			 
			 GROUP BY `user`.`id`
			 ORDER BY `rating` DESC
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);
	
		return $list;
	}

	public function getWorkerByOrderId($id_order)
	{
		$mas = array(
			'id' => $id_order
		);

		$query = $this->db->col(
			"SELECT `user`.`id`
			 FROM `user`,`service_order`
			 WHERE `service_order`.`id`=:id
			 AND `user`.`id`=`service_order`.`id_worker`
			 LIMIT 1",$mas
		);

		return $query;
	}
#change rating worker

	public function addRate($id_order)
	{
		$mas = array(
			'id_worker' => $this->getWorkerByOrderId($id_order)	
		);

		$query = $this->db->query(
			"UPDATE `user`
			 SET `rating`= `rating`+1
			 WHERE `id`=:id_worker",$mas
		);

		return $query;
	}

	public function minusRate($id_order)
	{
		$mas = array(
			'id_worker' => $this->getWorkerByOrderId($id_order)			
		);

		$query = $this->db->query(
			"UPDATE `user`
			 SET `rating`= `rating`-1
			 WHERE `id`=:id_worker",$mas
		);

		return $query;
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

#user offline 
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
