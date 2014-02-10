<?php

namespace ATPCms\Model;

class Category extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Name', 'Url', 'IsViewable', 'ShowPages', 'ShowInHeader', 'Text')
			->hasStaticBlocks()
			->hasPages()
			->isIdentifiedBy('Url')
			->tableNamespace("cms")
			->isOrderedBy("name ASC");
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
}
Category::init();
