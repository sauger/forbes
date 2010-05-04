CREATE TABLE `forbes`.`fb_user_score_history` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `user_id` integer  NOT NULL COMMENT '用户ID',
  `score` integer  NOT NULL COMMENT '分数变化，可以为负数',
  `reason` varchar(500)  NOT NULL COMMENT '积分变化原因',
  `created_at` datetime ,
  PRIMARY KEY (`id`)
);
