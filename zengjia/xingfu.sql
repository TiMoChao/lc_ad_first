/*
 Navicat MySQL Data Transfer

 Source Server         : mydata
 Source Server Version : 50527
 Source Host           : 127.0.0.1
 Source Database       : xingfu

 Target Server Version : 50527
 File Encoding         : utf-8

 Date: 03/23/2016 16:12:19 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `xingfu_archives`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_archives`;
CREATE TABLE `xingfu_archives` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module_name` varchar(30) DEFAULT NULL COMMENT '标识名',
  `type_title_english` varchar(80) DEFAULT NULL,
  `structon_tb` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='单页介绍表';

-- ----------------------------
--  Records of `xingfu_archives`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_archives` VALUES ('1', '联系我们', 'contact', null), ('2', '公司介绍', 'company', null), ('3', '人才招聘', 'jobs', null);
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_mcenter`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_mcenter`;
CREATE TABLE `xingfu_mcenter` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `user_name` char(30) DEFAULT NULL COMMENT '登录帐号',
  `corp_name` char(60) DEFAULT NULL COMMENT '公司名称',
  `contact_address` char(60) DEFAULT NULL COMMENT '联系地址',
  `postcode` mediumint(6) DEFAULT NULL COMMENT '邮编',
  `real_name` char(20) DEFAULT NULL COMMENT '真实姓名',
  `nick_name` char(20) DEFAULT NULL COMMENT '昵称',
  `password` char(32) DEFAULT NULL COMMENT '登录密码',
  `paypassword` char(32) DEFAULT NULL COMMENT '支付密码',
  `question` tinyint(1) NOT NULL DEFAULT '0' COMMENT '密码提示问题',
  `answer` char(32) DEFAULT NULL COMMENT '密码提示答案',
  `user_money` decimal(10,2) NOT NULL COMMENT '用户帐户金额',
  `user_score` int(10) unsigned NOT NULL COMMENT '用户积分',
  `sb_money` int(10) unsigned NOT NULL COMMENT '售币',
  `province` mediumint(6) DEFAULT NULL COMMENT '省',
  `city` mediumint(6) DEFAULT NULL COMMENT '市',
  `area` mediumint(6) DEFAULT NULL COMMENT '区',
  `sex` tinyint(1) NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date DEFAULT NULL COMMENT '年龄，根据生日来推算',
  `email` char(40) DEFAULT NULL COMMENT '电子邮件',
  `tel` char(25) DEFAULT NULL COMMENT '电话',
  `mobile` char(15) DEFAULT NULL COMMENT '手机',
  `msn` char(40) DEFAULT NULL COMMENT 'MSN',
  `qq` decimal(16,0) DEFAULT NULL COMMENT 'QQ',
  `imghost` char(30) DEFAULT NULL COMMENT '图像访问域名',
  `thumbnail` char(20) DEFAULT NULL COMMENT '会员头像',
  `integrity_grade` smallint(5) unsigned zerofill NOT NULL DEFAULT '00000' COMMENT '诚信等级(5个0，第1位=身份认证，第2位=手机认证，第3位=视频认证，值0=未认证，1=已认证)',
  `lastlog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后登录时间',
  `logtimes` int(10) unsigned DEFAULT '0' COMMENT '登录次数',
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `status` tinyint(4) DEFAULT '1' COMMENT '状态,0=冻结，1=正常',
  `recommend_user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐人user_id',
  `add_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '加入网络时间',
  `parentid` int(10) unsigned NOT NULL DEFAULT '0',
  `roue_id` char(255) DEFAULT NULL,
  `host` char(20) DEFAULT NULL COMMENT '来路域名',
  `user_ip` char(23) DEFAULT NULL COMMENT '用户IP地址',
  `is_photos` tinyint(1) DEFAULT '1' COMMENT '是否显示照片,1=显示，2=网站会员可见，3认证会员可见，4有照片会员可见，5需要密码可见',
  `photopassword` char(32) DEFAULT NULL COMMENT '相册密码',
  `session_id` char(32) DEFAULT NULL COMMENT '用户SESSIONID',
  `majia` tinyint(2) DEFAULT '0' COMMENT '1为网站马甲,0为正常用户',
  `last_promotion_money` int(7) DEFAULT '0' COMMENT '上次推广奖励',
  `promotion_money` int(7) DEFAULT '0' COMMENT '推广奖励',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `email` (`email`),
  KEY `mobile` (`mobile`),
  KEY `city` (`city`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='用户中心表';

-- ----------------------------
--  Records of `xingfu_mcenter`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_mcenter` VALUES ('1', 'admin', '', '', '0', 'admin', 'ArthurXF', '4107461f503a2e9ced5a60b995b53100', '', '0', '', '0.00', '0', '0', '0', '0', '0', '1', '0000-00-00', 'luochao258@qq.com', '', '', '', '0', '', '', '0', '2015-11-15 12:41:32', '31', '2015-10-26 23:21:02', '1', '0', '2015-10-26 23:21:02', '0', '', '', '127.0.0.1', '1', null, 'cnc9dh8re4h120vnbo18cl1prh2k37ua', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_user`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_user`;
CREATE TABLE `xingfu_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `user_id` int(10) unsigned NOT NULL COMMENT '用户id',
  `nick_name` varchar(20) DEFAULT NULL COMMENT '昵称',
  `user_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '用户类型(0=普通会员，1=商家)',
  `user_group` smallint(1) NOT NULL DEFAULT '0' COMMENT '用户所属权限组',
  `user_grade` tinyint(1) NOT NULL DEFAULT '0' COMMENT '等级，星级',
  `province` mediumint(6) DEFAULT NULL COMMENT '省',
  `city` mediumint(6) DEFAULT NULL COMMENT '市',
  `area` mediumint(6) DEFAULT NULL COMMENT '区',
  `sex` tinyint(3) NOT NULL DEFAULT '0' COMMENT '性别',
  `birthday` date DEFAULT NULL COMMENT '年龄，根据生日来推算',
  `signature` varchar(30) DEFAULT NULL COMMENT '个性签名',
  `thumbnail` varchar(20) DEFAULT NULL COMMENT '会员头像',
  `integrity_grade` smallint(5) unsigned zerofill NOT NULL DEFAULT '00000' COMMENT '诚信等级(5个0，第1位=身份认证，第2位=手机认证，第3位=视频认证，值0=未认证，1=已认证)',
  `education_type` tinyint(3) NOT NULL DEFAULT '0' COMMENT '学历类型',
  `marriage_type` tinyint(3) NOT NULL DEFAULT '0' COMMENT '婚姻类型',
  `total_credit` int(10) NOT NULL DEFAULT '0' COMMENT '累计信用',
  `good_evaluate` decimal(16,0) NOT NULL COMMENT '好评率',
  `structon_tb` text NOT NULL,
  `url_short` varchar(25) NOT NULL COMMENT '推广链接',
  `lastlog` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '最后登录时间',
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00' COMMENT '注册时间',
  `topflag` tinyint(1) DEFAULT '0',
  `recommendflag` tinyint(1) DEFAULT '0' COMMENT '有头像排前',
  `clicktimes` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '人气',
  `pass` tinyint(4) DEFAULT '1' COMMENT '审核状态',
  `is_check` tinyint(1) DEFAULT '0' COMMENT '需要审核',
  `friend_num` int(10) NOT NULL COMMENT '好友数量',
  `friend_fans` int(10) NOT NULL COMMENT '粉丝数量',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_id` (`user_id`),
  KEY `total_credit` (`total_credit`),
  KEY `province` (`province`),
  KEY `city` (`city`),
  KEY `area` (`area`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='网站用户表';

-- ----------------------------
--  Records of `xingfu_user`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_user` VALUES ('1', '1', 'ArthurXF', '0', '3', '0', '0', '0', '0', '1', '0000-00-00', '', '', '0', '0', '0', '0', '0', 'array (\n  \\\'intro\\\' => \\\'我是一名光荣的U客，诚交其他U客好友，需要帮助均可联系我!\\\',\n)', '', '2015-11-15 12:41:32', '2015-10-26 23:21:03', '0', '0', '0', '1', '0', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_ImgShow`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_ImgShow`;
CREATE TABLE `xingfu_xingfu_ImgShow` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COMMENT='兴甫风采表';

-- ----------------------------
--  Records of `xingfu_xingfu_ImgShow`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_ImgShow` VALUES ('1', '1', ':1:', '1', '', '0', '第一面板图片第一面板图片', '67fc4a7805ab3010993b450bda1d2529', '', '第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板图片第一面板', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'<span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span><span style=\\\"white-space:nowrap;\\\">第一面板图片</span>\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446653867.png\\\',\n    ),\n  ),\n  \\\'video\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '1/1_1446653867.png', '2015-11-05 00:08:16', '0', '0', '0', '0', '1'), ('2', '2', ':2:', '1', '', '0', '第二版面图片', 'fd891933b5ed835aa08855119704fe31', '', '第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片第二版面图片', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'<span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span><span style=\\\"white-space:nowrap;\\\">第二版面图片</span>\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446654216.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446654216.png', '2015-11-05 00:23:36', '0', '0', '0', '0', '1'), ('3', '1', ':1:', '1', '', '0', 'aaaaaa', '0b4e7a0e5fe84ad35fb5f95b9ceeac79', '', 'asdasdasdasdasd', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'asdasdasdasdasd\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/3_1446738398.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/3_1446738398.png', '2015-11-05 23:46:38', '0', '0', '0', '0', '1'), ('4', '1', ':1:', '1', '', '0', 'asfssfsaz', '37eaef93a25def9dadc705d2af5a6ae7', '', 'safasdfsafasff', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'safasdfsafasff\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/4_1446738447.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/4_1446738447.png', '2015-11-05 23:47:27', '0', '0', '0', '0', '1'), ('5', '1', ':1:', '1', '', '0', 'dfsfsafdzzvasf', '83fcfa82a39a9b95822451a8cca96ab7', '', 'sdddddddddddddddddddddddddddddd', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdddddddddddddddddddddddddddddd\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/5_1446738473.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/5_1446738473.png', '2015-11-05 23:47:53', '0', '0', '0', '0', '1'), ('6', '2', ':2:', '1', '', '0', 'sdfsdfsdfsdgzdg', '1c6c81dbdc900537ed6b15955b5e99e0', '', 'zxzxvxzdgsdzfsdfsdfsdfsdf', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'zxzxvxzdgsdzfsdfsdfsdfsdf\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/6_1446738522.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/6_1446738522.png', '2015-11-05 23:48:42', '0', '0', '0', '0', '1'), ('7', '2', ':2:', '1', '', '0', 'sfdfsdgsdzfzdgsgadsff', 'b0288fd938bab4add69cfb82b8b29a3f', '', 'sdgzdfzxvzxcvgsdfsdfdsgsdzxv', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdgzdfzxvzxcvgsdfsdfdsgsdzxv\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/7_1446738570.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/7_1446738570.png', '2015-11-05 23:49:30', '0', '0', '0', '0', '1'), ('8', '3', ':3:', '1', '', '0', 'sdfsdfwegwerwe', '07cdb03de3ba34d0611348ba166cdbc5', '', 'sdggggggggggggggggggggggggggggggg', 'array (\n  \\\'meta_Title\\\' => \\\'sfdsf\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdggggggggggggggggggggggggggggggg\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/8_1446738606.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/8_1446738606.png', '2015-11-05 23:50:06', '0', '0', '0', '0', '1'), ('9', '3', ':3:', '1', '', '0', 'tttttttttttttttttttttttttttttt', '3c48c287bc783516ac89297848a104fe', '', 'sdfsdddddddddddddddddddddddddddddddddddd', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdfsdddddddddddddddddddddddddddddddddddd\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/9_1446738637.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/9_1446738637.png', '2015-11-05 23:50:37', '0', '0', '0', '0', '1'), ('10', '3', ':3:', '1', '', '0', 'sdfsddsffffffffffffffffffffffffffffffff', '36337c45bd4e7667720ea005decf58db', '', 'sdgsdgsdfsfdsgsgadgdg', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdgsdgsdfsfdsgsgadgdg\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/10_1446738678.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/10_1446738678.png', '2015-11-05 23:51:18', '0', '0', '0', '2', '1'), ('11', '3', ':3:', '1', '', '0', 'ffffsdfghrewewer', 'bdb4b5b3b5e3c39c544dce1ebf19fcec', '', 'sdgsdgsdfsfdsgsgadgdg', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdgsdgsdfsfdsgsgadgdg\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/11_1446738713.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/11_1446738713.png', '2015-11-05 23:51:53', '0', '0', '0', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_ImgShow_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_ImgShow_type`;
CREATE TABLE `xingfu_xingfu_ImgShow_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='兴甫风采分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_ImgShow_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_ImgShow_type` VALUES ('1', '0', ':1:', '第一面板图片', '', '0', '1', '0', '0'), ('2', '0', ':2:', '第二面板图片', '', '0', '1', '0', '0'), ('3', '0', ':3:', '第三面板图片', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_Introduction`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_Introduction`;
CREATE TABLE `xingfu_xingfu_Introduction` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='兴甫简介表';

-- ----------------------------
--  Records of `xingfu_xingfu_Introduction`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_Introduction` VALUES ('1', '1', ':1:', '1', '', '0', '兴甫简介', 'eee31a79feb55dad0643e05ac0096391', '', 'V8引擎本身使用了一些最新的编译技术。这使得用Javascript这类脚本语言编写出来的代码运行速度获得了极大提升，却节省了开发成本。对性能的苛求是Node的一个关键因素。 Javascript是一个', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'<div class=\\\"para\\\" style=\\\"white-space:normal;font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\\\">\r\n	V8引擎本身使用了一些最新的编译技术。这使得用Javascript这类<a target=\\\"_blank\\\" href=\\\"http://baike.baidu.com/view/76320.htm\\\" style=\\\"color:#136EC2;text-decoration:none;\\\">脚本语言</a>编写出来的代码运行速度获得了极大提升，却节省了开发成本。对性能的苛求是Node的一个关键因素。 Javascript是一个<a target=\\\"_blank\\\" href=\\\"http://baike.baidu.com/view/536048.htm\\\" style=\\\"color:#136EC2;text-decoration:none;\\\">事件驱动</a>语言，Node利用了这个优点，编写出可扩展性高的服务器。Node采用了一个称为“事件循环(event loop）”的架构，使得编写可扩展性高的服务器变得既容易又安全。提高服务器性能的技巧有多种多样。Node选择了一种既能提高性能，又能减低开发复杂度的架构。这是一个非常重要的特性。并发编程通常很复杂且布满地雷。Node绕过了这些，但仍提供很好的性能。\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"white-space:normal;font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\\\">\r\n	Node采用一系列“非阻塞”库来支持事件循环的方式。本质上就是为文件系统、数据库之类的资源提供接口。向文件系统发送一个请求时，无需等待硬盘（<a target=\\\"_blank\\\" href=\\\"http://baike.baidu.com/view/1303626.htm\\\" style=\\\"color:#136EC2;text-decoration:none;\\\">寻址</a>并检索文件），硬盘准备好的时候非阻塞接口会通知Node。该模型以可扩展的方式简化了对慢资源的访问， 直观，易懂。尤其是对于熟悉<a target=\\\"_blank\\\" href=\\\"http://baike.baidu.com/view/3587213.htm\\\" style=\\\"color:#136EC2;text-decoration:none;\\\">onmouseover</a>、onclick等<a target=\\\"_blank\\\" href=\\\"http://baike.baidu.com/subview/14806/8904138.htm\\\" style=\\\"color:#136EC2;text-decoration:none;\\\">DOM</a>事件的用户，更有一种似曾相识的感觉。\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"white-space:normal;font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\\\">\r\n	虽然让Javascript运行于服务器端不是Node的独特之处，但却是其一强大功能。不得不承认，浏览器环境限制了我们选择编程语言的自由。任何服务器与日益复杂的浏览器客户端应用程序间共享代码的愿望只能通过Javascript来实现。虽然还存在其他一些支持Javascript在服务器端 运行的平台，但因为上述特性，Node发展迅猛，成为事实上的平台。\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"white-space:normal;font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\\\">\r\n	在Node启动的很短时间内，社区就已经贡献了大量的扩展库（模块）。其中很多是连接数据库或是其他软件的驱动，但还有很多是凭他们的实力制作出来的非常有用的软件。\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"white-space:normal;font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;background-color:#FFFFFF;\\\">\r\n	最后，不得不提到的是Node社区。虽然Node项目还非常年轻，但很少看到对一个项目如此狂热的社区。不管是新手，还是专家，大家都围绕着项目，使用并贡献自己的能力，致力于打造一个探索、支持、分享、听取建议的乐土。\r\n</div>\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446834036.png\\\',\n    ),\n  ),\n  \\\'video\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '1/1_1446834036.png', '2015-11-07 02:20:36', '0', '0', '0', '12', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_Introduction_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_Introduction_type`;
CREATE TABLE `xingfu_xingfu_Introduction_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫简介分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_Introduction_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_Introduction_type` VALUES ('1', '0', ':1:', '兴甫简介', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_Notice`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_Notice`;
CREATE TABLE `xingfu_xingfu_Notice` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='网站公告表';

-- ----------------------------
--  Records of `xingfu_xingfu_Notice`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_Notice` VALUES ('1', '1', ':1:', '1', '', '0', '哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈', '79465579f0dc808cd1060818a9895c73', '', '哈哈哈哈哈哈哈哈哈哈哈哈哈', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'哈哈哈哈哈哈哈哈哈哈哈哈哈\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446960182.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446960182.jpg', '2015-11-08 13:23:02', '0', '0', '0', '0', '1'), ('2', '2', ':2:', '1', '', '0', '哈啊沙发沙发沙发是飞洒发', '94f133dde4567865ecf6adc324fd0413', '', '阿斯顿发生的法师法师的', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'阿斯顿发生的法师法师的\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446960201.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446960201.jpg', '2015-11-08 13:23:21', '0', '0', '0', '0', '1'), ('3', '2', ':2:', '1', '', '0', '阿斯顿发送到噶司法所', '5ade3948cac9c7daa8ae8428c0073100', '', '阿斯蒂芬嘎斯的伽师瓜', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'阿斯蒂芬嘎斯的伽师瓜\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/3_1446960220.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/3_1446960220.jpg', '2015-11-08 13:23:40', '0', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_Notice_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_Notice_type`;
CREATE TABLE `xingfu_xingfu_Notice_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='网站公告分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_Notice_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_Notice_type` VALUES ('1', '0', ':1:', '首页滑动广告公告', '', '0', '1', '0', '0'), ('2', '0', ':2:', '网站公告', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_admissions`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_admissions`;
CREATE TABLE `xingfu_xingfu_admissions` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='招生简介表';

-- ----------------------------
--  Records of `xingfu_xingfu_admissions`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_admissions` VALUES ('1', '1', ':1:', '1', '', '0', '招生简介', '7085a8b2a6f1e08660ed8c634296396d', '', 'Node.js使用Module模块去划分不同的功能，以简化应用的开发。Modules模块有点象C语言中的类库。每一个Node.js的类库都包含了十分丰富的各类函数，比如http模块就包含了和http功', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	Node.js使用Module模块去划分不同的功能，以简化应用的开发。Modules模块有点象C语言中的类库。每一个Node.js的类库都包含了十分丰富的各类函数，比如http模块就包含了和http功能相关的很多函数，可以帮助开发者很容易地对比如http,tcp/udp等进行操作，还可以很容易的创建http和tcp/udp的服务器。\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	要在程序中使用模块是十分方便的，只需要如下：\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	在这里，引入了http类库，并且对http类库的引用存放在http变量中了。这个时候，node.js会在我们应用中搜索是否存在node_modules的目录，并且搜索这个目录中是否存在http的模块。如果node.js找不到这个目录，则会到全局模块缓存中去寻找，用户可以通过相对或者绝对路径，指定模块的位置，比如：\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	var myModule = require(\\\\\\\'./myModule.js\\\\\\\');\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	模块中包含了很多功能代码片断，在模块中的代码大部分都是私有的，意思是在模块中定义的函数方法和变量，都只能在同一个模块中被调用。当然，可以将某些方法和变量暴露到模块外，这个时候可以使用exports对象去实现。\r\n</div>\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446835652.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446835652.png', '2015-11-07 02:47:32', '0', '0', '0', '0', '1'), ('2', '1', ':1:', '1', '', '0', '招生简介', '7085a8b2a6f1e08660ed8c634296396d', '', 'Node.js使用Module模块去划分不同的功能，以简化应用的开发。Modules模块有点象C语言中的类库。每一个Node.js的类库都包含了十分丰富的各类函数，比如http模块就包含了和http功', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	Node.js使用Module模块去划分不同的功能，以简化应用的开发。Modules模块有点象C语言中的类库。每一个Node.js的类库都包含了十分丰富的各类函数，比如http模块就包含了和http功能相关的很多函数，可以帮助开发者很容易地对比如http,tcp/udp等进行操作，还可以很容易的创建http和tcp/udp的服务器。\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	要在程序中使用模块是十分方便的，只需要如下：\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	在这里，引入了http类库，并且对http类库的引用存放在http变量中了。这个时候，node.js会在我们应用中搜索是否存在node_modules的目录，并且搜索这个目录中是否存在http的模块。如果node.js找不到这个目录，则会到全局模块缓存中去寻找，用户可以通过相对或者绝对路径，指定模块的位置，比如：\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	var myModule = require(\\\\\\\'./myModule.js\\\\\\\');\r\n</div>\r\n<div class=\\\"para\\\" style=\\\"font-size:14px;color:#333333;margin-bottom:15px;text-indent:2em;line-height:24px;zoom:1;font-family:arial, 宋体, sans-serif;white-space:normal;background-color:#FFFFFF;\\\">\r\n	模块中包含了很多功能代码片断，在模块中的代码大部分都是私有的，意思是在模块中定义的函数方法和变量，都只能在同一个模块中被调用。当然，可以将某些方法和变量暴露到模块外，这个时候可以使用exports对象去实现。\r\n</div>\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446966492.png\\\',\n    ),\n  ),\n  \\\'video\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '1/2_1446966492.png', '2015-11-07 02:48:01', '0', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_admissions_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_admissions_type`;
CREATE TABLE `xingfu_xingfu_admissions_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='招生简介分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_admissions_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_admissions_type` VALUES ('1', '0', ':1:', '招生简介', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_apply`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_apply`;
CREATE TABLE `xingfu_xingfu_apply` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type_id` tinyint(3) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT '0',
  `author` varchar(30) DEFAULT NULL,
  `structon_tb` mediumtext,
  `submit_date` datetime DEFAULT '0000-00-00 00:00:00',
  `state` tinyint(1) unsigned DEFAULT '0' COMMENT '处理状态',
  `user_ip` char(23) DEFAULT NULL COMMENT '用户IP地址',
  `pass` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type_id` (`type_id`),
  KEY `submit_date` (`submit_date`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='站内消息表';

-- ----------------------------
--  Records of `xingfu_xingfu_apply`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_apply` VALUES ('1', '1', '1', null, 'array (\n  \\\'name\\\' => \\\'罗超\\\',\n  \\\'age\\\' => \\\'24\\\',\n  \\\'sex\\\' => \\\'男\\\',\n  \\\'ethnic\\\' => \\\'汉\\\',\n  \\\'address\\\' => \\\'贵州省余庆县\\\',\n  \\\'iphone\\\' => \\\'18243173001\\\',\n  \\\'class_type\\\' => \\\'哈哈哈哈\\\',\n  \\\'class\\\' => \\\'大班\\\',\n  \\\'weichat\\\' => \\\'家长微信号\\\',\n)', '2015-11-08 03:23:46', '2', '127.0.0.1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_coach`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_coach`;
CREATE TABLE `xingfu_xingfu_coach` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='名师风采表';

-- ----------------------------
--  Records of `xingfu_xingfu_coach`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_coach` VALUES ('1', '1', ':1:', '1', '', '0', '李教练', 'de7cf7d6d0104e7258e5b58fdaf210ac', '', '原贵州省武术协会副主席:周辛甫,江苏省徐州市人，出生于武术世家，年幼习武，1930年考入徐州武术馆，时年15岁。在国内著名拳师房龙英、李耀朴麾下全心学习，精于刀、剑、拳和对练，涉猎了枪、棍、戟、铲、镗', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'<span style=\\\"color:#FC7F31;font-family:宋体;line-height:20px;white-space:normal;background-color:#FFFFFF;\\\">原贵州省武术协会副主席:周辛甫,江苏省徐州市人，出生于武术世家，年幼习武，1930年考入徐州武术馆，时年15岁。在国内著名拳师房龙英、李耀朴麾下全心学习，精于刀、剑、拳和对练，涉猎了枪、棍、戟、铲、镗、月、拐、鞭多种器械。1940年被国民党第七师聘为中尉武术教官，1945年转到的八十四师任上尉武术教官。由于功底扎实，口碑极好，遂被举荐到国民党总统府警卫总队任少校教官，作为李宗仁的贴身警卫。解放后，随国民党新编四十八师在广西新州起义，回到人们怀抱。举家南进途经贵州时，被这一方适宜的气候、秀丽的山水所吸引，于是落户安龙。在新中国成立初期，体育战绩一派欣欣向荣的景象，他一边参赛，一边育人。在全省武术比赛中一举夺得长拳冠军，在全国武术比赛，先后获得二、三等奖。在黔西南州培育了500多名少年选手，为安龙获取“全国武术之乡”荣誉奠定了人才基础。 1982年被推举为贵州省武术协会副主席。同时担任省武术队教练，在第一线拼杀。 1984年率队参加“全国第二界工运会”，夺得朴刀进枪对练一等奖、盾牌进刀对练二等奖，优异的成绩振奋了在努力拼搏的贵州武术界；1986年，省体委为筹办参加全国六运会，又将他从安龙招回，担任省武术队教练，经过顶着酷暑寒风一年的苦练，在1987年全国六运会上获预赛第三名，决赛第七名。返黔后，终因劳累过度病倒了。一年以后去世，葬于安龙县，享年74岁。 贵阳市兴甫武术学校简介 贵阳兴甫武术学校始建于1994年，是一所具有幼儿园和专业武术业余培训学校。二十一年来，学校始终坚持“严格管理争创一流，培养德艺双馨人才”的办学宗旨。教学中始终坚持学习和发扬国内武术名家的传统和精髓，特别是继承和发扬了贵州省武术家周辛甫长达60余载的武术技艺，使我校教学方法别具一格独具特色，深受青少年欢迎。业余武术训练中我们结合教学实践与贵阳市体校联合办学，即保证训练场馆又拥有过硬的教学设施，共同推动了贵州武术事业向前发展。 “百年大计甘于奉献，育得桃李满园春”建校二十一年，共培训学生20000余人。在国际、国内、省市武术比赛中共获金牌436枚、银牌249枚、铜牌172枚，成为贵州史上获金牌最多的武术学校。为贵州争得了荣誉，为武术事业做出了贡献，向全国各大院校输送了一批优秀人才。 1999年、2003年、2007年（每四年评比一次）三届蝉联“贵阳市先进学校”。 2005年3月，兴甫武校首开贵州武术史上中外交流之先河，迎接瑞典武术团一行25人到校进行访问交流；2007年12月，美国“人民对人民”大学教师团到我校学习交流。 展望未来，我们将继续贯彻“严格管理争创一流，培养德艺双馨人才”的办学宗旨，集思广益，不断提高办学水平，朝着“让学生满意、家长放心、社会认同”的方向发展，培育出更多的优秀人才，去迎接更加辉煌的明天。 贵阳市兴甫武术学校是以我省老一辈武术家“周辛甫”先生名字命名，周辛甫（原贵州省武术协会副主席）江苏省徐州市人，自幼习武，15岁时考入徐州武术馆，师从国内著名拳师房龙英、李耀朴，精于刀、剑、拳和对练，涉猎了枪、棍、戟、铲、镗、月、拐、鞭多种器械。1945年被国民党总统府警卫总队选中，任李宗仁副总统的贴身侍卫并兼任国民党总统府警卫总队少校教官，后随部队起义，落户贵州。曾在全国、全省武术比赛中夺得长拳冠军及二等奖。担任贵州省武术队教练期间率队参加 “全国武术比赛”“全国第二届</span>\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446968139.png\\\',\n    ),\n  ),\n  \\\'video\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '1/1_1446968139.png', '2015-11-07 22:21:48', '0', '0', '0', '0', '1'), ('2', '1', ':1:', '1', '', '0', '罗教练', '1f16b676647ce6679d91eea83e46defe', '', '原贵州省武术协会副主席:周辛甫,江苏省徐州市人，出生于武术世家，年幼习武，1930年考入徐州武术馆，时年15岁。在国内著名拳师房龙英、李耀朴麾下全心学习，精于刀、剑、拳和对练，涉猎了枪、棍、戟、铲、镗', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'<span style=\\\"color:#FC7F31;font-family:宋体;line-height:20px;white-space:normal;background-color:#FFFFFF;\\\">原贵州省武术协会副主席:周辛甫,江苏省徐州市人，出生于武术世家，年幼习武，1930年考入徐州武术馆，时年15岁。在国内著名拳师房龙英、李耀朴麾下全心学习，精于刀、剑、拳和对练，涉猎了枪、棍、戟、铲、镗、月、拐、鞭多种器械。1940年被国民党第七师聘为中尉武术教官，1945年转到的八十四师任上尉武术教官。由于功底扎实，口碑极好，遂被举荐到国民党总统府警卫总队任少校教官，作为李宗仁的贴身警卫。解放后，随国民党新编四十八师在广西新州起义，回到人们怀抱。举家南进途经贵州时，被这一方适宜的气候、秀丽的山水所吸引，于是落户安龙。在新中国成立初期，体育战绩一派欣欣向荣的景象，他一边参赛，一边育人。在全省武术比赛中一举夺得长拳冠军，在全国武术比赛，先后获得二、三等奖。在黔西南州培育了500多名少年选手，为安龙获取“全国武术之乡”荣誉奠定了人才基础。 1982年被推举为贵州省武术协会副主席。同时担任省武术队教练，在第一线拼杀。 1984年率队参加“全国第二界工运会”，夺得朴刀进枪对练一等奖、盾牌进刀对练二等奖，优异的成绩振奋了在努力拼搏的贵州武术界；1986年，省体委为筹办参加全国六运会，又将他从安龙招回，担任省武术队教练，经过顶着酷暑寒风一年的苦练，在1987年全国六运会上获预赛第三名，决赛第七名。返黔后，终因劳累过度病倒了。一年以后去世，葬于安龙县，享年74岁。 贵阳市兴甫武术学校简介 贵阳兴甫武术学校始建于1994年，是一所具有幼儿园和专业武术业余培训学校。二十一年来，学校始终坚持“严格管理争创一流，培养德艺双馨人才”的办学宗旨。教学中始终坚持学习和发扬国内武术名家的传统和精髓，特别是继承和发扬了贵州省武术家周辛甫长达60余载的武术技艺，使我校教学方法别具一格独具特色，深受青少年欢迎。业余武术训练中我们结合教学实践与贵阳市体校联合办学，即保证训练场馆又拥有过硬的教学设施，共同推动了贵州武术事业向前发展。 “百年大计甘于奉献，育得桃李满园春”建校二十一年，共培训学生20000余人。在国际、国内、省市武术比赛中共获金牌436枚、银牌249枚、铜牌172枚，成为贵州史上获金牌最多的武术学校。为贵州争得了荣誉，为武术事业做出了贡献，向全国各大院校输送了一批优秀人才。 1999年、2003年、2007年（每四年评比一次）三届蝉联“贵阳市先进学校”。 2005年3月，兴甫武校首开贵州武术史上中外交流之先河，迎接瑞典武术团一行25人到校进行访问交流；2007年12月，美国“人民对人民”大学教师团到我校学习交流。 展望未来，我们将继续贯彻“严格管理争创一流，培养德艺双馨人才”的办学宗旨，集思广益，不断提高办学水平，朝着“让学生满意、家长放心、社会认同”的方向发展，培育出更多的优秀人才，去迎接更加辉煌的明天。 贵阳市兴甫武术学校是以我省老一辈武术家“周辛甫”先生名字命名，周辛甫（原贵州省武术协会副主席）江苏省徐州市人，自幼习武，15岁时考入徐州武术馆，师从国内著名拳师房龙英、李耀朴，精于刀、剑、拳和对练，涉猎了枪、棍、戟、铲、镗、月、拐、鞭多种器械。1945年被国民党总统府警卫总队选中，任李宗仁副总统的贴身侍卫并兼任国民党总统府警卫总队少校教官，后随部队起义，落户贵州。曾在全国、全省武术比赛中夺得长拳冠军及二等奖。担任贵州省武术队教练期间率队参加 “全国武术比赛”“全国第二届</span>\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446906142.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446906142.jpg', '2015-11-07 22:22:22', '0', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_coach_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_coach_type`;
CREATE TABLE `xingfu_xingfu_coach_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='名师风采分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_coach_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_coach_type` VALUES ('1', '0', ':1:', '名师风采', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_news`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_news`;
CREATE TABLE `xingfu_xingfu_news` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='兴甫新闻表';

-- ----------------------------
--  Records of `xingfu_xingfu_news`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_news` VALUES ('1', '1', ':1:', '1', '', '0', 'gdgsds', '788f8ba6b373a0a2e66d55c63ecdca25', '', 'sdfsfsdfsdgdsf', 'array (\n  \\\'meta_Title\\\' => \\\'dfsfsd\\\',\n  \\\'meta_Description\\\' => \\\'sdfsd\\\',\n  \\\'meta_Keywords\\\' => \\\'sdfsdf\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdfsfsdfsdgdsf\\\',\n)', '', '2015-11-03 00:33:38', '0', '0', '0', '9', '1'), ('3', '1', ':1:', '1', '', '0', '测试测试', 'a0c83707b5438e080655df34a78142f4', '', '阿斯顿撒打算打算发生大发达股份', 'array (\n  \\\'author\\\' => \\\'罗超\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'阿斯顿撒打算打算发生大发达股份\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/3_1446963985.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/3_1446963985.png', '2015-11-08 14:26:25', '0', '0', '0', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_news_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_news_type`;
CREATE TABLE `xingfu_xingfu_news_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='兴甫新闻分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_news_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_news_type` VALUES ('1', '0', ':1:', '兴甫新闻', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_pic`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_pic`;
CREATE TABLE `xingfu_xingfu_pic` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='首页滑动图片表';

-- ----------------------------
--  Records of `xingfu_xingfu_pic`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_pic` VALUES ('1', '1', ':1:', '1', '', '0', '图片一', '777e4f5e5c2e4e0e88cbf919d70c7eb9', '', '图片一', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'图片一\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446910787.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446910787.png', '2015-11-07 23:39:47', '0', '0', '0', '4', '1'), ('2', '1', ':1:', '1', '', '0', '图片二', '87a0383db65a69b3daddb5e8ad31c3cb', '', '图片二', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'图片二\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446911002.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446911002.png', '2015-11-07 23:43:22', '0', '0', '0', '2', '1'), ('3', '1', ':1:', '1', '', '0', '图片三', 'd0584efc33c242b250046a3a2cc03a9b', '', '图片三', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'图片三\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/3_1446911032.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/3_1446911032.png', '2015-11-07 23:43:52', '0', '0', '0', '2', '1'), ('4', '1', ':1:', '1', '', '0', '图片', '20def7942674282277c3714ed7ea6ce0', '', '图片三', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'图片三\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/4_1446911070.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/4_1446911070.png', '2015-11-07 23:44:30', '0', '0', '0', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_pic_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_pic_type`;
CREATE TABLE `xingfu_xingfu_pic_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='首页滑动图片分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_pic_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_pic_type` VALUES ('1', '0', ':1:', '首页滑动图片', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school`;
CREATE TABLE `xingfu_xingfu_school` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园表';

-- ----------------------------
--  Records of `xingfu_xingfu_school`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school` VALUES ('13', '8', ':8:', '1', '', '0', '测试测试测试测试', 'fc78e849dc6a8189d6a66a7bbf73a167', '', '撒旦撒饭', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'撒旦撒饭\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/13_1446964108.png\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/13_1446964108.png', '2015-11-08 14:28:28', '0', '0', '0', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_Basic_courses`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_Basic_courses`;
CREATE TABLE `xingfu_xingfu_school_Basic_courses` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 基本课程表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_Basic_courses`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_Basic_courses` VALUES ('1', '1', ':1:', '1', '', '0', '基本课程', '9cd7263c02ad928307a55d5f89d2e4f6', '', '基本课程', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'基本课程\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446839508.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446839508.jpg', '2015-11-07 03:51:48', '0', '0', '0', '4', '1'), ('2', '1', ':1:', '1', '', '0', '撒发生法撒旦伽师瓜', 'c7bc1cd3ce7dfa31cb365a243fb006d8', '', '阿斯顿噶十多个2323223', 'array (\n  \\\'intro\\\' => \\\'股份公司G钟点工丈夫还是带\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446966856.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446966856.jpg', '2015-11-08 15:14:16', '0', '0', '0', '2', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_Basic_courses_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_Basic_courses_type`;
CREATE TABLE `xingfu_xingfu_school_Basic_courses_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 基本课程分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_Basic_courses_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_Basic_courses_type` VALUES ('1', '0', ':1:', '基本课程', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_Notice`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_Notice`;
CREATE TABLE `xingfu_xingfu_school_Notice` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 通知公告表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_Notice`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_Notice` VALUES ('1', '1', ':1:', '1', '', '0', '通知公告', '3163744dbe361887056da8250aadd67a', '', '通知公告', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'通知公告\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446839784.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446839784.jpg', '2015-11-07 03:56:24', '0', '0', '0', '0', '1'), ('2', '1', ':1:', '1', '', '0', '通知公告2', '34a4974fb198382803816bb30d3c933d', '', '通知公告', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'通知公告\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446839807.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446839807.jpg', '2015-11-07 03:56:47', '0', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_Notice_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_Notice_type`;
CREATE TABLE `xingfu_xingfu_school_Notice_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 通知公告分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_Notice_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_Notice_type` VALUES ('1', '0', ':1:', '通知公告', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_class`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_class`;
CREATE TABLE `xingfu_xingfu_school_class` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 班级信息表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_class`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_class` VALUES ('1', '1', ':1:', '1', '', '0', '小一班', '4be1872959962550dd47bf94140ac73a', '', '小一班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'小一班\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446878161.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446878161.jpg', '2015-11-07 14:36:01', '0', '0', '0', '0', '1'), ('2', '1', ':1:', '1', '', '0', '小二班', '53299a1d586d670a55180e7c52adec46', '', '小二班我问问', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'小二班我问问\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446878187.jpg\\\',\n    ),\n  ),\n  \\\'video\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '1/2_1446878187.jpg', '2015-11-07 14:36:27', '0', '0', '0', '0', '1'), ('3', '1', ':1:', '1', '', '0', '小三班', 'e84444c33f1a34e9c64af99aa2435183', '', '小三班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'小三班\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/3_1446878210.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/3_1446878210.jpg', '2015-11-07 14:36:50', '0', '0', '0', '2', '1'), ('4', '1', ':1:', '1', '', '0', '中一班', 'd5be571e17aafa468695966a4bf2eea8', '', '中一班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'中一班\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/4_1446878230.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/4_1446878230.jpg', '2015-11-07 14:37:10', '0', '0', '0', '0', '1'), ('5', '1', ':1:', '1', '', '0', '中二班', '11c712f28e31d36343a16536c0c7e440', '', '中二班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'中二班\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/5_1446878251.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/5_1446878251.jpg', '2015-11-07 14:37:31', '0', '0', '0', '0', '1'), ('6', '1', ':1:', '1', '', '0', '中三班', '30a6b148def57fca4fe47e3a03e4a747', '', '中三班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'中三班\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/6_1446878276.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/6_1446878276.jpg', '2015-11-07 14:37:56', '0', '0', '0', '0', '1'), ('7', '1', ':1:', '1', '', '0', '大一班', '9a7d7949e88e477907570536d7b59c1b', '', '大一班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'大一班\\\',\n)', '', '2015-11-07 14:59:14', '0', '0', '0', '0', '1'), ('8', '1', ':1:', '1', '', '0', '大二班', '0f93bc4132f9851c8b4f341f9b7cce24', '', '大二班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'大二班\\\',\n)', '', '2015-11-07 14:59:36', '0', '0', '0', '0', '1'), ('9', '1', ':1:', '1', '', '0', '大三班', '029ec383a247f5f4e333e3b8ac2c663b', '', '大三班', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'大三班\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/9_1446879611.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/9_1446879611.jpg', '2015-11-07 15:00:11', '0', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_class_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_class_type`;
CREATE TABLE `xingfu_xingfu_school_class_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 班级信息分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_class_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_class_type` VALUES ('1', '0', ':1:', '班级信息', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_moment`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_moment`;
CREATE TABLE `xingfu_xingfu_school_moment` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 精彩瞬间表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_moment`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_moment` VALUES ('1', '1', ':1:', '1', '', '0', '精彩瞬间', 'eb91fd20c8dc625b64e181698ff603d6', '', '精彩瞬间', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'精彩瞬间\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446839599.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446839599.jpg', '2015-11-07 03:53:19', '0', '0', '0', '0', '1'), ('2', '1', ':1:', '1', '', '0', '测试精彩瞬间', '2c2896ea803e03bfe903a25a6f1bdcaa', '', 'asd啊实打实', 'array (\n  \\\'intro\\\' => \\\'啊沙发是飞洒发生\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446967288.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446967288.jpg', '2015-11-08 15:21:28', '0', '0', '0', '4', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_moment_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_moment_type`;
CREATE TABLE `xingfu_xingfu_school_moment_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 精彩瞬间分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_moment_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_moment_type` VALUES ('1', '0', ':1:', '精彩瞬间', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_news`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_news`;
CREATE TABLE `xingfu_xingfu_school_news` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 园所新闻表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_news`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_news` VALUES ('1', '1', ':1:', '1', '', '0', '园所新闻', '0765361fbd1e1952ee60b1149c35bb10', '', '园所新闻测试测试', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'园所新闻\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446839636.jpg\\\',\n    ),\n  ),\n  \\\'video\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '1/1_1446839636.jpg', '2015-11-07 03:53:56', '0', '0', '0', '0', '1'), ('2', '1', ':1:', '1', '', '0', '园所新闻2', 'aa3c5a9eebc30d84577bdfe578779d1c', '', '园所新闻', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'园所新闻\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/2_1446839667.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/2_1446839667.jpg', '2015-11-07 03:54:27', '0', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_news_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_news_type`;
CREATE TABLE `xingfu_xingfu_school_news_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 园所新闻分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_news_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_news_type` VALUES ('1', '0', ':1:', '园所新闻', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_show`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_show`;
CREATE TABLE `xingfu_xingfu_school_show` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 园所展区表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_show`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_show` VALUES ('1', '1', ':1:', '1', '', '0', '园所展区单点', '8fb815c3bd0b5f7d3da4d97cdea7cf84', '', '园所展区', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'园所展区\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446839704.jpg\\\',\n    ),\n  ),\n  \\\'video\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '1/1_1446839704.jpg', '2015-11-07 03:55:04', '0', '0', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_show_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_show_type`;
CREATE TABLE `xingfu_xingfu_school_show_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 园所展区分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_show_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_show_type` VALUES ('1', '0', ':1:', '园所展区', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_teacher`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_teacher`;
CREATE TABLE `xingfu_xingfu_school_teacher` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 园丁风采表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_teacher`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_teacher` VALUES ('1', '1', ':1:', '1', '', '0', '园丁风采', 'baed26f269573018320cba910897c3c1', '', '园丁风采', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'园丁风采\\\',\n  \\\'photo\\\' => \n  array (\n    0 => \n    array (\n      \\\'photo\\\' => \\\'1/1_1446839750.jpg\\\',\n      \\\'photo_narrate\\\' => \\\'\\\',\n    ),\n  ),\n)', '1/1_1446839750.jpg', '2015-11-07 03:55:50', '0', '0', '0', '4', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_teacher_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_teacher_type`;
CREATE TABLE `xingfu_xingfu_school_teacher_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园_ 园丁风采分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_teacher_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_teacher_type` VALUES ('1', '0', ':1:', '园丁风采', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_school_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_school_type`;
CREATE TABLE `xingfu_xingfu_school_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='兴甫幼儿园分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_school_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_school_type` VALUES ('8', '0', ':8:', '首页滑动图片', '', '0', '1', '0', '0');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_teaching`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_teaching`;
CREATE TABLE `xingfu_xingfu_teaching` (
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
  `thumbnail` varchar(30) DEFAULT NULL,
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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='武术教学表';

-- ----------------------------
--  Records of `xingfu_xingfu_teaching`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_teaching` VALUES ('5', '1', ':1:', '1', '', '0', 'eeqweqwrzsfsafsa', '958ed4d3c9bc11c2a4ff460c0c804e60', '', '44444444444444444444444444444444444444444', 'array (\n  \\\'meta_Title\\\' => \\\'sfdasfsaf\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'44444444444444444444444444444444444444444\\\',\n  \\\'video\\\' => \n  array (\n    0 => \n    array (\n      \\\'video\\\' => \\\'f/1/5_1446751176.flv\\\',\n      \\\'video_link\\\' => \\\'\\\',\n      \\\'videopic\\\' => \\\'\\\',\n      \\\'video_narrate\\\' => \\\'简介1\\\',\n      \\\'video_title\\\' => \\\'标题1\\\',\n      \\\'video_time\\\' => \\\'\\\',\n    ),\n  ),\n  \\\'photo\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '', '2015-11-06 03:19:36', '0', '0', '0', '8', '1'), ('6', '1', ':1:', '1', '', '0', 'a&#039;s&#039;da&#039;s&#039;d', '26d592faabebd9b0eab12a428fde193c', '', '啊实打实的', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'啊实打实的\\\',\n  \\\'video\\\' => \n  array (\n    0 => \n    array (\n      \\\'video\\\' => \\\'f/1/6_1446754045.flv\\\',\n      \\\'video_link\\\' => \\\'\\\',\n      \\\'videopic\\\' => \\\'\\\',\n      \\\'video_narrate\\\' => \\\'asfasdasdrrrrr\\\',\n      \\\'video_title\\\' => \\\'ssafasfasdfsdfsdf44444\\\',\n      \\\'video_time\\\' => \\\'\\\',\n    ),\n  ),\n  \\\'photo\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '', '2015-11-06 04:07:25', '0', '0', '0', '1', '1'), ('7', '1', ':1:', '1', '', '0', 'tara', '2c842d72963554e4ca6286bb120777f6', '', 'tara最新单曲！', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'tara最新单曲！\\\',\n  \\\'video\\\' => \n  array (\n    0 => \n    array (\n      \\\'video\\\' => \\\'f/1/7_1446757813.flv\\\',\n      \\\'video_narrate\\\' => \\\'\\\',\n      \\\'video_title\\\' => \\\'\\\',\n      \\\'video_time\\\' => \\\'\\\',\n      \\\'videopic\\\' => \\\'1/7_1446757814.png\\\',\n    ),\n  ),\n)', '', '2015-11-06 05:10:13', '0', '0', '0', '0', '1'), ('8', '1', ':1:', '1', '', '0', 'tara2', 'b9483384e830615b865234eb169c4c9b', '', 'tara212231213', 'array (\n  \\\'meta_Title\\\' => \\\'23\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'tara212231213\\\',\n  \\\'video\\\' => \n  array (\n    0 => \n    array (\n      \\\'video\\\' => \\\'f/1/8_1446759432.flv\\\',\n      \\\'video_narrate\\\' => \\\'\\\',\n      \\\'video_title\\\' => \\\'\\\',\n      \\\'video_time\\\' => \\\'\\\',\n      \\\'videopic\\\' => \\\'1/8_1446759433.png\\\',\n    ),\n  ),\n  \\\'photo\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '', '2015-11-06 05:20:38', '0', '0', '0', '3', '1'), ('9', '1', ':1:', '1', '', '0', 'sdfsdfsdfsdfdsf', '4a7e5e59381e820a53abd7f88219592f', '', 'sdfsdfsdfsdfsdsdf', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'sdfsdfsdfsdfsdsdf\\\',\n  \\\'video\\\' => \n  array (\n    0 => \n    array (\n      \\\'video\\\' => \\\'f/1/9_1446810373.flv\\\',\n      \\\'video_narrate\\\' => \\\'\\\',\n      \\\'video_title\\\' => \\\'\\\',\n      \\\'video_time\\\' => \\\'\\\',\n      \\\'videopic\\\' => \\\'1/9_1446810374.png\\\',\n    ),\n  ),\n)', '', '2015-11-06 19:46:13', '0', '0', '0', '2', '1'), ('10', '1', ':1:', '1', '', '0', '高清', 'a562ad9ac9f6e9ff63f675ab12aad9b4', '', '高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清高清', 'array (\n  \\\'meta_Title\\\' => \\\'\\\',\n  \\\'meta_Description\\\' => \\\'\\\',\n  \\\'meta_Keywords\\\' => \\\'\\\',\n  \\\'author\\\' => \\\'\\\',\n  \\\'source\\\' => \\\'\\\',\n  \\\'intro\\\' => \\\'高清<span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"line-height:1.5;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span><span style=\\\"white-space:normal;\\\">高清</span>\\\',\n  \\\'video\\\' => \n  array (\n    0 => \n    array (\n      \\\'video\\\' => \\\'f/1/10_1446812244.flv\\\',\n      \\\'video_link\\\' => \\\'\\\',\n      \\\'videopic\\\' => \\\'1/10_1446812252.png\\\',\n      \\\'video_narrate\\\' => \\\'\\\',\n      \\\'video_title\\\' => \\\'\\\',\n      \\\'video_time\\\' => \\\'\\\',\n    ),\n  ),\n  \\\'photo\\\' => \n  array (\n  ),\n  \\\'software\\\' => \\\'\\\',\n  \\\'package\\\' => \\\'\\\',\n)', '', '2015-11-06 20:17:24', '0', '0', '0', '5', '1');
COMMIT;

-- ----------------------------
--  Table structure for `xingfu_xingfu_teaching_type`
-- ----------------------------
DROP TABLE IF EXISTS `xingfu_xingfu_teaching_type`;
CREATE TABLE `xingfu_xingfu_teaching_type` (
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='武术教学分类表';

-- ----------------------------
--  Records of `xingfu_xingfu_teaching_type`
-- ----------------------------
BEGIN;
INSERT INTO `xingfu_xingfu_teaching_type` VALUES ('1', '0', ':1:', '教学视频', '', '0', '1', '0', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
