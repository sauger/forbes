ALTER TABLE `forbes`.`fb_news` ADD COLUMN `block_endtime` datetime  COMMENT '从自动更新列表排除结束时间，如果不排除，则插入null' AFTER `set_up`;
