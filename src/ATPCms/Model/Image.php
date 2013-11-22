<?php

namespace ATPCms\Model;

class Image extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Identifier', 'Alt', 'Image')
			->hasFiles('Image')
			->isIdentifiedBy('Identifier')
			->tableNamespace("cms");
	}
}
Image::init();