<?php 

namespace application\controllers;

use application\core\Controller;

use application\core\View;

use application\models\EmployersModel;

use application\models\ProfileModel;

use application\lib\Pagination;

class EmployersController extends Controller
{
	public function actionIndex($page=1)
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$listCategory = $this->model->getCategoryList();

		$listOrders = $this->model->getOrdersList($page);

		$listEmployers = $this->model->getEmployersList($page);

		$total = $this->model->getEmployersCount();

		$pagination = new Pagination($total,$page,EmployersModel::COUNT_DEFAULT,'page=');
		
		$mas = array(
			'category' => $listCategory,
			'listOrders' => $listOrders,
			'listEmployers' => $listEmployers,
			'pagination' => $pagination
		);

		$this->view->generate('ES-work orders',$mas);
	}

	public function actionOrders_category($page=1,$id_category)
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$listCategory = $this->model->getCategoryList();
		
		$listOrders = $this->model->getOrdersCategoryList($id_category,$page);

		$listEmployers = $this->model->getEmployersCategoryList($id_category,$page);

		$total = $this->model->getOrdersCategoryCount($id_category);

		$pagination = new Pagination($total,$page,EmployersModel::COUNT_DEFAULT,'page=');

		$mas = array(
			'category' => $listCategory,
			'pagination' => $pagination,
			'listOrders' => $listOrders,
			'listEmployers' => $listEmployers
		);

		$this->view->generate('ES-work orders',$mas);
	}

	public function actionOrder_id($id)
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$listOrder = $this->model->getOrderById($id);

		$listEmployer = $this->model->getEmployer_orderById($id);

		$isEmployer = $this->model->isEmployer($id_user);

		$isWorker_order = $this->model->isWorker_order($id_user,$id);

		$isFreeOrder = $this->model->isFreeOrder($id);

		$mas = array(
			'listOrder' => $listOrder,
			'listEmployer' => $listEmployer,
			'isEmployer' => $isEmployer,
			'isFreeOrder' => $isFreeOrder,
			'isWorker_order' => $isWorker_order
		);

		$this->view->generate('ES-work order',$mas);
	}

	public function actionOrder_Add($id)
	{
		$id_user = ProfileModel::isLogin();

		$addOrder = $this->model->addOrderWorkerById($id);

		View::redirect("/profile/settings?page=1_work");
	}

	public function actionEmployer($login)
	{
		$id_user = ProfileModel::isLogin();

		if($id_user)
		{
			if($this->model->isOnline($id_user))
				$this->model->setUserOnline($id_user);
			else
				$this->model->setUserOffline($id_user);
		}

		$listEmployer = $this->model->getEmployerByLoginList($login);

		/*$listUsersMessage = $this->model->getUsersMessage();*/

		$listOrdersEmployer = $this->model->gelOrdersEmployer($this->model->getUserByLogin($login));

		
/*echo $countOrderEmployerNotRate;
die();*/
		$isOnline = $this->model->Online($this->model->getUserByLogin($login));

		$mas = array(
			'listEmployer' => $listEmployer,
			'listOrdersEmployer' => $listOrdersEmployer,
			'online' => $isOnline,
			//'listUsersMessage' => $listUsersMessage
		);

		$this->view->generate('ES-work employer',$mas);
	}

	public function actionRate_add()
	{
		$id_user = ProfileModel::isLogin();

		if(isset($_POST['add']))
		{
			$add = filter_var($_POST["add"],FILTER_SANITIZE_NUMBER_INT);

			$addRate = $this->model->addRate($add);
		}		
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
	}

	public function actionRate_minus()
	{
		$id_user = ProfileModel::isLogin();
		
		if(isset($_POST['minus']))
		{
			$minus = filter_var($_POST["minus"],FILTER_SANITIZE_NUMBER_INT);

			$minusRate = $this->model->minusRate($minus);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
	}
}

?>
