ALTER TABLE `fb_magazine` ADD COLUMN `url` VARCHAR(100) COMMENT '电子版链接' AFTER `short_title`,
 ADD COLUMN `img_src3` VARCHAR(256) COMMENT '首页图片' AFTER `url`;