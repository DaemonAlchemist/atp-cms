<?php

namespace ATPCms\Model;

class Category extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Name', 'Url', 'IsViewable')
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
}
Category::init();
