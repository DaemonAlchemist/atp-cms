<?php

namespace ATPCms;

class Module extends \ATP\Module
{
	protected $_moduleName = "ATPCms";
	protected $_moduleBaseDir = __DIR__;
	
	protected function getInstallFiles()
	{
		return array(
			"media/no-image.png" => "public/uploads/atpcms_images/1/no-image.png",
		);
	}
	
	protected function getInstallDbQueries()
	{
		return array(
			"CREATE TABLE `atpcms_categories` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`url` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`name` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`is_viewable` tinyint(1) NOT NULL DEFAULT '1',
				`show_pages` tinyint(1) NOT NULL DEFAULT '1',
				`show_in_header` tinyint(1) NOT NULL DEFAULT '0',
				`description_html` longtext COLLATE utf8_unicode_ci,
				PRIMARY KEY (`id`),
				KEY `url_index` (`url`),
				KEY `viewable_index` (`is_viewable`),
				KEY `header_index` (`show_in_header`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci",
			
			"INSERT INTO atpcms_categories (url, name, show_in_header) values
			 ('news', 'News', 1),
			 ('blog', 'Blog', 1),
			 ('information', 'Information', 1)			 
			",
			
			"CREATE TABLE `atpcms_images` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`identifier` char(255) COLLATE utf8_unicode_ci NOT NULL,
				`alt` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`image_file` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				PRIMARY KEY (`id`),
				UNIQUE KEY `identifier_UNIQUE` (`identifier`)
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci",
			
			"INSERT INTO atpcms_images (identifier, alt, image_file) values
			 ('no-image', 'Missing Image', '{\"name\":\"no-image.png\",\"type\":\"image\/png\",\"size\":14435}')
			",
			
			"CREATE TABLE `atpcms_pages` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`title` char(255) COLLATE utf8_unicode_ci NOT NULL,
				`url` char(255) COLLATE utf8_unicode_ci NOT NULL,
				`category_id` int(11) DEFAULT NULL,
				`is_active` tinyint(1) NOT NULL DEFAULT '1',
				`post_date` datetime DEFAULT NULL,
				`thumbnail_file` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`preview_html` longtext COLLATE utf8_unicode_ci,
				`content_html` longtext COLLATE utf8_unicode_ci,
				`extra_css` longtext COLLATE utf8_unicode_ci,
				`script` longtext COLLATE utf8_unicode_ci,
				`meta_keywords` longtext COLLATE utf8_unicode_ci,
				`meta_description` longtext COLLATE utf8_unicode_ci,
				PRIMARY KEY (`id`),
				UNIQUE KEY `url_UNIQUE` (`url`),
				KEY `category_index` (`category_id`),
				KEY `active_index` (`is_active`),
				KEY `date_index` (`post_date`),
				CONSTRAINT `cms_pages_category_fk` FOREIGN KEY (`category_id`) REFERENCES `atpcms_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;",

			"INSERT INTO atpcms_pages (title, url, category_id, post_date, content_html) values
			 ('Homepage', 'home', 3, NOW(), 'Homepage content goes here'),
			 ('About this Website', 'about', 3, NOW(), 'About page content goes here')
			",
			
			"CREATE TABLE `atpcms_static_blocks` (
				`id` int(11) NOT NULL AUTO_INCREMENT,
				`identifier` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
				`category_id` int(11) DEFAULT NULL,
				`content_html` longtext COLLATE utf8_unicode_ci,
				`sort_order` int(11) DEFAULT NULL,
				`is_active` tinyint(1) NOT NULL DEFAULT '1',
				PRIMARY KEY (`id`),
				UNIQUE KEY `identifier_UNIQUE` (`identifier`),
				KEY `sort_index` (`sort_order`),
				KEY `active_index` (`is_active`),
				KEY `category_index` (`category_id`),
				CONSTRAINT `cms_static_pages_category_fk` FOREIGN KEY (`category_id`) REFERENCES `atpcms_categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
			) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci",
		);
	}
}
