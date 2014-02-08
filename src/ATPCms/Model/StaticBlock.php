<?php

namespace ATPCms\Model;

class StaticBlock extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Identifier', 'SortOrder', 'IsActive', 'Text')
			->isIdentifiedBy('Identifier')
			->belongsToCategory()
			->tableNamespace("cms")
			->isOrderedBy('sort_order ASC');
	}
	
	public static function byCategory($cat, $activeOnly = true)
	{
		$type = new \ATPCms\Model\Category($cat);
		
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