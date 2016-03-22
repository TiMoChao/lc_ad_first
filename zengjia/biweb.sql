/*
 Navicat MySQL Data Transfer

 Source Server         : mydata
 Source Server Version : 50527
 Source Host           : 127.0.0.1
 Source Database       : biweb

 Target Server Version : 50527
 File Encoding         : utf-8

 Date: 03/21/2016 16:44:35 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `biweb_ads`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_ads`;
CREATE TABLE `biweb_ads` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` tinyint(2) unsigned NOT NULL,
  `type_id` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `structon_tb` text,
  `submit_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deadline_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `height` int(10) NOT NULL DEFAULT '0',
  `width` int(10) NOT NULL DEFAULT '0',
  `flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示位置',
  `pass` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COMMENT='图形广告表';

-- ----------------------------
--  Records of `biweb_ads`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_ads` VALUES ('13', '4', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/13_1431655597.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 10:06:37', '2016-05-15 10:06:37', '60', '235', '1', '1'), ('6', '1', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/6_1431593021.swf\',\n  \'FileExt\' => \'.swf\',\n)', '2015-05-14 16:43:41', '2016-05-14 16:43:41', '100', '450', '1', '1'), ('14', '4', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/14_1431655617.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 10:06:57', '2016-05-15 10:06:57', '60', '235', '1', '1'), ('21', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/21_1431666448.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-15 13:07:28', '2016-05-15 13:07:28', '55', '154', '1', '1'), ('19', '4', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/19_1431671864.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 10:59:12', '2016-05-15 10:59:12', '60', '235', '1', '1'), ('20', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/20_1431661212.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-15 11:40:12', '2016-05-15 11:40:12', '55', '154', '1', '1'), ('22', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/22_1431666762.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-15 13:12:42', '2016-05-15 13:12:42', '55', '154', '1', '1'), ('23', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/23_1431667026.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-15 13:17:06', '2016-05-15 13:17:06', '55', '154', '1', '1'), ('24', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/24_1431667079.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:17:59', '2016-05-15 13:17:59', '55', '154', '1', '1'), ('25', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/25_1431667110.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-15 13:18:30', '2016-05-15 13:18:30', '55', '154', '1', '1'), ('26', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/26_1431667170.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-15 13:19:30', '2016-05-15 13:19:30', '55', '154', '1', '1'), ('27', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/27_1431667205.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:19:46', '2016-05-15 13:19:46', '55', '154', '1', '1'), ('28', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/28_1431667254.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:20:54', '2016-05-15 13:20:54', '55', '154', '1', '1'), ('29', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/29_1431667280.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:21:20', '2016-05-15 13:21:20', '55', '154', '1', '1'), ('30', '2', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/30_1431671800.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:27:28', '2016-05-15 13:27:28', '79', '960', '1', '1'), ('31', '2', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/31_1431671778.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:28:20', '2016-05-15 13:28:20', '79', '960', '1', '1'), ('32', '3', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/32_1431671754.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:28:47', '2016-05-15 13:28:47', '79', '960', '1', '1'), ('33', '2', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'longLogo_list1\\\'>	\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/33_1431671731.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 13:31:23', '2016-05-15 13:31:23', '79', '960', '1', '1'), ('34', '3', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/34_1431671711.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 14:28:26', '2016-05-15 14:28:26', '79', '960', '1', '1'), ('35', '3', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'longLogo_list2\\\'>	\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/35_1431671693.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-15 14:29:46', '2016-05-15 14:29:46', '79', '960', '1', '1'), ('36', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/36_1432092182.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-20 11:23:02', '2016-05-20 11:23:02', '55', '154', '1', '1'), ('37', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/37_1432092415.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-20 11:26:15', '2016-05-20 11:26:15', '55', '154', '1', '1'), ('38', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.wochacha.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/38_1432092474.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-05-20 11:27:54', '2016-05-20 11:27:54', '55', '154', '1', '1'), ('39', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.wochacha.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/39_1432092511.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-20 11:28:31', '2016-05-20 11:28:31', '55', '154', '1', '1'), ('40', '5', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.wochacha.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'<div class=\\\'v4_ad\\\'>\',\n  \'b_html\' => \'</div>\',\n  \'UploadFile\' => \'1/40_1432092551.gif\',\n  \'FileExt\' => \'.gif\',\n)', '2015-05-20 11:29:11', '2016-05-20 11:29:11', '55', '154', '1', '1'), ('43', '6', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.wochacha.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/43_1433127224.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-06-01 02:53:44', '2016-06-01 02:53:44', '350', '145', '1', '1'), ('44', '7', '0', '0', 'array (\n  \'webname\' => \'测试1\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'\',\n  \'f_html\' => \'\',\n  \'b_html\' => \'\',\n  \'UploadFile\' => \'1/44_1433127264.jpg\',\n  \'FileExt\' => \'.jpg\',\n)', '2015-06-01 02:54:24', '2016-06-01 02:54:24', '350', '140', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_archives`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_archives`;
CREATE TABLE `biweb_archives` (
  `id` varchar(30) NOT NULL DEFAULT '',
  `structon_tb` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='单页栏目表';

-- ----------------------------
--  Table structure for `biweb_ask`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_ask`;
CREATE TABLE `biweb_ask` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `user_name` varchar(100) DEFAULT NULL,
  `zone` varchar(100) DEFAULT NULL,
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `is_answer` tinyint(1) DEFAULT '0',
  `replytimes` mediumint(10) unsigned DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='问题答疑表';

-- ----------------------------
--  Table structure for `biweb_car_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_car_ad`;
CREATE TABLE `biweb_car_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_car_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_car_ad` VALUES ('24', '2', '', '1', '无', '0', '发展的的中国', 'b476b8008722c9ec90f54a0af67383ac', '', '非常法规和对方喜欢', '', '', '', '', 'array (\n  \'intro\' => \'非常法规和对方喜欢\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/24_1433466707.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/24_1433466707.jpg', '2015-06-05 01:11:47', '0', '0', '0', '1', '1', '个钟刚性兑付', '在德国政府和发展', '战斗中', '4阿尔特殊', '各项法规', '5246346', '432532', '35亲543', '个地方工作的话', '才幸福和谐的复合型', '真的规范化', '政府和发挥', '多贵'), ('22', '1', ':1:', '1', '出租车 后窗 玻璃 广告', '0', '出租车后窗玻璃广告', '9e7eb728b9b580c8ff6350baf025461e', '', '根据客户广告画面要求设计，在出租车后挡风玻璃贴画。 媒体特点： 1、高覆盖率  出租车运营路线不固定，多出入各大商业区、商务金融区、人群居住区、机场、车站等地区，出行、居家、公务、购物均有机会接触到高', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>根据客户广告画面要求设计，在出租车后挡风玻璃贴画。 媒体特点： 1、高覆盖率  出租车运营路线不固定，多出入各大商业区、商务金融区、人群居住区、机场、车站等地区，出行、居家、公务、购物均有机会接触到高频次的广告冲击。  2、高到达率 据权威调查结果显示，车身广告是户外广告中到达率最高的媒体。  因此出租车广告将成为都市中倍受关注的媒体。强迫乘客强制性接受广告信息，有效到达率极高，大大加强广告受众对产品及品牌的认知程。 3、高强制性  出租车广告不像报纸杂志,电视媒体低强制性，使所宣传的产品独占时空，在受众群体视线无法回避时建立和加深企业、产品品牌形象。 4、高重复率  全天24小时不间断重复，每月每辆车近600小时的有效宣传时间。 5、有效接触率  直接受众人群：出租车后方的人或车上的人将成为接触广告信息频率最高的人。 间接受众人群：当地常住人口，外地游客及商务人员，行驶路段内流动人群。  6、高流动性  出租车流动性大，不受区域限制，可以穿梭于城镇的每一个角落，其影响之深，范围之广，受众面之大，不受时间、线路限制，可携广告能随时随地向广大群众传递 信息，是其他广告所无可比拟的。</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/22_1433430207.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/22_1433430207.jpg', '2015-06-04 15:03:26', '0', '0', '0', '5', '1', '出租车广告', '上海全市', '150元/台/月', '50台', '6个月', '18243173001', '10', '120*40cm', '阳光照明', '上海市全区域', '茂名市中泰科技有限公司，位于茂名市迎宾三路189号新时代花园A座11楼，目前在职员工30多人，是以移动新媒体（车载LED显示屏广告信息发布）为支柱新兴媒体企业。目前致力于集中发布式移动多媒体系统的开发以及营运，针对城市出租车、公交车、客运班车、教练车等载体，进行开发的移动新媒体业务拓展。同时策划主办大型展会及单位企业庆典活动等项目。 独家取得茂名市出租车广告投放经营权 中泰传媒公司与茂名市交通运输集团有限公司（丰田花冠100台）、茂名石化交运实业有限公司（比亚迪100台）、茂名市神马货运有限公司（丰田花冠100台）和茂名市出租汽车有限公司（捷达100台）四家出租车中标经营公司签约广告投放独家经营协议。', '上海市中泰科技有限公司', '待售'), ('23', '2', ':2:', '1', '中巴 车身 广告', '0', '中巴车身广告', '5f7f884e103658b37ceddf53ecfea661', '', '车身广告，望文生义，是一种将车身作为印刷媒体的广告情势，其特色是繁捷、从题光鲜。     车身广告的传播方式是主动出现在受众的视野之中，在传播方式上最为“积极、主动”。从人的注意力角度讲，移动的物体总', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<div class=\"detail_content_item\">车身广告，望文生义，是一种将车身作为印刷媒体的广告情势，其特色是繁捷、从题光鲜。     车身广告的传播方式是主动出现在受众的视野之中，在传播方式上最为“积极、主动”。从人的注意力角度讲，移动的物体总是比较能被注意到，因此，唯一可以移动的车身广告同样也更能在众多户外媒体中脱颖而出，得到更多的注意，实现高到达率 。</div>\',\n)', '', '2015-06-04 15:10:48', '0', '0', '0', '0', '1', '客运车广告', '上海市区', '60000元/台/年', '没有描述', '没有描述', '0852-4623540', '100', '没有描述', '阳光照明', '车体左右两侧喷制', '上海市公交广告公司于1997年8月28日在光华南路５９号大院注册成立，（行政区号440903，邮政编码525000）,公司成立之初主要经营候车亭广告，装璜，灯箱，招牌制作，设计，五金交电，装修材料，销售，注册员工人数为5人，注册资本50万元人民币。', '上海市公交广告公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_car_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_car_ad_type`;
CREATE TABLE `biweb_car_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='车体广告分类表';

-- ----------------------------
--  Table structure for `biweb_community_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_community_ad`;
CREATE TABLE `biweb_community_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_community_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_community_ad` VALUES ('23', '1', ':1:', '1', '星星 小区 电梯 广告', '0', '星星小区电梯广告', '360152975e15d386b548a712c5626313', '', '上海市市各高档小区电梯', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>上海市市各高档小区电梯</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/23_1433431721.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/23_1433431721.jpg', '2015-06-04 15:28:41', '0', '0', '0', '0', '1', '电梯广告', '上海市浦东新区', '电话咨询', '20', '6个月', '18243173001', '0.2', '45X60cm', '24小时灯光', '上海市各高档小区电梯', '上海市博艺广告有限公司专业的茂名活动品牌策划广告公司,提供广告制作、平面设计、活动策划、户外广告、招牌制作、网站建设、器材物料出租,音响器材租赁等服务，博采众艺,传播精彩。全国统一业务咨询电话：0668-2893388', '上海市博艺广告有限公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_community_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_community_ad_type`;
CREATE TABLE `biweb_community_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='小区广告分类表';

-- ----------------------------
--  Table structure for `biweb_company`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_company`;
CREATE TABLE `biweb_company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `province` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `company_md5` char(32) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='企业黄页表';

-- ----------------------------
--  Table structure for `biweb_exhibition`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_exhibition`;
CREATE TABLE `biweb_exhibition` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `province` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='会展信息表';

-- ----------------------------
--  Table structure for `biweb_job`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_job`;
CREATE TABLE `biweb_job` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='招聘信息表';

-- ----------------------------
--  Table structure for `biweb_links`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_links`;
CREATE TABLE `biweb_links` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  `structon_tb` text,
  `submit_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `picflag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '图片链接',
  `flag` tinyint(1) NOT NULL DEFAULT '1' COMMENT '显示位置',
  `pass` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `biweb_links`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_links` VALUES ('1', '1', '1', 'array (\n  \'webname\' => \'百度\',\n  \'webhost\' => \'http://www.baidu.com\',\n  \'summary\' => \'全世界最大的中文搜索引擎网站\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'UploadFile\' => \'\',\n)', '2009-08-29 15:47:34', '1', '1', '1'), ('2', '1', '1', 'array (\n  \'webname\' => \'我查查\',\n  \'webhost\' => \'http://www.wochacha.com\',\n  \'summary\' => \'我查查信息技术有限公司\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'UploadFile\' => \'\',\n)', '2009-08-29 16:06:12', '1', '1', '1'), ('3', '1', '1', 'array (\n  \'webname\' => \'李奥贝纳\',\n  \'webhost\' => \'http://www.leoburnett.com/\',\n  \'summary\' => \'\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'UploadFile\' => \'\',\n)', '2015-05-20 17:10:53', '1', '1', '1'), ('4', '1', '1', 'array (\n  \'webname\' => \'智威汤逊\',\n  \'webhost\' => \'http://www.jwt.com/\',\n  \'summary\' => \'\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n)', '2015-05-20 17:11:12', '1', '1', '1'), ('5', '1', '1', 'array (\n  \'webname\' => \'灵智\',\n  \'webhost\' => \'http://www.eurorscg.com/\',\n  \'summary\' => \'\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n)', '2015-05-20 17:11:30', '1', '1', '1'), ('6', '1', '1', 'array (\n  \'webname\' => \'台湾国华\',\n  \'webhost\' => \'http://www.kuohua-ad.com.tw/\',\n  \'summary\' => \'\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n)', '2015-05-20 17:13:19', '1', '1', '1'), ('7', '1', '1', 'array (\n  \'webname\' => \'电通\',\n  \'webhost\' => \'http://www.dentsu.com/\',\n  \'summary\' => \'\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n)', '2015-05-20 17:13:42', '1', '1', '1'), ('8', '1', '1', 'array (\n  \'webname\' => \'博报堂\',\n  \'webhost\' => \'http://www.hakuhodo.co.jp/\',\n  \'summary\' => \'\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'UploadFile\' => \'\',\n)', '2008-05-20 17:14:41', '1', '1', '1'), ('9', '1', '1', 'array (\n  \'webname\' => \'电杨伟门\',\n  \'webhost\' => \'http://www.wunderman.com/\',\n  \'summary\' => \'\',\n  \'weblogo\' => \'\',\n  \'width\' => \'\',\n  \'height\' => \'\',\n  \'UploadFile\' => \'\',\n)', '2012-05-20 17:15:04', '1', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_multimedia_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_multimedia_ad`;
CREATE TABLE `biweb_multimedia_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_multimedia_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_multimedia_ad` VALUES ('23', '1', ':1:', '1', '户外 短片 广告', '0', '户外短片广告', '514671e702a68efa92e4c30e5211d9ab', '', '低价高效的市场利器——世纪商务短信广告世纪商务短信平台，可为有大量短信发送需求的集团企业、证券公司、咨询公司、超市、酒店、KTV、百货、美容、房 地产企业、航空公司、税务局、政务窗口行业、个人等企事业', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>低价高效的市场利器——世纪商务短信广告世纪商务短信平台，可为有大量短信发送需求的集团企业、证券公司、咨询公司、超市、酒店、KTV、百货、美容、房 地产企业、航空公司、税务局、政务窗口行业、个人等企事业单位开展代发短信业务，可给急于开拓新客户的新企业，用短信作为客户服务工具的成熟型企业提供服 务。        它是一种全新的媒体传播形式，即时发送，一瞬间万人传播！它的接收者是最具消费力一族！它是商家一对一营销诉求的最佳方式！精确锁定消费者，100%阅读 率！它的发布时间更灵活！任意时间都可即时发送！它是全新直投式广告媒体弥补传统几大媒体的空白，短信广告对客户而言，是一种富于创意的全新直投式广告形 式，很具经济效益，省钱、省力!被称为第五广告媒体，相对于其他传统广告，短信广告具有以下特点与优势：1、速度快：全新的媒体传播形式，时尚、新颖！一 秒钟即时发送，一瞬间万人传播！2、形式活：短信广告发布时间极具灵活性，广告主可根据产品特点弹性选择广告投放时间，甚至具体到某个时间段内发布，随时 随地，想发就发！分分钟发送，一发送即马上到位。      3、回报高：它的接收者是最具消费力一族、且同一产品可根据不同的接收对象轻松传递不同的广告信息，以求最大程度提升客户的购买欲。       4、目标准：它是商家“一对一”营销诉求的最佳方式！精确锁定消费者，100%阅读率！短信广告具有极强的传播性，接收者可将信息随身保存，随时咨询广告 主，需要时可反复阅读，并可随时发送给感兴趣的朋友.       5、投资省：它是您自己可以定额预算的媒体工具！广告主定好自己的支出预算，定向定条发送给目标客户，百元、千元、万元，随心所欲。其费用是传统媒体的百 分之一，可以为您省下大笔的广告宣传费用.      6、瞬时轰动效应强：它具有其它任何一个广告媒体无法比拟的瞬时轰动效果！其效果是传统媒体的一百倍。 A、媒体到达率对比： TV1/24收音机1/18报纸1/40（日为单位）移动短信1/1      B、媒体关注率对比</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/23_1433432288.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/23_1433432288.jpg', '2015-06-04 15:38:08', '0', '0', '0', '0', '1', '短信群发广告', '上海市区', '面议', '1', '1', '18243173001', '10', '没有描述', '没有描述', '没有描述', '创世纪广告是一家年轻而充满激情和活力的新一代综合性广告公司，先后成功策划执行了茂名大型集体婚礼、荔枝小姐大赛、汽车文化节、汽车博览会及房产家居博览会等极具影响力的大型活动，并于2012年4月成功策划执行了广东茂名滨海新区推介会及广东茂名滨海新区成立大会暨重大项目开工仪式。现公司已积累了两百多场大型活动经验，引领并推动了茂名户外广告活动的发展，成为了茂名地区广告行业的领跑者！ 公司于2011年被评为广东省一级广告企业，现拥有一幢专属办公大楼，一千多平方米制作工场，六十多名员工，分设策划部、商务部、大客户部、设计部、工程部、视频网络部、行政部、财务部、喷画部等九大部门以及电白、湛江两间分公司，龙威汇聚了一大批广告行业精英，他们以全新的视角，敏锐的市场触觉，紧贴本土市场经济脉搏，为广大客户提供全方位、多领域的广告一条龙服务。 一直以来，公司立足本土，专注策划，不断突破传统思维模式，成功开发了茂名地区发行量最大的平面DM媒体——创世纪广告•DM，茂名地区会员最多、加盟商家最齐全的优惠卡——世纪金卡，以及茂名消费网、世纪商务短信平台四大自主强势媒介，打造宣传极度强势，创造无限可能！ 经过多年发展，公司已集大型活动策划、房地产营销、庆典晚会、品牌推广、影视传播、设计制作、专业印刷、网站建设、短信群发、DM报纸十大业务板块于一身，我们将始终坚持领先的国际标准，抱着诚恳负责的态度，以极具实效的、精准的策略，富有销售力的广告创意，帮助更多的客户在激烈的市场竞争中抢占商机，成就卓越。', '创世纪广告有限公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_multimedia_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_multimedia_ad_type`;
CREATE TABLE `biweb_multimedia_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='多媒体分类表';

-- ----------------------------
--  Table structure for `biweb_news`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_news`;
CREATE TABLE `biweb_news` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行业资讯表';

-- ----------------------------
--  Table structure for `biweb_news_law`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_news_law`;
CREATE TABLE `biweb_news_law` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_news_law`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_news_law` VALUES ('22', '1', ':1:', '1', '不动产 法规 出台 为了 税收 为了 反腐', '1', '不动产法规出台，为了税收？为了反腐？', '606e98217886cc697ca79a1e554be103', '', '&#160;&#160;&#160;&#160;&#160; 昨天（12月22日），国务院公布了《不动产 登记暂行条例》，并决定从明年3月1日起实施。这虽然是一个行政性法规，但由于其牵涉到几乎所有中国', '', '310000', '310100', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'author\' => \'罗超\',\n  \'intro\' => \'<div class=\"content\">\r\n<p style=\"background-color: rgb(255, 255, 255); text-indent: 0px; color: rgb(0, 0, 0); text-align: left;\"><span><span class=\"Apple-converted-space\">&#160;</span>&#160;&#160;&#160;&#160; 昨天（12月22日），国务院公布了《不动产 登记暂行条例》，并决定从明年3月1日起实施。这虽然是一个行政性法规，但由于其牵涉到几乎所有中国人的切身利益，因此引起了人们的高度关注。其实，有关 制订不动产登记法规、建立不动产登记制度的要求，在7年前出台的《物权法》中已有规定，并将其视为《物权法》的一个配套文件。但是，由于种种原因的存在， 这个本应与《物权法》同时出台的法规延宕了7年之久，直至今日才终于落地。</span></p>\r\n<p style=\"background-color:#ffffff;text-indent:0px;color:#000000;\"><span>&#160;&#160;&#160;  在这7年里，我国的社会经济出现了很大的发展和变化，有关不动产登记条例的制定也被寄予了很多期待，其中最为集中的便是认为这一条例具有能够推进税收和反 腐的功能，而这两项内容在民间却出现了截然相反的态度，对于条例可能带来的推进税收功能，反对的声音居多，而对于其产生的反腐功能，民间则一片叫好声。</span></p>\r\n<p style=\"background-color:#ffffff;text-indent:0px;color:#000000;\"><span>&#160;&#160;&#160;  其实，从本质上说，《不动产登记暂行条例》是一项基础性的制度建设，至于政府收税和反腐，那是要通过另外的途径才能完成的，将希望寄托在这样一项制度上， 带来的只能是市场秩序的混乱，增加不动产登记制度落地的阻力。不动产登记条例之所以会陷入长期难产的困局，确实存在着这方面的因素。如果说《不动产登记暂 行条例》此次能够出台，就是为了实现这两个目标，那应该是不符合事实的，但这项条例的出台，又确实能够在一定程度上起到这样的作用。</span></p>\r\n<p style=\"background-color:#ffffff;text-indent:0px;color:#000000;\"><span>&#160;&#160;&#160;  先看税收。十八届三中全会已经明确要在未来开征房地产税。房地产税在前几年的房地产调控中产生了很大争议，其时名为房产税，并已在重庆上海两地试点至今。 对于房地产税和房产税的区别，征收房地产税或房产税所产生的争议，都不在本文讨论之列，但它既然已经成为执政党的部署，那就意味着它已不可逆转。三中全会 制订的全面深化改革决定部署了一系列到2020年要完成的改革计划，开征房地产税也在其中，这也意味着房地产税将在未来6年内成为事实。但是，开征房地产 税的一个前提条件是必须建立不动产登记制度，目前重庆上海两地的试点之所以不能算成功，关键就在于这项制度的缺失，使税收当局无从掌握这项税收的基源，只 能依靠纳税人的自我申报，如果未来房地产税开征后仍然是这样的局面，那一个可以想见的事实便是偷逃此项税收将成为普遍现象，这一改革计划也就落空了。因 此，《条例》的出台为开征房地产税提供了基础性条件，这个判断是可以成立的。</span></p>\r\n<p style=\"background-color:#ffffff;text-indent:0px;color:#000000;\"><span>&#160;&#160;&#160;  但是，现在民间之所以对征收房地产税反对意见居多，关键在于目前的房价已经很高，而造成现象的原因就在于目前的商品房从征地到销售的过程中，政府已经通过 各个环节税费的征收获得了大量的收益，据统计这方面的费用在房价构成中可以高达三分之二。如果这种情况不改变，再征收房地产税，只会造成居民更沉重的住房 支出。因此，开征房地产税的前提条件，除了必须建立不动产登记制度，将应税对象通过登记全盘掌握以外，更需要对现存的城市土地供应制度进行改革，对现存的 商品房税费项目进行大幅度的削砍，减轻居民的住房支出，为房地产税开征建立起较好的民意基础。</span></p>\r\n<p style=\"background-color:#ffffff;text-indent:0px;color:#000000;\"><span>&#160;&#160;&#160;  再看反腐。我国出现的严重腐败已经渗透于社会各个环节，对社会经济的运行造成了极大的破坏。从已经揭露的诸多腐败案例来看，房地产领域已经成为腐败的重灾 区，一些贪腐官员拥有的高档楼盘的数量，已经让普通民众无法想像。因此，民众迫切希望随着不动产登记制度的出现，建立起“以房查人”的制度，让腐败分子难 以遁形。问题在于，“以房查人”并不是一个严谨的法律术语，因此它并未进入《条例》，但在不动产登记制度建立以后，房屋确实可以成为有关部门检查不合法财 产的一个线索。</span></p>\r\n<p style=\"background-color:#ffffff;text-indent:0px;color:#000000;\"><span>&#160;&#160;&#160;  值得注意的是，《条例》明确要求建立信息共享机制，国土资源、公安、民政、财政、税务、工商、金融、审计、统计等部门的不动产登记信息可以互通共享，这实 际上为有关部门通过“以房查人”来查处腐败建立了法律空间，而这种规定与目前有关法律授予相关部门查银行存款的权力在法理逻辑上是一致的。这种检查必须由 国家机关来进行，不可能成为每一个公民的私权，银行存款是这样，房地产当然也是这样。至于个人的查房权利，《条例》严格限制在权利人和利害关系人的范围之 内，这是执法机关在诸如民间债务纠纷、离婚财产分配纠纷中对相关人员的一种法律援助，而不能简单地理解为一种人人都可以进行的“以房查人”。如果将这种 “以房查人”制度授予权利人和利害关系人之外，任何一个人都可以查处他人的房产，那么一个可以想见的情景是，每一个人普通公民都将处于个人隐私完全暴露的 不安全状态。也许这种类似网上“人肉搜索”的“以房查人”确实能够挖出一两个涉房腐败分子，但社会将为此付出沉重代价。</span></p>\r\n<p style=\"background-color:#ffffff;text-indent:0px;color:#000000;\"><span>&#160;&#160;&#160;  《不动产登记暂行条例》的出台，是我国市场经济改革中一项重要的基础制度建设，它的最为重要的功能是通过登记使我国的不动产保有、交易以及政府管理走上有 法可依的法治轨道，对公民的合法财产将起到重要的保护作用。至于为房地产税征收和反腐提供便捷通道，只是它所产生的一种衍生功能。其实，我国目前的税收和 腐败之所以引起民众的不满，一个很重要的原因就在于法制的不健全，政府可以在不经人大同意或授权的情况下随意征税或者收费，官员财产公开制度也因为法律的 缺失而难以成为现实。因此，《条例》的出台也可视为有利于税收和反腐这两个层面的工作走上法治化的轨道。</span></p>\r\n</div>\',\n)', '', '2015-05-19 16:41:40', '0', '0', '0', '7', '1', '', '', '', '', '', '', '', '', '', '', '', '', ''), ('26', '2', ':2:', '1', '房产 合同 土地使用 权限 的 审查', '0', '房产合同土地使用权限的审查', 'c1ed99b370dfe238912755cecf2806ab', '', '找法网网友咨询：大家好，我去年刚买了房子，合同上写的是：土地使用用 途是商住，使用年限从2007年4月20号到2077年4月20号。  开发商的解释是：2007年2月9日取得了改项目土地使用证，6月1', '', '310000', '310100', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'author\' => \'找法网\',\n  \'intro\' => \'<p><strong>找法网网友咨询：</strong>大家好，我去年刚买了房子，合同上写的是：<a class=\"Key_word\" target=\"_blank\" href=\"http://china.findlaw.cn/fangdichan/tudi/\">土地</a><a class=\"Key_word\" target=\"_blank\" href=\"http://china.findlaw.cn/info/wuquanfa/suoyouquan/sy/\">使用</a>用 途是商住，使用年限从2007年4月20号到2077年4月20号。  开发商的解释是：2007年2月9日取得了改项目土地使用证，6月12日取得了改项目补年限后的新土地使用证，地类为商住(即商业和居住类)，该证记事栏 注明居住使用年限70年，商业使用年限40年从2007.04.20算起。  但是我听说国家规定居住用地70年，商业用地40年，综合或者其他用地50年。商住应该是综合用地，所以应该是50年权限，所以我觉得国土局给开发商的土 地证、开发商的合同都有问题。</p>\r\n<p>　　我想咨询几个问题： 1、哪项法律、第几条规定了土地使用期限?</p>\r\n<p>　　2、国土局给开发商的土地证有没有问题?</p>\r\n<p>　　3、开发商的合同有没有问题?</p>\r\n<p>　　4、我们能不能借此控告开发商，让其退房? 非常感谢</p>\r\n<p>　<strong>　浙江创欣律师事务所 倪振华律师 回复 ：</strong>土地使用权年限在《城镇国有土地使用权出让和转让暂行条例》中有规定:土地使用权出让最高年限按下列用途确定:居住用地70年;工业用地50年;教育、科技、文化、卫生、体育用地50年;商业、旅游、娱乐用地40年;综合或者其他用地50年。</p>\r\n<p>　　具体实施需要看地方政策的实施办法。例如,北京市房屋土地管理局在关于实施《北京市已购公有住房和经济适用住房上市出售管理办法》具体问题的通知中关 于土地出让年限的确定:钢筋混凝土结构、砖混结构的房屋,其土地使用年限最高不超过70年;砖木结构的房屋,其土地使用年限最高不超过50年。</p>\r\n<p>　　依据上述规定:住宅用地最高年限不超过70年。在最高年限内所定土地使用年限,应当允许。城市房地产管理法规定:城市规划区内的集体所有的土地,经依法征用为国有土地后,该幅国有土地的使用权,方可有偿出让。</p>\r\n<p><strong>　　相关知识拓展</strong></p>\r\n<p><strong>　　关于土地使用权出让的年限的相关规定</strong></p>\r\n<p>　　我国土地使用权的出让实行的是有限期的制度。这个限期的最高年限根据国务院1990年发布的《城镇国有土地使用权出让和转让暂行条例》第12条的规 定，依据不同的用途分别为：居住用地70年;工业用地50年;教育、科技、文化、卫生、体育用地50年;商业、旅游、娱乐用地40年;综合或其他用地50 年。</p>\r\n<p>　　关于土地使用权出让的年限问题，还应当注意以下三个基本问题：</p>\r\n<p>　　1.土地使用权出让年限的起算点，并不是从合同生效之日起计算，而是从土地使用者领取土地使用证、即取得土地使用权时计算。</p>\r\n<p>　　2.土地使用权年限届满时可有三种情况：其一，土地使用者需要继续使用土地。这种情况下，土地使用者应当在届满前一年申请续期，经批准后重新签订土地 使用权出让合同，依规定支付土地出让金。其二，土地使用者申请续期未获批准的。这种情况主要是基于社会的公共利益，需要依法收回该出让的土地，则该土地使 用权就应由国家无偿收回。其三，土地使用者未申请续期的。这种情况下，土地使用权自然应当由国家无偿收回。</p>\r\n<p>　　3.土地使用权年限届满时地上的建筑物处理问题，我国城市房地产管理法没有规定，但根据我国《城镇国有土地使用权出让和转让暂行条例》第40条的规定，在土地使用权约定的土地使用权期满后，土地使用权由国家无偿收回，地上的建筑物也由国家无偿取得。</p>\',\n)', '', '2015-06-04 14:48:13', '0', '0', '0', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', ''), ('24', '1', ':1:', '1', 'WiFi,16WiFi,A', '0', '公交WiFi平台16WiFi获亿元A轮融资 百度领投', '0f711f1fb7fd889c6799e3f36bf62fd3', '', '新浪科技讯 6月4日晚间消息，公交WiFi平台16WiFi今日正式宣布，已完成百度领投的上亿元A轮融资，荣之联等跟投。　　中国WiFi产业联盟执行主席、16WiFi董事长邱朝敏表示，“在百度等投资人的', '', '310000', '310100', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'author\' => \'晨晖\',\n  \'intro\' => \'<p>新浪科技讯 6月4日晚间消息，公交WiFi平台16WiFi今日正式宣布，已完成<span id=\"usstock_BIDU\"><a class=\"keyword f_st\" target=\"_blank\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/BIDU.html\">百度</a></span>领投的上亿元A轮融资，荣之联等跟投。</p>\r\n<p>　　中国WiFi产业联盟执行主席、16WiFi董事长邱朝敏表示，“在百度等投资人的全面支持下，我们将迅速完成对目标区域的扩张，以最优方式对资源进行开发，并在将来追逐更大领域内的重大机遇。”</p>\r\n<p>　　据介绍，公交WiFi的源头为三大电信运营商的3G/4G无线网络，通过16WiFi软硬件系统平台将其转换为WiFi信号，搭建到公交车内供乘客免费使用。乘客只需在移动端下载安装“16WiFi”APP，完成注册并登录，即可实现“一键上网”。</p>\r\n<p>　　资料显示，16WiFi公交WiFi项目于2011年开始研发，技术团队由16WiFi母公司七彩集团、北京移动、华为三方共同组建。2012 年，七彩集团、北京移动与北京公交签署三方战略合作协议，在2013年由北京移动投资，陆续在1.2万辆公交车上安装了WiFi设备，使北京成为全国首个 规模化运营公交WiFi的城市。　　</p>\r\n<div style=\"width: 200px; height: 300px; margin: 10px 20px 10px 0px; float: left; overflow: hidden; clear: both; padding: 4px; border: 1px solid rgb(205, 205, 205); display: block;\" class=\"otherContent_01\" id=\"ad_42124\">&#160;</div>\r\n<p>　 　16WiFi称，旗下平台迄今已与国内60余城市签署公共交通WiFi建设运营协议，市场占有率已达50%以上。在公交WiFi方面，已先后在北京、上 海、南京、佛山、绵阳、保定、邯郸等城市形成规模化运营，投资建设并开通运营的WiFi热点数量超过3万个，签约车辆数达到15万辆；在地铁WiFi方 面，已在长沙地铁2号线开通试运行，并正在北京地铁9号线开展实地测试。</p>\r\n<p>　　在投资和盈利模式方面。16WiFi方面表示，公交WiFi的建设和运营所需全部资金均由16WiFi负担，无需政府部门和公交公司投入。</p>\r\n<p>　　针对如何盈利的问题，邱朝敏表示，经过两年时间的积累，已把多种变现方式尝试走通，包括广告、流量引导、应用分发、游戏联运、电商平台、O2O 及大数据等。他强调：“事实证明，只有在全国市场形成规模化运营，公交免费WiFi才能可持续发展；几个城市的小范围经营，则根本不可能盈利。”</p>\r\n<p>　　在此次百度战略投资16WiFi之前，阿里和腾讯先后投资了另外两家WiFi平台树熊和迈外迪。</p>\r\n<p>　　据交通部统计公报显示，全国公交车日均运送乘客人次达2.2亿、地铁达3470万，而铁路仅为646万，民航仅为107万。(晨晖)</p>\r\n<p>&#160;</p>\',\n  \'photo\' => \n  array (\n  ),\n  \'video\' => \n  array (\n  ),\n)', '', '2015-06-04 14:39:47', '0', '0', '0', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', ''), ('25', '1', ':1:', '1', 'OS', '0', '新闻晚报：倪光南:倾举国之力发展自主OS', '8ceab5cd79524e166296ec0bc54d4b13', '', '　比尔·盖茨：拿到学位更易取得成功 别学我退学　　微软联合创始人比尔·盖茨今天在个人网站撰文称，美国正面临着大学生短缺的窘境，尽管中途辍学，但自己幸运地找到了热爱的软件事业，他呼吁全美改革教育体制，为', '', '310000', '310100', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'author\' => \'倪光南\',\n  \'intro\' => \'<p>　<a target=\"_blank\" href=\"http://tech.sina.com.cn/it/2015-06-04/doc-icrvvrak2689502.shtml\">比尔·盖茨：拿到学位更易取得成功 别学我退学</a></p>\r\n<p>　　<span id=\"usstock_MSFT\"><a class=\"keyword f_st\" target=\"_blank\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/MSFT.html\">微软</a></span>联合创始人比尔·盖茨今天在个人网站撰文称，美国正面临着大学生短缺的窘境，尽管中途辍学，但自己幸运地找到了热爱的软件事业，他呼吁全美改革教育体制，为贫困学子提供更好的教育环境，拿到学位更容易确保能在今后取得成功。</p>\r\n<p>　　<a target=\"_blank\" href=\"http://tech.sina.com.cn/i/2015-06-04/doc-icrvvrak2687916.shtml\">遭约谈后 滴滴打车取消周一免费快车活动</a></p>\r\n<p>　　滴滴打车官方微博今日发布公告，宣布因一些原因取消“橙色星期一免费坐快车”活动。免费坐快车活动遭到很多出租车公司和出租车司机的反对。此前，北京市三部门约谈了“滴滴专车”平台负责人，称其专车和快车业务违法。</p>\r\n<p>　　<a target=\"_blank\" href=\"http://tech.sina.com.cn/i/2015-06-04/doc-icrvvpzq1934535.shtml\">北京约谈滴滴后 首汽租赁要做专车</a></p>\r\n<p>　　据知情人士透露，首汽租赁公司将正式涉足互联网专车领域，目前已经成立了专门的公司，很快将推出一款电召平台，并且已经在市场上寻求融资。而此前两天，北京市三部门刚刚约谈了“滴滴专车”平台负责人，称其专车和快车业务违法。</p>\r\n<p>　　<a target=\"_blank\" href=\"http://tech.sina.com.cn/i/2015-06-04/doc-icrvvpkk7910823.shtml\">独家专访去哪儿COO彭笑玫：携程声明不符合事实</a></p>\r\n<p>　　去哪儿COO彭笑玫针对<span id=\"usstock_CTRP\"><a class=\"keyword f_st\" target=\"_blank\" href=\"http://stock.finance.sina.com.cn/usstock/quotes/CTRP.html\">携程</a></span>发出的声明独家对新浪科技表示，携程公司的声明不符合事实，去哪儿网和携程没有签署保密协议。彭笑玫称，去携并购的真相只有一个：就是我们在财报中披露的那样，携程主动提出要约，我们书面拒绝。</p>\r\n<p>　　<a target=\"_blank\" href=\"http://tech.sina.com.cn/i/2015-06-04/doc-icrvvqrf4062586.shtml\">义乌出租车改革：返还的哥5000份子钱</a></p>\r\n<p>　　浙江义乌市出台的《出租汽车行业改革工作方案》明确指出，取消政府收取的营运权有偿使用费。根据方案，2015年营运权使用费从原先的每车每年1万元降至5000元，过去几月多收的部分将退回，2016年起全部取消。昨日出租车公司开始返还份子钱。</p>\r\n<p>　　<a target=\"_blank\" href=\"http://tech.sina.com.cn/it/2015-06-04/doc-icrvvrak2677446.shtml\">倪光南：发展中国自主操作系统应倾举国之力</a></p>\r\n<p>　　中国工程院院士倪光南强调，发展中国主操作系统应倾举国之力。倪光南表示，应当发扬两弹一星和载人航天精神，加大自主创新力度，发挥我国能集中力量办大事的优势，倾举国之力实现智能终端自主操作系统从无到有的突破。</p>\r\n<p>　　<a target=\"_blank\" href=\"http://tech.sina.com.cn/i/2015-06-04/doc-icrvvpzq1919380.shtml\">外媒：中国逼婚文化催热约会APP</a></p>\r\n<p>　　彭博社称，随着中国单身男女比例差的拉大，中国适婚年龄男性将面临危机，再加上陌陌等的成功，越来越多创业公司正在关注中国的在线交友市场。中国创业者认为结婚在中国是一种文化，是无法摆脱的刚需，用户愿意付费以获得更高的成功率。”</p>\r\n<p>　　<a target=\"_blank\" href=\"http://tech.sina.com.cn/i/2015-06-04/doc-icrvvrak2674147.shtml\">全国性约租车管理方案或近期出台</a></p>\r\n<div style=\"width: 200px; height: 300px; margin: 10px 20px 10px 0px; float: left; overflow: hidden; clear: both; padding: 4px; border: 1px solid rgb(205, 205, 205); display: block;\" class=\"otherContent_01\" id=\"ad_42124\">&#160;</div>\r\n<p>　　近期有关专车、拼车等服务是否合理的争议声始终不绝于耳。多地交通部门也出招调整出租车行业运行模式，同时对专车、拼车等服务进行规范。有相关人士向记者透露，全国性的约租车管理方案正在研究制定中，有望于近期出台。</p>\r\n<p>　　<a class=\"wt_article_link\" target=\"_blank\" href=\"http://weibo.com/u/5347290193?zw=tech\">杨元庆</a>内部讲话：你们用榔头敲都敲不醒</p>\r\n<p>　　杨元庆解释人事调整：今天手机的研发、销售、营销等环节都跟以前不同，但是联想移动业务团队还没有跟上变化。“我去年跟你们说了几次，要醒一醒，我甚至还说了你们拿榔头敲都敲不醒，你们太慢了，在错失机会。”这次调整会让变革更彻底。</p>\r\n<p>　　<a class=\"wt_article_link\" target=\"_blank\" href=\"http://weibo.com/u/3281037352?zw=tech\">万达</a>电商第二任CEO离职：王健林电商梦碎</p>\r\n<p>　　6月3日晚，万达电商CEO董策告诉新浪科技3日已正式从万达电商离职。而这距他入职还差一个月才满一年。而万达电商高管的在职时间是以月为单位计算的，除了高管变动频繁之外，还有大量中层流失，在最近一两年，流失率超过50%。</p>\',\n)', '', '2015-06-04 14:44:29', '0', '0', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', '', '', ''), ('27', '2', ':2:', '1', '关于 执行  《 中华 人民 共和 国 刑法 》  确定 罪', '0', '关于执行《中华人民共和国刑法》确定罪名的补充规定（四）', 'e4e946d60c2330ea75d746b2e8df4b51', '', '2009年9月21日最高人民法院审判委员会第1474次会议、2009年9月28日最高人民检察院第十一届检察委员会第20次会议通过《最高人民法院、最高人民检察院关于执行执行﹝中华人民共和国刑法﹞确定罪定', '', '310000', '310100', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'author\' => \'吴远国\',\n  \'intro\' => \'<p style=\"text-indent:36pt;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">2009</span><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">年<span>9</span>月<span>21</span>日</span><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">最高人民法院审判委员会第<span>1474</span>次会议、<span>2009</span>年<span>9</span>月<span>28</span>日最高人民检察院第十一届检察委员会第<span>20</span>次会议通过</span></p>\r\n<p style=\"text-indent:36pt;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">《最高人民法院、最高人民检察院关于执行执行</span><span style=\"font-family:宋体;font-size:14pt;\">﹝</span><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">中华人民共和国刑法</span><span style=\"font-family:宋体;font-size:14pt;\">﹞</span><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">确定罪定的补充规定（四）</span><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">》已于<span>2009</span>年<span>9</span>月<span>21</span>日由最高人民法院审判委员会第<span>1474</span>次会议、<span>2009</span>年<span>9</span>月<span>28</span>日最高人民检察院第十一届检察委员会第<span>20</span>次会议通过，现予公布，自<span>2009</span>年<span>10</span>月<span>16</span>日起施行。</span></p>\r\n<p style=\"text-indent:281pt;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">二<span>00</span>九年十月十四日</span></p>\r\n<p style=\"text-indent:36pt;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">根据《中华人民共和国刑法修正案（七）》（以下简称《刑法修正案（七）》）的规定，现对最高人民法院《关于执行〈中华人民共和国刑法〉确定罪名的规定》、最高人民检察院《关于适用刑法分则规定的犯罪的罪名的意见》作如下补充、修改：</span></p>\r\n<table cellspacing=\"0\" cellpadding=\"0\" border=\"1\" style=\"border-bottom:medium none;border-left:medium none;border-collapse:collapse;border-top:medium none;border-right:medium none;\">\r\n    <tbody>\r\n        <tr>\r\n            <td width=\"277\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><b><span style=\"font-family:方正小标宋简体;font-size:14pt;\">刑法条文</span></b></p>\r\n            </td>\r\n            <td width=\"323\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><b><span style=\"font-family:方正小标宋简体;font-size:14pt;\">罪<span><span> </span></span>名</span></b></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>151</span>条第<span>3</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（《刑法修正案（七）》第<span>1</span>条</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">走私国家禁止进出口的货物、物品罪</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（取消走私珍稀植物、珍稀植物制品罪罪名）</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>180</span>条第<span>4</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（《刑法修正案（七）》第<span>2</span>条第<span>2</span>款</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">利用未公开信息交易罪</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>201</span>条</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（《刑法修正案（七）》第<span>3</span>条</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">逃税罪</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（取消偷罪罪名）</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>224</span>条之一</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（《刑法修正案（七）》第<span>4</span>条）</span></p>\r\n            </td>\r\n            <td width=\"323\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">组织、领导传销活动罪</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>253</span>条之一第<span>1</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（《刑法修正案（七）》第<span>7</span>条第<span>1</span>款）</span></p>\r\n            </td>\r\n            <td width=\"323\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">出售、非法提供公民个人信息罪</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>262</span>条之二</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（《刑法修正案（七）》第<span>8</span>条）</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">组织未成年人进行违反治安管理活动罪</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>285</span>条第<span>2</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（《刑法修正案（七）》第<span>9</span>条第<span>1</span>款</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">非法获取计算机信息系统数据、非法控制计算机信息系统罪</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>285</span>条第<span>3</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（《刑法修正案（七）》第<span>9</span>条第<span>2</span>款</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">提供侵入、非法控制计算机信息系统程序、工具罪</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>337</span>条第<span>1</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（《刑法修正案（七）》第<span>11</span>条</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">妨害动植物防疫、检疫罪</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（取消非法逃避动植物检没罪罪名）</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>375</span>条第<span>2</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（《刑法修正案（七）》第<span>12</span>条第<span>1</span>款</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">非法生产、买卖武装部队制式服装罪</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（取消非法生产、买卖军用标志罪罪名）</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>375</span>条第<span>3</span>款</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:12pt;\">（《刑法修正案（七）》第<span>12</span>条第<span>2</span>款</span></p>\r\n            </td>\r\n            <td width=\"323\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">伪造、盗窃、买卖、非法提供、非法使用武装部队专用标志罪</span></p>\r\n            </td>\r\n        </tr>\r\n        <tr>\r\n            <td width=\"277\" valign=\"top\" style=\"border-bottom:windowtext 1pt solid;border-left:windowtext 1pt solid;border-top:windowtext 1pt solid;border-right:windowtext 1pt solid;\">\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">第<span>388</span>条之一</span></p>\r\n            <p align=\"center\" style=\"text-align:center;\"><span style=\"font-family:仿宋_GB2312;font-size:14pt;\">（《刑法修正案（七）》第<span>13</span>条</span></p>\r\n            </td>\r\n        </tr>\r\n    </tbody>\r\n</table>\',\n)', '', '2015-06-04 14:49:41', '0', '0', '0', '0', '1', '', '', '', '', '', '', '', '', '', '', '', '', ''), ('28', '2', ':2:', '1', '10', '0', '广告法拟定10岁以下儿童禁代言广告 严禁烟草广告', '5477dfb49e3b413e74e46b706a1c5e76', '', '药品保健品广告拟禁用代言人　　广告法修订草案二审 互联网广告中特别指出弹出广告应一键关闭　　昨天，十二届全国人大常委会第十二次会议听取全国人大法律委员会关于《中华人民共和国广告法(修订草案)》（以下简', '', '310000', '310100', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'author\' => \'来源：搜狐\',\n  \'intro\' => \'<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">药品保健品广告拟禁用代言人</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　广告法修订草案二审 互联网广告中特别指出弹出广告应一键关闭</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　昨天，十二届全国人大常委会第十二次会议听取全国人大法律委员会关于《中华人民共和国广告法<span>(</span>修订草案<span>)</span>》（以下简称二审稿）修改情况的汇报。根据二审稿，烟草广告被进一步限制，药品保健品广告拟禁用代言人，明确禁止<span>10</span>周岁以下儿童做广告代言人。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　《食品安全法》（修订草案）（以下简称二审稿）昨天再次提交全国人大进行审议，二审稿进一步加重对食品安全违法行为的处罚，还规定生产经营转基因食品应当按规定进行标识。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　<strong><span style=\"font-family:宋体;\">广告法</span></strong></span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　“全方位”禁烟草广告</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　在一审稿基础上，二审稿对烟草广告作出更严格的限制。 二审稿规定，禁止利用广播、电影、电视、报纸、期刊、图书、音像制品、电子出版物、移动通信网络、互联网等大众传播媒介和形式或者变相发布烟草广告。禁止 在公共场所、医院和学校的建筑控制地带、公共交通工具设置烟草广告，禁止设置户外烟草广告、橱窗烟草广告。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　二审稿烟草广告的限制，内容已覆盖到了常规不被认为是 广告的内容。比如规定，烟草制品生产者或经营者发布的迁址、更名、招聘等启事中，不得含有烟草制品名称、商标、包装、装潢以及类似内容。此外，现实中常看 到“某某烟草企业希望小学”等公益活动名称，对此，二审稿也加以限制，明确规定为，在其他商品或服务的广告、公益广告中，也不得含有烟草制品相关内容。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：除了在烟草制品专卖点的店堂室内可以采取张贴、 陈列等形式发布的烟草广告，以及烟草制品生产者向烟草制品销售者内部发送的烟草广告外，其他任何形式的烟草广告均被禁止。在烟草广告被进一步限制的同时， 酒类广告也在本次修改中有所收紧。二审稿规定，酒类广告中不得出现饮酒动作，也不得含有任何驾驶车、船、飞机等活动的表现。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　药品广告不得由明星出镜</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　在一审稿将广告代言人列为各类违法广告行为的连带责任人之后，二审稿对各类代言行为进行了进一步限制。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　针对药品、保健食品、医疗器械和医疗广告这四类被认为 关系消费者生命健康和人身安全的特殊广告，一审稿已经要求不得利用科研机构、专业人士和患者进行推荐证明，二审稿则在此基础上进一步要求，不得利用其他任 何广告代言人的名义和形象作推荐证明。这意味着，上述四类跟药品保健品相关的广告将不得再由明星出镜。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：全国人大法律委员会副主任委员安建说，医药、医疗等关系消费者的生命健康和人身安全，且功效因人而异，不但不得利用科研机构、专业人士和患者进行推荐证明，也不得利用其他任何广告代言人的名义和形象作推荐证明。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　<span>10</span>岁以下儿童禁代言广告</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　从保护未成年人角度出发，二审稿在第三十条增加了一款：“不得利用十周岁以下未成年人作为广告代言人。”</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　何为广告代言人？根据二审稿，“广告代言人”是指除广告主以外，在广告中以自己的名义或者形象对商品、服务作推荐、证明的自然人、法人或者其他组织。根据二审稿的规定，如果违法利用<span>10</span>周岁以下未成年人作为广告代言人，可能面临撤销广告批准、没收广告费用及<span>20</span>万元以上<span>100</span>万元以下的罚款。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　另外，二审稿还对涉及未成年人的广告活动作出相应规范，如在针对未成年人的大众传播媒介上不得发布药品、医疗器械、网络游戏、酒类广告等；针对<span>14</span>周岁以下未成年人的商品或者服务的广告，不得含有劝诱其要求家长购买广告商品或者服务以及可能引发其模仿不安全行为的内容等。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：有关人士分析认为，如果不出姓名、不以自己的名义做广告宣传，属于广告表演，不属于广告荐证；广告表演者无须为角色行为负责，而广告荐证者要对自己的行为负责。由于童星们有一定名气，他们为广告做宣传的行为属于代言。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　弹窗广告要确保一键关闭</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　二审稿规定，互联网信息服务提供者利用互联网发布广告，不得影响用户正常使用网络。在</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　互联网页面以弹出等形式发布的广告，应当显著标明关闭标志，确保一键关闭。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：有专家认为“网络不是法外之地”，网络逐渐成为广告发布的重要媒介，实践中网络广告违法、影响用户使用网络等问题较为突出。此次广告法修订，明确网络要遵守其他媒介广告的一切“游戏规则”，同时还额外要求弹出广告必须能一键关掉。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　虚假广告扩大追责范围</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　二审稿规定，发布虚假广告，欺骗、误导消费者，使购买商品或者接受服务的消费者的合法权益受到损害的，由广告主依法承担民事责任。关系消费者生命健康的商品或者服务的虚假广告，造成消费者损害的，其广告经营者、广告发布者、广告代言人应当与广告主承担连带责任。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：“虚假广告损害消费者生命健康和财产安全，这些‘既谋财又害命’的‘毒瘤’不能先乱后治。”<span><a target=\"_blank\" href=\"http://q.stock.sohu.com/cn/600056/index.shtml\"><span style=\"color:#005599;text-decoration:none;\"><span>中国医药</span></span></a></span>新闻信息传播协会常务副秘书长徐述湘认为，虚假广告出了事儿，广告主固然要惩处，经营发布者和代言人也同样不能置身事外，一句“不知情”就推卸了所有责任。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　<strong><span style=\"font-family:宋体;\">食品安全法</span></strong></span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　转基因食品应按规定标识</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　针对备受关注的转基因食品，二审稿明确其应当按规定标 识。二审稿提出，我国《农业转基因生物安全管理条例》已经规定农业转基因生物标识制度，一些国家也在法律中规定转基因食品应当在标签上予以明示。为保障消 费者的知情权，此次送审新增规定，“生产经营转基因食品应当按照规定进行标识”，同时增加相应的法律责任。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：在罚则方面，二审稿规定，“转基因食品未按规定标识”有可能承担从没收违法所得、罚款到停产停业、吊销许可证等各个档次的处罚，但其中“标签存在瑕疵但不影响食品安全”的，由县级以上食药监部门责令改正即可，拒不改正的，处两千元以下罚款。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　首次规范食品贮存运输</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　二审稿增加规定，非食品生产经营者从事食品贮存、运输和装卸的，贮存、运输和装卸食品的容器、工具和设备应当安全、无害，保持清洁，防止食品污染，并符合保证食品安全所需的温度等特殊要求，不得将食品与有毒、有害物品一同运输。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：有专家认为，食品网购日渐火爆，对这些经手食品贮存运输的专业仓储、物流企业，有必要纳入法律监管范围。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　媒体发虚假信息将被处罚</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　二审稿对于涉及公共舆论领域对食品安全事件的监督也作 出规定。近年来，许多食品安全事件是经由媒体曝光后得以被治理，对于“个别举报—媒体跟进—主管部门做出反应”的模式，二审稿实际上予以鼓励，规定保护举 报人的权益，需对其相关信息进行保密。同时，删去原草案中“发布食品安全信息应当事先向食品药品监督管理部门核实情况”的规定，从而允许媒体更快地对举报 做出反应。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：在给予媒体更多施展空间的同时，二审稿也作了限制性规定，对于媒体编造、散布虚假食品安全信息的，由有关主管部门依法给予处罚，并对直接负责的主管人员和直接责任人员给予处分。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　提高食品企业违法成本</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　二审稿进一步加重食品安全违法行为的法律责任，采取多 种手段严惩。比如，加重对添加药品等四种违法行为的处罚，同时，对用非食品原料生产食品等六种严重违法行为的责任人增加行政拘留的处罚规定。对明知从事违 法食品生产经营活动，仍为其提供生产经营场所或者其他条件，使消费者的合法权益受到侵害等四种违法行为，增加与食品生产经营者承担连带责任的规定。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　解读：对生产不符合食品安全标准的食品或者经营明知是不符合食品安全标准食品的惩罚性赔偿，二审稿增加规定最低赔偿金额为<span>1000</span>元，同时明确食品的标签、说明书存在不影响食品安全瑕疵的，生产经营者不承担惩罚性赔偿责任。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　二审稿增加规定，用超过保质期的食品原料、食品添加剂生产食品等违法行为的法律责任。在一审稿已大大加重现行法中处罚条款，设置“上不封顶”式惩罚性处罚，二审稿在此基础上，进一步收紧罚款下限，使得食品安全生产者的违法成本再次提高。</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　本版综合京华时报记者孙乾新华社</span></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　<strong><span style=\"font-family:宋体;\">　有钱不能任性</span></strong></span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　<span>1</span>医药医疗广告不能宣称疗效</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　“一吃就停”“腰不酸了腿不疼了”“<span>XX</span>胶囊，降压降糖”“多年没孩子，是<span>XX</span>药给我们送来了小天使”……这些疗效诱人的广告，以后将不能再出现。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　<span>2</span>烟草广告不出现在公共场所</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　像“鹤舞白沙，我心飞翔”这类不露痕迹的烟草广告也将被禁止。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　<span>3</span>与虚假广告沾边都将被追责</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　无论是广告主、广告经营者还是发布者，抑或是设计师、代言人，只要和虚假广告沾上边，就要承担责任。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　<span>4</span>弹窗广告须能“一键关闭”</span></strong></p>\r\n<p style=\"background:white;\"><span style=\"color:black;font-size:10.5pt;\">　　像胶布一样粘在窗口关不掉；明明有一个画叉的关闭标志，可是一点击却打开了更多链接……这样的弹窗广告将禁止出现。</span></p>\r\n<p style=\"background:white;\"><strong><span style=\"font-family:宋体;color:black;font-size:10.5pt;\">　　<span>5</span>不能找<span>10</span>周岁以下孩子当代言人</span></strong></p>\r\n<p><span style=\"color:black;font-size:10.5pt;\">　　这意味着，时下火热的天天、<span>Cindy</span>等小童星们将不能再代言广告。</span></p>\',\n)', '', '2015-06-04 14:52:50', '0', '0', '0', '1', '1', '', '', '', '', '', '', '', '', '', '', '', '', '');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_news_law_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_news_law_type`;
CREATE TABLE `biweb_news_law_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资讯分类表';

-- ----------------------------
--  Table structure for `biweb_newspapers_magazines`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_newspapers_magazines`;
CREATE TABLE `biweb_newspapers_magazines` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_newspapers_magazines`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_newspapers_magazines` VALUES ('22', '1', ':1:', '1', '邮 递 名 信 片', '0', '邮递名信片', 'b5233324a2b4b5af3f080d29ac0204e2', '', '邮递广告：广告主将广告信息印刷成信件或宣传品以指名方式直接邮寄给有可能购买的消费者的直接广告。它是以邮政传递网络为传播途径，以信函为载体的广告媒体，选择有针对性的目标客户群落的名址打印封装，通过邮政渠', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<div class=\"detail_content_item\">邮递广告：广告主将广告信息印刷成信件或宣传品以指名方式直接邮寄给有可能购买的消费者的直接广告。它是以邮政传递网络为传播途径，以信函为载体的广告媒体，选择有针对性的目标客户群落的名址打印封装，通过邮政渠道寄发的一种函件业务。具有传播信息，发布广告的效能。</div>\r\n<div class=\"table_background_bottom\">\r\n<div class=\"detail_img_item\">&#160;</div>\r\n</div>\r\n<div class=\"hwv3_mi\">&#160;</div>\r\n<div class=\"v3_lj\">&#160;</div>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/22_1433432471.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/22_1433432471.jpg', '2015-06-04 15:41:11', '0', '0', '0', '1', '1', '信函广告', '上海市宝山区', '150元', '没有描述', '没有描述', '18243173001', '0', '没有描述', '没有描述', '没有描述', '邮递广告邮编:525200,全国统一服务电话:11185', '邮递广告公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_newspapers_magazines_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_newspapers_magazines_type`;
CREATE TABLE `biweb_newspapers_magazines_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='报纸杂志分类表';

-- ----------------------------
--  Table structure for `biweb_outdoor_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_outdoor_ad`;
CREATE TABLE `biweb_outdoor_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_outdoor_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_outdoor_ad` VALUES ('22', '1', ':1:', '1', '街 灯 广告', '0', '街灯广告', '38fc68abca8f23ec6f0465c7cbe57836', '', '位于人民南路88号，市中心繁华路段', '', '', '', '', 'array (\n  \'intro\' => \'<p>位于人民南路88号，市中心繁华路段</p>\',\n  \'photo\' => \n  array (\n  ),\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'video\' => \n  array (\n  ),\n)', '', '2015-05-15 16:58:59', '0', '0', '0', '7', '1', '街灯广告', '上海市区', '1.2万', '没有描述', '没有描述', '18243173001', '10', '10.5米*9米', '没有描述', '没有描述', '上海市荔晶购物中心', '上海荔晶购物中心', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_outdoor_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_outdoor_ad_type`;
CREATE TABLE `biweb_outdoor_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='户外广告分类表';

-- ----------------------------
--  Table structure for `biweb_personality_customization`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_personality_customization`;
CREATE TABLE `biweb_personality_customization` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_personality_customization`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_personality_customization` VALUES ('21', '5', '', '1', '866', '0', '个性定制', '53749b6449a123250ad971489b475a6c', '', '86', '', '', '', '', 'array (\n  \'intro\' => \'86\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/21_1431572810.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/21_1431572810.jpg', '2015-05-14 11:06:50', '0', '0', '0', '1', '1', '施工方的后果', '爱人分为四个', '564689', '6746596', '667856', '676567', '6767', '67679', '65', '44454646', '啥的嘎的风格', '瓦擦擦和', '6476876'), ('22', '1', '', '1', '无', '0', '5474', '4dea382d82666332fb564f2e711cbc71', '', '45874567456', '', '', '', '', 'array (\n  \'intro\' => \'45874567456\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/22_1431680500.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/22_1431680500.jpg', '2015-05-15 17:01:40', '0', '0', '0', '0', '1', '4587457', '56835657', '474583576', '4576658', '4576', '45864567', '45764', '4576468', '45763475', '4678456737', '45863567', '458457', '875457'), ('23', '1', ':1:', '1', '餐 巾 纸 定制', '0', '餐巾纸定制', '7b78024471f8e56e77a7718a8b5624ca', '', '量身定做的餐巾纸，既能体现企业的实力，又能达到宣传的效果！ 专业的设计师主笔外观创意设计，完全能满足不同定位的餐饮企业。 内装的餐巾纸采用100%原木木浆制作，纯白坚韧，手感细腻不掉粉。 可提供烟盒装', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>量身定做的餐巾纸，既能体现企业的实力，又能达到宣传的效果！ 专业的设计师主笔外观创意设计，完全能满足不同定位的餐饮企业。 内装的餐巾纸采用100%原木木浆制作，纯白坚韧，手感细腻不掉粉。 可提供烟盒装、抽纸盒、卷纸袋等形式的包装设计和生产。</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/23_1433432080.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/23_1433432080.jpg', '2015-06-04 15:34:40', '0', '0', '0', '1', '1', '印刷包装', '上海全市', '0.1元起', '没有描述', '没有描述', '18243173001', '0', '没有描述', '没有描述', '没有描述', '上海市市中泰科技有限公司，位于茂名市迎宾三路189号新时代花园A座11楼，目前在职员工30多人，是以移动新媒体（车载LED显示屏广告信息发布）为支柱新兴媒体企业。目前致力于集中发布式移动多媒体系统的开发以及营运，针对城市出租车、公交车、客运班车、教练车等载体，进行开发的移动新媒体业务拓展。同时策划主办大型展会及单位企业庆典活动等项目。 独家取得茂名市出租车广告投放经营权 中泰传媒公司与茂名市交通运输集团有限公司（丰田花冠100台）、茂名石化交运实业有限公司（比亚迪100台）、茂名市神马货运有限公司（丰田花冠100台）和茂名市出租汽车有限公司（捷达100台）四家出租车中标经营公司签约广告投放独家经营协议。', '上海市中泰科技有限公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_personality_customization_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_personality_customization_type`;
CREATE TABLE `biweb_personality_customization_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='个性定制分类表';

-- ----------------------------
--  Table structure for `biweb_plane_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_plane_ad`;
CREATE TABLE `biweb_plane_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_plane_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_plane_ad` VALUES ('21', '1', '', '1', '无', '0', '43w657', 'e7a358352f7acc69f0d691b06bce237f', '', '754653476', '', '', '', '', 'array (\n  \'intro\' => \'754653476\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/21_1431680435.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/21_1431680435.jpg', '2015-05-15 17:00:35', '0', '0', '0', '2', '1', '3456345', '4356346', '345645', '3456347', '345675', '45766', '567353', '3456375', '347534', '53736', '5 375365', '35734', '34564'), ('22', '1', ':1:', '1', '吊 牌 广告', '0', '吊牌广告', 'ddc086b227bb372b1d67d070fee9f89b', '', '&#160;', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>&#160;</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/22_1433431899.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/22_1433431899.jpg', '2015-06-04 15:31:39', '0', '0', '0', '0', '1', '广告单张印刷', '上海市区', '电谈', '没有描述', '没有描述', '18243173001', '0', '没有描述', '没有描述', '没有描述', '茂名市誉发印刷包装有限公司（原广东省佛山市誉发印刷包装有限公司），是一家集设计、制作、印刷（黑色、彩色），包装、彩盒、装订、服务为一体的专业印刷包装企业。 茂名公司位于茂名市茂水路工业加工区，工厂面积达4000多平方米，拥有先进的德国海得堡大对开四色电脑印刷机，同时配套完善的印前数字化设备，印后加工设备：（UV机、过油机、磨光机、过胶机、全自动裱纸机、半自动裱纸机，大、中、小型啤机，粘盒机、压平机、分切机）等一系列的彩印包装制品生产线，并拥有一批具有专业水准、技术熟练、敬业爱岗的员工。 本公司的业务范围涵盖：食品、药品、玩具、五金、电器、工艺品、礼品等彩色包装盒，手提袋、台历（挂历）、画册、吊牌、不干胶、中（西）信封、文件袋、说明书、海报、单据、表格、信笺等印刷品。', '誉发印刷有限公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_plane_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_plane_ad_type`;
CREATE TABLE `biweb_plane_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='平面广告分类表';

-- ----------------------------
--  Table structure for `biweb_planning_production`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_planning_production`;
CREATE TABLE `biweb_planning_production` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_planning_production`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_planning_production` VALUES ('22', '1', ':1:', '1', '信 宜 市 第二届 汽车 建材 文化 展', '0', '信宜市第二届汽车建材文化展', '66b55a2c3fb7ebf37502b9eb2ff893d2', '', '汽车、汽车用品、摩托、电动车、电器类、净水设备、婚纱摄影、旅游、卫生洁具、建材累、防盗窗、太阳能、――品牌为主，每个种类进行优化组合。）', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>汽车、汽车用品、摩托、电动车、电器类、净水设备、婚纱摄影、旅游、卫生洁具、建材累、防盗窗、太阳能、――品牌为主，每个种类进行优化组合。）</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/22_1433432631.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/22_1433432631.jpg', '2015-06-04 15:43:51', '0', '0', '0', '1', '1', '展会策划承办', '信宜市', '1000-3800元', '3', '1', '18243173001', '127', '4000平方', 'LED', '信宜市玉都公园市民广场', '厚积而薄发，多年的拼搏和积累，我们有足够的信心、实力和执行力，让每一位携手合作的朋友，走得更远，飞得更高！ 我们主打：大型户外广告牌、大中型展会、广告VI整体策划、大型宣传活动、装饰工程、设计等！', '信宜市创丰广告有限公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_planning_production_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_planning_production_type`;
CREATE TABLE `biweb_planning_production_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='策划制作分类表';

-- ----------------------------
--  Table structure for `biweb_product`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_product`;
CREATE TABLE `biweb_product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `company_md5` char(32) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `province` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商展信息表';

-- ----------------------------
--  Table structure for `biweb_product_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_product_type`;
CREATE TABLE `biweb_product_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='商展信息分类表';

-- ----------------------------
--  Table structure for `biweb_read_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_read_ad`;
CREATE TABLE `biweb_read_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_read_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_read_ad` VALUES ('22', '1', ':1:', '1', 'T1', '0', '高端阅报栏广告位T1', '1d3f2181ff76bd889dbb50fac83b3077', '', '诺德高端阅报栏  茂名的一道亮点  　　　如今，流行了一种新型的滚动灯箱式阅报栏，滚动灯箱式阅报栏其实是一种将传统的平面媒体广告与新兴的媒体相结合的广告创作模式，并将其投入到实际的 生活当中去，滚动灯', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>诺德高端阅报栏  茂名的一道亮点  　　　如今，流行了一种新型的滚动灯箱式阅报栏，滚动灯箱式阅报栏其实是一种将传统的平面媒体广告与新兴的媒体相结合的广告创作模式，并将其投入到实际的 生活当中去，滚动灯箱式阅报栏现开始普及，脱离之前固定式的灯箱，其媒体发布率提高实用性也大大加强。 　　　诺德广告现成立36个高端阅报栏：144张广告画面自行智能调换：200多万双眼睛注视的焦点，使整个茂名市区变成动感地带。再加上清晰，逼真的画 面创意，亮丽色彩和准确的到达率，真正能更好的贴近企业展示自我形象的宣传产品信息及表现要素。 　　　高端阅报栏广告位净画面尺寸正面/背面上方为1.5米（高）X3.2米宽，正面下方为1.1米（高）X3.2米宽，我们是针对性的投放。主要在茂名 各主干道，广场，商场，公园，住宅区，医院，学校等。。。 所有媒体类型为内打灯光，每天亮8小时（18：00-02：00），视觉冲击力很强的广告，正面/上方为3幅广告画面来回滚动播放，正面下方/背面上方为 固定画面，主动吸引观众眼球十分有利于客户以动感型，醒目的方式，引起消费受众的注意，能够让针对受众或是最大人群看到的广告，才是有效广告，没有一丁点 的浪费！</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/22_1433430934.jpg\',\n    ),\n  ),\n  \'video\' => \n  array (\n  ),\n)', '1/22_1433430934.jpg', '2015-06-04 15:15:14', '0', '0', '0', '2', '1', '市区阅报亭', '上海市浦东新区', '2400元', '1', '1', '18243173001', '10', '宽3200mm高1500mm', '6小时', '上海市人民广场大门口右角，熹龙国际大酒店入口处', '茂名市诺德广告有限公司以广告策划、制作、户外媒体经营为主要业务。公司拥有丰富的户外媒体资源；拥有卓越的设计、策划人才及经验丰富的广告制作人才；拥有良好的社会关系资源，与政府各有关职能部门、 各广告媒体主管部门都有着友好的、密切的联系。“一诺千金，德行天下”是本公司牢牢信守的经营理念，诺德广告始终坚持与客户双赢的原则，不遗余力地为客户开拓更大的市场空间。 茂名市诺德广告公司自2011年8月成立以来，在政府和各单位支持下，公司由开始的10多人发展到如今30多人，得到茂名日报社的支持，我们高端阅报栏广告牌已经成功建成30多个，深受各商界欢迎，现成为张学友湛江演唱会茂名指定广告商，我们的合作商家有中国联通，中国电信，中国农业银行，中国邮政，茂名各大酒店，娱乐场所，茂名各汽车商等等。。', '上海市市诺德广告有限公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_read_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_read_ad_type`;
CREATE TABLE `biweb_read_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='阅报亭广告分类表';

-- ----------------------------
--  Table structure for `biweb_shelter_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_shelter_ad`;
CREATE TABLE `biweb_shelter_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_shelter_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_shelter_ad` VALUES ('23', '1', ':1:', '1', '候 车亭 广告', '0', '候车亭广告', 'f7a8a095763de889cbd1eed979e0eae1', '', '候车亭广告有着相当显著的优点——低千人成本、高到达率、时效性长、形象功能、强制性以及强视 觉冲击力等.     侯车亭广告能有效传播画面和文字信息，切随时可更换画面内容，贴近消费者，便于近距离阅读，候', '', '', '', '', 'array (\n  \'meta_Title\' => \'\',\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>候车亭广告有着相当显著的优点——低千人成本、高到达率、时效性长、形象功能、强制性以及强视 觉冲击力等.     侯车亭广告能有效传播画面和文字信息，切随时可更换画面内容，贴近消费者，便于近距离阅读，候车亭全天侯发布，良好的灯光效果能保证夜间也有很好的传播效果。     候车亭广告分布具有强大的网络性，网络覆盖市区的繁华地段，商业中心遗迹人流高峰区，候车亭广告在户外广告到达率指数排名中位居第二，仅次于公交车。</p>\',\n  \'photo\' => \n  array (\n    0 => \n    array (\n      \'photo\' => \'1/23_1433431161.jpg\',\n      \'photo_narrate\' => \'\',\n    ),\n  ),\n)', '1/23_1433431161.jpg', '2015-06-04 15:19:21', '0', '0', '0', '1', '1', '市区公交车亭', '上海市浦东新区', '42000元/个/年', '没有描述', '没有描述', '18243173001', '50', '3.5x1.5mx2面/个', '阳光照明', '浦东新区市区各个候车亭', '上海市公交广告公司于1997年8月28日在光华南路５９号大院注册成立，（行政区号440903，邮政编码525000）,公司成立之初主要经营候车亭广告，装璜，灯箱，招牌制作，设计，五金交电，装修材料，销售，注册员工人数为5人，注册资本50万元人民币。', '上海市市公交广告公司', '待售');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_shelter_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_shelter_ad_type`;
CREATE TABLE `biweb_shelter_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='候车亭广告分类表';

-- ----------------------------
--  Table structure for `biweb_tender_ad`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_tender_ad`;
CREATE TABLE `biweb_tender_ad` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  `meitileixing` varchar(20) DEFAULT NULL COMMENT '媒体类型',
  `city_area` varchar(20) DEFAULT '没有描述' COMMENT '地区新加',
  `zhixingjiage` varchar(20) DEFAULT '0',
  `zuishaotoufangliang` varchar(20) DEFAULT '没有描述',
  `zuiduantoufangzhouqi` varchar(50) DEFAULT '没有描述',
  `lianxifangshi` varchar(50) DEFAULT NULL,
  `gujiren_cheliuliang` varchar(20) DEFAULT '0',
  `meitiguige` varchar(20) DEFAULT '没有描述',
  `zhaomingfangshi` varchar(20) DEFAULT '没有描述',
  `diliweizhimiaoshu` text,
  `gongsijianjie` text,
  `gongsimingceng` varchar(20) DEFAULT NULL COMMENT '公司名称',
  `toufangzhuangtai` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`) USING BTREE,
  KEY `type_id` (`type_id`) USING BTREE,
  KEY `title_md5` (`title_md5`) USING BTREE,
  KEY `submit_date` (`submit_date`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='车体广告表';

-- ----------------------------
--  Records of `biweb_tender_ad`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_tender_ad` VALUES ('33', '1', ':1:', '1', '上海市 大唐 文化传播 有限公司', '0', '上海市大唐文化传播有限公司', '712d35771f565bd2cd30839dcb4ee582', '', '茂名市大唐文化传播有限公司成立于2012年，是一家集设计、策划、活动、演出为一体的综合性传播机构。     公司设有设计策划部，制作部和演艺部，公司自有舞台、灯光、音响、LED屏、桁架、礼炮、水晶启动', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>茂名市大唐文化传播有限公司成立于2012年，是一家集设计、策划、活动、演出为一体的综合性传播机构。     公司设有设计策划部，制作部和演艺部，公司自有舞台、灯光、音响、LED屏、桁架、礼炮、水晶启动球等设备物料，  我们凭借专业高效的团队、齐全的物料设备资源，多次为大型演出活动、商场、房地产、各企事业单位等事件活动提供总体策划、广告设计、现场装饰及活动执行一 条龙服务。多次成功策划并实施重大开业庆典、楼市开盘、新闻发布、展会开幕、产品推广、品牌传播、文艺演出等活动。      我们已服务过的客户有：中国移动茂名分公司、茂名国旅、粮丰园、茂名华侨城购物广场、茂名市教育局、茂名市民政局、茂名市福利院、茂名碧桂园、水东湾碧桂 园、高州碧桂园、海印•森邻四季、宏御•帝景豪庭、顺佳雅苑、康盛南苑等。      已成功策划执行的部分活动：茂名市民政局项目启动仪式；茂名碧桂园新品发布会（熹龙酒店）；水东碧桂园开盘活动；高州碧桂园人民会堂新闻发布会；康盛南苑 设计快乐女声歌唱比赛；东方名车荟开业庆典；东风风神新车上市活动；茂名国旅、茂名汇丰酒店年会等等。 电话：18319798256  阮先生</p>\',\n)', '', '2015-06-04 15:49:01', '0', '0', '0', '0', '1', '阮国浩', '18319798256', '', '', '', '', '', '', '', '18319798256', '', '', ''), ('34', '1', ':1:', '1', '4208,LED', '0', '4208超薄灯箱厂家 LED灯箱 双面超薄灯箱', 'f21f291f6b4a231362282e4a2a98f868', '', '4028灯箱 灯箱厚度：28MM 面盖宽度：40MM 光源：LED 特点：双面可视画面 工艺：导光板采用激光雕刻导光板工艺制作 翻盖开启式，超前、超薄，简洁美观，   铝型材灯箱外形结构：45度拼角，', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>4028灯箱 灯箱厚度：28MM 面盖宽度：40MM 光源：LED 特点：双面可视画面 工艺：导光板采用激光雕刻导光板工艺制作 翻盖开启式，超前、超薄，简洁美观，   铝型材灯箱外形结构：45度拼角，四边开启 适合尺寸：中小型尺寸 铝材颜色：闪银，磨砂，黑，白，香槟，电沪，基它颜色可定做 光源：4028银色3mm3528普亮 导光板：进口丝印，雕刻，激光打点 超薄的铝材料边框设计，四面开启方便更换画面  产品规格：可按客户的要求制作 具有厚度薄、亮度高、发光面均匀、省电等特点 使用范围：广泛应用于商业中心，超市，专卖店，连锁店，快餐店，洒吧，银行，地铁，展厅，办公家居装饰等 就是普通超薄灯箱改进，光源由T4或T5管换为LED灯条，电源换为LED驱动电源，LED灯条基本用3528或5050贴片</p>\',\n)', '', '2015-06-04 15:50:00', '0', '0', '0', '1', '1', '梁先生', '0775-2894900', '玉林顶力兆隆超薄灯箱厂', '', '', '', '', '', '', '18176664837', '', '', '广西玉林市城西街道莲塘村上塘一队248号'), ('35', '1', ':1:', '1', '4800', '0', '学车来“平安驾校”，只需4800', '43f1d9d2a1e1cc878f73253db7cf814f', '', '茂名三大驾校的“平安驾校”，永远是你的正确选择 这里有我们最专业的“安达团队”，有素质最好的教练 不侮辱，不打骂，不乱收费，态度好 本地户口一个月内就可考科目一 我们的团队有2女4男6车，还有自动档 ', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>茂名三大驾校的“平安驾校”，永远是你的正确选择 这里有我们最专业的“安达团队”，有素质最好的教练 不侮辱，不打骂，不乱收费，态度好 本地户口一个月内就可考科目一 我们的团队有2女4男6车，还有自动档 一对一教学，包接送，车子还有防晒的帐篷 学到会才考试，95%的通过率 担心的话还可以去训练场观摩，地点就在官山五路的平安训练场 有这么好的驾校到哪里去找，赶快来报名吧，报名费只需4800 欢迎致电林先生：18300072812        联系 QQ：1029628426</p>\',\n)', '', '2015-06-04 15:50:40', '0', '0', '0', '0', '1', '林同学', '', '', '', '', '', '', '', '', '18300072812', '', '', ''), ('36', '1', ':1:', '1', '指示 牌 背面 广告', '0', '指示牌背面广告', '93e4b499f98e2e31a43bccf6159f57ca', '', '双山七路、油城九路、茂南大道等……', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>双山七路、油城九路、茂南大道等……</p>\',\n)', '', '2015-06-04 15:51:24', '0', '0', '0', '0', '1', '许小姐', '', '', '', '', '', '', '', '', '18899899028', '', '', ''), ('37', '1', ':1:', '1', '小 强人 点 读 笔', '0', '小强人点读笔', '760eaa1172f1f3a9fe028ec187668311', '', '2013年最新款点读笔，一款可以写字的点读笔。小强人点读笔官方标配：可写点读笔一支（4G内存）+写字板一张+录音贴24个（可重重复复录音）+锂电 充电器+钢琴键一个+数据线+底座+保修卡+说明书+儿童', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>2013年最新款点读笔，一款可以写字的点读笔。小强人点读笔官方标配：可写点读笔一支（4G内存）+写字板一张+录音贴24个（可重重复复录音）+锂电 充电器+钢琴键一个+数据线+底座+保修卡+说明书+儿童读物18本大书（认知2本+拼音2本+数学2本+汉字4本+英语2本+古诗2本+三字经1本+儿 歌1本（共144首中英文儿歌）+故事2本（共288个故事）。有两种包装，彩盒包装和书包包装。茂名总销售地址官山一路，电话18929786531， 梁生，QQ736275772  诚邀茂名地区各市，各县经销商，批发商。相关视频http://v.youku.com/v_show/id_XNDI0MzIzOTY0.html http://mm.58.com/jiaoyuertong/15052817592330x.shtml</p>\',\n)', '', '2015-06-04 15:52:09', '0', '0', '0', '0', '1', '梁生', '18929786531', '', '', '', '', '', '', '', '18929786531', '', '', ''), ('38', '1', ':1:', '1', '0668', '0', '淘宝旗下广东 最大购物网站 茂名淘宝 0668淘实惠', '3ce291a8884b31a6e2a4531117f1c69f', '', '淘宝最大购物网 www.0668tao.com 茂名淘宝 每天更新最热卖最新最实惠商品', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>淘宝最大购物网 www.0668tao.com 茂名淘宝 每天更新最热卖最新最实惠商品</p>\',\n)', '', '2015-06-04 15:54:05', '0', '0', '0', '0', '1', '林生', '', '', '', 'www.0668tao.com', '', '', '', '', '18200631707', '', '', ''), ('39', '1', ':1:', '1', '4,26,5,2', '0', '三棵树涂料首个获得政府质量奖大促销(4月26日至5月2日)', '38cf5d5358ace79a2bf9c569571e643a', '', '三棵树是中国健康漆的领导品牌之一，重视健康科技、生态科技、节能科技的研究和实践，现有博士后科研工作站、院士专家工作站、国家认定企业技术中心三大研 发平台和一个国家认可实验室，拥有数十个国家一级保密配方', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>三棵树是中国健康漆的领导品牌之一，重视健康科技、生态科技、节能科技的研究和实践，现有博士后科研工作站、院士专家工作站、国家认定企业技术中心三大研 发平台和一个国家认可实验室，拥有数十个国家一级保密配方，曾分别搭载神舟六号、神舟七号和实践八号进行科学试验。三棵树涂料荣获第三届福建省政府质量 奖,这也是涂料行业目前唯一一个获得省政府质质量奖的涂料企业.三棵树涂料董事长洪杰在全上作经验分享时鼓励企业踊跃报名参加质量奖评选,打开中国质量好 声音!促销活动时间:4月26日至5月2日.　促销地址:广东省茂名市人民南路268号1楼三棵树漆专卖店</p>\',\n)', '', '2015-06-04 15:55:14', '0', '0', '0', '0', '1', '黄进', '0668-2815008', '广东省茂名市三棵树漆专卖店', '', '', '', '', '', '', '13828683759', '', '', '广东省茂名市人民南路268号1楼三棵树漆'), ('40', '1', ':1:', '1', '6', '0', '精英人才网广告投放6', 'fa173dd24b0adc40735dc0a63c4f9529', '', '出租车顶灯喷画100张', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>出租车顶灯喷画100张</p>\',\n)', '', '2015-06-04 15:56:13', '0', '0', '0', '1', '1', '罗生', '', '茂名精英人才网', '', 'http://www.mmejob.com', '', '', '', '', '18023983933', '', '', '茂名市迎宾三路'), ('41', '1', ':1:', '1', '产品包装 盒', '0', '产品包装盒', 'a1cd4de025b79ae0511d4b41bbc7092e', '', 'GPS产品包装盒 要求： 1、20*40mm 2、内套白色，加一个彩色外套； 3、内置一个产品纸质分隔。', '', '', '', '', 'array (\n  \'meta_Description\' => \'\',\n  \'meta_Keywords\' => \'\',\n  \'intro\' => \'<p>GPS产品包装盒 要求： 1、20*40mm 2、内套白色，加一个彩色外套； 3、内置一个产品纸质分隔。</p>\',\n)', '', '2015-06-04 15:57:34', '0', '0', '0', '2', '1', '张生', '0668-2797822', '茂名市中科宇航科技开发有限公司', '0668-2797822', 'www.mmgps.com', '', '', '', '', '18022808189', '', '', '茂名市高凉南路2号大院富丽苑7栋10楼'), ('42', '1', '', '1', '无', '0', 'hzxjvz', '4abd9a25c0e86b1ef17b37efd6e196cc', '', '中国风格的符合符合规划修复后发现金刚经', '', '', '', '', 'array (\n  \'intro\' => \'<p>中国风格的符合符合规划修复后发现金刚经</p>\',\n)', '', '2015-06-05 01:07:18', '0', '0', '0', '2', '1', 'zdg', '0852-4620057', 'weafetgsga', '发放水电费', '啊发送到发送到', '', '', '', '', '18243173001', '', '', 'asgsGs');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_tender_ad_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_tender_ad_type`;
CREATE TABLE `biweb_tender_ad_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='广告招标分类表';

-- ----------------------------
--  Table structure for `biweb_trade`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_trade`;
CREATE TABLE `biweb_trade` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `country` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `area` varchar(20) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供求信息表';

-- ----------------------------
--  Table structure for `biweb_trade_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_trade_type`;
CREATE TABLE `biweb_trade_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='供求信息分类表';

-- ----------------------------
--  Table structure for `biweb_user`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_user`;
CREATE TABLE `biweb_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_code` varchar(10) DEFAULT NULL,
  `user_name` varchar(30) DEFAULT NULL,
  `nick_name` varchar(30) DEFAULT NULL,
  `real_name` varchar(30) DEFAULT NULL,
  `user_type` tinyint(1) NOT NULL DEFAULT '0',
  `password` varchar(32) DEFAULT NULL,
  `question` varchar(40) DEFAULT NULL,
  `answer` varchar(40) DEFAULT NULL,
  `contactor` varchar(30) DEFAULT NULL,
  `user_group` smallint(1) NOT NULL DEFAULT '0',
  `user_popedom` varchar(200) NOT NULL,
  `user_grade` tinyint(1) NOT NULL DEFAULT '0',
  `user_bonus` int(8) NOT NULL,
  `country` varchar(3) NOT NULL DEFAULT 'CHN',
  `province` varchar(10) DEFAULT NULL,
  `city` varchar(10) DEFAULT NULL,
  `area` varchar(10) DEFAULT NULL,
  `structon_tb` text NOT NULL,
  `lastlog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `pay` tinyint(1) NOT NULL DEFAULT '0',
  `paydate` date NOT NULL DEFAULT '0000-00-00',
  `overdate` mediumint(3) unsigned NOT NULL DEFAULT '0',
  `clicktimes` int(10) unsigned NOT NULL DEFAULT '0',
  `pass` tinyint(4) DEFAULT '1',
  `user_ip` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `pass` (`pass`),
  KEY `user_name` (`user_name`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='网站用户表';

-- ----------------------------
--  Records of `biweb_user`
-- ----------------------------
BEGIN;
INSERT INTO `biweb_user` VALUES ('1', '', 'admin', '', 'admin', '0', 'lcaimama', '', '', '', '3', 'root', '0', '600', '', '310000', '310100', '', 'array (\n  \'company_cn\' => \'上海网务网络信息有限公司\',\n  \'company_en\' => \'\',\n  \'intro\' => \'\',\n  \'tel\' => \'021-54011321\',\n  \'email\' => \'luochao258@qq.com\',\n  \'postcode\' => \'\',\n  \'fax\' => \'\',\n  \'QQ\' => \'\',\n  \'address\' => \'\',\n  \'homepage\' => \'http://www.biweb.cn\',\n)', '2015-06-16 03:46:25', null, '0', '0000-00-00', '0', '0', '0', '127.0.0.1'), ('2', null, 'fengzhongdehong', null, '罗超', '0', 'lcaimama', null, null, '', '0', '', '0', '0', '', '', '', '', 'array (\n  \'email\' => \'luochao258@qq.com\',\n  \'tel\' => \'18243173001\',\n  \'mobile\' => \'18243173001\',\n  \'postcode\' => \'\',\n  \'address\' => \'\',\n  \'homepage\' => \'\',\n  \'intro\' => \'\',\n)', '2015-06-05 12:44:50', '2015-05-12 17:13:43', '0', '2015-05-12', '0', '0', '1', '127.0.0.1'), ('3', null, 'luochao', null, '罗超', '0', 'lcaimama', null, null, '', '0', '', '0', '0', '', '', '', '', 'array (\n  \'email\' => \'luochao258@qq.com\',\n  \'tel\' => \'0852-4620057\',\n  \'mobile\' => \'18243173001\',\n  \'postcode\' => \'564400\',\n  \'address\' => \'上海市浦东新区\',\n  \'homepage\' => \'www.wochacha.com\',\n  \'intro\' => \'hahahahahahahahahahahaha\',\n)', '2015-06-04 04:35:54', '2015-06-04 04:27:24', '0', '2015-06-04', '0', '0', '1', '127.0.0.1');
COMMIT;

-- ----------------------------
--  Table structure for `biweb_video`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_video`;
CREATE TABLE `biweb_video` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `tag` varchar(30) DEFAULT NULL,
  `bedeck` tinyint(3) unsigned DEFAULT '0',
  `title` varchar(100) DEFAULT NULL,
  `title_md5` char(32) DEFAULT NULL,
  `linkurl` varchar(100) DEFAULT NULL,
  `summary` varchar(100) DEFAULT NULL,
  `structon_tb` mediumtext,
  `thumbnail` varchar(100) DEFAULT NULL,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0',
  `stars` tinyint(1) DEFAULT '0',
  `clicktimes` mediumint(10) unsigned DEFAULT '0',
  `pass` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `title_md5` (`title_md5`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行业资讯表';

-- ----------------------------
--  Table structure for `biweb_video_type`
-- ----------------------------
DROP TABLE IF EXISTS `biweb_video_type`;
CREATE TABLE `biweb_video_type` (
  `type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `type_roue_id` varchar(80) DEFAULT NULL,
  `type_title` varchar(80) DEFAULT NULL,
  `type_link` varchar(150) DEFAULT NULL COMMENT '跳转链接',
  `type_sort` int(10) unsigned DEFAULT NULL,
  `type_pass` tinyint(1) NOT NULL DEFAULT '1',
  `type_read_grade` tinyint(1) NOT NULL DEFAULT '0',
  `type_write_grade` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`type_id`),
  KEY `type_parentid` (`type_parentid`),
  KEY `type_sort` (`type_sort`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='行业视频分类表';

SET FOREIGN_KEY_CHECKS = 1;
