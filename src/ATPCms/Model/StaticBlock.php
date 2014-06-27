<?php

namespace ATPCms\Model;

require_once("Category.php");

class StaticBlock extends \ATP\ActiveRecord
{
	public static function byCategory($cat, $activeOnly = true)
	{
		$type = new \ATPCms\Model\Category();
		$type->loadByUrl($cat);
		
		$blocks = array();
		$blocksRaw = $type->getAtpcmsStaticBlocksByCategory();
		foreach($blocksRaw as $block)
		{
			if(!$activeOnly || $block->isActive) $blocks[] = $block;
		}
		
		return $blocks;
	}
}
StaticBlock::init();