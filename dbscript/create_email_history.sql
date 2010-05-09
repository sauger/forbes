CREATE TABLE  `forbes_email`.`fb_email_history` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email_to` varchar(256) DEFAULT NULL,
  `email_from` varchar(256) DEFAULT NULL,
  `email_subject` varchar(256) DEFAULT NULL,
  `email_content` text,
  `email_status` varchar(50) DEFAULT 'success',
  `email_status` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
)
