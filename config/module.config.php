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
	'block_filters' => array(
		'block' => 'ATPCms\View\Filter\StaticBlocks',
		'image' => 'ATPCms\View\Filter\Images',
		'youtube' => 'ATPCms\View\Filter\Youtube',
	),
    'router' => array(
        'routes' => array(
            'cms_page' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '[/cms/page]/:page[/]',
                    'defaults' => array(
                        'controller'    => 'ATPCms\Controller\IndexController',
                        'action'        => 'page',
                    ),
                ),
				'priority' => -999,
            ),
            'cms_other' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/cms/[:action]/:id',
                    'defaults' => array(
                        'controller'    => 'ATPCms\Controller\IndexController',
                    ),
                ),
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'ATPCms\Controller\IndexController' => 'ATPCms\Controller\IndexController'
        ),
    ),
);
