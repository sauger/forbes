CREATE TABLE  `forbes_ad`.`fb_ad_result` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `source_id` int(10) unsigned DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `date_time` char(10) DEFAULT NULL,
  `count` int(10) unsigned DEFAULT '0',
  `ad_name` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uni` (`source_id`,`type`,`date_time`)
)