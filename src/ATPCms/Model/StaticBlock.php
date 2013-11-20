<?php

namespace ATPCms\Model;

class StaticBlock extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Identifier', 'Text')
			->isIdentifiedBy('Identifier')
			->belongsToStaticBlockType();
	}
}
StaticBlock::init();