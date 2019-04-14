<?php

namespace application\models;

use application\core\Model;

use application\core\View;

use application\models\ProfileModel;

use application\lib\Pagination;

class AdminModel extends Model 
{
	public $errors;

	private $param;

	private $admin;

	public $attributes = array(
		'login' => '',
		'password' => '',
		'email' => ''
	);

	public $news = array(
		'title' => '',
		'content' => ''
	);

	public $subcategory = array(
		'id_category' => '',
		'name' => ''
	);

	public $category = array(
		'name' => '',
		'image' => ''
	);

	public $user = array(
		'name' => '',
		'login' => '',
		'email' =>''
	);

	public $order = array(
		'title' => '',
		'confirmed' => ''
	);

	const COUNT_DEFAULT = 30;

	public function auth($id)
	{
		$_SESSION['admin'] = $id;
	}

	public function logout()
	{
		unset($_SESSION['admin']);

		View::redirect('/admin/login?$2y$10$SuOyyp4VOFqVs05J/Do6BeWLxMElUT7zHo9nA.Jb6j/SuWQ2fmGb2');
	}

	public static function isSetAdmin()
	{
		if(isset($_SESSION['admin']))
		{
			return true;	
		}
		return false;
	}

	public static function isAdmin()
	{
		if(isset($_SESSION['admin']))
		{
			return $_SESSION['admin'];			
		}
		else
		{
			View::errorCode(404);
		}
	}

	public function setParam($param)
	{
		$this->param = $param;
	}

	public function load($data)
	{
		if($this->param == 'login' || $this->param == 'settings')
		{
			foreach ($this->attributes as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->attributes[$key] = $data[$key];
					}
			}
			return $this->attributes;
		}

		if($this->param == 'news')
		{
			foreach ($this->news as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->news[$key] = $data[$key];
					}
			}
			return $this->news;
		}

		if($this->param == 'subcategory')
		{
			foreach ($this->subcategory as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->subcategory[$key] = $data[$key];
					}
			}
			return $this->subcategory;
		}

		if($this->param == 'category')
		{	foreach ($this->category as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->category[$key] = $data[$key];
					}
			}
			return $this->category;
		}

		if($this->param == 'user')
		{	foreach ($this->user as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->user[$key] = $data[$key];
					}
			}
			return $this->user;
		}

		if($this->param == 'order')
		{	foreach ($this->order as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->order[$key] = $data[$key];
					}
			}
			return $this->order;
		}
	}

	public function setAdmin($id)
	{
		$this->admin = $id;
	}

	public function getAdmin()
	{
		return $this->admin;
	}

	public function getAttr()
	{
		return $this->attributes;
	}

#validate form login
	
	public function checkForm($data)
	{
		$this->load($data);

		if(!$this->checkLogin($this->attributes['login']))
		{
			$this->errors[] = 'Некоректный логин, доступные символы(a-zA-Z0-9-_\.)';
		}
		if(!$this->checkPassword($this->attributes['password']))
		{
			$this->errors[] = 'Некоректный пароль, должен быть длиннее 6 символов';
		}	
		if(!$this->checkAdminExists($this->attributes['login'],$this->attributes['password']))
		{
			$this->errors[] = 'Такого пользователя не существует, проверьте данные и попробуйте ещё раз';
		}
		if(empty($this->errors))
		{
			$this->setAdmin($this->checkAdminExists($this->attributes['login'],$this->attributes['password']));
		}

		return $this->errors;
	}

