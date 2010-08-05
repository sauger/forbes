CREATE TABLE `forbes`.`fb_lcs_data` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `lcs_id` integer  NOT NULL,
  `khrs` varchar(55)  NOT NULL COMMENT '客户人数',
  `nmzj` varchar(255)  NOT NULL COMMENT '年末在您名下或直接管理和维护的',
  `npjzc` varchar(255)  NOT NULL COMMENT '年平均管理资产总量',
  `nmzc` varchar(255)  NOT NULL COMMENT '年末在管资产存量市值',
  `nxc` varchar(255)  NOT NULL COMMENT '年金融产品销售量',
  `qncp` varchar(255)  NOT NULL COMMENT '全年金融产品',
  `qnbd` varchar(255)  NOT NULL COMMENT '全年保单销售量',
  `dggm` varchar(255)  NOT NULL COMMENT '单个客户的平均资产规模',
  `nmgm` varchar(255)  NOT NULL COMMENT '年末在管理单一客户的平均资产规模',
  `pjgm` varchar(255)  NOT NULL COMMENT '年末在管前10大客户的平均资产规模',
  `year` integer  NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE = MyISAM;

