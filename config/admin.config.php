<?php

return array(
	'admin' => array(
		'models' =>array(
			'atpcms_image' => array(
				'displayName' => 'Image',
				'class' => 'ATPCms\Model\Image',
				'category' => 'CMS',
				'displayColumns' => array('Identifier'),
				'defaultOrder' => 'identifier ASC',
			),
			'atpcms_page' => array(
				'displayName' => 'Page',
				'class' => 'ATPCms\Model\Page',
				'category' => 'CMS',
				'displayColumns' => array('Title', 'Url', 'IsActive'),
				'defaultOrder' => 'title ASC',
			),
			'atpcms_static_block' => array(
				'displayName' => 'Static Block',
				'class' => 'ATPCms\Model\StaticBlock',
				'category' => 'CMS',
				'displayColumns' => array('Identifier', 'IsActive'),
				'defaultOrder' => 'identifier ASC',
			),
			'atpcms_category' => array(
				'displayName' => 'Category',
				'class' => 'ATPCms\Model\Category',
				'category' => 'CMS',
				'displayColumns' => array('Name', 'Url', 'IsViewable'),
				'defaultOrder' => 'name ASC',
			),
		),
	),
);
