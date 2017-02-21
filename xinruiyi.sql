/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : xinruiyi

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-02-21 18:06:54
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `lqb_access`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_access`;
CREATE TABLE `lqb_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `module` varchar(50) DEFAULT NULL,
  KEY `groupId` (`role_id`),
  KEY `nodeId` (`node_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='权限分配表';

-- ----------------------------
-- Records of lqb_access
-- ----------------------------
INSERT INTO `lqb_access` VALUES ('3', '14', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('3', '13', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('3', '12', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('3', '11', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('3', '10', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('3', '4', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('3', '9', '3', '3', '');
INSERT INTO `lqb_access` VALUES ('3', '8', '3', '3', '');
INSERT INTO `lqb_access` VALUES ('3', '7', '3', '3', '');
INSERT INTO `lqb_access` VALUES ('3', '3', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('3', '6', '3', '2', '');
INSERT INTO `lqb_access` VALUES ('3', '5', '3', '2', '');
INSERT INTO `lqb_access` VALUES ('3', '2', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('3', '1', '1', '0', '');
INSERT INTO `lqb_access` VALUES ('4', '7', '3', '3', '');
INSERT INTO `lqb_access` VALUES ('4', '3', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('4', '6', '3', '2', '');
INSERT INTO `lqb_access` VALUES ('4', '5', '3', '2', '');
INSERT INTO `lqb_access` VALUES ('4', '2', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('4', '1', '1', '0', '');
INSERT INTO `lqb_access` VALUES ('2', '48', '3', '45', '');
INSERT INTO `lqb_access` VALUES ('2', '47', '3', '45', '');
INSERT INTO `lqb_access` VALUES ('2', '46', '3', '45', '');
INSERT INTO `lqb_access` VALUES ('2', '45', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('2', '44', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '43', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '42', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '41', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '40', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '39', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '38', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '37', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '36', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '35', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '34', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '33', '3', '32', '');
INSERT INTO `lqb_access` VALUES ('2', '32', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('2', '31', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('5', '1', '1', '0', '');
INSERT INTO `lqb_access` VALUES ('5', '26', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('5', '27', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('5', '28', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('5', '29', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('5', '30', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('5', '31', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('2', '30', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('2', '29', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('2', '28', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('2', '27', '3', '26', '');
INSERT INTO `lqb_access` VALUES ('2', '26', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('2', '13', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('2', '12', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('2', '11', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('2', '10', '3', '4', '');
INSERT INTO `lqb_access` VALUES ('2', '4', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('2', '7', '3', '3', '');
INSERT INTO `lqb_access` VALUES ('2', '3', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('2', '6', '3', '2', '');
INSERT INTO `lqb_access` VALUES ('2', '5', '3', '2', '');
INSERT INTO `lqb_access` VALUES ('2', '2', '2', '1', '');
INSERT INTO `lqb_access` VALUES ('2', '1', '1', '0', '');

-- ----------------------------
-- Table structure for `lqb_admin`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_admin`;
CREATE TABLE `lqb_admin` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `role_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `username` varchar(64) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `password` char(32) NOT NULL,
  `last_login_time` int(10) unsigned NOT NULL,
  `last_login_ip` varchar(40) NOT NULL,
  `login_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `verify` varchar(32) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `remark` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_admin
-- ----------------------------
INSERT INTO `lqb_admin` VALUES ('1', '1', '1', 'admin', '超级管理员', 'e10adc3949ba59abbe56e057f20f883e', '1487663985', '127.0.0.1', '179', '8888', '18889363060', '252588119@qq.com', '海南省海口市', '田林县监察局', '备注信息', '1222907803', '1222907803', '1', '1');
INSERT INTO `lqb_admin` VALUES ('2', '1', '2', 'liqingbo', '码农', 'e10adc3949ba59abbe56e057f20f883e', '1484705237', '127.0.0.1', '4', '', '18889363060', '252588119@qq.com', '海口', '发', '', '1482808558', '1482808558', '1', '0');
INSERT INTO `lqb_admin` VALUES ('3', '0', '0', 'asdfasdf', '', '4297f44b13955235245b2497399d7a93', '1484882978', '127.0.0.1', '0', '', '18888888888', '', '', 'sdff', '', '1484882978', '1484882978', '1', '0');
INSERT INTO `lqb_admin` VALUES ('4', '0', '2', 'manong', '', 'e10adc3949ba59abbe56e057f20f883e', '1484884274', '127.0.0.1', '1', '', '18886761060', '', 'sdf', '未知', '', '1484883978', '1484883978', '1', '0');
INSERT INTO `lqb_admin` VALUES ('5', '0', '0', 'manong2', '', 'e10adc3949ba59abbe56e057f20f883e', '1484884039', '127.0.0.1', '0', '', '18886761062', '', '', '未知2', '', '1484884039', '1484884039', '0', '0');
INSERT INTO `lqb_admin` VALUES ('6', '0', '2', 'liqingbo27', '', '25f9e794323b453885f5181f1b624d0b', '1486180512', '127.0.0.1', '1', '', '18888888882', '', '', '码农公司', '', '1486178569', '1486178569', '1', '0');
INSERT INTO `lqb_admin` VALUES ('7', '0', '0', 'liqingbo28', '', '25f9e794323b453885f5181f1b624d0b', '1486196266', '112.66.186.29', '0', '', '18899996666', '', '', '村顶替苛地', '', '1486196266', '1486196266', '0', '0');
INSERT INTO `lqb_admin` VALUES ('8', '0', '2', 'daller', '', 'dcdd9df5b48f3911d5083e3f0af04c4d', '1486197102', '218.65.219.186', '1', '', '18677699890', '', '', '你好', '', '1486197008', '1486197008', '1', '0');

-- ----------------------------
-- Table structure for `lqb_advert`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_advert`;
CREATE TABLE `lqb_advert` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `url` varchar(150) NOT NULL,
  `file` varchar(150) NOT NULL,
  `file_type` tinyint(1) NOT NULL DEFAULT '1',
  `place` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_advert
-- ----------------------------
INSERT INTO `lqb_advert` VALUES ('1', '1', '#', '/Themes/Home/lanse/static/picture/banner01.jpg', '1', '1', '1', '3', '1', '1449644826');
INSERT INTO `lqb_advert` VALUES ('2', '2', '#', '/Themes/Home/lanse/static/picture/banner02.jpg', '1', '1', '1', 'abc', '1', '1449645266');
INSERT INTO `lqb_advert` VALUES ('4', '3', '#', '/Themes/Home/lanse/static/picture/banner03.jpg', '1', '1', '1', '', '1', '1453018422');
INSERT INTO `lqb_advert` VALUES ('7', '4', '#', '/Themes/Home/lanse/static/picture/banner04.jpg', '1', '1', '1', '', '2', '1453020939');
INSERT INTO `lqb_advert` VALUES ('8', '5', '#', '/Themes/Home/lanse/static/picture/banner05.jpg', '1', '1', '1', '', '0', '1453020996');
INSERT INTO `lqb_advert` VALUES ('10', '监察微博', '#', '/Themes/Home/lanse/static/picture/banner05.jpg', '1', '2', '1', '', '0', '1453299105');

-- ----------------------------
-- Table structure for `lqb_advert_place`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_advert_place`;
CREATE TABLE `lqb_advert_place` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `placename` varchar(60) NOT NULL,
  `w` varchar(20) DEFAULT NULL COMMENT '宽',
  `h` varchar(20) DEFAULT NULL COMMENT '高',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_advert_place
-- ----------------------------
INSERT INTO `lqb_advert_place` VALUES ('1', '首页幻灯片', '2000', '550', '0', '0');
INSERT INTO `lqb_advert_place` VALUES ('2', '整站顶部通栏', '1200', '60', '0', '1');
INSERT INTO `lqb_advert_place` VALUES ('3', '首页通栏（一）', '1200', '60', '0', '2');
INSERT INTO `lqb_advert_place` VALUES ('4', '首页通栏（二）', '1200', '60', '0', '3');
INSERT INTO `lqb_advert_place` VALUES ('5', '首页通栏（三）', '1200', '60', '0', '4');
INSERT INTO `lqb_advert_place` VALUES ('6', '首页通栏（四）', '1200', '60', '0', '6');

-- ----------------------------
-- Table structure for `lqb_assessor`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_assessor`;
CREATE TABLE `lqb_assessor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `avatar` varchar(100) NOT NULL COMMENT '头像',
  `name` varchar(15) NOT NULL COMMENT '姓名',
  `title` varchar(60) NOT NULL COMMENT '职称',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '状态',
  `intro` text NOT NULL COMMENT '介绍',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_assessor
-- ----------------------------
INSERT INTO `lqb_assessor` VALUES ('1', '/Uploads/avatar/5699ea706a248.jpg', '安禄', '首席测评师', '1', '搜屋网测评师团队的领导者，十年一手房产从业经验，追求专业，注重品质，“防止决策失误、减少购房成本、促进置业透明”是他不懈的追求。');
INSERT INTO `lqb_assessor` VALUES ('2', '/Uploads/avatar/5699e6163d831.jpg', '张敏', '资深测评师', '1', '对市场变化有较好的洞察力，较准确的了解置业者的需求，对房地产市场有独到的认识。');
INSERT INTO `lqb_assessor` VALUES ('3', '/Uploads/avatar/563ada479255d.jpg', '唐云米', '资深测评师', '1', '从事房产网站媒体工作3年，熟悉房地产行业，熟知各区域的楼盘。');
INSERT INTO `lqb_assessor` VALUES ('4', '/Uploads/avatar/563ada6caac77.jpg', '汤钊文', '资深测评师', '1', '5年一手房从业经验，对房地产市场有深刻认识及独特见解。擅长数据整合、分析，务求以客观、中立的角度，为置业者提供最有价值的购房参考');
INSERT INTO `lqb_assessor` VALUES ('5', '/Uploads/avatar/563adaaa22eb1.jpg', '罗永善', '资深测评师', '1', '曾任职知名甲级城市规划设计院，对房地产有独特认识');
INSERT INTO `lqb_assessor` VALUES ('6', '/Uploads/avatar/563adabfd6e8d.jpg', '王道权', '资深测评师', '1', '熟知各地区楼盘，坚持第三方立场，以专业的房地产知识，提供刚需盘的专业楼盘置业信息，防止购房失误与减少购房成本。');

-- ----------------------------
-- Table structure for `lqb_auth_group`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_auth_group`;
CREATE TABLE `lqb_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL,
  `describe` char(50) NOT NULL DEFAULT '',
  `sort` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_auth_group
-- ----------------------------
INSERT INTO `lqb_auth_group` VALUES ('1', '超级管理员', '1', '', '', '0');
INSERT INTO `lqb_auth_group` VALUES ('2', '网站编辑', '1', '5,6,49,7,27,28,29,30,33,34,35,36,37,38,39,12,13,10,11', '', '0');

-- ----------------------------
-- Table structure for `lqb_auth_group_access`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_auth_group_access`;
CREATE TABLE `lqb_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_auth_group_access
-- ----------------------------
INSERT INTO `lqb_auth_group_access` VALUES ('1', '2');
INSERT INTO `lqb_auth_group_access` VALUES ('2', '2');
INSERT INTO `lqb_auth_group_access` VALUES ('3', '3');
INSERT INTO `lqb_auth_group_access` VALUES ('4', '4');
INSERT INTO `lqb_auth_group_access` VALUES ('5', '5');
INSERT INTO `lqb_auth_group_access` VALUES ('6', '6');
INSERT INTO `lqb_auth_group_access` VALUES ('7', '7');

-- ----------------------------
-- Table structure for `lqb_auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_auth_rule`;
CREATE TABLE `lqb_auth_rule` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `c_name` varchar(20) NOT NULL,
  `a_name` varchar(255) DEFAULT NULL,
  `condition` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`,`sort`),
  KEY `level` (`level`),
  KEY `pid` (`pid`),
  KEY `status` (`status`),
  KEY `name` (`c_name`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8 COMMENT='权限节点表';

-- ----------------------------
-- Records of lqb_auth_rule
-- ----------------------------
INSERT INTO `lqb_auth_rule` VALUES ('1', '0', '1', '后台管理', '', null, null, '1', '网站后台管理项目', '10');
INSERT INTO `lqb_auth_rule` VALUES ('2', '1', '2', '首页', '', '', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('3', '26', '3', '文章审核', 'news', 'shenhe', null, '1', '', '3');
INSERT INTO `lqb_auth_rule` VALUES ('4', '1', '2', '系统管理', '', null, null, '1', '', '99');
INSERT INTO `lqb_auth_rule` VALUES ('5', '2', '3', '系统信息', 'index', 'index', null, '0', '', '1');
INSERT INTO `lqb_auth_rule` VALUES ('6', '2', '3', '修改个人信息', 'index', 'changeinfo', null, '1', '', '2');
INSERT INTO `lqb_auth_rule` VALUES ('7', '2', '3', '清除缓存', 'index', 'cache', null, '1', '', '7');
INSERT INTO `lqb_auth_rule` VALUES ('8', '14', '3', '添加角色', 'access', 'addrole', null, '1', '', '8');
INSERT INTO `lqb_auth_rule` VALUES ('10', '4', '3', '模版设置', 'settings', 'settpl', null, '1', '', '10');
INSERT INTO `lqb_auth_rule` VALUES ('11', '4', '3', '设置系统邮件', 'setEmailConfig', null, null, '1', '', '12');
INSERT INTO `lqb_auth_rule` VALUES ('12', '4', '3', '系统设置', 'settings', 'index', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('13', '4', '3', '基本设置', 'settings', 'base', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('14', '1', '2', '权限管理', '', null, null, '1', '权限管理，为系统后台管理员设置不同的权限', '99');
INSERT INTO `lqb_auth_rule` VALUES ('15', '14', '3', '管理员列表', 'access', 'index', null, '1', '节点列表信息', '0');
INSERT INTO `lqb_auth_rule` VALUES ('16', '14', '3', '添加管理员', 'access', 'addadmin', null, '1', '角色列表查看', '0');
INSERT INTO `lqb_auth_rule` VALUES ('23', '14', '3', '角色管理', 'access', 'rolelist', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('26', '1', '2', '文章管理', '', '', null, '1', '', '2');
INSERT INTO `lqb_auth_rule` VALUES ('27', '26', '3', '新闻列表', 'news', 'index', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('28', '26', '3', '添加文章', 'news', 'add', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('29', '26', '3', '单页管理', 'singlepage', 'index', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('30', '26', '3', '添加单页', 'singlepage', 'add', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('31', '26', '3', '删除文章', 'news', 'del', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('32', '1', '2', '板块管理', '', null, null, '1', '包含数据库备份、还原、打包等', '4');
INSERT INTO `lqb_auth_rule` VALUES ('33', '32', '3', '友情链接', 'friendlink', 'index', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('34', '32', '3', '添加友链', 'friendlink', 'add', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('35', '32', '3', '专题管理', 'special', 'index', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('36', '32', '3', '添加专题', 'special', 'add', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('37', '32', '3', '广告管理', 'advert', 'index', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('38', '32', '3', '添加广告', 'advert', 'add', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('39', '32', '3', '删除广告', 'advert', 'del', null, '1', '', '0');
INSERT INTO `lqb_auth_rule` VALUES ('50', '14', '3', '节点管理', 'access', 'nodelist', '', '0', null, '9');
INSERT INTO `lqb_auth_rule` VALUES ('49', '2', '3', '修改个人密码', 'index', 'myinfo', '', '1', '', '3');

-- ----------------------------
-- Table structure for `lqb_case`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_case`;
CREATE TABLE `lqb_case` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布者UID',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '产品ID',
  `category_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所在分类',
  `title` varchar(200) NOT NULL COMMENT '新闻标题',
  `thumb` varchar(150) NOT NULL,
  `keywords` varchar(50) NOT NULL COMMENT '文章关键字',
  `description` varchar(255) NOT NULL COMMENT '文章描述',
  `clicks` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `company` varchar(50) DEFAULT NULL,
  `r` tinyint(1) NOT NULL,
  `h` tinyint(1) NOT NULL,
  `t` tinyint(1) NOT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `check_time` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- ----------------------------
-- Records of lqb_case
-- ----------------------------
INSERT INTO `lqb_case` VALUES ('2', '1', '0', '0', '海航集团办公楼', '/Uploads/userfiles/201702/58abc108b4652.jpg', '', '', '0', '1', null, '0', '0', '0', '1487651082', '1487650632', '0', '<p><span style=\"color: rgb(51, 51, 51); font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; word-spacing: 0px; float: none; font-stretch: normal; font-size: 13px; line-height: 20px; font-family: arial; display: inline !important; background-color: rgb(255, 255, 255);\">海口海航大厦是</span><em style=\"font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; word-spacing: 0px; color: rgb(204, 0, 0); font-style: normal; font-stretch: normal; font-size: 13px; line-height: 20px; font-family: arial; background-color: rgb(255, 255, 255);\">海航集团</em><span style=\"color: rgb(51, 51, 51); font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; word-spacing: 0px; float: none; font-stretch: normal; font-size: 13px; line-height: 20px; font-family: arial; display: inline !important; background-color: rgb(255, 255, 255);\">的总部</span><em style=\"font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; word-spacing: 0px; color: rgb(204, 0, 0); font-style: normal; font-stretch: normal; font-size: 13px; line-height: 20px; font-family: arial; background-color: rgb(255, 255, 255);\">办公楼</em><span style=\"color: rgb(51, 51, 51); font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; word-spacing: 0px; float: none; font-stretch: normal; font-size: 13px; line-height: 20px; font-family: arial; display: inline !important; background-color: rgb(255, 255, 255);\">,位于海口市大英山新城市中心区,是</span><em style=\"font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; word-spacing: 0px; color: rgb(204, 0, 0); font-style: normal; font-stretch: normal; font-size: 13px; line-height: 20px; font-family: arial; background-color: rgb(255, 255, 255);\">海航集团</em><span style=\"color: rgb(51, 51, 51); font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; word-spacing: 0px; float: none; font-stretch: normal; font-size: 13px; line-height: 20px; font-family: arial; display: inline !important; background-color: rgb(255, 255, 255);\">再次腾飞和海航地产全面启动的标志性建筑。海航大厦外墙和内装墙面装饰均采用“瑞亿牌”铝单板。所采用的均为氟碳铝单板。</span></p>');
INSERT INTO `lqb_case` VALUES ('3', '1', '0', '0', '常德湘雅医院', '/Uploads/userfiles/201702/58abc156cc6f5.jpg', '', '', '0', '1', null, '0', '0', '0', '1487651160', '1487651160', '0', '<p><span style=\"color: rgb(45, 45, 45); font-family: 宋体; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 36px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\">常德湘雅医院位于常德市柳叶湖旅游度假区月亮大道西，</span><span style=\"font-family: 宋体; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; float: none; color: rgb(62, 62, 62); font-stretch: normal; line-height: 35px; display: inline !important;\">是由常德市委市政府主导，由隶属常德市政府的常德市经济建设投资集团有限公司投资建设、中南大学湘雅医院全面托管的一所非营利性三级综合公立医院。医院位于常德市北部新城朗州路旁，东临柳叶湖风景区，与常德市火车站和高速入口分别仅5分钟和10分钟车程。占地面积230亩，规划建筑总面积27万㎡，概算总投资20多亿元，是湖南省重点工程项目</span><span style=\"color: rgb(45, 45, 45); font-family: 宋体; font-size: 14px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 36px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\">。医院外墙和内装铝单板均采用我公司瑞亿光氟铝单板系列。工程外墙采用玻璃幕墙和铝单板幕墙相结合的形式。建筑整体效果呈现出一种高端的的感觉。在铝单板的颜色选择上面也非常的出色。镀深蓝膜玻璃和银灰色氟碳铝单板配合的相得益彰。在满足建筑外墙的基本需求后还显得更加高端。</span></p>');
INSERT INTO `lqb_case` VALUES ('4', '1', '0', '0', '娄底中心医院', '/Uploads/userfiles/201702/58abc178d99b1.jpg', '', '', '0', '1', null, '0', '0', '0', '1487651195', '1487651195', '0', '<p><strong style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 32px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: -1.5px; -webkit-text-stroke-width: 0px;\"><span style=\"font-family: 宋体; font-variant: normal; white-space: normal; text-transform: none; word-spacing: 0px; float: none; font-weight: normal; color: rgb(0, 0, 0); font-style: normal; text-align: left; orphans: 2; widows: 2; letter-spacing: normal; line-height: 24px; text-indent: 32px; -webkit-text-stroke-width: 0px; display: inline !important;\">娄底市中心医院始创于1977年，前身为娄底地区人民医院，是娄底唯一一所集医疗、科研、教学、预防与保健为一体的三级甲等综合性医院、</span></strong><span style=\"color: rgb(51, 51, 51); font-family: 微软雅黑; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 32px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: -1.5px; -webkit-text-stroke-width: 0px; display: inline !important; float: none;\">2016年3月20日实现墙体外部更新，安装幕墙铝单板。医院幕墙均采用“瑞亿”牌3.0铝单板。接到娄底中心医院的采购意向后，我司积极配合采样，配色。最快速度确定了采购铝单板的方案。提供免费测量，免费设计，为娄底中心医院工程的建设节省了不少的时间。设计完成后，公司积极配合生产送货，为期七天供货到工地。至2.16年4月23日工程全面竣工验收。</span></p>');

-- ----------------------------
-- Table structure for `lqb_friendlink`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_friendlink`;
CREATE TABLE `lqb_friendlink` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(3) unsigned NOT NULL DEFAULT '1',
  `name` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `qq` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `views` int(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `ip` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_friendlink
-- ----------------------------
INSERT INTO `lqb_friendlink` VALUES ('1', '1', 'PHP博客', 'http://www.liqingbo.cn', '', '', '', '0', '0', '1482903772', '1482903772', '', '1');

-- ----------------------------
-- Table structure for `lqb_hot_word`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_hot_word`;
CREATE TABLE `lqb_hot_word` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `var` varchar(30) DEFAULT NULL,
  `search` int(11) NOT NULL DEFAULT '0' COMMENT '搜查次数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_hot_word
-- ----------------------------

-- ----------------------------
-- Table structure for `lqb_member`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_member`;
CREATE TABLE `lqb_member` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` smallint(3) unsigned NOT NULL DEFAULT '0',
  `username` varchar(64) NOT NULL,
  `nickname` varchar(50) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `last_login_time` int(10) unsigned NOT NULL,
  `last_login_ip` varchar(40) NOT NULL,
  `login_count` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `verify` varchar(32) DEFAULT NULL,
  `phone` varchar(16) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `account` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_member
-- ----------------------------
INSERT INTO `lqb_member` VALUES ('1', '1', 'admin', '超级管理员', '991230b1d62f20543cd6b1d8d806af90', '1449803567', '127.0.0.1', '22', '8888', '18889363060', '252588119@qq.com', '海南省海口市', '备注信息', '1222907803', '1222907803', '1', '1');
INSERT INTO `lqb_member` VALUES ('2', '6', 'liqingbo', '', '123456', '1449826843', '127.0.0.1', '0', '', '18888888888', '', '', '', '1449826843', '1449826843', '0', '0');
INSERT INTO `lqb_member` VALUES ('3', '5', '15555555555', null, 'e10adc3949ba59abbe56e057f20f883e', '1450086312', '112.66.188.167', '0', null, '15555555555', null, null, null, '1450086312', '1450086312', '1', '0');
INSERT INTO `lqb_member` VALUES ('4', '5', 'liqingbo27', null, '25f9e794323b453885f5181f1b624d0b', '1450149024', '223.198.90.78', '0', null, '16666666666', null, null, null, '1450149024', '1450149024', '1', '0');
INSERT INTO `lqb_member` VALUES ('5', '5', 'maif8', null, 'af0b27efacb31d28b127eaf136ea1b8d', '1451982103', '223.72.76.4', '0', null, '15300096106', null, null, null, '1451982103', '1451982103', '1', '0');
INSERT INTO `lqb_member` VALUES ('6', '0', '', null, 'd41d8cd98f00b204e9800998ecf8427e', '1484875078', '127.0.0.1', '0', null, '', null, null, null, '1484875078', '1484875078', '1', '0');

-- ----------------------------
-- Table structure for `lqb_menu`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_menu`;
CREATE TABLE `lqb_menu` (
  `id` smallint(8) unsigned NOT NULL AUTO_INCREMENT,
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(30) NOT NULL,
  `model` varchar(20) NOT NULL,
  `controller` varchar(30) NOT NULL,
  `action` varchar(30) NOT NULL,
  `url` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  `remark` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_menu
-- ----------------------------
INSERT INTO `lqb_menu` VALUES ('1', '0', '首页', '', 'Index', 'index', '', '1', '0', '');
INSERT INTO `lqb_menu` VALUES ('2', '0', '友情链接', 'Admin', 'Friendlink', 'index', '', '1', '7', '');
INSERT INTO `lqb_menu` VALUES ('3', '0', '系统管理', 'Admin', 'Settings', 'index', '', '1', '99', '');
INSERT INTO `lqb_menu` VALUES ('4', '0', '新闻资讯', 'Admin', 'News', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('5', '21', '专题分类', 'News', 'special', 'category', '', '0', '9', '');
INSERT INTO `lqb_menu` VALUES ('6', '91', '案例管理', 'Admin', 'Case', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('8', '1', '系统信息', 'Admin', 'Index', 'index', '', '1', '0', '阿斯顿');
INSERT INTO `lqb_menu` VALUES ('9', '2', '友情链接', 'Admin', 'Friendlink', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('10', '4', '文章分类', 'Admin', 'News', 'category', '', '1', '3', '');
INSERT INTO `lqb_menu` VALUES ('12', '2', '角色列表', 'Admin', 'Admin', 'role', '', '0', '2', '');
INSERT INTO `lqb_menu` VALUES ('14', '91', '添加案例', 'Admin', 'Case', 'add', '', '1', '2', '');
INSERT INTO `lqb_menu` VALUES ('15', '0', '权限管理', 'Admin', 'Access', 'index', '', '1', '88', '');
INSERT INTO `lqb_menu` VALUES ('16', '3', '后台菜单', 'Admin', 'Menu', 'index', '', '1', '6', '');
INSERT INTO `lqb_menu` VALUES ('20', '3', '数据库管理', 'Admin', 'Database', 'index', '', '0', '10', '');
INSERT INTO `lqb_menu` VALUES ('18', '3', '模板布局', 'Admin', 'settings', 'config', '', '1', '3', '');
INSERT INTO `lqb_menu` VALUES ('19', '3', '节点管理', 'Admin', 'Node', 'index', '', '0', '9', '');
INSERT INTO `lqb_menu` VALUES ('21', '0', '合作伙伴', 'Admin', 'Partner', 'index', '', '1', '3', '');
INSERT INTO `lqb_menu` VALUES ('22', '4', '新闻资讯', 'Admin', 'News', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('23', '21', '合作伙伴', 'Admin', 'Partner', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('24', '0', '广告管理', 'Admin', 'advert', 'index', '', '1', '5', '');
INSERT INTO `lqb_menu` VALUES ('25', '90', '产品管理', 'Admin', 'Product', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('27', '24', '专题管理', 'Admin', 'special', 'index', '', '0', '31', '');
INSERT INTO `lqb_menu` VALUES ('28', '90', '添加产品', 'Admin', 'Product', 'add', '', '1', '2', '');
INSERT INTO `lqb_menu` VALUES ('29', '4', '添加单页', 'Admin', 'singlepage', 'add', '', '1', '30', '');
INSERT INTO `lqb_menu` VALUES ('30', '1', '备忘录', 'Admin', 'Memo', 'index', '', '0', '98', '');
INSERT INTO `lqb_menu` VALUES ('31', '1', '修改个人信息', 'Admin', 'Index', 'changeInfo', '', '1', '2', '');
INSERT INTO `lqb_menu` VALUES ('32', '1', '修改个人密码', 'Admin', 'Index', 'myinfo', '', '1', '4', '');
INSERT INTO `lqb_menu` VALUES ('33', '4', '文章统计', 'Admin', 'News', 'tongji', '', '1', '99', '');
INSERT INTO `lqb_menu` VALUES ('34', '21', '添加分类', 'Admin', 'special', 'addcategory', '', '0', '10', '');
INSERT INTO `lqb_menu` VALUES ('36', '3', '系统设置', 'Admin', 'Settings', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('38', '2', '用户回收站', 'Admin', 'Admin', 'recycle', '', '0', '5', '');
INSERT INTO `lqb_menu` VALUES ('39', '21', '添加伙伴', 'Admin', 'Partner', 'add', '', '1', '2', '');
INSERT INTO `lqb_menu` VALUES ('40', '24', '广告管理', 'Admin', 'advert', 'index', '', '1', '21', '');
INSERT INTO `lqb_menu` VALUES ('41', '24', '添加广告', 'Admin', 'advert', 'add', '', '1', '22', '');
INSERT INTO `lqb_menu` VALUES ('43', '2', '添加友链', 'Admin', 'Friendlink', 'add', '', '1', '2', '');
INSERT INTO `lqb_menu` VALUES ('44', '24', '添加专题管理', 'Admin', 'special', 'add', '', '0', '32', '');
INSERT INTO `lqb_menu` VALUES ('67', '1', '更新缓存', '', 'Cache', 'index', '', '0', '99', '');
INSERT INTO `lqb_menu` VALUES ('69', '4', '单页管理', 'Admin', 'singlepage', 'index', '', '1', '4', '');
INSERT INTO `lqb_menu` VALUES ('72', '1', '清理缓存', 'Admin', 'Index', 'cache', '', '1', '99', '');
INSERT INTO `lqb_menu` VALUES ('73', '15', '管理员列表', 'Admin', 'access', 'index', '', '1', '1', '');
INSERT INTO `lqb_menu` VALUES ('74', '15', '节点管理', 'Admin', 'access', 'nodeList', '', '1', '5', '');
INSERT INTO `lqb_menu` VALUES ('75', '15', '角色管理', 'Admin', 'access', 'roleList', '', '1', '3', '');
INSERT INTO `lqb_menu` VALUES ('76', '15', '添加管理员', 'Admin', 'access', 'addAdmin', '', '1', '2', '');
INSERT INTO `lqb_menu` VALUES ('77', '15', '添加节点', 'Admin', 'access', 'addNode', '', '0', '6', '');
INSERT INTO `lqb_menu` VALUES ('78', '15', '添加角色', 'Admin', 'access', 'addRole', '', '1', '4', '');
INSERT INTO `lqb_menu` VALUES ('81', '4', '添加资讯', 'Admin', 'News', 'add', '', '1', '2', '');
INSERT INTO `lqb_menu` VALUES ('85', '3', '基本设置', 'Admin', 'settings', 'base', '', '1', '2', null);
INSERT INTO `lqb_menu` VALUES ('89', '3', '模版管理', 'Admin', 'settings', 'settpl', '', '1', '2', null);
INSERT INTO `lqb_menu` VALUES ('90', '0', '产品管理', 'Admin', 'Product', 'index', '', '1', '2', null);
INSERT INTO `lqb_menu` VALUES ('91', '0', '成功案例', 'Admin', 'Case', 'index', '', '1', '3', null);
INSERT INTO `lqb_menu` VALUES ('92', '90', '产品分类', 'Admin', 'Product', 'category', '', '1', '3', null);

-- ----------------------------
-- Table structure for `lqb_nav`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_nav`;
CREATE TABLE `lqb_nav` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级导航ID',
  `name` varchar(20) NOT NULL COMMENT '导航名称',
  `url` varchar(255) NOT NULL,
  `sort` smallint(6) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='新闻分类表';

-- ----------------------------
-- Records of lqb_nav
-- ----------------------------
INSERT INTO `lqb_nav` VALUES ('1', '0', '首页', '/', '1', '1');
INSERT INTO `lqb_nav` VALUES ('2', '0', 'PHP', '/category/1', '2', '1');
INSERT INTO `lqb_nav` VALUES ('3', '0', 'MySql', '/category/2', '3', '1');
INSERT INTO `lqb_nav` VALUES ('4', '0', 'web前端', '/category/3', '4', '1');
INSERT INTO `lqb_nav` VALUES ('5', '23', 'Linux', '/category/4', '5', '1');
INSERT INTO `lqb_nav` VALUES ('6', '0', '开发工具', '/category/5', '6', '1');
INSERT INTO `lqb_nav` VALUES ('7', '0', 'SEO优化', '/category/6', '7', '1');
INSERT INTO `lqb_nav` VALUES ('8', '0', '文章感悟', '/category/7', '8', '1');
INSERT INTO `lqb_nav` VALUES ('9', '0', '新闻资讯', '/category/8', '9', '0');
INSERT INTO `lqb_nav` VALUES ('10', '0', '留言板', '/Message/index/id/1', '10', '1');
INSERT INTO `lqb_nav` VALUES ('11', '11', 'test23', '', '0', '1');
INSERT INTO `lqb_nav` VALUES ('12', '2', 'PHP函数', '/category/11', '0', '1');
INSERT INTO `lqb_nav` VALUES ('13', '4', 'CSS+DIV', '/category/13', '0', '1');
INSERT INTO `lqb_nav` VALUES ('14', '4', 'Jquery', '/category/14', '0', '1');
INSERT INTO `lqb_nav` VALUES ('15', '4', 'javascript', '/category/15', '0', '1');
INSERT INTO `lqb_nav` VALUES ('16', '8', '个人日志', '/category/16', '0', '1');
INSERT INTO `lqb_nav` VALUES ('17', '8', '经典美文', '/category/17', '0', '1');
INSERT INTO `lqb_nav` VALUES ('18', '2', 'PHP类库', '/category/12', '0', '1');
INSERT INTO `lqb_nav` VALUES ('19', '2', 'PHP实例', '/category/19', '0', '1');
INSERT INTO `lqb_nav` VALUES ('20', '2', 'PHP心得', '/category/20', '0', '1');
INSERT INTO `lqb_nav` VALUES ('21', '1', '默认背景', '/Index/switchBg/cssId/0', '0', '0');
INSERT INTO `lqb_nav` VALUES ('22', '1', '黑色背景', '/Index/switchBg/cssId/1', '0', '0');
INSERT INTO `lqb_nav` VALUES ('23', '0', '服务器', '/category/18', '5', '1');
INSERT INTO `lqb_nav` VALUES ('24', '23', 'Window', '/category/21', '0', '1');

-- ----------------------------
-- Table structure for `lqb_news`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_news`;
CREATE TABLE `lqb_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布者UID',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '产品ID',
  `category_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所在分类',
  `title` varchar(200) NOT NULL COMMENT '新闻标题',
  `thumb` varchar(150) NOT NULL,
  `keywords` varchar(50) NOT NULL COMMENT '文章关键字',
  `description` varchar(255) NOT NULL COMMENT '文章描述',
  `clicks` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `company` varchar(50) DEFAULT NULL,
  `r` tinyint(1) NOT NULL,
  `h` tinyint(1) NOT NULL,
  `t` tinyint(1) NOT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `check_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- ----------------------------
-- Records of lqb_news
-- ----------------------------
INSERT INTO `lqb_news` VALUES ('1', '1', '0', '2', '在今年招生时校方承诺', '', '在今年招生时校方承诺', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, '2', '2', '2', '1482896401', '1482830078', '0');
INSERT INTO `lqb_news` VALUES ('2', '1', '0', '1', '大冶市公安局政治处工作人员告诉澎湃新闻', '', '大冶市公安局政治处工作人员告诉澎湃新闻', '11月22日凌晨，湖北省大冶市大金省道灵乡古建门楼被大货车撞塌，事故造成1死1伤。大冶市公安局政治处工作人员告诉澎湃新闻，重型翻斗大货车行驶至大金省道灵乡镇门楼路段时，因车拖斗未放下，与门楼横梁发生碰撞，致使古建门楼垮塌压住大货车。', '0', '1', null, '2', '2', '2', '1482896235', '1482830080', '0');
INSERT INTO `lqb_news` VALUES ('3', '1', '0', '1', '重型翻斗大货车行驶至大金省道灵乡镇门楼路段时', '', '重型翻斗大货车行驶至大金省道灵乡镇门楼路段时', '11月22日凌晨，湖北省大冶市大金省道灵乡古建门楼被大货车撞塌，事故造成1死1伤。大冶市公安局政治处工作人员告诉澎湃新闻，重型翻斗大货车行驶至大金省道灵乡镇门楼路段时，因车拖斗未放下，与门楼横梁发生碰撞，致使古建门楼垮塌压住大货车。', '0', '1', null, '2', '2', '2', '1482896211', '1482830081', '0');
INSERT INTO `lqb_news` VALUES ('4', '1', '0', '2', '铝单板厂什么牌子更值得购买', '', '', '', '0', '0', '', '2', '2', '2', '1487646990', '1482830085', '0');
INSERT INTO `lqb_news` VALUES ('7', '1', '0', '2', '共计发放奖学金总额为', '', '共计发放奖学金总额为', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, '2', '2', '2', '1482896418', '1482896418', '0');
INSERT INTO `lqb_news` VALUES ('8', '1', '0', '2', '对报考该校的高一新生中初中毕业升学考试成绩优秀者', '', '对报考该校的高一新生中初中毕业升学考试成绩优秀者', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, '2', '2', '2', '1482896433', '1482896433', '0');
INSERT INTO `lqb_news` VALUES ('9', '1', '0', '2', '是一所全寄宿制的民办普通高中', '', '是一所全寄宿制的民办普通高中', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, '2', '2', '2', '1482896545', '1482896545', '0');
INSERT INTO `lqb_news` VALUES ('10', '1', '0', '2', '温州民办中学为招揽优质生源 发787万新生奖学金', '', '温州民办中学为招揽优质生源 发787万新生奖学金', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, '2', '2', '2', '1482896563', '1482896563', '0');
INSERT INTO `lqb_news` VALUES ('11', '1', '0', '3', '在今年招生时校方承诺', '', '在今年招生时校方承诺', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '0', null, '2', '2', '2', '1482896585', '1482896585', '0');
INSERT INTO `lqb_news` VALUES ('12', '1', '0', '12', '田林县扎实开展“两项制度”有效衔接督查工作', '/Uploads/userfiles/201612/5863352a754cb.jpg', '', '', '0', '1', null, '2', '2', '2', '1482896718', '1482896718', '0');
INSERT INTO `lqb_news` VALUES ('13', '1', '0', '4', '食药监总局曝光9起药品保健品虚假广告', '', '食药监总局曝光9起药品保健品虚假广告', '据新华社电 国家食品药品监督管理总局11月21日曝光9起药品、保健品虚假广告宣传。食药监总局指出，曝光的7起药品和两起保健品虚假广告内容存在不科学的功效断言、扩大宣传治愈率或有效率、利用患者名义或形象做功效证明等问题，欺骗和误导消费者，严重危害公众饮食用药安全。', '0', '1', '', '2', '2', '2', '1487666890', '1482896877', '0');
INSERT INTO `lqb_news` VALUES ('14', '1', '0', '15', 'test', '', 'test', 'tes', '0', '1', null, '2', '2', '2', '1482903595', '1482903376', '0');
INSERT INTO `lqb_news` VALUES ('15', '1', '0', '4', '发奖金了', '', '发奖金了', '发奖金了', '0', '1', '', '2', '2', '2', '1487666970', '1482903709', '0');
INSERT INTO `lqb_news` VALUES ('16', '1', '0', '15', 'test', '', '', '', '0', '1', null, '2', '2', '2', '1482912698', '1482912698', '0');
INSERT INTO `lqb_news` VALUES ('17', '1', '0', '15', 'test', '', 'test', 'test', '0', '1', null, '2', '2', '2', '1482912711', '1482912711', '0');
INSERT INTO `lqb_news` VALUES ('18', '1', '0', '4', 'test', '', 'test', 'test', '0', '1', '', '2', '2', '2', '1487666960', '1482912722', '0');
INSERT INTO `lqb_news` VALUES ('19', '1', '0', '2', '铝单板厂家如何保证产品质量更优', '', '', '更为专业的铝单板厂家可以保证产品在质量上更优，无论是对铝合金基材的选择，还是喷涂工艺的把握，都是直接影响到产品性能的重要因素，所以一定要结合实际情况来进行确定，同时对其规格尺寸进行保证，对其外观形状进行设计制造，这才是保证其质量可以更优的关键所在。', '0', '0', '', '2', '2', '2', '1487666774', '1483409593', '0');

-- ----------------------------
-- Table structure for `lqb_news_category`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_news_category`;
CREATE TABLE `lqb_news_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '分类级别',
  `pid` smallint(5) unsigned NOT NULL COMMENT 'parentCategory上级分类',
  `name` varchar(80) NOT NULL COMMENT '分类名称',
  `keywords` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `articlenum` int(10) NOT NULL DEFAULT '0',
  `sort` smallint(8) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='新闻分类表';

-- ----------------------------
-- Records of lqb_news_category
-- ----------------------------
INSERT INTO `lqb_news_category` VALUES ('1', '0', '0', '公司新闻', '', '', '0', '0', '1');
INSERT INTO `lqb_news_category` VALUES ('2', '0', '0', '行业资讯', '', '', '0', '0', '1');
INSERT INTO `lqb_news_category` VALUES ('3', '0', '0', '媒体报道', '', '', '0', '0', '1');
INSERT INTO `lqb_news_category` VALUES ('4', '0', '0', '常见问题', '', '', '0', '0', '1');

-- ----------------------------
-- Table structure for `lqb_news_content`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_news_content`;
CREATE TABLE `lqb_news_content` (
  `id` int(11) unsigned NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_news_content
-- ----------------------------
INSERT INTO `lqb_news_content` VALUES ('6', '<p>爱的色放<br/></p>');
INSERT INTO `lqb_news_content` VALUES ('4', '<p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">可以加工制作铝单板的企业有很多家，而<strong>铝单板厂</strong>提供的产品种类繁多，无论是型号规格的多样化，还是品牌的多样化，都会影响到客户的选择方向。针对不同的使用场合，此时对产品的要求也会不同，所以选择哪家供应商，也是客户应该考虑的环节，所以必须要根据实际情况来进行确定，确保可以选择到性价比更高的产品。</span></p><p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">更多的<strong>铝单板厂</strong>在品牌定位方面都会非常重视，只有更为优质的品牌才会得到市场的认可，所以更好产品进行品牌升级，同时为客户提供更好的服务，将是企业可以得到生存的关键，所以此时必须要从更为专业的角度来进行把握，否额将是有很大的问题存在。</span></p><p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">相比之下，更为专业的<strong>铝单板厂</strong>提供的产品类型更多，而在制作工艺上，设计效果上都会非常符合客户的要求，同时还可以为客户提供更多的帮助，所以此时一定要从更为专业的角度入手，确保在各个方面有更为突出的表现。</span></p><p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">结合上面的介绍可以看出，选择知名的<strong>铝单板厂</strong>提供的产品，肯定是更值得购买的，而且品牌多样化的前提下，也是提升客户认可度的重要依据。要是没有能够让产品之狼得到更好的保证，将会失信于客户，自然也是无法赢得更好的销量，所以对厂家应该要有更为明确的把握才行。尤其是对厂家供应的产品类型进行关注，将是最为重要的环节。</span></p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('3', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月22日凌晨，湖北省大冶市大金省道灵乡古建门楼被大货车撞塌，事故造成1死1伤。大冶市公安局政治处工作人员告诉澎湃新闻，重型翻斗大货车行驶至大金省道灵乡镇门楼路段时，因车拖斗未放下，与门楼横梁发生碰撞，致使古建门楼垮塌压住大货车。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">22日下午，大冶市公安局政治处工作人员告诉澎湃新闻，政治处通过微信号“强哥说警事”发布通报称，22日凌晨0点30分左右，一辆重型翻斗大货车自大冶市陈贵镇往灵乡镇行驶途中，车行至315省道灵乡镇门楼时，顶起的车厢与门楼门沿相撞，致使古建门楼垮塌压住了大货车。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">事发后，驾驶员解某（男，42岁，大冶灵乡人）被卡在车上，坐在副驾驶的柯某被甩出车外。解某经医院抢救无效死亡。截至22日上午8点30分许，315省道已恢复正常通行。目前，事故正在进一步调查当中。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据大冶市灵乡镇官网介绍，灵乡门楼属于当地特色旅游项目。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('2', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月22日凌晨，湖北省大冶市大金省道灵乡古建门楼被大货车撞塌，事故造成1死1伤。大冶市公安局政治处工作人员告诉澎湃新闻，重型翻斗大货车行驶至大金省道灵乡镇门楼路段时，因车拖斗未放下，与门楼横梁发生碰撞，致使古建门楼垮塌压住大货车。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">22日下午，大冶市公安局政治处工作人员告诉澎湃新闻，政治处通过微信号“强哥说警事”发布通报称，22日凌晨0点30分左右，一辆重型翻斗大货车自大冶市陈贵镇往灵乡镇行驶途中，车行至315省道灵乡镇门楼时，顶起的车厢与门楼门沿相撞，致使古建门楼垮塌压住了大货车。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">事发后，驾驶员解某（男，42岁，大冶灵乡人）被卡在车上，坐在副驾驶的柯某被甩出车外。解某经医院抢救无效死亡。截至22日上午8点30分许，315省道已恢复正常通行。目前，事故正在进一步调查当中。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据大冶市灵乡镇官网介绍，灵乡门楼属于当地特色旅游项目。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('1', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“学校的确在11月20日高一新生家长会上兑现了之前招生时的承诺，对报考我校学生中初中中考成绩优秀者进行了奖励。共有239名学生获得了2万~10万不等的奖学金，共计发放奖学金总额为787万元。”苍南县灵溪树人中学校长蒋永洪告诉澎湃新闻。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据该校官网介绍，学校创建于1995年5月，是一所全寄宿制的民办普通高中。现有教职员工100余人，学生1200多人。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">蒋永洪向澎湃新闻介绍，在今年招生时校方承诺，对报考该校的高一新生中初中毕业升学考试成绩优秀者，依据总分在全县排名进行一次性奖励。其中，排进全县前1300名的奖励10万元，1301名至1800名的奖励5万元，1801名至2300名的奖励4万元，2301名至2800名的奖励3万元，2801名至3300名的奖励2万元。其中有5名新生各获得10万元奖学金，其余234人分获2万~5万元不等的奖学金，共计787万元。由于一下子取不出这么多现金，家长会当天只有发放了280多万，获得10万、5万和4万奖学金的学生现场领奖，其余获奖者通过银行打款。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“通过招生奖励让更多的优质生源报考我校，提高学校的高考质量，我认为这个钱花得值。”蒋永洪说。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">苍南县教育局相关处室负责人介绍，2016年苍南县高一新生总数约6000名，该校奖励最低档2万元是排名2801名至3300名的学生，成绩中等。树人中学的高一新生人数为400余人，如果有239人拿到奖学金，意味着该校新生中有一半以上的人都获得了奖励。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('7', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“学校的确在11月20日高一新生家长会上兑现了之前招生时的承诺，对报考我校学生中初中中考成绩优秀者进行了奖励。共有239名学生获得了2万~10万不等的奖学金，共计发放奖学金总额为787万元。”苍南县灵溪树人中学校长蒋永洪告诉澎湃新闻。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据该校官网介绍，学校创建于1995年5月，是一所全寄宿制的民办普通高中。现有教职员工100余人，学生1200多人。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">蒋永洪向澎湃新闻介绍，在今年招生时校方承诺，对报考该校的高一新生中初中毕业升学考试成绩优秀者，依据总分在全县排名进行一次性奖励。其中，排进全县前1300名的奖励10万元，1301名至1800名的奖励5万元，1801名至2300名的奖励4万元，2301名至2800名的奖励3万元，2801名至3300名的奖励2万元。其中有5名新生各获得10万元奖学金，其余234人分获2万~5万元不等的奖学金，共计787万元。由于一下子取不出这么多现金，家长会当天只有发放了280多万，获得10万、5万和4万奖学金的学生现场领奖，其余获奖者通过银行打款。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“通过招生奖励让更多的优质生源报考我校，提高学校的高考质量，我认为这个钱花得值。”蒋永洪说。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">苍南县教育局相关处室负责人介绍，2016年苍南县高一新生总数约6000名，该校奖励最低档2万元是排名2801名至3300名的学生，成绩中等。树人中学的高一新生人数为400余人，如果有239人拿到奖学金，意味着该校新生中有一半以上的人都获得了奖励。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('8', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“学校的确在11月20日高一新生家长会上兑现了之前招生时的承诺，对报考我校学生中初中中考成绩优秀者进行了奖励。共有239名学生获得了2万~10万不等的奖学金，共计发放奖学金总额为787万元。”苍南县灵溪树人中学校长蒋永洪告诉澎湃新闻。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据该校官网介绍，学校创建于1995年5月，是一所全寄宿制的民办普通高中。现有教职员工100余人，学生1200多人。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">蒋永洪向澎湃新闻介绍，在今年招生时校方承诺，对报考该校的高一新生中初中毕业升学考试成绩优秀者，依据总分在全县排名进行一次性奖励。其中，排进全县前1300名的奖励10万元，1301名至1800名的奖励5万元，1801名至2300名的奖励4万元，2301名至2800名的奖励3万元，2801名至3300名的奖励2万元。其中有5名新生各获得10万元奖学金，其余234人分获2万~5万元不等的奖学金，共计787万元。由于一下子取不出这么多现金，家长会当天只有发放了280多万，获得10万、5万和4万奖学金的学生现场领奖，其余获奖者通过银行打款。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“通过招生奖励让更多的优质生源报考我校，提高学校的高考质量，我认为这个钱花得值。”蒋永洪说。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">苍南县教育局相关处室负责人介绍，2016年苍南县高一新生总数约6000名，该校奖励最低档2万元是排名2801名至3300名的学生，成绩中等。树人中学的高一新生人数为400余人，如果有239人拿到奖学金，意味着该校新生中有一半以上的人都获得了奖励。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('9', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“学校的确在11月20日高一新生家长会上兑现了之前招生时的承诺，对报考我校学生中初中中考成绩优秀者进行了奖励。共有239名学生获得了2万~10万不等的奖学金，共计发放奖学金总额为787万元。”苍南县灵溪树人中学校长蒋永洪告诉澎湃新闻。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据该校官网介绍，学校创建于1995年5月，是一所全寄宿制的民办普通高中。现有教职员工100余人，学生1200多人。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">蒋永洪向澎湃新闻介绍，在今年招生时校方承诺，对报考该校的高一新生中初中毕业升学考试成绩优秀者，依据总分在全县排名进行一次性奖励。其中，排进全县前1300名的奖励10万元，1301名至1800名的奖励5万元，1801名至2300名的奖励4万元，2301名至2800名的奖励3万元，2801名至3300名的奖励2万元。其中有5名新生各获得10万元奖学金，其余234人分获2万~5万元不等的奖学金，共计787万元。由于一下子取不出这么多现金，家长会当天只有发放了280多万，获得10万、5万和4万奖学金的学生现场领奖，其余获奖者通过银行打款。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“通过招生奖励让更多的优质生源报考我校，提高学校的高考质量，我认为这个钱花得值。”蒋永洪说。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">苍南县教育局相关处室负责人介绍，2016年苍南县高一新生总数约6000名，该校奖励最低档2万元是排名2801名至3300名的学生，成绩中等。树人中学的高一新生人数为400余人，如果有239人拿到奖学金，意味着该校新生中有一半以上的人都获得了奖励。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('10', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“学校的确在11月20日高一新生家长会上兑现了之前招生时的承诺，对报考我校学生中初中中考成绩优秀者进行了奖励。共有239名学生获得了2万~10万不等的奖学金，共计发放奖学金总额为787万元。”苍南县灵溪树人中学校长蒋永洪告诉澎湃新闻。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据该校官网介绍，学校创建于1995年5月，是一所全寄宿制的民办普通高中。现有教职员工100余人，学生1200多人。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">蒋永洪向澎湃新闻介绍，在今年招生时校方承诺，对报考该校的高一新生中初中毕业升学考试成绩优秀者，依据总分在全县排名进行一次性奖励。其中，排进全县前1300名的奖励10万元，1301名至1800名的奖励5万元，1801名至2300名的奖励4万元，2301名至2800名的奖励3万元，2801名至3300名的奖励2万元。其中有5名新生各获得10万元奖学金，其余234人分获2万~5万元不等的奖学金，共计787万元。由于一下子取不出这么多现金，家长会当天只有发放了280多万，获得10万、5万和4万奖学金的学生现场领奖，其余获奖者通过银行打款。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“通过招生奖励让更多的优质生源报考我校，提高学校的高考质量，我认为这个钱花得值。”蒋永洪说。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">苍南县教育局相关处室负责人介绍，2016年苍南县高一新生总数约6000名，该校奖励最低档2万元是排名2801名至3300名的学生，成绩中等。树人中学的高一新生人数为400余人，如果有239人拿到奖学金，意味着该校新生中有一半以上的人都获得了奖励。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('11', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“学校的确在11月20日高一新生家长会上兑现了之前招生时的承诺，对报考我校学生中初中中考成绩优秀者进行了奖励。共有239名学生获得了2万~10万不等的奖学金，共计发放奖学金总额为787万元。”苍南县灵溪树人中学校长蒋永洪告诉澎湃新闻。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据该校官网介绍，学校创建于1995年5月，是一所全寄宿制的民办普通高中。现有教职员工100余人，学生1200多人。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">蒋永洪向澎湃新闻介绍，在今年招生时校方承诺，对报考该校的高一新生中初中毕业升学考试成绩优秀者，依据总分在全县排名进行一次性奖励。其中，排进全县前1300名的奖励10万元，1301名至1800名的奖励5万元，1801名至2300名的奖励4万元，2301名至2800名的奖励3万元，2801名至3300名的奖励2万元。其中有5名新生各获得10万元奖学金，其余234人分获2万~5万元不等的奖学金，共计787万元。由于一下子取不出这么多现金，家长会当天只有发放了280多万，获得10万、5万和4万奖学金的学生现场领奖，其余获奖者通过银行打款。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">“通过招生奖励让更多的优质生源报考我校，提高学校的高考质量，我认为这个钱花得值。”蒋永洪说。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">苍南县教育局相关处室负责人介绍，2016年苍南县高一新生总数约6000名，该校奖励最低档2万元是排名2801名至3300名的学生，成绩中等。树人中学的高一新生人数为400余人，如果有239人拿到奖学金，意味着该校新生中有一半以上的人都获得了奖励。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('12', '<p>发稿人：admin 　日期：2016-11-23 11:22:00　人气：<span id=\"hits\" style=\"margin: 0px; padding: 0px; list-style: none;\">5</span></p><p style=\"text-align:justify;margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-size: 16px;\">为切实抓好农村低保制度和扶贫开发政策“两项制度”有效衔接工作，促进农村贫困人口脱贫，田林县按照现行贫困标准下农村贫困人口实现脱贫的目标任务，把好“两项”制度有效衔接检查、核查工作。</span></p><p style=\"text-align:justify;margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-size: 16px;\">8月30至9月2日，该县从县政府督查室、纪委监察局、民政局、统计局、扶贫办、绩效办等县直部门抽调相关人员组成督导组，分成4个工作组深入14个乡检查、指导“两项制度”有效衔接工作开展情况。重点检查乡镇是否把符合条件的建档立卡贫困人口纳入农村低保范围；农村低保对象与贫困人口的重合率和贡献率是否达到市级下达的指标任务；乡镇在审核低保对象过程中是否坚持属地管理、动态管理原则及是否坚持公开、公平、公正原则；是否存在“保人不保户”、“关系保”、“人情保”、财政供养人员家属保等违规现象；并对督查发现的问题及时纠错。</span></p><p style=\"text-align:justify;margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px;\"><span style=\"margin: 0px; padding: 0px; list-style: none; font-size: 16px;\">各督查组主要采取听取乡（镇）汇报、查阅资料、现场查看、入户抽查等方式进行。在核查督查过程中，针对乡镇在开展“两项制度”衔接工作中存在的问题和困难，督查组给予指导、纠错，并向县委、县政府汇报督查工作开展情况，促使农村低保制度和扶贫开发政策“两项制度”有效衔接工作发挥扶贫济困的重要作用，增加贫困人口的经济收入，为加快实现该县贫困人口脱贫目标起到政策兜底的保障作用。</span></p><p><br/></p><p><img src=\"/Uploads/userfiles/201612/5863352a754cb.jpg\" style=\"width: 946px; height: 695px;\" width=\"946\" height=\"695\"/></p>');
INSERT INTO `lqb_news_content` VALUES ('13', '<p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据新华社电\n \n国家食品药品监督管理总局11月21日曝光9起药品、保健品虚假广告宣传。食药监总局指出，曝光的7起药品和两起保健品虚假广告内容存在不科学的功效断言、扩大宣传治愈率或有效率、利用患者名义或形象做功效证明等问题，欺骗和误导消费者，严重危害公众饮食用药安全。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">据悉，曝光的7起药品虚假广告是天津市中央药业有限公司生产的药品“强力蜂乳浆胶丸”、江西众源药业有限公司生产的药品“健脾壮腰药酒”、中美华医（河北）制药有限公司生产的药品“三宝胶囊”、山东方健制药有限公司生产的药品“二仙口服液”、云南省腾冲县东方红制药有限责任公司生产的药品“舒筋活络丸”、湖南正清制药集团股份有限公司生产的药品“消糖灵胶囊”和云南云龙制药股份有限公司生产的药品“蛮龙液”。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">曝光的两起保健品虚假广告是江西省修水神茶实业有限公司生产的保健食品“降糖神茶”和内蒙古彤辉实业有限责任公司生产的保健食品“彤辉牌罗布麻茶”。</p><p style=\"margin: 5px 0px; padding: 0px; list-style: none; font-size: 14px; color: rgb(68, 68, 68); font-family: Simsun; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 25px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255);\">食药监总局表示已将上述违法行为移送有关部门查处，要求有关省级食药监管部门依法撤销其有效期内的广告批准文号，并要求各地方食药监管部门严肃查处、问责虚假广告宣传。</p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('14', '<p>tes<br/></p>');
INSERT INTO `lqb_news_content` VALUES ('15', '<p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p>发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了发奖金了<br/></p><p><br/></p>');
INSERT INTO `lqb_news_content` VALUES ('16', '<p>test</p>');
INSERT INTO `lqb_news_content` VALUES ('17', '<p>test</p>');
INSERT INTO `lqb_news_content` VALUES ('18', '<p>test</p>');
INSERT INTO `lqb_news_content` VALUES ('19', '<p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">更为专业的<strong>铝单板厂家</strong>可以保证产品在质量上更优，无论是对铝合金基材的选择，还是喷涂工艺的把握，都是直接影响到产品性能的重要因素，所以一定要结合实际情况来进行确定，同时对其规格尺寸进行保证，对其外观形状进行设计制造，这才是保证其质量可以更优的关键所在。</span></p><p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">相比较而言，更为优质<strong>铝单板厂家</strong>都会选择优质的铝合金作为基材，同时采用氟碳涂料进行喷涂，对其形状设计以及颜色选择方面都会根据客户的要求来进行生产，所以在客户满意度上肯定更高，所以应该要从更为合理的角度入手，确保在品质方面的优势可以更突出一些。</span></p><p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">要想获得性价比更高的铝单板装修装饰材料，此时对<strong>铝单板厂家</strong>的选择将是最重要的一环，同时它可以影响到客户的选择。要是在铝单板质量上更过硬，肯定能得到客户的一致认可，还可以让客户在选择的时候能够有更多的参考数据，所以这些都是值得我们去注意的焦点，其品质方面的优势也会及其突出。</span></p><p style=\";padding: 0px;word-spacing: -1.5px;color: rgb(51, 51, 51);font-family: 微软雅黑;font-size: 14px;font-style: normal;font-variant: normal;font-weight: normal;letter-spacing: normal;line-height: 28px;orphans: auto;text-align: start;white-space: normal;widows: 1;-webkit-text-stroke-width: 0px;text-indent: 28px\"><span style=\"font-family: 宋体\">认准知名度更高，实力更强的专业<strong>铝单板厂家</strong>，它在保证产品质量方面绝对是最为突出的，而且还可以确保客户选购到的产品符合使用要求，无论是刚度高，耐用性强的特点，还是耐腐蚀耐持久方面的能力，都可以得到加强，所以对生产设计制造厂家的选择，将是最为重要的环节。</span></p><p><br/></p>');

-- ----------------------------
-- Table structure for `lqb_partner`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_partner`;
CREATE TABLE `lqb_partner` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `group_id` smallint(3) unsigned NOT NULL DEFAULT '1',
  `name` varchar(20) NOT NULL,
  `url` varchar(100) NOT NULL,
  `thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `qq` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `views` int(1) unsigned NOT NULL DEFAULT '0',
  `sort` smallint(5) NOT NULL DEFAULT '0',
  `update_time` int(10) unsigned NOT NULL,
  `create_time` int(10) unsigned NOT NULL,
  `ip` varchar(15) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_partner
-- ----------------------------
INSERT INTO `lqb_partner` VALUES ('1', '1', '中建三局', 'http://www.baidu.com', '/Themes/Home/lanse/static/picture/partner1.jpg', '', '', '中建三局', '0', '0', '1487664850', '1466060708', '', '1');
INSERT INTO `lqb_partner` VALUES ('5', '1', '湖南广宇', 'http://', '/Themes/Home/lanse/static/picture/partner2.jpg', '', '', '', '0', '0', '1487664901', '1466064437', '', '1');
INSERT INTO `lqb_partner` VALUES ('6', '1', '电白二建', 'http://b', '/Themes/Home/lanse/static/picture/partner6.jpg', '', '', '', '0', '0', '1487664934', '1466064451', '', '1');
INSERT INTO `lqb_partner` VALUES ('7', '1', '中太建设', 'http://www.baidu.com', '/Themes/Home/lanse/static/picture/partner3.jpg', '', '', '', '0', '0', '1487664953', '1466064463', '', '1');
INSERT INTO `lqb_partner` VALUES ('8', '1', '浙建集团', '#', '/Themes/Home/lanse/static/picture/partner4.jpg', '', '', '', '0', '0', '1487664970', '1466064474', '', '1');
INSERT INTO `lqb_partner` VALUES ('9', '1', '东方建材', '#', '/Themes/Home/lanse/static/picture/partner5.jpg', '', '', '', '0', '0', '1487664995', '1466065043', '', '1');

-- ----------------------------
-- Table structure for `lqb_product`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_product`;
CREATE TABLE `lqb_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布者UID',
  `house_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '楼盘ID',
  `category_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `texture_id` mediumint(8) NOT NULL DEFAULT '0' COMMENT '材质ID',
  `market_price` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '市场价',
  `price` decimal(10,0) NOT NULL DEFAULT '0' COMMENT '出售价',
  `code` varchar(32) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL COMMENT '新闻标题',
  `thumb` varchar(150) DEFAULT NULL,
  `keywords` varchar(50) DEFAULT NULL COMMENT '文章关键字',
  `description` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `clicks` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `r` tinyint(1) NOT NULL,
  `h` tinyint(1) NOT NULL,
  `t` tinyint(1) NOT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- ----------------------------
-- Records of lqb_product
-- ----------------------------
INSERT INTO `lqb_product` VALUES ('1', '1', '0', '2', '0', '0', '0', 'JW000001', '氟碳铝单板', '/Uploads/userfiles/201702/58abfac2cfa57.jpg', '', '', '0', '1', '2', '2', '2', '1487665860', '1479976433');

-- ----------------------------
-- Table structure for `lqb_product_album`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_product_album`;
CREATE TABLE `lqb_product_album` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `user_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '会员编号',
  `item_id` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '信息编号',
  `uname` varchar(15) DEFAULT NULL COMMENT '会员名称',
  `filename` varchar(50) NOT NULL COMMENT '名称',
  `savepath` varchar(80) NOT NULL COMMENT 'URL链接',
  `savename` varchar(80) NOT NULL,
  `extension` varchar(10) NOT NULL COMMENT '文件后缀',
  `type` varchar(10) NOT NULL COMMENT '1为图片',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建日期',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '大小',
  `thumb` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `path` varchar(100) DEFAULT NULL,
  `category` varchar(30) NOT NULL COMMENT '文件分类 只能用小写英文字符表示',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `remark` varchar(255) NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_product_album
-- ----------------------------

-- ----------------------------
-- Table structure for `lqb_product_category`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_product_category`;
CREATE TABLE `lqb_product_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '分类级别',
  `pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT 'parentCategory上级分类',
  `name` varchar(80) DEFAULT NULL COMMENT '分类名称',
  `keywords` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `articlenum` int(10) NOT NULL DEFAULT '0',
  `sort` smallint(8) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='新闻分类表';

-- ----------------------------
-- Records of lqb_product_category
-- ----------------------------
INSERT INTO `lqb_product_category` VALUES ('1', '0', '0', '铝单板系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('2', '0', '0', '铝方通系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('3', '0', '0', '铝天花系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('4', '0', '0', '铝格栅系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('5', '0', '0', '铝圆管系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('6', '0', '0', '铝蜂窝板系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('7', '0', '0', '铝挂片系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('8', '0', '0', '铝屏风雕花系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('9', '0', '0', '铝塑板系列', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('10', '0', '1', '标准铝单板', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('11', '0', '1', '冲孔铝单板', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('12', '0', '1', '异形铝单板', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('13', '0', '1', '木纹铝单板', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('14', '0', '1', '氟碳铝单板', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('15', '0', '1', '石纹铝单板', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('16', '0', '2', '铝合金四方管', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('17', '0', '2', 'V型铝方通', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('18', '0', '2', 'U型铝方通', null, null, '0', '0', '1');
INSERT INTO `lqb_product_category` VALUES ('19', '0', '2', '木纹铝方通', null, null, '0', '0', '1');

-- ----------------------------
-- Table structure for `lqb_product_content`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_product_content`;
CREATE TABLE `lqb_product_content` (
  `id` int(11) unsigned NOT NULL,
  `content` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_product_content
-- ----------------------------
INSERT INTO `lqb_product_content` VALUES ('1', '<p style=\"margin: 0px; padding: 0px; word-spacing: 0px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; color: rgb(102, 102, 102); text-align: left; font-stretch: normal; font-size: 12px; line-height: 21px; font-family: 微软雅黑, 宋体; background-color: rgb(255, 255, 255);\"><span style=\"font-family: Arial, 宋体; line-height: 26px;\">铝单板是幕墙表面一般经过铬化等前处理后，再采用氟碳喷涂处理。铝单板是氟碳涂料面漆和清漆的聚偏氟乙烯树脂（KANAR500）。具有卓越的抗腐蚀性和耐候性，能抗酸雨、盐雾和各种空气污染物，耐冷热性能极好，能抵御强烈紫外线的照射，能长期保持不褪色、不粉化，使用寿命长。</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-size: 18px; font-family: Arial, 宋体; line-height: 26px;\"><strong><span style=\"font-size: 18px; font-family: Arial, 宋体; color: rgb(255, 0, 0); line-height: 26px;\">铝单板产品构造</span></strong></span><span style=\"font-family: Arial, 宋体; color: rgb(255, 0, 0); line-height: 26px;\">:</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><img alt=\"铝单板产品构造\" src=\"/Uploads/ueditor/image/20170221/1487643851873502.jpg\" title=\"铝单板产品构造\" data-bd-imgshare-binded=\"1\" style=\"border: 0px; font-family: Arial, 宋体; vertical-align: top; line-height: 26px;\" height=\"300\" width=\"300\"/><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-family: Arial, 宋体; line-height: 26px;\">基板采用优质的高强度铝合金板，其厚度有2.0mm、2.5mm、3.0mm、4.0mm等各种规格。其构造主要由面板、加强筋、角码等部件构成，最大尺寸可达4000mm×1500mm×2000mm（L×W×H）。</span></p><p><strong><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">铝单板</span></strong><span style=\"font-size: 18px;\"><strong><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">特点：</span></strong></span></p><p>1、重量轻，钢性好、强度高3.0mm厚铝板每平方板重8kg，抗拉强度100-280n/mm2</p><p>2、耐久性和耐腐蚀性好。采用kynar-500、hylur500为基料的pvdf氟碳漆，可用25年不褪色。</p><p>铝单板幕墙建筑</p><p>3、工艺性好。采用先加工后喷漆工艺，铝板可加工成平面、弧型和球面等各种复杂几何形状。</p><p>4、涂层均匀、色彩多样。先进<a href=\"http://baike.baidu.com/view/1000752.htm\" target=\"_blank\" title=\"链接关键词\" style=\"color: black; text-decoration: none; font-family: 微软雅黑, 宋体; padding: 0px;\">静电喷涂技术</a>使得油漆与铝板间附着均匀一致，颜色多样，选择空间大。</p><p>5、不易玷污，便于清洁保养。氟涂料膜的非粘着性，使表面很难附着污染物，更具有良好向洁性。</p><p>6、安装施工方便快捷。铝板在工厂成型，施工现场不需裁切，固定在骨架上即可。</p><p>7、可回收再利用，有利环保。铝板可100%回收，不同于玻璃，石材，陶瓷，铝塑板等装饰材料，回收残值高。</p><p style=\"margin: 0px; padding: 0px; word-spacing: 0px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; color: rgb(102, 102, 102); text-align: left; font-stretch: normal; font-size: 12px; line-height: 21px; font-family: 微软雅黑, 宋体; background-color: rgb(255, 255, 255);\"><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><strong style=\"font-family: Arial, 宋体; line-height: 26px;\"><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">铝单板涂层技术</span></strong><span style=\"font-family: Arial, 宋体; color: rgb(255, 0, 0); line-height: 26px;\">:</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-family: Arial, 宋体; line-height: 26px;\">瑞亿金属有限公司的铝材涂层技术具有世界领先水平，漆料的配色过程由电脑严格控制，涂层的色泽均匀、色差小、色彩饱和度好，附着力强、耐磨损、质量稳定，确保金属板材获得理想的涂层性能。</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><img alt=\" \" src=\"/Uploads/ueditor/image/20170221/1487643851641732.jpg\" data-bd-imgshare-binded=\"1\" style=\"border: 0px; font-family: Arial, 宋体; vertical-align: top; line-height: 26px;\" height=\"300\" width=\"300\"/><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><strong style=\"font-family: Arial, 宋体; line-height: 26px;\"><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">完美的产品特性</span></strong><span style=\"font-family: Arial, 宋体; color: rgb(255, 0, 0); line-height: 26px;\">：</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-family: Arial, 宋体; line-height: 26px;\">装饰性能佳：涂层表面光滑流畅，颜色均匀明快；</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-family: Arial, 宋体; line-height: 26px;\">耐候性强：良好的抗腐蚀性、颜色和光泽保持力，使用寿命长，持久如新；</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-family: Arial, 宋体; line-height: 26px;\">加工性广：涂层附着力强，韧性好，提高了金属材料的延展性；</span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-family: Arial, 宋体; line-height: 26px;\">一致性好：涂膜厚度均匀，保证产品颜色的连续性和一致性；涂层种类丰富:有聚酯、聚氨酯、氟碳、覆膜等多种涂层可供选择，满足特殊需求。 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</span></p><p style=\"margin: 0px; padding: 0px; word-spacing: 0px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: auto; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; -webkit-text-stroke-width: 0px; color: rgb(102, 102, 102); text-align: left; font-stretch: normal; font-size: 12px; line-height: 21px; font-family: 微软雅黑, 宋体; background-color: rgb(255, 255, 255);\"><strong style=\"font-family: Arial, 宋体; line-height: 26px;\"><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">出色的加工性能</span></strong><span style=\"font-family: Arial, 宋体; line-height: 26px;\"><span style=\"font-family: Arial, 宋体; color: rgb(255, 0, 0); line-height: 26px;\">： &nbsp; &nbsp; &nbsp;<span class=\"Apple-converted-space\">&nbsp;</span></span>&nbsp; &nbsp;<span class=\"Apple-converted-space\">&nbsp;</span></span><br style=\"font-family: Arial, 宋体; line-height: 26px;\"/><span style=\"font-family: Arial, 宋体; line-height: 26px;\">可根据客户需求，提供工程所需的各种异型、曲面、球形、多转折、冲孔等多种造型产品。瑞亿公司根据客户需求，可提供不同形式、 不同孔径、不同开孔率的开孔铝单板。呈现千变万化的图案和创意，其产品应用在建筑中，不但提高了建筑的美观性，而且还可以根据需要附加其他您想实现的功能，如隔音、吸音。</span></p><p><span style=\"font-size: 18px;\"><strong><span style=\"font-size: 18px; color: rgb(255, 0, 0);\">铝单板应用场合：</span></strong></span></p><p>1、建筑物外墙、<a href=\"http://baike.baidu.com/view/1536798.htm\" target=\"_blank\" title=\"链接关键词\" style=\"color: black; text-decoration: none; font-family: 微软雅黑, 宋体; padding: 0px;\">梁柱</a>、阳台、雨棚</p><p>2、机场、车站、医院</p><p>3、会议厅、歌剧院</p><p>4、体育场馆</p><p>5、接待大堂等等高层建筑物</p><p><br/></p>');

-- ----------------------------
-- Table structure for `lqb_singlepage`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_singlepage`;
CREATE TABLE `lqb_singlepage` (
  `id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '发布者UID',
  `varname` varchar(30) NOT NULL DEFAULT '0' COMMENT '所在分类',
  `title` varchar(200) NOT NULL COMMENT '新闻标题',
  `keywords` varchar(50) NOT NULL DEFAULT '' COMMENT '文章关键字',
  `description` varchar(255) NOT NULL COMMENT '文章描述',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `update_time` int(10) NOT NULL DEFAULT '0',
  `content` longtext NOT NULL,
  `clicks` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- ----------------------------
-- Records of lqb_singlepage
-- ----------------------------
INSERT INTO `lqb_singlepage` VALUES ('1', '1', 'about', '关于我们', '珠宝乐园简介', '珠宝乐园是一个专做轻奢珠宝的品牌，由“翡翠王朝”倾力打造。公司立足珠宝源头，拥有多年的行业资源积累和完善的服务体系，以彩色宝石、南红、文玩等珠宝品类开发为主体业务，为珠宝爱好者提供多品类、高性价比的优质珠宝。\n\n珠宝乐园秉承着翡翠王朝“惠、敏、恭、信、宽”的企业核心价值观以及“存三分名利，怀七分仁义”的经营理念，尽全力打造一家值得信赖的能承担社会责任的百年公司。', '1', '1401346141', '1472716643', '<h1 class=\"title-h1\">珠宝乐园简介&nbsp;<em>Company Introduction</em></h1><p>\n					</p><p class=\"text ti\">珠宝乐园是一个专做轻奢珠宝的品牌，由“翡翠王朝”倾力打造。公司立足珠宝源头，拥有多年的行业资源积累和完善的服务体系，以彩色宝石、南红、文玩等珠宝品类开发为主体业务，为珠宝爱好者提供多品类、高性价比的优质珠宝。</p><p>\n					</p><p class=\"text ti\">珠宝乐园秉承着翡翠王朝“惠、敏、恭、信、宽”的企业核心价值观以及“存三分名利，怀七分仁义”的经营理念，尽全力打造一家值得信赖的能承担社会责任的百年公司。</p><p>\n					</p><h1 class=\"title-h1\">企业文化 &nbsp;&nbsp;<em>Enterprise Culture</em></h1><p>\n					</p><p class=\"text ti\"><strong>我们的目标</strong>&nbsp;&nbsp;<em>Our Goal</em></p><p>\n					</p><p class=\"text int ti\">打造一家值得信赖的能承担社会责任的百年公司。</p><p>\n					</p><p class=\"text ti\"><strong>我们的使命</strong>&nbsp;&nbsp;<em>Our Mission</em></p><p>\n					</p><p class=\"text int ti\">以超值好珠宝和舒心服务造福顾客。</p><p>\n					</p><p class=\"text ti\"><strong>经营理念</strong>&nbsp;&nbsp;<em>Business Philosophy</em></p><p>\n					</p><p class=\"text int ti\">坚信“<strong>我若绽放，蝴蝶自来</strong>”，矢志不移的提升产品品质，建设团队，积累品牌信誉！</p><p>\n					</p><p class=\"text int ti\">恪守“<strong>存三分名利，怀七分仁义</strong>”的古训，不赚厚利，不谋眼前利，追求长久共赢。</p><p>\n					</p><p class=\"text int ti\">坚持精耕细作，做到专心、专注、专业，力求让顾客买得放心、退换舒心、买得超值！</p><p>\n\n					</p><p class=\"text ti\"><strong>核心价值观</strong>&nbsp;&nbsp;<em>Core Values</em></p><p>\n					</p><p class=\"text ti\"><strong>惠</strong></p><p>\n					</p><p class=\"text int ti\">善念善行，造福亲友、顾客等一切与我们关联的人。</p><p>\n					</p><p class=\"text ti\"><strong>敏</strong></p><p>\n					</p><p class=\"text int ti\">好学能干，与时俱进，自动自发追求成长。</p><p>\n					</p><p class=\"text ti\"><strong>恭</strong></p><p>\n					</p><p class=\"text int ti\">谦逊守礼，对人对事对世间万物有敬畏之心。</p><p>\n					</p><p class=\"text ti\"><strong>信</strong></p><p>\n					</p><p class=\"text int ti\">说靠谱话，做靠谱事，宁可自损利益，也要坚决履约！</p><p>\n					</p><p class=\"text ti\"><strong>宽</strong></p><p>\n					</p><p class=\"text int ti\">不急不躁，包容豁达，从一切好事坏事中找到正的能量。</p><p><br/></p>', '2');
INSERT INTO `lqb_singlepage` VALUES ('2', '1', 'joinus', '加入我们', '加入我们', '加入我们', '1', '1445918022', '1451101896', '<p></p><h3 style=\"margin: 0px; padding: 0px; border: 0px; font-weight: 400; font-size: 18px; color: rgb(51, 51, 51); font-family: Arial, &#39;Hiragino Sans GB W3&#39;, 微软雅黑; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 28px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(246, 246, 246);\"><span style=\"font-size: 16px; color: rgb(51, 127, 229);\"><strong>产品经理（业务系统方向</strong><strong>）</strong></span>&nbsp;<hr/></h3><p><strong><span>职位描述及工作职责：</span></strong>&nbsp;<span class=\"Apple-converted-space\">&nbsp;</span><br/>1、负责公司产品的规划、设计和运营，并对最终结果负责；<br/>2、主导产品线阶段发展规划，制定目标清晰的、可量化的指标；<br/>3、分析数据，发现用户需求，制定相应方案，保持产品竞争力；<br/>4、独立完成项目管理，包括项目进度跟进，现场问题分析，反馈修正，文档整理；<br/>5、产品运营跟进，包括收集用户反馈，整理产品需求，运营数据分析等，提出产品改进建议及优先级计划。<span class=\"Apple-converted-space\">&nbsp;</span><br/><strong><span style=\"font-size: 14px;\">任职要求：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/>1、有很强的调研分析能力，能清晰的给出产品定位，提炼出产品的关键要素和核心功能；<br/>2、能很好的把握各项功能的优先级，有独立决策能力；<br/>3、有很强的抗压能力，能够在压力下保持清醒，做出正确的判断；<br/>4、具备良好的用户体验和互联网知识基础；<br/>5、3年以上互联网/电子商务产品经理经验，25-35周岁，本科以上学历，计算机相关专业，有成功的产品案例者优先。</p><p>&nbsp;</p><h3 style=\"margin: 0px; padding: 0px; border: 0px; font-weight: 400; font-size: 18px; color: rgb(51, 51, 51); font-family: Arial, &#39;Hiragino Sans GB W3&#39;, 微软雅黑; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 28px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(246, 246, 246);\"><span style=\"font-size: 16px; color: rgb(51, 127, 229);\"><strong>Android高级开发工程师</strong></span><hr/></h3><p><strong><span style=\"font-size: 14px;\">职位描述及工作职责：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1.独立完成android客户端软件的设计与开发；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2.验证和修正测试中发现的问题；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3.学习和研究新技术以满足产品的需求；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><strong><span style=\"font-size: 14px;\">任职要求：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1、1年以上相关工作经验，具有android开发经验者优先考虑；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2、精通java语言，熟悉android系统架构，有网络开发经验；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3、熟悉sql语言，熟悉数据库的开发；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">4、具备良好的编程习惯，有文档写作、程序设计的能力；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">5、有安卓系统上线产品者优先考虑。</span></p><p>&nbsp;</p><h3 style=\"margin: 0px; padding: 0px; border: 0px; font-weight: 400; font-size: 18px; color: rgb(51, 51, 51); font-family: Arial, &#39;Hiragino Sans GB W3&#39;, 微软雅黑; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 28px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(246, 246, 246);\"><span style=\"font-size: 16px; color: rgb(51, 127, 229);\"><strong>IOS高级开发工程师</strong></span>&nbsp;<hr/></h3><p><strong><span style=\"font-size: 14px;\">职位描述及工作职责：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1、负责IOS平台应用的开发与维护；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2、参与应用的系统设计，代码编写、性能优化和BUG修复工作；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3、在开发中发现存在的问题，积极沟通并解决。</span></p><p><strong><span style=\"font-size: 14px;\">任职要求：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1、熟悉iOS应用开发框架，能独立开发iOS应用；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2、熟练掌握Objective-C，熟悉MacOS，Xcode及iPhone SDK开发环境，有良好的编程习惯；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3、能根据需求进行合理的模块分解与任务分解；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">4、对移动互联网有浓厚的兴趣；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">5、具有一年以上的同岗位工作经验，有 AppStore 上线作品者优先考虑；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">6、优秀的应届生，有相关开发经验，对IOS应用有浓厚兴趣的也可考虑。</span></p><p>&nbsp;</p><h3 style=\"margin: 0px; padding: 0px; border: 0px; font-weight: 400; font-size: 18px; color: rgb(51, 51, 51); font-family: Arial, &#39;Hiragino Sans GB W3&#39;, 微软雅黑; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 28px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(246, 246, 246);\"><span style=\"font-size: 16px; color: rgb(51, 127, 229);\"><strong>前端开发工程师</strong></span>&nbsp;<hr/></h3><p><strong><strong><span style=\"font-size: 14px;\">职位描述及工作职责：</span></strong></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1、用HTML / CSS / JavaScript / AJAX等各种Web技术，实现高要求的前台UI和交互的细节解决方案；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2、制定标准优化的CSS 和 Web 代码,并实现多浏览器兼容方案；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3、能够按照要求,独自对网站功能模块进行更新、修改.<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">4、对交互体验、可用性、用户体验有一定程度的理解；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">5、具有大型项目开发工作经验，具有独立开发能力，具有一定的系统架构能力者优先；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><strong><span style=\"font-size: 14px;\">任职要求：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1、负责项目前端网页的设计与研发；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2、提供合理的前端架构，设计开发实现优质前端框架并实现和后台程序的对接；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3、负责优化网站产品的质量、性能、用户体验；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">4、具备良好的文档维护能力，熟练使用管理代码；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">5、负责前端技术实施的整体考虑，提供前端与后端技术应用解决方案。<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">6、具有房地产平台开发者优先考虑；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">7、具有手机端网站开发经验者优先考虑；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">8、具有电商平台开发经验者优先；</span></p><p>&nbsp;</p><h3 style=\"margin: 0px; padding: 0px; border: 0px; font-weight: 400; font-size: 18px; color: rgb(51, 51, 51); font-family: Arial, &#39;Hiragino Sans GB W3&#39;, 微软雅黑; font-style: normal; font-variant: normal; letter-spacing: normal; line-height: 28px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: auto; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(246, 246, 246);\"><span style=\"font-size: 16px; color: rgb(51, 127, 229);\"><strong>PHP高级程序员</strong></span>&nbsp;<hr/></h3><p><strong><span style=\"font-size: 14px;\">职位描述及工作职责：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1、参与平台网站的设计与开发、维护；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2、参与公司指定的研发项目等；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3、参与移动客户端应用后台的设计与开发；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">4、参与公司微信公众账号接口开发；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><strong><span style=\"font-size: 14px;\">任职要求：</span></strong><span class=\"Apple-converted-space\">&nbsp;</span><br/><span style=\"font-size: 14px;\">1、计算机或相关专业毕业；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">2、精通PHP、MySQL，熟悉Smarty、thinkPHP、OOP等框架技术；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">3、熟悉常用开发工具，对移动应用平台有一定的了解；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">4、良好合作态度及团队精神，富有工作激情、创造力和责任感，能承受高强度的工作压力；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">5、有电子商务平台开发经验者优先；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">6、有房产网站平台开发经验者优先；<span class=\"Apple-converted-space\">&nbsp;</span></span><br/><span style=\"font-size: 14px;\">7、有微信公众账号平台开发者优先；</span></p><p><span style=\"font-size: 14px;\"></span>&nbsp;</p><p><span style=\"font-size: 14px;\">如有求职意向，请先把简历投递至：43892235@qq.com</span></p><p><br/></p><p></p>', '0');
INSERT INTO `lqb_singlepage` VALUES ('3', '1', 'contact', '联系方式', '联系方式', '联系方式', '1', '1445918037', '1452647893', '<p></p><p></p><p></p><p></p><p>　　关于搜屋网的意见与建议，以及相关合作事宜，请通过以下方式与我们联系。</p><p>　　北京搜屋网信息技术有限公司</p><p>　　邮件：43892235@qq.com</p><p>　　电话：400-007-1332</p><p>　　地址：北京市平谷区林荫大道</p><p>&nbsp; &nbsp; &nbsp; 项目合作 &nbsp; 张经理：13910397675</p><p><br/></p><p></p><p></p><p></p><p></p>', '0');
INSERT INTO `lqb_singlepage` VALUES ('4', '1', 'service', '售后服务', '服务', '服务', '1', '1445918054', '1472713460', '<p><br/></p><p><br/></p><p>服务</p>', '0');
INSERT INTO `lqb_singlepage` VALUES ('5', '1', 'buy', '会员注册协议', '会员注册协议', '会员注册协议', '1', '1458918078', '1486197548', '<p><br/></p><p style=\"color: rgb(0, 0, 0); font-family: Simsun; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-align: center; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: 16px;\">欢迎您注册成为百色纪检监查网用户</span></p><p style=\"color: rgb(0, 0, 0); font-family: Simsun; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; text-indent: 0px; text-transform: none; white-space: normal; word-spacing: 0px; -webkit-text-stroke-width: 0px;\"><span style=\"font-size: 16px;\"><br/></span></p><p style=\"color: rgb(0, 0, 0); font-family: Simsun; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">请仔细阅读下面的协议，只有接受协议才能继续进行注册。</p><p style=\"color: rgb(0, 0, 0); font-family: Simsun; font-size: medium; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: normal; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px;\">*百色纪检监察网坚持文责自负，要求用户实名注册，在用户名栏写清本人真实姓名 ，呢称栏写清本人单位。只有同意实名注册，才能通过管理员审核。 1．服务条款的确认和接纳 　　百色纪检监查网用户服务的所有权和运作权归百色纪检监查网拥有。百色纪检监查网所提供的服务将按照有关章程、服务条款和操作规则严格执行。用户通过注册程序点击“我同意” 按钮，即表示用户与百色纪检监查网达成协议并接受所有的服务条款。 2． 百色纪检监查网服务简介 　　百色纪检监查网通过国际互联网为用户提供新闻及文章浏览、图片浏览、软件下载、网上留言和BBS论坛等服务。 　　用户必须： 　　1)购置设备，包括个人电脑一台、调制解调器一个及配备上网装置。 　　2)个人上网和支付与此服务有关的电话费用、网络费用。 　　用户同意： 　　1)提供及时、详尽及准确的个人资料。 　　2)不断更新注册资料，符合及时、详尽、准确的要求。所有原始键入的资料将引用为注册资料。 　　3)用户同意遵守《中华人民共和国保守国家秘密法》、《中华人民共和国计算机信息系统安全保护条例》、《计算机软件保护条例》等有关计算机及互联网规定的法律和法规、实施办法。在任何情况下，百色纪检监查网合理地认为用户的行为可能违反上述法律、法规，百色纪检监查网可以在任何时候，不经事先通知终止向该用户提供服务。用户应了解国际互联网的无国界性，应特别注意遵守当地所有有关的法律和法规。 3． 服务条款的修改 　　百色纪检监查网会不定时地修改服务条款，服务条款一旦发生变动，将会在相关页面上提示修改内容。如果您同意改动，则再一次点击“我同意”按钮。 如果您不接受，则及时取消您的用户使用服务资格。 4． 服务修订 　　百色纪检监查网保留随时修改或中断服务而不需知照用户的权利。百色纪检监查网行使修改或中断服务的权利，不需对用户或第三方负责。 5． 用户隐私制度 　　尊重用户个人隐私是百色纪检监查网的 基本政策。百色纪检监查网不会公开、编辑或透露用户的注册信息，除非有法律许可要求，或百色纪检监查网在诚信的基础上认为透露这些信息在以下三种情况是必要的： 　　1)遵守有关法律规定，遵从合法服务程序。 　　2)保持维护百色纪检监查网的商标所有权。 　　3)在紧急情况下竭力维护用户个人和社会大众的隐私安全。 　　4)符合其他相关的要求。 6．用户的帐号，密码和安全性 　　一旦注册成功成为百色纪检监查网用户，您将得到一个密码和帐号。如果您不保管好自己的帐号和密码安全，将对因此产生的后果负全部责任。另外，每个用户都要对其帐户中的所有活动和事件负全责。您可随时根据指示改变您的密码，也可以结束旧的帐户重开一个新帐户。用户同意若发现任何非法使用用户帐号或安全漏洞的情况，立即通知百色纪检监查网。 7． 免责条款 　　用户明确同意网站服务的使用由用户个人承担风险。 　　 　　百色纪检监查网不作任何类型的担保，不担保服务一定能满足用户的要求，也不担保服务不会受中断，对服务的及时性，安全性，出错发生都不作担保。用户理解并接受：任何通过百色纪检监查网服务取得的信息资料的可靠性取决于用户自己，用户自己承担所有风险和责任。 8．有限责任 　　百色纪检监查网对任何直接、间接、偶然、特殊及继起的损害不负责任。 9． 不提供零售和商业性服务 　　用户使用网站服务的权利是个人的。用户只能是一个单独的个体而不能是一个公司或实体商业性组织。用户承诺不经百色纪检监查网同意，不能利用网站服务进行销售或其他商业用途。 10．用户责任 　　用户单独承担传输内容的责任。用户必须遵循： 　　1)从中国境内向外传输技术性资料时必须符合中国有关法规。 　　2)使用网站服务不作非法用途。 　　3)不干扰或混乱网络服务。 　　4)不在论坛BBS或留言簿发表任何与政治相关的信息。 　　5)遵守所有使用网站服务的网络协议、规定、程序和惯例。 　　6)不得利用本站危害国家安全、泄露国家秘密，不得侵犯国家社会集体的和公民的合法权益。 　　7)不得利用本站制作、复制和传播下列信息： 　　　1、煽动抗拒、破坏宪法和法律、行政法规实施的； 　　　2、煽动颠覆国家政权，推翻社会主义制度的； 　　　3、煽动分裂国家、破坏国家统一的； 　　　4、煽动民族仇恨、民族歧视，破坏民族团结的； 　　　5、捏造或者歪曲事实，散布谣言，扰乱社会秩序的； 　　　6、宣扬封建迷信、淫秽、色情、赌博、暴力、凶杀、恐怖、教唆犯罪的； 　　　7、公然侮辱他人或者捏造事实诽谤他人的，或者进行其他恶意攻击的； 　　　8、损害国家机关信誉的； 　　　9、其他违反宪法和法律行政法规的； 　　　10、进行商业广告行为的。 　　用户不能传输任何教唆他人构成犯罪行为的资料；不能传输长国内不利条件和涉及国家安全的资料；不能传输任何不符合当地法规、国家法律和国际法 律的资料。未经许可而非法进入其它电脑系统是禁止的。若用户的行为不符合以上的条款，百色纪检监查网将取消用户服务帐号。 11．网站内容的所有权 　　百色纪检监查网定义的内容包括：文字、软件、声音、相片、录象、图表；在广告中全部内容；电子邮件的全部内容；百色纪检监查网为用户提供的商业信息。所有这些内容受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在百色纪检监查网和广告商授权下才能使用这些内容，而不能擅自复制、篡改这些内容、或创造与内容有关的派生产品。 12．附加信息服务 　　用户在享用百色纪检监查网提供的免费服务的同时，同意接受百色纪检监查网提供的各类附加信息服务。 13．解释权 　　本注册协议的解释权归百色纪检监查网所有。如果其中有任何条款与国家的有关法律相抵触，则以国家法律的明文规定为准。</p><p><br/></p>', '0');

-- ----------------------------
-- Table structure for `lqb_special`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_special`;
CREATE TABLE `lqb_special` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布者UID',
  `item_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '产品ID',
  `category_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '所在分类',
  `title` varchar(200) NOT NULL COMMENT '新闻标题',
  `thumb` varchar(150) NOT NULL,
  `keywords` varchar(50) NOT NULL COMMENT '文章关键字',
  `description` varchar(255) NOT NULL COMMENT '文章描述',
  `clicks` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `company` varchar(50) DEFAULT NULL,
  `content` text,
  `r` tinyint(1) NOT NULL,
  `h` tinyint(1) NOT NULL,
  `t` tinyint(1) NOT NULL,
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `check_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COMMENT='新闻表';

-- ----------------------------
-- Records of lqb_special
-- ----------------------------
INSERT INTO `lqb_special` VALUES ('19', '1', '0', '1', 'test', '/Uploads/userfiles/201701/586b080e78f7b.jpg', '', '', '0', '1', null, '<p>阿萨德<br/></p>', '2', '2', '2', '1483409424', '1483409424', '0');
INSERT INTO `lqb_special` VALUES ('20', '1', '0', '2', 'test2', '/Uploads/userfiles/201701/586b085112233.jpg', '', '', '0', '1', null, '<p>三等份<br/></p>', '2', '2', '2', '1483409490', '1483409490', '0');
INSERT INTO `lqb_special` VALUES ('21', '1', '0', '1', 'test4', '/Uploads/userfiles/201701/586b088682f1d.jpg', '', '', '0', '2', null, null, '2', '2', '2', '1483409544', '1483409544', '0');
INSERT INTO `lqb_special` VALUES ('7', '1', '0', '2', '共计发放奖学金总额为', '', '共计发放奖学金总额为', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, null, '2', '2', '2', '1482896418', '1482896418', '0');
INSERT INTO `lqb_special` VALUES ('8', '1', '0', '2', '对报考该校的高一新生中初中毕业升学考试成绩优秀者', '', '对报考该校的高一新生中初中毕业升学考试成绩优秀者', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, null, '2', '2', '2', '1482896433', '1482896433', '0');
INSERT INTO `lqb_special` VALUES ('9', '1', '0', '2', '是一所全寄宿制的民办普通高中', '', '是一所全寄宿制的民办普通高中', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, null, '2', '2', '2', '1482896545', '1482896545', '0');
INSERT INTO `lqb_special` VALUES ('10', '1', '0', '2', '温州民办中学为招揽优质生源 发787万新生奖学金', '', '温州民办中学为招揽优质生源 发787万新生奖学金', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', null, null, '2', '2', '2', '1482896563', '1482896563', '0');
INSERT INTO `lqb_special` VALUES ('11', '1', '0', '2', '在今年招生时校方承诺', '/Uploads/userfiles/201701/586b0726688b1.jpg', '在今年招生时校方承诺', '11月21日，温州网友发帖称：“苍南县灵溪树人中学的家长会，现场主席台的桌子上摆放了一堆小山一样的人民币，是发放给中考成绩优异的奖学金获得者，奖学金总共为八百多万。奖学金标准是以学生中考成绩划分并进行发放的。”', '0', '1', '1', null, '2', '2', '2', '1483409263', '1482896585', '0');
INSERT INTO `lqb_special` VALUES ('12', '1', '0', '2', '田林县扎实开展“两项制度”有效衔接督查工作', '/Uploads/userfiles/201612/5863352a754cb.jpg', '宝贝', '蛋蛋', '0', '0', '啊啊', '<p>阿斯顿<br/></p>', '2', '2', '2', '1483409243', '1482896718', '0');

-- ----------------------------
-- Table structure for `lqb_special_category`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_special_category`;
CREATE TABLE `lqb_special_category` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '分类级别',
  `pid` smallint(5) unsigned NOT NULL COMMENT 'parentCategory上级分类',
  `name` varchar(80) NOT NULL COMMENT '分类名称',
  `thumb` varchar(150) DEFAULT NULL,
  `keywords` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `articlenum` int(10) NOT NULL DEFAULT '0',
  `sort` smallint(8) NOT NULL DEFAULT '0',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC COMMENT='新闻分类表';

-- ----------------------------
-- Records of lqb_special_category
-- ----------------------------
INSERT INTO `lqb_special_category` VALUES ('1', '0', '0', '专题分类一', '/Uploads/userfiles/201701/586b11d99562a.jpg', '', '', '0', '2', '1');
INSERT INTO `lqb_special_category` VALUES ('2', '0', '0', '专题分类二', '/Uploads/userfiles/201701/586b13eac126d.jpg', '', '', '0', '2', '1');

-- ----------------------------
-- Table structure for `lqb_userfiles`
-- ----------------------------
DROP TABLE IF EXISTS `lqb_userfiles`;
CREATE TABLE `lqb_userfiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '文件ID',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '会员编号',
  `uname` varchar(15) DEFAULT NULL COMMENT '会员名称',
  `filename` varchar(50) NOT NULL COMMENT '名称',
  `savepath` varchar(80) NOT NULL COMMENT 'URL链接',
  `savename` varchar(80) NOT NULL,
  `ext` varchar(10) NOT NULL COMMENT '文件后缀',
  `type` varchar(10) NOT NULL COMMENT '1为图片',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建日期',
  `size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '大小',
  `path` varchar(50) NOT NULL DEFAULT '0' COMMENT '缩略图',
  `category` varchar(30) NOT NULL COMMENT '文件分类 只能用小写英文字符表示',
  `aid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '信息编号',
  `sort` smallint(6) unsigned NOT NULL DEFAULT '1' COMMENT '排序',
  `remark` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of lqb_userfiles
-- ----------------------------
INSERT INTO `lqb_userfiles` VALUES ('1', '0', null, 'tp1.jpg', '/userfiles/201611/', '5836b3ed40698.jpg', 'jpg', 'image/jpeg', '1479980013', '50727', '/Uploads/userfiles/201611/5836b3ed40698.jpg', 'product', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('2', '0', null, '20161129085650925 (1).jpg', '/userfiles/201612/', '5863352a754cb.jpg', 'jpg', 'image/jpeg', '1482896682', '421921', '/Uploads/userfiles/201612/5863352a754cb.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('3', '0', null, 'tp1.jpg', '/userfiles/201701/', '586b0726688b1.jpg', 'jpg', 'image/jpeg', '1483409190', '50727', '/Uploads/userfiles/201701/586b0726688b1.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('4', '0', null, 'tp7.jpg', '/userfiles/201701/', '586b080e78f7b.jpg', 'jpg', 'image/jpeg', '1483409422', '46785', '/Uploads/userfiles/201701/586b080e78f7b.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('5', '0', null, 'tp6.jpg', '/userfiles/201701/', '586b085112233.jpg', 'jpg', 'image/jpeg', '1483409488', '57146', '/Uploads/userfiles/201701/586b085112233.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('6', '0', null, 'tp4.jpg', '/userfiles/201701/', '586b088682f1d.jpg', 'jpg', 'image/jpeg', '1483409542', '89222', '/Uploads/userfiles/201701/586b088682f1d.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('7', '0', null, 'tp4.jpg', '/userfiles/201701/', '586b11d99562a.jpg', 'jpg', 'image/jpeg', '1483411929', '89222', '/Uploads/userfiles/201701/586b11d99562a.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('8', '0', null, 'tp6.jpg', '/userfiles/201701/', '586b128baaabc.jpg', 'jpg', 'image/jpeg', '1483412107', '57146', '/Uploads/userfiles/201701/586b128baaabc.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('9', '0', null, 'tp6.jpg', '/userfiles/201701/', '586b12ae3effc.jpg', 'jpg', 'image/jpeg', '1483412142', '57146', '/Uploads/userfiles/201701/586b12ae3effc.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('10', '0', null, 'tp5.jpg', '/userfiles/201701/', '586b13eac126d.jpg', 'jpg', 'image/jpeg', '1483412458', '37791', '/Uploads/userfiles/201701/586b13eac126d.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('11', '0', null, '111.jpg', '/userfiles/201702/', '58abbf451a623.jpg', 'jpg', 'image/jpeg', '1487650628', '35712', '/Uploads/userfiles/201702/58abbf451a623.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('12', '0', null, '1463744159.jpg', '/userfiles/201702/', '58abc108b4652.jpg', 'jpg', 'image/jpeg', '1487651080', '270608', '/Uploads/userfiles/201702/58abc108b4652.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('13', '0', null, '1463659659.jpg', '/userfiles/201702/', '58abc156cc6f5.jpg', 'jpg', 'image/jpeg', '1487651158', '263106', '/Uploads/userfiles/201702/58abc156cc6f5.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('14', '0', null, '1463105294.jpg', '/userfiles/201702/', '58abc178d99b1.jpg', 'jpg', 'image/jpeg', '1487651192', '264653', '/Uploads/userfiles/201702/58abc178d99b1.jpg', '', '0', '0', '');
INSERT INTO `lqb_userfiles` VALUES ('15', '0', null, '1459941304.jpg', '/userfiles/201702/', '58abfac2cfa57.jpg', 'jpg', 'image/jpeg', '1487665858', '22301', '/Uploads/userfiles/201702/58abfac2cfa57.jpg', 'product', '0', '0', '');
