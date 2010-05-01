CREATE TABLE `forbes`.`fb_invest_industry` (
  `id` integer  NOT NULL AUTO_INCREMENT,
  `name` varchar(100)  NOT NULL,
  `investor_count` integer  DEFAULT 0,
  PRIMARY KEY (`id`),
  INDEX `new_index`(`name`)
);
insert into fb_invest_industry (name) values
('互联网')
,('电信及增值')
,('IT')
,('传媒娱乐')
,('医疗健康')
,('能源')
,('金融')
,('教育行业')
,('连锁经营')
,('汽车行业')
,('制造业')
,('房地产')
,('家居建材')
,('物流')
,('食品饮料')
,('农林牧渔')
,('旅游业')
,('化学工业')
,('研究咨询')
,('投资行业');

