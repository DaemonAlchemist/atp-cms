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
				'tabs' => array(
					'Details' => array('category_id', 'title', 'url', 'is_active', 'post_date'),
					'Images' => array('thumbnail_file'),
					'Content' => array('preview_html', 'content_html'),
					'Styling' => array('extra_css'),
					'Scripting' => array('script'),
				),
			),
			'atpcms_static_block' => array(
				'displayName' => 'Static Block',
				'class' => 'ATPCms\Model\StaticBlock',
				'category' => 'CMS',
				'displayColumns' => array('Identifier', 'IsActive'),
				'defaultOrder' => 'identifier ASC',
				'tabs' => array(
					'Details' => array('category_id', 'identifier', 'sort_order', 'is_active'),
					'Content' => array('content_html'),
				),
			),
			'atpcms_category' => array(
				'displayName' => 'Category',
				'class' => 'ATPCms\Model\Category',
				'category' => 'CMS',
				'displayColumns' => array('Name', 'Url', 'IsViewable'),
				'defaultOrder' => 'name ASC',
				'tabs' => array(
					'Details' => array('name', 'url'),
					'Options' => array('is_viewable', 'show_pages', 'show_in_header'),
					'Content' => array('description_html'),
				),
			),
		),
		'parameters' => array(
			'cms-date-format' => array(
				'displayName' => 'Date Format',
				'group' => 'CMS',
				'type' => 'Text',
				'default' => 'F jS, Y \a\t g:i a',
			),
		),
	),
);
