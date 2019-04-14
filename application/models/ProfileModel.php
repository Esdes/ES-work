<?php

namespace application\models;

use application\core\Model;

use application\core\View;

class ProfileModel extends Model 
{
	const VAL_ONLINE=30*60;

	const COUNT_DEFAULT = 15;

	public $attributes = array(
		'id_category' => '',
		'name' => NULL,
		'login' => '',
		'type' => '',
		'password' => '',
		'age' => NULL,
		'mobile' => NULL,
		'email' => '',
	);

	public $skill = array(
		'skill' => ''
	);

	public $order = array(
		'title' => '',
		'content' => ''
	);

	public $errors = array();

	private $user;

	private $param;


#load attributes for model from form
	public function load($data)
	{
		if($this->param == 'data'|| empty($this->param))
		{	foreach ($this->attributes as $key => $val) 
			{
				if(isset($data[$key]))
					$this->attributes[$key]=$data[$key];
			}
			return $this->attributes;
		}
		if($this->param == 'skill')
		{
			foreach ($this->skill as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->skill[$key] = $data[$key];
					}
			}
			return $this->skill;
		}
		if($this->param == 'order')
		{
			foreach ($this->order as $key => $val) 
			{
				if(isset($data[$key]))
					{
						$this->order[$key] = $data[$key];
					}
			}
			return $this->order;
		}
	}

	public function getAttr()
	{
		return $this->attributes;
	}

	public function setUser($id_user)
	{
		$this->user = $id_user;
	}

	public function getUser()
	{
		return $this->user;
	}

	public function setParam($param)
	{
		$this->param = $param;
	}
#work with SESSION
	public function auth($id_user)
	{
		$_SESSION['user'] = $id_user;
	}

	public static function isLogin()
	{		
		if(isset($_SESSION['user']))
		{
			return $_SESSION['user'];
		}
		else
		{
			View::redirect('/profile/login');
		}		
	}

	public static function isGuest()
	{
		if(isset($_SESSION['user']))
		{
			return 	false;
		}
		return true;
	}

	public function logout()
	{
		unset($_SESSION['user']);
		View::redirect('/');
	}

#category list

	public function getCategoryList()
	{
		$list = $this->db->row(
			"SELECT * 
			FROM `category`"
		);
	
		return $list;
	}

	public function getCategoryByUserId($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT `category`.`name` 
			FROM `category`,`user`
			WHERE `user`.`id`=:id
			AND `user`.`id_category`=`category`.`id`",$mas
		);
	
		return $list;
	}

	public function getUserById($id)
	{
		$mas = array(
			'id' => $id
		);

		$list = $this->db->row(
			"SELECT *
			FROM `user`
			WHERE `user`.`id`=:id",$mas
		);
	
		return $list;
	}

	public function getUserByLogin($loginList)
	{
		foreach ($loginList as $val) 
		{
			$login = $val['login'];

			$mas = array(
				'login' => $login
			);

			$list = $this->db->row(
				"SELECT `id`
			 	 FROM `user`
			 	 WHERE `login`=:login",$mas
			);
		}
		return $list;
	}

	

#User from order by id
	public function getEmployerOrderById($id_user)
	{
		if($id_user)
		{
			$mas = array(
				'id' => $id_user
			);

			$user = $this->db->row(
				"SELECT `user`.`id`,`user`.`login`
				 FROM `user`,`service_order`
				 WHERE `service_order`.`id_worker`=:id
				 AND `user`.`id`=`service_order`.`id_employer`",$mas
			);
			return $user;
		}
	}

	public function getWorkerOrderById($id_user)
	{
		if($id_user)
		{
			$mas = array(
				'id' => $id_user
			);

			$user = $this->db->row(
				"SELECT `user`.`id`,`user`.`login`
				 FROM `user`,`service_order`
				 WHERE `service_order`.`id_employer`=:id
				 AND `user`.`id`=`service_order`.`id_worker`",$mas
			);
			return $user;
		}
	}
