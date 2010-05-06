ALTER TABLE `forbes`.`fb_investor_news` CHANGE COLUMN `investro_id` `investor_id` INTEGER NOT NULL DEFAULT NULL,
 DROP INDEX `new_index1`,
 ADD INDEX `new_index1` USING BTREE(`investor_id`);