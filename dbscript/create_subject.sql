CREATE TABLE  `forbes`.`fb_subject` (
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `identity` varchar(255) DEFAULT NULL,
  `templet_name` varchar(255) DEFAULT NULL,
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE  `forbes`.`fb_subject_category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT '100',
  `name` varchar(255) DEFAULT NULL,
  `category_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`subject_id`)
);

CREATE TABLE  `forbes`.`fb_subject_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `category_type` varchar(45) DEFAULT NULL,
  `resource_id` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT '100',
  `is_adopt` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `Index_2` (`subject_id`,`category_id`),
  KEY `Index_3` (`category_type`,`resource_id`)
);
CREATE TABLE  `forbes`.`fb_subject_modules` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `subject_id` int(10) unsigned DEFAULT NULL,
  `pos_name` varchar(255) DEFAULT NULL,
  `category_type` varchar(45) DEFAULT NULL,
  `category_id` int(10) unsigned DEFAULT NULL,
  `width` int(10) unsigned DEFAULT NULL,
  `height` int(10) unsigned DEFAULT NULL,
  `element_width` int(10) unsigned DEFAULT NULL,
  `element_height` int(10) unsigned DEFAULT NULL,
  `scroll_type` int(10) unsigned DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `record_limit` int(10) unsigned DEFAULT NULL,
  `priority` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `Index_2` (`subject_id`),
  KEY `Index_3` (`category_type`,`category_id`)
);