#select skill
	public function getSubCategoryById()
	{
		$id_user = $this->user;

		$mas = array(
			'id_user' => $id_user
		);

		$list = $this->db->row(
			"SELECT `skill`.`id`,`skill`.`name` 
			 FROM `skill`,`user`
			 WHERE :id_user=`user`.`id`
			 AND `user`.`id_category`= `skill`.`id_category`",$mas
			);

		return $list;
	}

	public function getSubCategoryCountById()
	{
		$user = $this->user;

		$mas = array(
			'id_user' => $user
		);

		$cnt = $this->db->col(
			"SELECT count(`skill`.`id`) 
			 FROM `skill`,`user`
			 WHERE `user`.`id`=:id_user
             AND  `user`.`id_category`=`skill`.`id_category`",$mas
			);

		return $cnt;
	}
#select skill by id
	public function getSubCategoryByUserId() 
	{
		$id_user = $this->user;

		$mas = array(
			'id_user' =>$id_user
		);

		$list = $this->db->row(
			"SELECT `category_skill`.`exist`,
			`category_skill`.`id_skill` 
			 FROM `user`,`category_skill` 
			 WHERE `user`.`id`=`category_skill`.`id_worker`
			 AND `user`.`id`=:id_user
			 AND `category_skill`.`exist`=1",$mas
		);
	
		return $list;
	}

	public function getSubCategoryCountByUserId() 
	{
		$id_user = $this->user;

		$mas = array(
			'id_user' => $id_user
		);

		$list = $this->db->col(
			"SELECT count(`category_skill`.`id`)
			 FROM `user`,`category_skill` 
			 WHERE `user`.`id`=`category_skill`.`id_worker`
			 AND `user`.`id`=:id_user
			 AND `category_skill`.`exist`=1",$mas
		);
	
		return $list;
	}

	public function getLastUser()
	{
		$last_user = $this->db->col(
			"SELECT `user`.`id` 
			 FROM `user`
			 ORDER BY `id` 
			 DESC LIMIT 1"
		);

		return $last_user;
	}

	public function getUserByEmailMobile()
	{
		$mas = array(
			'email' => $this->attributes['email'],
			'mobile' => $this->attributes['mobile']
		);

		$query = $this->db->col(
			"SELECT `id`
			 FROM `user`
			 WHERE `mobile`=:mobile
			 AND `email`=:email",$mas
		);

		return $query;
	}

	public function setSkillDefault()
	{
		$last_user = $this->getLastUser();

		$mas = array(
				'id' => intval($last_user)
			);

		$query = $this->db->query(
			"INSERT INTO `category_skill` 
			 (`category_skill`.`id_worker`,
			 `category_skill`.`id_category`,
			 `category_skill`.`id_skill`)
			 SELECT `user`.`id`, `user`.`id_category`,
			 `skill`.`id`
			 FROM `user` 
			 INNER JOIN `skill` 
			 ON 
			 `skill`.`id_category` = `user`.`id_category`
			 WHERE `user`.`id`=:id",$mas
		);
		return true;
	}

	public function EditData()
	{
#data
		if($this->param == 'data')
		{
			$mas = array(
				'name' => $this->attributes['name'],
				'login' => $this->attributes['login'],
				'password' => $this->attributes['password'],
				'age' => $this->attributes['age'],
				'mobile' => $this->attributes['mobile'],
				'email' => $this->attributes['email'],
				'id' => $this->user
			);

			$query = $this->db->query(
				"UPDATE `user`
			 	 SET `name`=:name, `login`=:login,
			 	 `password`=:password, `age`=:age,
			 	 `mobile`=:mobile, `email`=:email
			 	  WHERE `id`=:id",$mas
			);
		}
#skill
		if($this->param =='skill')
		{
			$mas = array(
				'id' => $this->user,
				'num' => 0,
			);

			$query = $this->db->query(
				"UPDATE `category_skill`
			 	 SET `exist`= :num
			 	 WHERE `category_skill`.`id_worker`=:id",$mas
			);

			if(!empty($this->skill['skill']))
			{
				foreach ($this->skill as $key) 
				{
					foreach($key as $val)
					{
						$mas = array(
							'id' => $this->user,
							'num' => 1,
							'val' => $val
						);

						$query = $this->db->query(
							"UPDATE `category_skill`
			 	 	 		 SET `exist`= :num
			 		 		 WHERE `category_skill`.`id_worker`=:id
			 		 		 AND `category_skill`.`id_skill`=:val",$mas
						);
					}
				}
			}		
		}
#order
		if($this->param == 'order')
		{
			$mas = array(
				'title' => $this->order['title'],
				'id' => $this->user,
				'content' => $this->order['content'],
				'id_category' => $this->getCategoryId($this->user)
			);

			$query = $this->db->query(
				"INSERT INTO `service_order`
			 	 SET `title`=:title, `id_employer`=:id,
			 	 `content`=:content,`id_category`=:id_category",$mas
			);
		}
	}