#validate data

	public function checkLogin($login)
	{
		if(empty($login))
		{
			return false;
		}
		elseif(preg_match('#^[a-zA-Z0-9][a-zA-Z0-9-_\.]{1,30}$#', $login)==0) 
		{
    		return false;
		}
		else
		{
			return true;
		}
	}

	public function checkPassword($password)
	{
		if(empty($password))
		{
			return false;
		}
		elseif(preg_match("#^(?=[a-z]*)(?=[A-Z]*)(?=[0-9]*)(?=.*[\w]).{6,50}$#",$password)==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function checkPasswordExists($login,$password)
	{
		$mas = array(
			'login' => $login
		);

		$pass = $this->db->col(
			"SELECT `password`
			 FROM `admin`
			 WHERE `login`=:login",$mas
			);
		return password_verify($password,$pass);
	}

	public function checkAdminExists($login,$password)
	{
		if($this->checkPasswordExists($login,$password))
		{
			$mas = array(
				'login' => $login
			);

			$admin = $this->db->col(
				"SELECT `id`
			 	 FROM `admin`
			 	 WHERE `login`=:login",$mas
			);

			return $admin;
		}

		return false;
	}


#update table 
	public function EditData($data,$id=NULL)
	{
		$this->load($data);

#param settings
		if($this->param == 'settings')
		{
			if(empty($this->attributes['password']))
			{
				$mas = array(
					'login' => $this->attributes['login'],
					'email' => $this->attributes['email'],
				);

				$query = $this->db->query(
					"UPDATE `admin`
			 	 	 SET `login`=:login,
					`email`=:email",$mas
				);
				return true;
			}
			else
			{
				$mas = array(
					'login' => $this->attributes['login'],
					'password' => password_hash($this->attributes['password'], PASSWORD_BCRYPT),
					'email' => $this->attributes['email'],
				);

				$query = $this->db->query(
					"UPDATE `admin`
			 	 	 SET `login`=:login,
			 	 	 `password`=:password, `email`=:email",$mas
				);
				return true;
			}
		}

#param category		
		if($this->param == 'category')
		{
			$mas = array(
				'name' => $this->category['name'],
				'image' => DS.'public'.DS.'images'.DS.'category'.DS.$this->category['image'],
				'id' => $id
			);

			$query = $this->db->query(
				"UPDATE `category`
			 	 SET `name`=:name,
			 	 `image`=:image
			 	 WHERE `id`=:id",$mas
			);
			return true;
		}

#param subcategory
		if($this->param == 'subcategory')
		{
			$mas = array(
				'name' => $this->subcategory['name'],
				'id_category' => $this->subcategory['id_category'],
				'id' => $id
			);

			$query = $this->db->query(
				"UPDATE `skill`
			 	 SET `name`=:name,
			 	 `id_category`=:id_category
			 	 WHERE `id`=:id",$mas
			);
			return true;
		}

#param user		
		if($this->param == 'user')
		{
			$mas = array(
				'name' => $this->user['name'],
				'login' => $this->user['login'],
				'email' =>  $this->user['email'],
				'id' => $id
			);

			$query = $this->db->query(
				"UPDATE `user`
			 	 SET `name`=:name,
			 	 `login`=:login,
			 	 `email`=:email
			 	 WHERE `id`=:id",$mas
			);
			return true;
		}

#param order
		if($this->param == 'order')
		{
			$mas = array(
				'title' => $this->order['title'],
				'confirmed' => $this->order['confirmed'],
				'id' => $id
			);

			$query = $this->db->query(
				"UPDATE `service_order`
			 	 SET `title`=:title,
			 	 `confirmed`=:confirmed
			 	 WHERE `id`=:id",$mas
			);
			return true;
		}

#param news
		if($this->param == 'news')
		{
			$mas = array(
				'title' => $this->news['title'],
				'content' => $this->news['content'],
				'id' => $id
			);

			$query = $this->db->query(
				"UPDATE `news`
			 	 SET `title`=:title,
			 	 `content`=:content
			 	 WHERE `id`=:id",$mas
			);
			return true;
		}
		return false;
	}


#work with table admin

	public function getAdminList()
	{
		$query = $this->db->row(
			"SELECT * 
			 FROM  `admin`"
		);
		return $query;
	}

#work with table category

	public function getCategoryList()
	{
		$list = $this->db->row(
			"SELECT * 
			FROM `category`"
		);
	
		return $list;
	}

	public function getCategoryById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT * 
			FROM `category`
			WHERE `id`=:id",$mas
		);
	
		return $list;
	}

	public function AddCategory($data)
	{
		$this->load($data);

		$mas = array(
			'name' => $this->category['name'],
			'image' => DS.'public'.DS.'images'.DS.'category'.DS.$this->category['image']
		);

		$query = $this->db->query(
			"INSERT INTO `category`
			 (`name`,`image`)
			 VALUES (:name, :image)", $mas
		);

		return $query;
	}

	public function deleteCategoryById($id_category)
	{
		$mas = array(
			'id' => $id_category
		);

		$query = $this->db->query(
			"DELETE 
			 FROM `category` 
			 WHERE `id`=:id", $mas
			);

		return $query;
	}

#work with table skill

	public function getSubCategoryCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) 
			FROM `skill`"
		);
	
		return $cnt;
	}

	public function getSubcategoryById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT * 
			FROM `skill`
			WHERE `id`=:id",$mas
		);
	
		return $list;
	}

	public function getSubCategoryList($page = 1,$count = self::COUNT_DEFAULT) 
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `skill`
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);
	
		return $list;
	}

	public function deleteSubcategoryById($id_subcategory)
	{
		$mas = array(
			'id' => $id_subcategory
		);

		$query = $this->db->query(
			"DELETE 
			 FROM `skill` 
			 WHERE `id`=:id", $mas
			);

		return $query;
	}
