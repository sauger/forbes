ALTER TABLE `forbes`.`fb_user` ADD COLUMN `image_src2` VARCHAR(255) COMMENT '大图' AFTER `chinese_name`,
 ADD COLUMN `image_src3` VARCHAR(255) COMMENT '小图' AFTER `image_src2`;