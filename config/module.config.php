<?php

return array(
	'admin' => array(
		'models' =>array(
			'cms_image' => array(
				'displayName' => 'Image',
				'class' => 'ATPCms\Model\Image',
				'category' => 'CMS',
				'displayColumns' => array('Identifier'),
				'defaultOrder' => 'identifier ASC',
				'fields' => array(
					'Identifier' => array(
						'type' => 'Text',
						'label' => 'Identifier',
					),
					'Alt' => array(
						'type' => 'Text',
						'label' => 'Alt Text',
					),
					'Image' => array(
						'type' => 'File',
						'label' => 'Image',
					),
				),
			),
			'cms_page' => array(
				'displayName' => 'Page',
				'class' => 'ATPCms\Model\Page',
				'category' => 'CMS',
				'displayColumns' => array('Title', 'Url', 'IsActive'),
				'defaultOrder' => 'title ASC',
				'fields' => array(
					'Title' => array(
						'type' => 'Text',
						'label' => 'Title'
					),
					'Url' => array(
						'type' => 'Text',
						'label' => 'Url',
					),
					'IsActive' => array(
						'type' => 'Boolean',
						'label' => 'Is Active',
					),
					'PostDate' => array(
						'type' => 'Date',
						'label' => 'Created On',
					),
					'Thumbnail' => array(
						'type' => 'File',
						'label' => 'Thumbnail',
					),
					'Preview' => array(
						'type' => 'Html',
						'label' => 'Preview Text'
					),
					'Text' => array(
						'type' => 'Html',
						'label' => 'Page Content'
					),
				),
			),
			'cms_static_block' => array(
				'displayName' => 'Static Block',
				'class' => 'ATPCms\Model\StaticBlock',
				'category' => 'CMS',
				'displayColumns' => array('Identifier', 'IsActive'),
				'defaultOrder' => 'identifier ASC',
				'fields' => array(
					'Identifier' => array(
						'type' => 'Text',
						'label' => 'Identifier',
					),
					'SortOrder' => array(
						'type' => 'Text',
						'label' => 'Sort Order',
					),
					'IsActive' => array(
						'type' => 'Boolean',
						'label' => 'Is Active',
					),
					'Text' => array(
						'type' => 'Html',
						'label' => 'Block Content',
					),
				),
			),
			'cms_category' => array(
				'displayName' => 'Category',
				'class' => 'ATPCms\Model\Category',
				'category' => 'CMS',
				'displayColumns' => array('Name', 'Url', 'IsViewable'),
				'defaultOrder' => 'name ASC',
				'fields' => array(
					'Name' => array(
						'type' => 'Text',
						'label' => 'Name',
					),
					'Url' => array(
						'type' => 'Text',
						'label' => 'Url',
					),
					'IsViewable' => array(
						'type' => 'Boolean',
						'label' => 'Is Viewable',
					),
					'ShowInHeader' => array(
						'type' => 'Boolean',
						'label' => 'Show in Header',
					),
					'ShowPages' => array(
						'type' => 'Boolean',
						'label' => 'Show Pages',
					),
					'Text' => array(
						'type' => 'Html',
						'label' => 'Text',
					),
				),
			),
		),
	),
	'asset_manager' => array(
		'resolver_configs' => array(
			'paths' => array(
				__DIR__ . '/../public',
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
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
	),
);
