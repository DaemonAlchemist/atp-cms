<?php

namespace ATPCms\Model;

class StaticBlock extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Identifier', 'Text')
			->isIdentifiedBy('Identifier')
			->belongsToStaticBlockType()
			->tableNamespace("cms");
	}
	
	public static function byType($type)
	{
		$type = new \ATPCms\Model\StaticBlockType($type);
		return $type->staticBlockList;
	}
}
StaticBlock::init();