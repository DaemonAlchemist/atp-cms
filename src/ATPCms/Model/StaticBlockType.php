<?php

namespace ATPCms\Model;

class StaticBlockType extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Name')
			->hasStaticBlocks()
			->isIdentifiedBy('Name')
			->tableNamespace("cms")
			->isOrderedBy("name ASC");
	}
	
	public function displayName()
	{
		return $this->name;
	}
}
StaticBlockType::init();
