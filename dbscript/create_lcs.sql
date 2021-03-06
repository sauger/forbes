CREATE TABLE  `forbes`.`fb_lcs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(55) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(55) DEFAULT NULL,
  `fix_phone` varchar(55) DEFAULT NULL,
  `phone` varchar(55) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `ccq` varchar(55) DEFAULT NULL COMMENT '所选参赛区',
  `education` varchar(20) DEFAULT NULL,
  `school` varchar(255) DEFAULT NULL,
  `specialty` varchar(55) DEFAULT NULL COMMENT '专业',
  `school_info` text COMMENT '本科学历的毕业院校为表格',
  `certificate` varchar(500) DEFAULT NULL COMMENT '资格或认证',
  `work_place` varchar(255) DEFAULT NULL,
  `work_year` int(11) DEFAULT NULL COMMENT '工作年限',
  `money_year` int(11) DEFAULT NULL COMMENT '理财年限',
  `role` varchar(255) DEFAULT NULL,
  `time_dealing` varchar(255) DEFAULT NULL COMMENT '客户关系管理与专业理财服务的时间分配',
  `experience` text COMMENT '理财工作心得',
  `information_references` text COMMENT '信息证明人表格',
  `money_time` varchar(255) DEFAULT NULL COMMENT '您用于各理财领域的时间为',
  `award` text COMMENT '奖励',
  `punish` text COMMENT '处罚',
  `ssjg` varchar(255) DEFAULT NULL COMMENT '理财师所属机构',
  `work_space` varchar(255) DEFAULT NULL COMMENT '您目前所在的工作单位请明确到n（部门、网点、职务） 	',
  `work_mode` text COMMENT '请简单列举您在实际工作中常用的开发和维护客户关系的方式  	',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8
