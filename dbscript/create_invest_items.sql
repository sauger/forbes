CREATE TABLE `forbes`.`fb_invest_items` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `investor_id` integer  NOT NULL COMMENT '投资人ID
',
  `invest_type` varchar(50)  COMMENT '投资类型',
  `invest_industry_id` integer  COMMENT '投资行业',
  `invest_money` varchar(100)  COMMENT '投资金额',
  `invest_company` varchar(256)  COMMENT '投资公司',
  PRIMARY KEY (`id`)
);