#work with form registration

	public function registerUser()
	{
		$pass = password_hash($this->attributes['password'], PASSWORD_BCRYPT);

		$mas = array(
			'id_category' => intval($this->attributes['id_category']),
			'name' => $this->attributes['name'],
			'login' => $this->attributes['login'],
			'type' => intval($this->attributes['type']),
			'password' => $pass,
			'age' => $this->attributes['age'],
			'mobile' => $this->attributes['mobile'],
			'email' => $this->attributes['email']
		);

		$query = $this->db->query(
			"INSERT INTO `user`
			 (`id_category`,`name`,`login`,`password`,
			 `type`,`age`,`mobile`,`email`)
			 VALUES (:id_category, :name, :login, :password, :type,
			  :age, :mobile, :email)",$mas
		);

		$this->setSkillDefault();

		return $query;
	}

	public function checkFormRegister($data)
	{
		$this->load($data);

		if(!$this->checkCategory($this->attributes['id_category']))
		{
			$this->errors[] = 'Некоректная категория';
		}
		if(!$this->checkName($this->attributes['name']))
		{
			$this->errors[] = 'Некоректное имя(2<xx<30)';
		}
		if(!$this->checkLogin($this->attributes['login']))
		{
			$this->errors[] = 'Некоректный логин, доступные символы(a-zA-Z0-9-_\.)';
		}
		if(!$this->checkType($this->attributes['type']))
		{
			$this->errors[] = 'Некоректный тип профиля';
		}
		if(!$this->checkPassword($this->attributes['password']))
		{
			$this->errors[] = 'Некоректный пароль, должен быть длиннее 6 символов';
		}
		if(!$this->checkAge($this->attributes['age']))
		{
			$this->errors[] = 'Некоректный возраст(16<xx<99)';
		}
		if(!$this->checkMobile($this->attributes['mobile']))
		{
			$this->errors[] = 'Некоректный номер телефона, возможно вы ввели символ, введите номер вместе с кодом страны';
		}
		if(!$this->checkEmail($this->attributes['email']))
		{
			$this->errors[] = 'Некоректный почтовый адрес';
		}
		if($this->checkLoginExists($this->attributes['login']))
		{
			$this->errors[] ='Кто-то уже использует данный логин, придумайте другой';
		}
		if($this->checkMobileExists($this->attributes['mobile']))
		{
			$this->errors[] ='Кто-то уже использует данный телефон, укажите другой';
		}
		if($this->checkEmailExists($this->attributes['email']))
		{
			$this->errors[] ='Кто-то уже использует данный почтовый адрес, укажите другой';
		}

		return $this->errors;
	}

#work with form authorization

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
		if(!$this->checkUserExists($this->attributes['login'],$this->attributes['password']))
		{
			$this->errors[] = 'Такого пользователя не существует, проверьте данные и попробуйте ещё раз';
		}
		if(empty($this->errors))
		{
			$this->setUser($this->checkUserExists($this->attributes['login'],$this->attributes['password']));
		}

		return $this->errors;
	}

#work with form forgot_passwoed

	public function checkFormForgotPass($data)
	{
		$this->load($data);

		if(!$this->checkEmail($this->attributes['email']))
		{
			$this->errors[] = 'Некоректный почтовый адрес';
		}		
		if(!$this->checkEmailExists($this->attributes['email']))
		{
			$this->errors[] = 'Почтовый адрес не найдено';	
		}
		if(!$this->checkMobile($this->attributes['mobile']))
		{
			$this->errors[] = 'Некоректный номер телефона, возможно вы ввели символ, введите номер вместе с кодом страны';
		}
		if(!$this->checkMobileExists($this->attributes['mobile'],$this->attributes['email']))
		{
			$this->errors[] = 'Такого пользователя не существует, проверьте данные и попробуйте ещё раз';
		}

		return $this->errors;
	}

