<?php

return array(
    'router' => array(
        'routes' => array(
            'cms_page_full' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/cms/page/:page[/]',
                    'defaults' => array(
                        'controller'    => 'ATPCms\Controller\IndexController',
                        'action'        => 'page',
                    ),
                ),
            ),
            'cms_page' => array(
                'type'    => 'Segment',
                'options' => array(
                    'route'    => '/:page[/]',
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
