<?php 

namespace application\controllers;

use application\core\Controller;

use application\core\View;

use application\models\AdminModel;

use application\lib\Pagination;

class AdminController extends Controller
{
	public function __construct($controller,$method)
	{
		parent::__construct($controller,$method);

		$this->view->layout = 'admin';
	}
		
	public function actionIndex()
	{
		$id_user = $this->model->isAdmin();

		$this->view->generate('ES-work Admin panel');
	}

	public function actionSettings()
	{
		$id_user = $this->model->isAdmin();

		$adminList = $this->model->getAdminList();

		$mas = array(
			'adminList' => $adminList
		);

		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionUpdate_settings()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['submit']))
		{
			$data = $_POST;
			
			$this->model->setParam('settings');

			$this->model->EditData($data);

			View::redirect('/admin/settings');
		}
	}

	public function actionCategory()
	{
		$id_user = $this->model->isAdmin();

		$categoriesList = $this->model->getCategoryList();

		$mas = array(
			'categoriesList' => $categoriesList
		);

		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionAdd_category()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['submit']))
		{
			$data = $_POST;
	
			$this->model->setParam('category');

			$AddCategoey = $this->model->AddCategory($data);

		}
		
		$this->view->generate('ES-work Admin panel');
	}

	public function actionDelete_category()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['recordToDelete']))
		{
			$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

			$deleteCategory = $this->model->deleteCategoryById($idToDelete);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
		
	}

	public function actionUpdate_category($id)
	{
		$id_user = $this->model->isAdmin();

		$categoryById = $this->model->getCategoryById($id);

		$mas = array(
			'categoryById' => $categoryById
		);

		$this->view->generate('ES-work Admin panel',$mas);

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$this->model->setParam('category');

			$this->model->EditData($data,$id);
		}
	}

	public function actionSubcategory($page)
	{
		$id_user = $this->model->isAdmin();

		$sub_categoriesList = $this->model->getSubCategoryList($page);

		$total = $this->model->getSubCategoryCount();

		$pagination = new Pagination($total,$page,AdminModel::COUNT_DEFAULT,'page=');
		
		$mas = array(
			'pagination' => $pagination,
			'sub_categoriesList' => $sub_categoriesList
		);

		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionAdd_subcategory()
	{
		$id_user = $this->model->isAdmin();

		$categoriesList = $this->model->getCategoryList();

		$mas = array(
			'categories' => $categoriesList
		);

		if(isset($_POST['submit']))
		{			
			$data = $_POST;

			$this->model->setParam('subcategory');

			$Addsubcategory = $this->model->AddSubcategory($data);

			$this->view->generate('ES-work Admin panel',$mas);

		}
		
		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionUpdate_subcategory($id)
	{
		$id_user = $this->model->isAdmin();

		$subcategoryById = $this->model->getSubcategoryById($id);

		$categoriesList = $this->model->getCategoryList();

		$mas = array(
			'subcategoryById' => $subcategoryById,
			'categoriesList' => $categoriesList
		);

		$this->view->generate('ES-work Admin panel',$mas);

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$this->model->setParam('subcategory');

			$this->model->EditData($data,$id);
		}
		
	}

	public function actionDelete_subcategory()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['recordToDelete']))
		{
			$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

			$deleteSubcategory = $this->model->deleteSubcategoryById($idToDelete);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
		
	}

	public function actionWorkers($page)
	{
		$id_user = $this->model->isAdmin();

		$workersList = $this->model->getWorkersList($page);

		$total = $this->model->getWorkersCount();

		$pagination = new Pagination($total,$page,AdminModel::COUNT_DEFAULT,'page=');

		$mas = array(
			'pagination' => $pagination,
			'workersList' => $workersList
		);

		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionUpdate_workers($id)
	{
		$id_user = $this->model->isAdmin();

		$workerById = $this->model->getWorkerById($id);

		$mas = array(
			'workerById' => $workerById
		);

		$this->view->generate('ES-work Admin panel',$mas);

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$this->model->setParam('worker');

			$this->model->EditData($data,$id);
		}
		
	}

	public function actionDelete_workers()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['recordToDelete']))
		{
			$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

			$deleteWorker = $this->model->deleteWorkerById($idToDelete);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
		
	}

	public function actionEmployers($page)
	{
		$id_user = $this->model->isAdmin();

		$employersList = $this->model->getEmployersList($page);

		$total = $this->model->getEmployersCount();

		$pagination = new Pagination($total,$page,AdminModel::COUNT_DEFAULT,'page=');
		
		$mas = array(
			'pagination' => $pagination,
			'employersList' => $employersList
		);

		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionUpdate_employers($id)
	{
		$id_user = $this->model->isAdmin();

		$employerById = $this->model->getEmployerById($id);

		$mas = array(
			'employerById' => $employerById
		);

		$this->view->generate('ES-work Admin panel',$mas);

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$this->model->setParam('user');

			$this->model->EditData($data,$id);
		}
		
	}

	public function actionDelete_employers()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['recordToDelete']))
		{
			$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

			$deleteEmployer = $this->model->deleteEmployerById($idToDelete);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
	}

	public function actionOrders($page)
	{
		$id_user = $this->model->isAdmin();

		$ordersList = $this->model->getOrdersList($page);

		$total = $this->model->getOrdersCount();

		$pagination = new Pagination($total,$page,AdminModel::COUNT_DEFAULT,'page=');
		
		$mas = array(
			'pagination' => $pagination,
			'ordersList' => $ordersList
		);

		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionUpdate_order($id)
	{
		$id_user = $this->model->isAdmin();

		$orderById = $this->model->getOrderById($id);

		$mas = array(
			'orderById' => $orderById
		);

		$this->view->generate('ES-work Admin panel',$mas);

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$this->model->setParam('order');

			$this->model->EditData($data,$id);
		}
	}

	public function actionDelete_order()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['recordToDelete']))
		{
			$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

			$deleteOrder = $this->model->deleteOrderById($idToDelete);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
		
	}

	public function actionNews($page)
	{
		$id_user = $this->model->isAdmin();

		$newsList = $this->model->getNewsList($page);

		$total = $this->model->getNewsCount();

		$pagination = new Pagination($total,$page,AdminModel::COUNT_DEFAULT,'page=');

		$mas = array(
			'pagination' => $pagination,
			'newsList' => $newsList
		);

		$this->view->generate('ES-work Admin panel',$mas);
	}

	public function actionAdd_news()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$this->model->setParam('news');

			$Addnews = $this->model->AddNews($data);

		}
		
		$this->view->generate('ES-work Admin panel');
	}

	public function actionUpdate_news($id)
	{
		$id_user = $this->model->isAdmin();

		$newsById = $this->model->getNewsById($id);

		$mas = array(
			'newsById' => $newsById
		);

		$this->view->generate('ES-work Admin panel',$mas);

		if(isset($_POST['submit']))
		{
			$data = $_POST;

			$this->model->setParam('news');

			$this->model->EditData($data,$id);
		}
		
	}

	public function actionDelete_news()
	{
		$id_user = $this->model->isAdmin();

		if(isset($_POST['recordToDelete']))
		{
			$idToDelete = filter_var($_POST["recordToDelete"],FILTER_SANITIZE_NUMBER_INT);

			$deleteNews = $this->model->deleteNewsById($idToDelete);
		}
		else
		{
			header('HTTP/1.1 500 Looks like mysql error, could not insert record!');
			die();
		}
		
	}

	public function actionLogin()
	{

		if($this->model->isSetAdmin())
		{
			$this->actionLogout();
		}
		else
		{	
			$mas = array();

			if(isset($_POST['submit']))
			{
				$data = $_POST;

				$this->model->setParam('login');

				$res = $this->model->checkForm($data);

				if (!empty($res)) 
				{
					$attr = $this->model->getAttr();

					$mas = array(
						'errors' => $res,
						'attributes' => $attr
					);
				}
				if(empty($res))
				{
					$admin = $this->model->getAdmin();

					$this->model->auth($admin);

					View::redirect('/admin?$2y$10$oZEQOveeOwZXu7EJuSaJR.BJuZDwhhaljOCqRxK8uZT9FIAX7O4P.');
				}
			}

			$this->view->generate('Admin panel',$mas);
		}
	}

	public function actionLogout()
	{
		$this->model->logout();
	}

}
?>
