<?php

namespace ATPCms\Controller;

class IndexController extends \ATPCore\Controller\AbstractController
{
	public function indexAction()
	{
		$pageUrl = $this->params('page');
		
		//TODO: load page
		$page = new \ATPCms\Model\Page($pageUrl);
	
		return new \Zend\View\Model\ViewModel(array(
			'page' => $page
		));
	}
}
