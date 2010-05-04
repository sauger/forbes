CREATE TABLE `forbes`.`fb_investor_job_history` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `investor_id` integer  NOT NULL COMMENT '投资人ID',
  `post` varchar(100)  COMMENT '职位',
  `duration` varchar(50)  COMMENT '在职时间；如2010-2012',
  `company_name` varchar(256)  COMMENT '公司名称',
  PRIMARY KEY (`id`),
  INDEX `new_index`(`investor_id`)
)
COMMENT = '投资人职业生涯';
