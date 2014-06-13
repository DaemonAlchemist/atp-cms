<?php

namespace ATPCms\Model;

require_once("Page.php");
require_once("StaticBlock.php");

class Category extends \ATP\ActiveRecord
{
	protected function setup()
	{
		$this->setTableNamespace("cms");
	}
	
	public function displayName()
	{
		return $this->name;
	}
	
	public static function headerCategories()
	{
		$where = "show_in_header=1";
		$cat = new self();
		return $cat->loadMultiple($where);
	}
	
	public function mostRecent($count)
	{
		$page = new Page();
		return $page->loadMultiple("category_id = ? AND is_active=1", array($this->id), array(), "post_date DESC", $count);
	}
}
Category::init();
