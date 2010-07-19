ALTER TABLE `forbes`.`fb_news` ADD COLUMN `copy_from` int  DEFAULT 0 COMMENT '复制新闻ID' AFTER `block_endtime`;
