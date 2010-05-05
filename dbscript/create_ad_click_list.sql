CREATE TABLE `forbes_ad`.`fb_ad_click_list` (
  `id` int  NOT NULL AUTO_INCREMENT,
  `ad_id` int  NOT NULL,
  `ad_name` varchar(256)  NOT NULL,
  `channel_id` int  NOT NULL,
  `banner_id` int  NOT NULL,
  `created_at` datetime  NOT NULL,
  `show_page` varchar(300)  COMMENT '展示页面url',
  `remote_ip` varchar(30)  COMMENT '客户端IP',
  PRIMARY KEY (`id`)
)COMMENT = '广告展示记录表';
