CREATE TABLE `forbes`.`fb_list_head` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `list_id` int  NOT NULL,
  `from_field` int ,
  `end_field` int ,
  `name` varchar(256) ,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;
