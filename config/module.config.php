<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

return array(
	'admin' => array(
		'models' =>array(
			'cms_page' => array(
				'displayName' => 'Page',
				'class' => 'ATPCms\Model\Page',
				'category' => 'CMS',
				'displayColumns' => array('Title', 'Url'),
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
					'Text' => array(
						'type' => 'Html',
						'label' => 'Page Content'
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
    'router' => array(
        'routes' => array(
            'cms' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '[/cms]/:page',
                    'defaults' => array(
                        'controller'    => 'ATPCms\Controller\IndexController',
                        'action'        => 'index',
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
        'template_map' => array(
            'atp-cms/index/index' => __DIR__ . '/../view/atp-cms/index/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
	),
	'view_helpers' => array(
		'invokables' => array(
			'resize' => 'ATPCore\View\Helper\ImageResizePath',
		)
	),
);
