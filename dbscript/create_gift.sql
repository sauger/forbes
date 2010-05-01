CREATE TABLE `forbes`.`fb_gift` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256)  NOT NULL COMMENT '礼品名称',
  `description` varchar(500)  COMMENT '描述',
  `total_count` integer  DEFAULT 0 COMMENT '总数量',
  `remain_count` integer  COMMENT '剩余数量',
  `start_time` datetime  COMMENT '开始日期',
  `end_time` datetime  COMMENT '结束日期',
  `image` varchar(256)  COMMENT '图片地址',
  PRIMARY KEY (`id`)
);
