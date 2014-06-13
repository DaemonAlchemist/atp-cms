<?php

namespace ATPCms\Model;

require_once("Category.php");

class StaticBlock extends \ATP\ActiveRecord
{
	protected function setup()
	{
		$this->setTableNamespace("cms");
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