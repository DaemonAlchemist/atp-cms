<?php

namespace ATPCms\Model;

class StaticBlockType extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Name')
			->hasStaticBlocks();
	}
}
StaticBlockType::init();
