<?php

namespace ATPCms\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
	public function pageAction()
	{
		$pageUrl = $this->params('page');
		
		$page = new \ATPCms\Model\Page($pageUrl);
	
		return new \Zend\View\Model\ViewModel(array(
			'page' => $page
		));
	}
	
	public function categoryAction()
	{
		$catUrl = $this->params('category');
		
		$category = new \ATPCms\Model\Category($catUrl);
	
		return new \Zend\View\Model\ViewModel(array(
			'category' => $category
		));
	}
}
