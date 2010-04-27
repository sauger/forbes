CREATE TABLE `forbes`.`fb_investor` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256)  NOT NULL COMMENT '投资人名字',
  `company` varchar(256)  COMMENT '所在公司',
  `post` varchar(256)  COMMENT '职务',
  `invest_zone` varchar(256)  COMMENT '投资方向,即行业，多个行业间使用|分割',
  `image` varchar(256)  COMMENT '投资人图片',
  `chinese_name` varchar(10)  NOT NULL COMMENT '投资人首字母',
  `description` varchar(256)  COMMENT '投资人简介',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`name`),
  INDEX `new_index1`(`chinese_name`)
);
