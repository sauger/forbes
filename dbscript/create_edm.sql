CREATE TABLE `forbes`.`fb_edm` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(256) ,
  `edm_type` varchar(20)  COMMENT 'custom,recommend',
  `file_name` varchar(256) ,
  `created_at` datetime ,
  PRIMARY KEY (`id`)
);
