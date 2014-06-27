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
	
		return new \Zend\View\Model\ViewModel(array(
			'page' => $page
		));
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
	
		return new \Zend\View\Model\ViewModel(array(
			'category' => $category
		));
	}
	
	public function imageAction()
	{
		$this->init();
		$imageUrl = $this->params('id');
		
		$image = new \ATPCms\Model\Image($imageUrl);
	
		if(!$image->id)
		{
			$this->getResponse()->setStatusCode(404);
			return;
		}
	
		//Get the base path helper
		$vhm = $this->getServiceLocator()->get('viewhelpermanager');
		$headerLinks = $vhm->get('headerLinks');
		$basePath = $vhm->get('basePath');
		
		$path = $image->filePath('image');
		header("Content-Type: {$image->image->type}");
		echo file_get_contents("public/{$path}");
		die();
	}
}
