<?php

namespace ATPCms\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
	public function init()
	{
		$vhm = $this->getServiceLocator()->get('viewhelpermanager');
		$headerLinks = $vhm->get('headerLinks');
		$basePath = $vhm->get('basePath');
		
		$cats = \ATPCms\Model\Category::headerCategories();
		foreach($cats as $cat)
		{
			$headerLinks($cat->name, $basePath() . "/cms/category/" . $cat->url);
		}
		$headerLinks->setTitle("Links");
	}

	public function pageAction()
	{
		$this->init();
		
		$pageUrl = $this->params('page');
		
		$page = new \ATPCms\Model\Page();
		$page->loadByUrl($pageUrl);
	
		if(!$page->id)
		{
			$this->getResponse()->setStatusCode(404);
			return;
		}
	
		$pageWidget = new \ATPCms\View\Widget\Page();
		$pageWidget->page = $page;
	
		$view = new \Zend\View\Model\ViewModel();
		$view->page = $page;
		$view->addChild($pageWidget, 'pageWidget');
		return $view;
	}
	
	public function categoryAction()
	{
		$this->init();
	
		$catUrl = $this->params('id');
		
		$category = new \ATPCms\Model\Category();
		$category->loadByUrl($catUrl);
	
		if(!$category->id)
		{
			$this->getResponse()->setStatusCode(404);
			return;
		}
	
		//Create the view
		$view = new \Zend\View\Model\ViewModel();
		$view->category = $category;
		
		//Create post list widget
		$posts = new \ATPCms\View\Widget\MostRecentPost();
		$posts->category = $category;
		$posts->postCount = 0;
		$view->addChild($posts, 'posts');
		
		return $view;
	}
	
	public function imageAction()
	{
		$this->init();
		$imageUrl = $this->params('id');
		
		$image = new \ATPCms\Model\Image();
		$image->loadByIdentifier($imageUrl);
	
		if(!$image->id)
		{
			$this->getResponse()->setStatusCode(404);
			return;
		}
	
		$path = $image->filePath('imageFile');
		header("Content-Type: {$image->imageFile->type}");
		echo file_get_contents("public/{$path}");
		die();
	}
}
