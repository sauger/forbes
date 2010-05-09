CREATE DATABASE IF NOT EXISTS forbes_email;
CREATE TABLE `forbes_email`.`fb_email` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `to` VARCHAR(256),
  `from` VARCHAR(256),
  `subject` VARCHAR(256),
  `content` TEXT,
  `status` INTEGER UNSIGNED,
  PRIMARY KEY (`id`)
)