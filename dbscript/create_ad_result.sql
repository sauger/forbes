CREATE TABLE `forbes_ad`.`fb_ad_result` (
  `id` INTEGER UNSIGNED NOT NULL,
  `source_id` INTEGER UNSIGNED,
  `type` VARCHAR(20),
  `date_time` DATETIME,
  `count` INTEGER UNSIGNED DEFAULT 0,
  PRIMARY KEY (`id`)
)