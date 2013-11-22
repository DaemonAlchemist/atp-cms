<?php

namespace ATPCms\View\Filter;

class StaticBlocks extends \ATPCore\View\Filter\AbstractBlockFilter
{
	protected function _loadObject($id)
	{
		return new \ATPCms\Model\StaticBlock($id);
	}
	
	protected function _replace($block)
	{
		return $block->text;
	}
}
