<?php

namespace ATPCms\Model;

class Image extends \ATP\ActiveRecord
{
	public function displayName()
	{
		return $this->identifier;
	}
}
Image::init();