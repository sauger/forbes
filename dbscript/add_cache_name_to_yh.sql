ALTER TABLE `forbes`.`fb_yh` ADD COLUMN `cache_name` char(30)  COMMENT '用户登录系统分配的缓存用户名' AFTER `score`,
 ADD INDEX `new_index`(`cache_name`);
