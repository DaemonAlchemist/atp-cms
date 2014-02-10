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
		
		$page = new \ATPCms\Model\Page($pageUrl);
	
		return new \Zend\View\Model\ViewModel(array(
			'page' => $page
		));
	}
	
	public function categoryAction()
	{
		$this->init();
	
		$catUrl = $this->params('category');
		
		$category = new \ATPCms\Model\Category($catUrl);
	
		return new \Zend\View\Model\ViewModel(array(
			'category' => $category
		));
	}
}
