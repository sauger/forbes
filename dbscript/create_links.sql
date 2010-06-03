CREATE TABLE `forbes`.`fb_links` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) NOT NULL,
  `link` varchar(256) NOT NULL,
  `img_url` varchar(256) DEFAULT NULL,
  `priority` int(11) DEFAULT '100',
  `is_adopt` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
)
COMMENT = '友情链接';
