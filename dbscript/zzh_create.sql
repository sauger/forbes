CREATE TABLE  `forbes`.`zzh_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `fee` varchar(255) DEFAULT NULL,
  `extent` varchar(255) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `is_adopt` int(11) NOT NULL DEFAULT '0',
  `is_old` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8
CREATE TABLE  `forbes`.`zzh_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `investor_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `nick_name` varchar(256) NOT NULL,
  `created_at` datetime NOT NULL,
  `comment` text NOT NULL,
  `reply` text,
  `reply_time` datetime DEFAULT NULL,
  `is_adopt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8
CREATE TABLE  `forbes`.`zzh_member` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `post` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `qq` varchar(45) DEFAULT NULL,
  `msn` varchar(100) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `industry` varchar(255) DEFAULT NULL,
  `item_type` varchar(45) DEFAULT NULL,
  `item_money` varchar(100) DEFAULT NULL,
  `item_description` text,
  `item_url` varchar(100) DEFAULT NULL,
  `item_doc` varchar(45) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_size` varchar(255) DEFAULT NULL,
  `company_created` varchar(100) DEFAULT NULL,
  `company_location` varchar(100) DEFAULT NULL,
  `zip` varchar(45) DEFAULT NULL,
  `capital` varchar(100) DEFAULT NULL,
  `sex` varchar(45) DEFAULT NULL,
  `people_count` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `fax` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_show` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8
CREATE TABLE  `forbes`.`zzh_member_income` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sign_id` int(10) unsigned NOT NULL,
  `year` int(10) unsigned NOT NULL,
  `income` int(10) unsigned NOT NULL,
  `type` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=82 DEFAULT CHARSET=utf8
CREATE TABLE  `forbes`.`zzh_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(11) NOT NULL DEFAULT '100',
  `created_at` datetime NOT NULL,
  `is_adopt` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8
