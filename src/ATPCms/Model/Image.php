<?php

namespace ATPCms\Model;

class Image extends \ATP\ActiveRecord
{
	public function displayName()
	{
		return $this->identifier;
	}
	
	public static function missingImage()
	{
		$image = new self();
		$image->loadByIdentifier("no-image");
		return $image;
	}
}
Image::init();