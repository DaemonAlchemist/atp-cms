<?php

namespace ATPCms\View\Filter;

class Images extends \ATPCore\View\Filter\AbstractBlockFilter
{
	protected function _loadObject($id)
	{
		return new \ATPCms\Model\Image($id);
	}
	
	protected function _replace($image)
	{
		//Get the base path helper
		$sm = $this->getServiceManager();
		$vm = $sm->get('ViewManager');
		$hm = $vm->getHelperManager();
		$basePath = $hm->get("basepath");
		
		$path = $basePath($image->filePath('image'));
		$alt = $image->alt;
		
		return "<img src=\"{$path}\" alt=\"{$alt}\" />";
	}
}
