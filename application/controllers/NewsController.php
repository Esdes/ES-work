<?php 

namespace application\controllers;

use application\core\Controller;

use application\models\NewsModel;

use application\lib\Pagination;

class NewsController extends Controller
{
	public function actionIndex($page=1)
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}

		$news = $this->model->getNewsList($page);
		
		$total = $this->model->getNewsCount();
	
		$pagination = new Pagination($total,$page,NewsModel::COUNT_DEFAULT,'page=');

		$mas = array(
			'news' => $news,
			'pagination' => $pagination
		);

		$this->view->generate('ES-work news',$mas);
	}

	public function actionOne($id)
	{
		if(isset($_SESSION['user']))
		{
			if($this->model->isOnline($_SESSION['user']))
				$this->model->setUserOnline($_SESSION['user']);
			else
				$this->model->setUserOffline($_SESSION['user']);
		}
		
		$news = $this->model->getNewsOneById($id);

		$mas = array(
			'news' => $news
		);
		
		$this->view->generate('ES-work news',$mas);
	}

}
