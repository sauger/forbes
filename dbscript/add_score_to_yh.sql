ALTER TABLE `forbes`.`fb_yh` ADD COLUMN `score` integer  DEFAULT 0 COMMENT '用户积分' AFTER `authenticate_string`
, ROW_FORMAT = DYNAMIC;
