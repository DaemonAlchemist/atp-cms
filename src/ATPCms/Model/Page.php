<?php

namespace ATPCms\Model;

require_once("Category.php");

class Page extends \ATP\ActiveRecord
{
	protected function setup()
	{
		$this->setTableNamespace("cms");
	}

	public static function exists($url)
	{
		return $url == "test-page";
	}
	
	public function displayName()
	{
		return $this->title;
	}
	
	public static function byCategory($cat, $activeOnly = true)
	{
		$type = new \ATPCms\Model\Category($cat);
		
		$pages = array();
		$pagesRaw = $type->pageList;
		foreach($pagessRaw as $page)
		{
			if(!$activeOnly || $page->isActive) $pages[] = $page;
		}
		
		return $pages;
	}
}
Page::init();