<?php

namespace ATPCms\View\Filter;

class StaticBlocks extends \ATPCore\View\Filter\AbstractBlockFilter
{
	protected function _loadObject($id)
	{
		$block = new \ATPCms\Model\StaticBlock();
		$block->loadByIdentifier($id);
		return $block;
	}
	
	protected function _replace($block)
	{
		return "<div class=\"static-block {$block->identifier}\">{$block->contentHtml}</div>";
	}
}
