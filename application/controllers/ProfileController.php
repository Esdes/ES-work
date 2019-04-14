<?php 
	
namespace application\controllers;

use application\core\Controller;

use application\core\View;

use application\models\ProfileModel;

use application\lib\Pagination;

class ProfileController extends Controller
{
	public function actionIndex()
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$this->model->setUser($id_user);

		$profile = $this->model->getUserById($id_user);

		$mas = array(
			'profile' => $profile
		);

		$this->view->generate('ES-work profile',$mas);
	}	

	public function actionSettings_data()
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$this->model->setUser($id_user);

		$profile = $this->model->getUserById($id_user);

		$mas = array(			
			'profile' => $profile
		);

		$this->view->generate('ES-work profile settings_data',$mas);
	}

	public function actionSettings_skill()
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$this->model->setUser($id_user);

		$subcategoriesByUserId = $this->model->getSubCategoryByUserId();

		$subcategories = $this->model->getSubCategoryById();

		$mas = array(			
			'subcategoriesByUserId' => $subcategoriesByUserId,
			'subcategories' => $subcategories
		);

		$this->view->generate('ES-work profile settings_skill',$mas);
	}

	public function actionSettings_work($page)
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$this->model->setUser($id_user);

		$listOrderWorker = $this->model->getOrdersWorker($page);

		$listOrderEmployer = $this->model->getOrdersEmployer($page);

		$isEmployer = $this->model->isEmployer($id_user);

		//login employer for order
		$employerLogin = $this->model->getEmployerOrderById($id_user);
		//login worker for order
		$workerLogin = $this->model->getWorkerOrderById($id_user);
		if($isEmployer == 0)
		{
			$totalWorker = $this->model->getOrdersWorkerCount();

			$paginationWorker = new Pagination($totalWorker,$page,ProfileModel::COUNT_DEFAULT,'page=');

			$mas = array(
				'listOrderWorker' => $listOrderWorker,
				'listOrderEmployer' => $listOrderEmployer,
				'isEmployer' => $isEmployer,
				'employerLogin' => $employerLogin,
				'workerLogin' => $workerLogin,
				'pagination' => $paginationWorker
			);

			$this->view->generate('ES-work profile settings_work',$mas);
		}
		else
		{
			$totalEmployer = $this->model->getOrdersEmployerCount();

			$paginationEmployer = new Pagination($totalEmployer,$page,ProfileModel::COUNT_DEFAULT,'page=');

			$mas = array(
				'listOrderWorker' => $listOrderWorker,
				'listOrderEmployer' => $listOrderEmployer,
				'isEmployer' => $isEmployer,
				'employerLogin' => $employerLogin,
				'workerLogin' => $workerLogin,
				'pagination' => $paginationEmployer
			);

			$this->view->generate('ES-work profile settings_work',$mas);
		}
		
		
	}

	public function actionCreate_order()
	{
		$id_user = ProfileModel::isLogin();

		$isEmployer = $this->model->isEmployer($id_user);

		if($isEmployer == 0)
			View::errorCode(404);

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$nameCategory = $this->model->getCategoryByUserId($id_user);

		$mas = array(
			'nameCategory'=>$nameCategory
		);

		$this->view->generate('ES-work profile settings_order',$mas);
	}

	public function actionDeny_order()
	{
		$id_user = ProfileModel::isLogin();

		if(isset($_POST['deny']))
		{
			$deny = filter_var($_POST["deny"],FILTER_SANITIZE_NUMBER_INT);

			$denyOrder = $this->model->denyOrder($deny);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
	}

	public function actionDeny_order_employer()
	{
		$id_user = ProfileModel::isLogin();

		if(isset($_POST['deny']))
		{
			$deny = filter_var($_POST["deny"],FILTER_SANITIZE_NUMBER_INT);

			$denyOrder = $this->model->denyOrderEmployer($deny);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
	}

	public function actionConfirm_order()
	{
		$id_user = ProfileModel::isLogin();

		if(isset($_POST['confirm']))
		{
			$confirm = filter_var($_POST["confirm"],FILTER_SANITIZE_NUMBER_INT);

			$confirm = $this->model->confirmOrder($confirm);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
	}

	public function actionEdit($param)
	{
		$id_user = ProfileModel::isLogin();
	
		$this->model->setUser($id_user);
		
		$mas = array();

		if(isset($_POST['submit']))
		{
			$data = $_POST;

#chech for errors
			$this->model->setParam($param);

			$res = $this->model->EditCheck($data);

			if (!empty($res)) 
			{
				$user = $this->model->getUserById($id_user);
#send errors message
				$mas = array(
					'errors' => $res,
					'user' => $user
				);

				$this->view->generate('ES-work edit errors',$mas);
			}
			if(empty($res))
			{

#if errors empty update user data 
				$this->model->EditData();

				View::redirect('/profile');
			}
		}

		$this->view->generate('ES-work edit',$mas);
	}

	public function actionRegistration()
	{
		$mas = array(
			'categories' => $this->model->getCategoryList()
		);

		if(isset($_POST['submit']))
		{
			$data = $_POST;
#chech for errors
			$res = $this->model->checkFormRegister($data);

			if (!empty($res)) 
			{
#send errors message
				$mas = array(
					'categories' =>$this->model->getCategoryList(),
					'errors' => $res,
					'attributes' => $this->model->getAttr()
				);
				$this->view->generate('ES-work registration errors',$mas);
			}
			if(empty($res))
			{
#if errors empty registrate new user
				$reg = $this->model->registerUser();
				
				if($reg)
					{
						View::redirect('/profile/login');
					}
				else
					die('Problem with data');
			}
		}
			$this->view->generate('ES-work registration',$mas);
	}

	public function actionLogin()
	{
		if(ProfileModel::isGuest())
		{
			$mas = array();

			if(isset($_POST['submit']))
			{
				$data = $_POST;

				$res = $this->model->checkForm($data);

				if (!empty($res)) 
				{
					$mas = array(
						'errors' => $res,
						'attributes' => $this->model->getAttr()
					);
				}
				if(empty($res))
				{
					$user = $this->model->getUser();

					$this->model->auth($user);

					$this->model->setUserOnline($user);
					
					View::redirect('/profile');
				}
			}
			$this->view->generate('ES-work login',$mas);
		}
		else
		{
			View::redirect('/profile');
		}
	}

	public function actionLogout()
	{
		$this->model->logout();
	}

	public function actionForgot_password()
	{
		$mas = array();

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$res = $this->model->checkFormForgotPass($data);

			if (isset($res)) 
			{
				$mas = array(
					'errors' => $res,
					'attributes' => $this->model->getAttr()
				);
			}
			if(empty($res))
			{
				$pass = $this->model->ForgotPassGenerate();

				$email = $this->attributes['email'];
				$subject = 'Es-work запрос на смену пароля';
				$message = 'Ваш новый пароль: '.$pass;

				$mas = array(
					'success' => "Вы успешно отправили письмо с паролем, проверьте свой почтовый адрес и скорее возвращайтесь к нам =)"
				);

				mail($email, $subject, $message);

				$this->view->generate('ES-work forgot_password send',$mas);
			}
		}
		$this->view->generate('ES-work forgot password',$mas);
	}
}
?>
