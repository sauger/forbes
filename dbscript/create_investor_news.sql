CREATE TABLE `forbes`.`fb_investor_news` (
  `investro_id` integer  NOT NULL,
  `news_id` integer  NOT NULL,
  INDEX `new_index`(`news_id`),
  INDEX `new_index1`(`investro_id`)
);
