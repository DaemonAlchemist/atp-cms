<?php

namespace ATPCms\Model;

class Image extends \ATP\ActiveRecord
{
	protected function setup()
	{
		$this->setTableNamespace("cms");
	}
}
Image::init();