<?php

namespace ATPCms\View\Filter;

class Images extends \ATPCore\View\Filter\AbstractBlockFilter
{
	protected function _loadObject($id)
	{
		$image = new \ATPCms\Model\Image();
		$image->loadByIdentifier($id);
		if(!$image->id)
		{
			$image->loadById($id);
		}
		return $image;
	}
	
	protected function _replace($image)
	{
		//Get the base path helper
		$sm = $this->getServiceManager();
		$vm = $sm->get('ViewManager');
		$hm = $vm->getHelperManager();
		$basePath = $hm->get("basepath");
		
		$path = $basePath($image->filePath('imageFile'));
		$alt = $image->alt;
		
		return "<img src=\"{$path}\" alt=\"{$alt}\" />";
	}
}
