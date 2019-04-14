<?php 

namespace application\controllers;

use application\core\Controller;

use application\lib\Online;

class MainController extends Controller
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

	    $list = $this->model->getCategoryList();
		
		$mas = array(
			'category' => $list
		);

		$this->view->generate('ES-work',$mas);
	}

	public function actionAbout()
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

		$this->view->generate('ES-work about');
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

		$this->view->generate('ES-work worker');
	}

	public function actionWorkers()
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

	public function actionWorkers_category($category)
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

		$list = $this->model->getWorkersCategoryList($category);

		$mas = array(
			'workers_category' => $list
		);

		$this->view->generate('ES-work workers category',$mas);
	}

	public function actionWorkers_subcategory($category,$subcategory)
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

		$list = $this->model->getWorkersSubCategoryList($category,$subcategory);	

		$mas = array(
			'workers_subcategory' => $list
		);

		$this->view->generate('ES-work workers subcategory',$mas);
	}

	public function actionContacts()
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

		$this->view->generate('ES-work contacts');
	}
}

?>