#add subcategory and add new subcategory to all workers
	public function AddSubcategory($data)
	{
		$this->load($data);

		$mas = array(
			'id_category' => $this->subcategory['id_category'],
			'name' => $this->subcategory['name']
		);

		$query = $this->db->query(
			"INSERT INTO `skill`
			 (`id_category`,`name`)
			 VALUES (:id_category, :name)", $mas
		);

		return $query;
	}

#work with table user(worker)

	public function getWorkersCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) 
			FROM `user`
			WHERE `type`=2"
		);
	
		return $cnt;
	}

	public function getWorkerById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT * 
			FROM `user`
			WHERE `id`=:id",$mas
		);
	
		return $list;
	}

	public function getWorkersList($page = 1,$count = self::COUNT_DEFAULT)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `user` 
			 WHERE `type`= 2 
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);

		return $list;
	}

	public function deleteWorkerById($id_worker)
	{
		$mas = array(
			'id' => $id_worker
		);

		$query = $this->db->query(
			"DELETE 
			 FROM `user` 
			 WHERE `id`=:id", $mas
			);

		return $query;
	}

#work with table user(employer)

	public function getEmployersCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) 
			FROM `user`
			WHERE `type`=1"
		);
	
		return $cnt;
	}

	public function getEmployerById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT * 
			FROM `user`
			WHERE `id`=:id",$mas
		);
	
		return $list;
	}

	public function getEmployersList($page = 1,$count = self::COUNT_DEFAULT)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `user` 
			 WHERE `type`= 1 
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);

		return $list;
	}

	public function deleteEmployerById($id_employer)
	{
		$mas = array(
			'id' => $id_employer
		);

		$query = $this->db->query(
			"DELETE 
			 FROM `user` 
			 WHERE `id`=:id", $mas
			);

		return $query;
	}

#work with table service_order

	public function getOrdersCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) 
			FROM `service_order`"
		);
	
		return $cnt;
	}

	public function getOrdersList($page = 1,$count = self::COUNT_DEFAULT)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `service_order` 
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
			WHERE `id`=:id",$mas
		);
	
		return $list;
	}

	public function deleteOrderById($id_order)
	{
		$mas = array(
			'id' => $id_order
		);

		$query = $this->db->query(
			"DELETE 
			 FROM `service_order` 
			 WHERE `id`=:id", $mas
			);

		if($this->countOrdersWorkerById($this->getWorkerByOrderId($id_order)) <= 1)
		{
			$masId = array(
				'num' => 1
			);

			$upd = $this->db->query(
				"UPDATE `user`
			 	 SET `free`= :num
			 	 WHERE `id`=:id",$masId
			);
		}

		return $query;
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
			 AND `user`.`id`=`service_order`.`id_worker`",$mas
		);

		return $query;
	}

	public function countOrdersWorkerById($id_worker)
	{
		$mas = array(
			'id' => $id_worker
		);

		$cnt = $this->db->col(
			"SELECT count(`service_order`.`id`)
			 FROM `service_order` 
			 WHERE `id_worker`=:id",$mas
		);
	}

#work with table news

	public function getNewsCount()
	{
		$cnt = $this->db->col(
			"SELECT count(`id`) 
			FROM `news`"
		);
	
		return $cnt;
	}

	public function getNewsById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT * 
			FROM `news`
			WHERE `id`=:id",$mas
		);
	
		return $list;
	}

	public function getNewsList($page = 1,$count = self::COUNT_DEFAULT)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'offset' => $offset
		);

		$list = $this->db->row(
			"SELECT * 
			 FROM `news` 
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset", $mas
			);

		return $list;
	}

	public function AddNews($data)
	{
		$this->load($data);

		$mas = array(
			'title' => $this->news['title'],
			'content' => $this->news['content']
		);

		$query = $this->db->query(
			"INSERT INTO `news`
			 (`title`,`content`)
			 VALUES (:title, :content)", $mas
		);

		return $query;
	}

	public function deleteNewsById($id_news)
	{
		$mas = array(
			'id' => $id_news
		);

		$query = $this->db->query(
			"DELETE 
			 FROM `news` 
			 WHERE `id`=:id", $mas
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

}
