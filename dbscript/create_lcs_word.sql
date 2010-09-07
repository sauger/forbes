CREATE TABLE `forbes`.`lcs_word` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `created_at` DATETIME  NOT NULL,
  `ip` varchar(255)  NOT NULL,
  `url` varchar(255)  NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
