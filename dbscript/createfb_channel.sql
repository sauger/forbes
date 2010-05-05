create database  IF NOT EXISTS forbes_ad;
CREATE TABLE `forbes_ad`.`fb_channel` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256)  COMMENT '频道名称',
  `parttern` varchar(20)  COMMENT 'url一级目录',
  `comment` varchar(500)  COMMENT '注释',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`parttern`)
);
