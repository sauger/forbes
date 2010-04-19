ALTER TABLE `forbes`.`fb_dynamic_fortune_history` MODIFY COLUMN `fortune` INTEGER UNSIGNED DEFAULT NULL COMMENT '财富数量';
ALTER TABLE `forbes`.`fb_dynamic_fortune_list` MODIFY COLUMN `fortune` INTEGER  DEFAULT NULL COMMENT '财富，单位RMB';

