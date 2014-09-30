<?php

namespace ATPCms\Model;

require_once("Page.php");
require_once("StaticBlock.php");

class Category extends \ATP\ActiveRecord
{
	public function displayName()
	{
		return $this->name;
	}
	
	public static function headerCategories()
	{
		$cat = new self();
		return $cat->loadMultiple(array(
			'where' => "show_in_header=1"
		));
	}
	
	public function mostRecent($count)
	{
		$page = new Page();
		$options = array(
			'where' => "category_id = ? AND is_active=1",
			'data' => array($this->id),
			'orderBy' => "post_date DESC", 
		);
		if($count > 0)
		{
			$options['limit'] = $count;
		}
		return $page->loadMultiple($options);
	}
}
Category::init();
