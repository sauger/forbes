ALTER TABLE `forbes`.`fb_news` ADD COLUMN `news_status` integer  NOT NULL COMMENT '所属流程' AFTER `from_magazine`,
 ADD COLUMN `user` varchar(64)  NOT NULL COMMENT '当前使用者' AFTER `news_status`,
 ADD COLUMN `last_user` varchar(64)  NOT NULL COMMENT '上一使用者' AFTER `user`,
 ADD COLUMN `last_status` integer  NOT NULL COMMENT '上一流程' AFTER `last_user`;
