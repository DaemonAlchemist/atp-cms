<?php

namespace ATPCms\Model;

class StaticBlock extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Identifier', 'SortOrder', 'IsActive', 'Text')
			->isIdentifiedBy('Identifier')
			->belongsToStaticBlockType()
			->tableNamespace("cms")
			->isOrderedBy('sort_order ASC');
	}
	
	public static function byType($type, $activeOnly = true)
	{
		$type = new \ATPCms\Model\StaticBlockType($type);
		
		$blocks = array();
		$blocksRaw = $type->staticBlockList;
		foreach($blocksRaw as $block)
		{
			if(!$activeOnly || $block->isActive) $blocks[] = $block;
		}
		
		return $blocks;
	}
}
StaticBlock::init();