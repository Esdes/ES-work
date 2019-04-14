<?php

namespace application\models;

use application\core\Model;

use application\core\View;

class NewsModel extends Model 
{
	public $error;

	const COUNT_DEFAULT = 5;

	const VAL_ONLINE=30*60;

	public function logout()
	{
		unset($_SESSION['user']);
		View::redirect('/');
	}
	
	public function getNewsCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) 
			 AS `count`
			 FROM `news` "
			);

		return $cnt;
	}

	public function getNewsList($page=1) 
	{
		$offset = ($page - 1) * self::COUNT_DEFAULT;
		intval($offset);

		$mas = array(
			'offset' => $offset
		);

		$newsList = $this->db->row(
			"SELECT *
			 FROM `news`
			 ORDER BY id
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset",$mas
			);

		return $newsList;

	}
	
	public function getNewsOneById($id) 
	{
		$mas = array(
			'id' => $id
		);

		$news = $this->db->row(
			"SELECT * 
			 FROM `news` 
			 WHERE `id`=:id", $mas
			);
		
		return $news;
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


}
