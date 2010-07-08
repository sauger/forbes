CREATE TABLE `forbes`.`fb_subject_word` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `title` varchar(256)  NOT NULL,
  `create_at` DATETIME  NOT NULL,
  `is_adopt` integer  NOT NULL DEFAULT 0,
  `text` text  NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
