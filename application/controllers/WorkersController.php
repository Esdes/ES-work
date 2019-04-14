<?php 

namespace application\controllers;

use application\core\Controller;

use application\models\WorkersModel;

use application\lib\Pagination;

class WorkersController extends Controller
{
	public function actionIndex()
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

	    $listCategory = $this->model->getCategoryList();

	    $listSubCategory = $this->model->getSubCategoryList();

	    $listWorkers = $this->model->getWorkers();

		$mas = array(
			'category' => $listCategory,
			'sub_category' => $listSubCategory,
			'workers' => $listWorkers
		);

		$this->view->generate('ES-work workers',$mas);
	}

	public function actionWorker($login)
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

		$listWorker = $this->model->getWorkerByLoginList($login);

		//$listUsersMessage = $this->model->getUsersMessage();

		$listSubCategoryWorker = $this->model->getSubCategoryByWorkerList($login);

		$isOnline = $this->model->Online($this->model->getUserByLogin($login));

		$mas = array(
			'listWorker' => $listWorker,
			//'listUsersMessage' => $listUsersMessage,
			'listSubCategoryWorker' => $listSubCategoryWorker,
			'online' => $isOnline
		);

		$this->view->generate('ES-work worker',$mas);
	}

	public function actionWorkers_category($category,$page=1)
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

		$listCategory = $this->model->getCategoryList();

	    $listSubCategory = $this->model->getSubCategoryList();

		$listWorkers = $this->model->getWorkersCategoryList($category,$page);

		$total = $this->model->getWorkersCategoryCount($category);

		$pagination = new Pagination($total,$page,WorkersModel::COUNT_DEFAULT,'page=');

		$mas = array(
			'category' => $listCategory,
			'sub_category' => $listSubCategory,
			'workers' => $listWorkers,
			'pagination' => $pagination
		);

		$this->view->generate('ES-work workers category',$mas);
	}

	public function actionWorkers_subcategory($id_category,$id_subcategory,$page=1)
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}
		
		$category = $this->model->getCategoryById($id_category);

	    $listSubCategoryByCategory = $this->model->getSubCategoryByCategoryList($id_category);

		$listWorkersSubCategory = $this->model->getWorkersSubCategoryList($id_category,$id_subcategory,$page);	

		$total = $this->model->getWorkersSubCategoryCount($id_category,$id_subcategory);

		$pagination = new Pagination($total,$page,WorkersModel::COUNT_DEFAULT,'page=');

		$mas = array(
			'category' => $category,
			'sub_category' => $listSubCategoryByCategory,
			'workers' => $listWorkersSubCategory,
			'pagination' => $pagination
		);

		$this->view->generate('ES-work workers subcategory',$mas);
	}

	public function actionRate_add()
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
			{
				$this->model->setUserOnline($_SESSION['user']);
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
			else
				$this->model->setUserOffline($_SESSION['user']);
		}
	}

	public function actionRate_minus()
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
			{
				$this->model->setUserOnline($_SESSION['user']);
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
			else
				$this->model->setUserOffline($_SESSION['user']);
		}
	}
}

?>
