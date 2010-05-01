CREATE TABLE `forbes`.`fb_survey_record` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `source` VARCHAR(255),
  `vote_id` INTEGER UNSIGNED NOT NULL,
  `created_at` DATETIME,
  PRIMARY KEY (`id`)
)
