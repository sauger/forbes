ALTER TABLE `forbes`.`fb_news` ADD COLUMN `news_from` integer  NOT NULL COMMENT '文章来源' AFTER `last_status`,
 ADD COLUMN `news_info` text  NOT NULL COMMENT '原因说明' AFTER `news_from`;
