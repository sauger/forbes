CREATE TABLE `forbes_ad`.`fb_banner` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `name` varchar(256)  NOT NULL COMMENT '广告位名称',
  `description` varchar(500) ,
  `ad_count` int  DEFAULT 0,
  `ad_size` varchar(20)  COMMENT '广告尺寸',
  PRIMARY KEY (`id`),
  INDEX `new_index1`(`name`)
);