#gererate forgot password and update data user table
	/**
	 * [ForgotPassGenerate description]
	 * 
	 * return string
	 */
	public function ForgotPassGenerate()
	{
		$alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
   		
   		$pass=''; 

   		$i = 8;

    	$len = strlen($alphabet);

    	while($i > 0) 
    	{
        	$n = rand(0, $len-1);
        	$pass.= $alphabet[$n];
        	$i--;
    	}

    	$id_user = $this->getUserByEmailMobile();

    	$mas = array(
    		'id' => $id_user,
    		'pass' => password_hash($pass, PASSWORD_BCRYPT)
    	);

    	$query = $this->db->query(
    		"UPDATE `user`
    		SET `password`=:pass
    		WHERE `id`=:id",$mas
    	);
    
    	return $pass; 
	}
#work with settings form edit user data
	public function EditCheck($data)
	{
		$this->load($data);

		if($this->param == 'data')
		{
			unset($this->attributes['id_category']);

			unset($this->attributes['type']);

#check name 
		
			if(!$this->checkName($this->attributes['name']))
			{
				$this->errors[] = 'Некоректное имя';
			}

#check login (set self or check)

			if(!$this->checkLoginEditExists($this->attributes['login']))
			{
				if(!$this->checkLogin($this->attributes['login']))
				{
					$this->errors[] = 'Некоректный логин, доступные символы(a-zA-Z0-9-_\.)';
				}
				if($this->checkLoginExists($this->attributes['login']))
				{
					$this->errors[] ='Кто-то уже использует данный логин, придумайте другой';
				}
			}

#check password (set self or check)	
	
			if($this->attributes['password']=='')
			{
				$this->attributes['password']= $this->checkPasswordEditExists();
			}
			else
			{
				if(!$this->checkPassword($this->attributes['password']))
					{
						$this->errors[] = 'Некоректный пароль, должен быть длиннее 6 символов';
					}
				$this->attributes['password'] = password_hash($this->attributes['password'], PASSWORD_BCRYPT);
			}

#check age
		
			if(!$this->checkAge($this->attributes['age']))
			{
				$this->errors[] = 'Некоректный возраст(16<xx<99)';
			}
#check mobile (set self or check)
		
			if(!$this->checkMobileEditExists($this->attributes['mobile']))
			{
				if(!$this->checkMobile($this->attributes['mobile']))
				{
					$this->errors[] = 'Некоректный номер телефона, возможно вы ввели символ, введите номер вместе с кодом страны';
				}
				if($this->checkMobileExists($this->attributes['mobile']))
				{
					$this->errors[] ='Кто-то уже использует данный телефон, укажите другой';
				}
			}

#check email (set self or check)
		
			if(!$this->checkEmailEditExists($this->attributes['email']))
			{
				if(!$this->checkEmail($this->attributes['email']))
				{
					$this->errors[] = 'Некоректный почтовый адрес';
				}
				if($this->checkEmailExists($this->attributes['email']))
				{
					$this->errors[] ='Кто-то уже использует данный почтовый адрес, укажите другой';
				}
			}
		}
#skill
		if($this->param == 'skill')
		{
			if(empty($this->skill['skill']))
				return $this->errors;
			else
			{
				foreach ($this->skill as $key) 
				{
					foreach($key as $value)
					{
						if(!$this->checkSkill($value))
						{
							$this->error = 'Некоректные навики, попробуйте снова';
						}
					}
				}
			}
		}
#order
		if($this->param == 'order')
		{
			if(!empty($this->order['title']))
				return $this->errors;
			if(!empty($this->order['content']))
				return $this->errors;
		}
		return $this->errors;
	}

	public function checkName($name)
	{
		if (empty($name)) 
		{
			$this->attributes['name'] = NULL;
    		return true;
		}
		elseif((strlen($name)>30) || (strlen($name)<=2))
		{
    		return false;
		}
		else 
		{
   			return true;
		}
	}

	public function checkSkill($skill)
	{
		if(preg_match('#^[0-9]+$#', $skill)==0) 
		{
    		return false;
		}
		else
		{
			return true;
		}
	}

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

	public function checkType($type)
	{
		if(empty($type))
		{
			return false;
		}
		elseif(preg_match('#^[1-2]$#', $type)==0) 
		{
    		return false;
		}
		else
		{
			return true;
		}
	}

	public function checkCategory($category)
	{
		if(empty($category))
		{
			return false;
		}
		elseif(preg_match('#^[0-9]+$#', $category)==0) 
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

	public function checkAge($age)
	{
		if(empty($age))
		{
			$this->attributes['age'] = NULL;
			return true;
		}
		elseif(preg_match('#^[1-9][0-9]{1}$#', $age)==0)
		{
			return false;
		}
		elseif(intval($age)<=16)
		{
			return false;
		}
		else
		{
			$this->attributes['age'] = intval($this->attributes['age']);
			return true;
		}
	}

	public function checkMobile($mobile)
	{
		if(empty($mobile))
		{
			$this->attributes['mobile'] = NULL;
			return true;
		}
		elseif(preg_match('#^[0-9]{12,13}$#', $mobile)==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function checkEmail($email)
	{
		if(empty($email))
		{
			return false;
		}
		elseif(preg_match('#^[A-z0-9._%-]+@[A-z0-9._%-]+\.[A-z]{2,4}$#',$email)==0)
		{
			return false;
		}
		else
		{
			return true;
		}
	}

	public function checkLoginExists($login)
	{
		$mas = array(
			'login' => $login
		);

		$cnt = $this->db->col(
			"SELECT count(`id`)
			 FROM `user`
			 WHERE `login`=:login",$mas
		);

		return $cnt;
	}

	public function checkLoginEditExists($login)
	{
		$mas = array(
			'login' => $login,
			'id' => $this->user
		);

		$cnt = $this->db->col(
			"SELECT count(`id`)
			 FROM `user`
			 WHERE `login`=:login
			 AND `user`.`id`=:id",$mas
		);		

		return $cnt;
	}

	public function checkMobileExists($mobile,$email=NULL)
	{
		if($email==NULL)
		{
			$mas = array(
				'mobile' => $mobile
			);

			$cnt = $this->db->col(
				"SELECT count(`id`)
			 	 FROM `user` 
				 WHERE `mobile`=:mobile",$mas
			);
		}
		else
		{
			$mas = array(
				'mobile' => $mobile,
				'email' => $email
			);

			$cnt = $this->db->col(
				"SELECT count(`id`)
			 	 FROM `user` 
				 WHERE `mobile`=:mobile
				 AND `email`=:email",$mas
			);
		}
		

		return $cnt;
	}


	public function checkMobileEditExists($mobile)
	{
		$mas = array(
			'mobile' => $mobile,
			'id' => $this->user
		);

		$cnt = $this->db->col(
			"SELECT count(`id`)
			 FROM `user` 
			 WHERE `mobile`=:mobile
			 AND `user`.`id`=:id",$mas
		);
		return $cnt;
	}

	public function checkEmailExists($email)
	{	
		$mas = array(
			'email' => $email
		);

		$cnt = $this->db->col(
			"SELECT count(`id`)
			 FROM `user` 
			 WHERE `email`=:email",$mas
		);
		
		return $cnt;
	}

	public function checkEmailEditExists($email)
	{	
		$mas = array(
			'email' => $email,
			'id' => $this->user
		);

		$cnt = $this->db->col(
			"SELECT count(`id`)
			 FROM `user` 
			 WHERE `email`=:email
			 AND `user`.`id`=:id",$mas
		);

		return $cnt;
	}

	public function checkPasswordExists($login,$password)
	{
		$mas = array(
			'login' => $login
		);

		$pass = $this->db->col(
			"SELECT `password`
			 FROM `user`
			 WHERE `login`=:login",$mas
			);
		return password_verify($password,$pass);
	}

	public function checkPasswordEditExists()
	{
		$mas = array(
			'id' => $this->user
		);

		$pass = $this->db->col(
			"SELECT `password`
			 FROM `user`
			 WHERE `id`=:id",$mas
			);
		return $pass;
	}

	public function checkUserExists($login,$password)
	{
		if($this->checkPasswordExists($login,$password))
		{
			$mas = array(
				'login' => $login
			);

			$user = $this->db->col(
				"SELECT `id`
			 	 FROM `user`
			 	 WHERE `login`=:login",$mas
			);

			return $user;
		}

		return false;
	}

	public function getOrdersWorker($page)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'id' => $this->user,
			'offset' => $offset
		);

		$query = $this->db->row(
			"SELECT *
			 FROM `service_order`
			 WHERE `service_order`.`id_worker`=:id
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset",$mas
		);
		return $query;
	}

	public function getOrdersWorkerCount()
	{
		$mas = array(
			'id' => $this->user
		);

		$query = $this->db->col(
			"SELECT count(`id`)
			 FROM `service_order`
			 WHERE `service_order`.`id_worker`=:id",$mas
		);
		return $query;
	}

	public function getOrdersEmployer($page)
	{
		$offset = ($page-1)*self::COUNT_DEFAULT;

		$mas = array(
			'id' => $this->user,
			'offset' => $offset
		);

		$query = $this->db->row(
			"SELECT *
			 FROM `service_order`
			 WHERE `service_order`.`id_employer`=:id
			 LIMIT ".self::COUNT_DEFAULT."
			 OFFSET :offset",$mas
		);
		return $query;
	}

	public function getOrdersEmployerCount()
	{
		$mas = array(
			'id' => $this->user
		);

		$query = $this->db->col(
			"SELECT count(`id`)
			 FROM `service_order`
			 WHERE `service_order`.`id_employer`=:id",$mas
		);
		return $query;
	}

#get worker

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

#deny order worker
	public function denyOrder($id)
	{
		$masId = array(
			'id' => $_SESSION['user']
		);

		$upd = $this->db->query(
			"UPDATE `user`
			 SET `free`= `free`-1
			 WHERE `id`=:id",$masId
		);		

		$mas = array(
			'id' => $id
		);

		$query = $this->db->query(
			"UPDATE `service_order`
			 SET `id_worker`= NULL ,`rate_exist` = 0
			 WHERE `id`=:id",$mas
		);

		return $query;
	}

#deny order employer
	public function denyOrderEmployer($id_order)
	{
		$masId = array(
			'id' => $id_order
		);

		$workerId = $this->db->col(
			"SELECT `service_order`.`id_worker`
			 FROM `service_order`
			 WHERE `service_order`.`id`=:id",$masId
		);

		$masId = array(
			'id' => $workerId
		);

		$upd = $this->db->query(
			"UPDATE `user`
			 SET `free`= `free`-1
			 WHERE `id`=:id",$masId
		);		

		$mas = array(
			'id' => $id_order
		);

		$query = $this->db->query(
			"UPDATE `service_order`
			 SET `id_worker`= NULL ,`rate_exist` = 0
			 WHERE `id`=:id",$mas
		);

		return $query;
	}

#confirm order
	public function confirmOrder($id_order)
	{
		$mas = array(
			'id' => $id_order
		);

		$query = $this->db->query(
			"UPDATE `service_order`
			 SET `confirmed`= 1
			 WHERE `id`=:id",$mas
		);
	
		$masId = array(
			'id' => $this->getWorkerByOrderId($id_order)
		);

		$upd = $this->db->query(
			"UPDATE `user`
			 SET `free`= `free`-1
			 WHERE `id`=:id",$masId
		);

		return $query;
	}

	public function countOrdersWorkerById($id_worker,$id_employer)
	{
		$mas = array(
			'id' => $id_worker,
			'id_emp' => $id_employer
		);

		$cnt = $this->db->col(
			"SELECT count(`service_order`.`id`)
			 FROM `service_order` 
			 WHERE `id_worker`=:id
			 AND `id_employer`=:id_emp",$mas
		);
		echo "<br/>".$cnt."<br/>";
		die();
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

	public function getCategoryId($id)
	{
		$mas = array(
			'id' => $id
		);

		$query = $this->db->col(
			"SELECT `id_category`
			FROM `user`
			WHERE `user`.`id`=:id",$mas
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
