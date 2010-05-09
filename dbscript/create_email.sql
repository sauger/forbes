CREATE DATABASE IF NOT EXISTS forbes_email;
CREATE TABLE `forbes_email`.`fb_email` (
  `id` INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  `email_to` VARCHAR(256),
  `email_from` VARCHAR(256),
  `email_subject` VARCHAR(256),
  `email_content` TEXT,
  `email_status` INTEGER UNSIGNED,
  PRIMARY KEY (`id`)
)