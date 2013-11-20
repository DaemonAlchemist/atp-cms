<?php

namespace ATPCms\Model;

class Page extends \ATP\ActiveRecord
{
	protected function createDefinition()
	{
		$this->hasData('Title', 'Url', 'Text')
			->isIdentifiedBy('Url')
			->tableNamespace("cms");
	}

	public static function exists($url)
	{
		return $url == "test-page";
	}
	
	public function displayName()
	{
		return $this->title;
	}
}
Page::init();