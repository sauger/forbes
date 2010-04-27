CREATE TABLE `forbes`.`fb_investor_news` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `investor_id` INTEGER UNSIGNED NOT NULL,
  `news_id` INTEGER UNSIGNED NOT NULL,
   INDEX `new_index`(`news_id`),
  INDEX `new_index1`(`investor_id`),
  PRIMARY KEY (`id`)
)