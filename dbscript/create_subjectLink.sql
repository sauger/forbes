CREATE TABLE `forbes`.`fb_subject_link` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `href` varchar(256)  NOT NULL,
  `target` varchar(50)  NOT NULL DEFAULT '_self',
  `module_id` integer  NOT NULL,
  `priority` integer  NOT NULL DEFAULT 100,
  `title` varchar(256)  NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
