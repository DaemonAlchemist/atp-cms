<?php

namespace ATPCms\View\Filter;

class MostRecent extends \ATPCore\View\Filter\AbstractBlockFilter
{
	protected function _loadObject($url)
	{
		$category = new \ATPCms\Model\Category();
		$category->loadByUrl($url);
		return $category;
	}
	
	protected function _replace($category)
	{
		$posts = $category->mostRecent(1);
		return count($posts) > 0 ? $posts[0]->contentHtml : "";
	}
}
