<?php

namespace ATPCms\Model;

require_once("Category.php");

class Page extends \ATP\ActiveRecord
{
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
		foreach($pagesRaw as $page)
		{
			if(!$activeOnly || $page->isActive) $pages[] = $page;
		}
		
		return $pages;
	}

    public function hasPostDate()
    {
        return !empty($this->postDate) && $this->postDate != '0000-00-00 00:00:00';
    }
}
Page::init();