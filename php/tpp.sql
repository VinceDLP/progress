/*
Navicat MySQL Data Transfer

Source Server         : localhost_3307
Source Server Version : 50709
Source Host           : localhost:3307
Source Database       : tpp

Target Server Type    : MYSQL
Target Server Version : 50709
File Encoding         : 65001

Date: 2018-04-24 16:16:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `area`
-- ----------------------------
DROP TABLE IF EXISTS `area`;
CREATE TABLE `area` (
  `Area_id` int(11) NOT NULL AUTO_INCREMENT,
  `Area_name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of area
-- ----------------------------
INSERT INTO `area` VALUES ('1', '北京');
INSERT INTO `area` VALUES ('2', '上海');
INSERT INTO `area` VALUES ('3', '杭州');
INSERT INTO `area` VALUES ('4', '广州');
INSERT INTO `area` VALUES ('5', '深圳');
INSERT INTO `area` VALUES ('6', '重庆');
INSERT INTO `area` VALUES ('7', '南京');
INSERT INTO `area` VALUES ('8', '成都');
INSERT INTO `area` VALUES ('9', '苏州');
INSERT INTO `area` VALUES ('10', '武汉');
INSERT INTO `area` VALUES ('11', '温州');
INSERT INTO `area` VALUES ('12', '宁波');
INSERT INTO `area` VALUES ('13', '西安');
INSERT INTO `area` VALUES ('14', '绍兴');
INSERT INTO `area` VALUES ('15', '嘉兴');
INSERT INTO `area` VALUES ('16', '金华');
INSERT INTO `area` VALUES ('17', '丽水');
INSERT INTO `area` VALUES ('18', '舟山');
INSERT INTO `area` VALUES ('19', '湖州');
INSERT INTO `area` VALUES ('20', '衢州');

-- ----------------------------
-- Table structure for `cinema`
-- ----------------------------
DROP TABLE IF EXISTS `cinema`;
CREATE TABLE `cinema` (
  `Cinema_id` int(11) NOT NULL AUTO_INCREMENT,
  `Area_id` int(11) DEFAULT NULL,
  `Cinema_name` varchar(255) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Image_path` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Cinema_id`),
  KEY `Area_id` (`Area_id`),
  CONSTRAINT `cinema_ibfk_1` FOREIGN KEY (`Area_id`) REFERENCES `area` (`Area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cinema
-- ----------------------------
INSERT INTO `cinema` VALUES ('1', '3', '杭州比高电影城（大河店）', '拱墅区小河路488号运河天地4幢', '0571-28066699', null);
INSERT INTO `cinema` VALUES ('2', '3', '浙江新远国际影城（西湖文化广场店）', '下城区西湖文化广场8号（C区）', '0571-85001088', null);
INSERT INTO `cinema` VALUES ('3', '3', '杭州光影影院', '拱墅区湖墅南路103号百大花园', '0571-88092209', null);
INSERT INTO `cinema` VALUES ('4', '3', '浙江奥斯卡电影大世界', '下城区龙游路38号', '0571-87012458', null);
INSERT INTO `cinema` VALUES ('5', '3', '中影国际影城杭州星光大道店', '滨江区江南大道228号星光国际广场2号楼4层(近滨江区政府)', '0571-88924988', null);
INSERT INTO `cinema` VALUES ('6', '3', '太平洋影城（滨江店）', '滨江区江陵路2028号星耀城3幢3楼', '0571-87752665', null);
INSERT INTO `cinema` VALUES ('7', '3', '滨文电影大世界', '滨江区滨文路577号华润超市旁四楼', '0571-86630333', null);
INSERT INTO `cinema` VALUES ('8', '3', '中影国际影城杭州星光大道二期店', '滨江区闻涛路与星飞路交叉口，星光大道二期四楼北面靠江边', '0571-86630333', null);
INSERT INTO `cinema` VALUES ('9', '3', '唐阁影城杭州滨江店', '滨江区浦沿路物美大卖场盒座社五楼', '0571-86852016', null);
INSERT INTO `cinema` VALUES ('10', '3', '杭州嘉年华国际影城', '滨江区江陵路与滨康路交叉口星耀鑫都', '0571-87636698', null);
INSERT INTO `cinema` VALUES ('11', '3', '保利国际影城-杭州中南乐游城店', '滨江区江南大道1090号家具大世界3楼', '0571-87897820', null);
INSERT INTO `cinema` VALUES ('12', '3', '德信影城（滨江文耀店）', '滨江区滨文路422号文耀大厦3层', '0571-87678822', null);
INSERT INTO `cinema` VALUES ('13', '3', '浙江实验艺术剧场', '滨江区滨文路508号百味人生大酒店', '0571-87150134', null);
INSERT INTO `cinema` VALUES ('14', '3', '杭州悦江新远影城', '滨江区信诚路857号乐缤纷世茂中心', '0571-87705558', null);
INSERT INTO `cinema` VALUES ('15', '3', '海上明珠国际影城杭州星耀城店', '滨江区西兴街道江陵路1916号星耀城', '0571-86628755', null);
INSERT INTO `cinema` VALUES ('16', '3', '杭州百老汇影城滨江宝龙店', '滨江区浦沿街道滨盛路3867号宝龙城', '0571-88151312', null);
INSERT INTO `cinema` VALUES ('17', '3', '汉鼎宇佑影城（金盛嘉悦店）', '滨江区浦沿街道东冠路611号', '0571-85222818', null);
INSERT INTO `cinema` VALUES ('18', '3', 'CGV影城（滨江天街IMAX店）', '滨江区江汉路1515号龙湖滨江天街5楼', '0571-87751515', null);
INSERT INTO `cinema` VALUES ('19', '3', '金字塔千岛湖店', '淳安县新安北路41号四楼', '0571-65087798', null);
INSERT INTO `cinema` VALUES ('20', '3', '汉鼎宇佑影城千岛湖umax店', '淳安县千岛湖南景路渔歌府3-1、3-2', '0571-65018890', null);

-- ----------------------------
-- Table structure for `movie_information`
-- ----------------------------
DROP TABLE IF EXISTS `movie_information`;
CREATE TABLE `movie_information` (
  `Film_id` int(11) NOT NULL AUTO_INCREMENT,
  `Film_name` varchar(255) DEFAULT NULL,
  `Long` int(11) DEFAULT NULL,
  `Director` varchar(255) DEFAULT NULL,
  `Actors` varchar(255) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Language` varchar(255) DEFAULT NULL,
  `Image_path` varchar(255) DEFAULT NULL,
  `Vedio_path` varchar(255) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Date` datetime DEFAULT NULL,
  `Story` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`Film_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movie_information
-- ----------------------------
INSERT INTO `movie_information` VALUES ('1', '头号玩家 （Ready Player One）', '140', '史蒂文·斯皮尔伯格', '泰伊·谢里丹,奥利维亚·库克,本·门德尔森,西蒙·佩吉,马克·里朗斯', '动作,科幻,冒险', '英语', 'image\\th.jpg', null, '美国', '2018-03-30 00:00:00', '在2045年，现实世界衰退破败，人们沉迷于VR(虚拟现实)游戏“绿洲(OASIS)”的虚幻世界里寻求慰藉。马克·里朗斯饰演的“绿洲”的创始人临终前宣布，将亿万身家全部留给...');
INSERT INTO `movie_information` VALUES ('2', '起跑线 （Hindi Medium）', '131', '萨基特·乔杜里', '伊尔凡·可汗,萨巴·卡玛尔,内哈·迪胡皮阿,迪帕克·迪布里亚尔,蒂希塔·塞加尔,阿莫瑞塔·金格', '剧情,喜剧', '印地语,英语', null, null, null, null, null);
INSERT INTO `movie_information` VALUES ('3', '狂暴巨兽 （Rampage）', '108', '布拉德·佩顿', '道恩·强森', '动作,冒险,科幻', '英语', null, null, null, null, null);
INSERT INTO `movie_information` VALUES ('4', '暴裂无声 （Wrath of Silence）', '120', '忻钰坤', '宋洋,姜武,袁文康', '犯罪,悬疑,剧情', '汉语普通话', null, null, null, null, null);
INSERT INTO `movie_information` VALUES ('5', '环太平洋：雷霆再起 （Pacific Rim: Uprising）', '111', '斯蒂文·S·迪奈特', '约翰·波耶加,斯科特·伊斯特伍德,景甜,卡莉·史派妮,菊地凛子', '科幻,动作,冒险', '英语,汉语普通话', null, null, null, null, null);

-- ----------------------------
-- Table structure for `movie_screening`
-- ----------------------------
DROP TABLE IF EXISTS `movie_screening`;
CREATE TABLE `movie_screening` (
  `Screen_id` int(11) NOT NULL AUTO_INCREMENT,
  `Cinema_id` int(11) DEFAULT NULL,
  `Screen_name` varchar(255) DEFAULT NULL,
  `Seat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Screen_id`),
  KEY `Cinema_id` (`Cinema_id`),
  CONSTRAINT `movie_screening_ibfk_1` FOREIGN KEY (`Cinema_id`) REFERENCES `cinema` (`Cinema_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of movie_screening
-- ----------------------------
INSERT INTO `movie_screening` VALUES ('1', '6', '1号厅（4D）	\r\n', null);
INSERT INTO `movie_screening` VALUES ('2', '6', '3号厅', null);
INSERT INTO `movie_screening` VALUES ('3', '6', '7号厅（全景声）', '');
INSERT INTO `movie_screening` VALUES ('4', '6', '4号厅', null);
INSERT INTO `movie_screening` VALUES ('5', '6', '5号厅', null);
INSERT INTO `movie_screening` VALUES ('6', '6', '6号厅', null);
INSERT INTO `movie_screening` VALUES ('7', '6', '2号厅', null);
INSERT INTO `movie_screening` VALUES ('8', '7', '1号厅', null);
INSERT INTO `movie_screening` VALUES ('9', '7', '5号天域厅', null);
INSERT INTO `movie_screening` VALUES ('10', '7', '6号感音厅', null);
INSERT INTO `movie_screening` VALUES ('11', '7', '3号厅', null);
INSERT INTO `movie_screening` VALUES ('12', '7', '4号厅', null);
INSERT INTO `movie_screening` VALUES ('13', '7', '2号厅', null);

-- ----------------------------
-- Table structure for `plan`
-- ----------------------------
DROP TABLE IF EXISTS `plan`;
CREATE TABLE `plan` (
  `Plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `Plan_day` date DEFAULT NULL,
  `Start_time` time DEFAULT NULL,
  `Screen_id` int(11) DEFAULT NULL,
  `Film_id` int(11) DEFAULT NULL,
  `Status` varchar(255) DEFAULT NULL,
  `Version` varchar(255) DEFAULT NULL COMMENT '版本',
  `Price` int(11) DEFAULT NULL,
  `Cinema_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`Plan_id`),
  KEY `Screen_id` (`Screen_id`),
  KEY `Film_id` (`Film_id`),
  CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`Film_id`) REFERENCES `movie_information` (`Film_id`),
  CONSTRAINT `plan_ibfk_2` FOREIGN KEY (`Screen_id`) REFERENCES `movie_screening` (`Screen_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of plan
-- ----------------------------
INSERT INTO `plan` VALUES ('1', '2018-04-18', '14:25:00', '2', '1', '0', '原版 3D	', '30', '6');
INSERT INTO `plan` VALUES ('2', '2018-04-18', '15:30:59', '1', '1', '0', '原版 3D	', '33', '6');
INSERT INTO `plan` VALUES ('3', '2018-04-18', '16:30:13', '3', '1', '0', '原版 3D	', '35', '6');
INSERT INTO `plan` VALUES ('4', '2018-04-18', '17:00:31', '2', '1', '0', '原版 3D	', '30', '6');
INSERT INTO `plan` VALUES ('5', '2018-04-18', '18:10:48', '1', '1', '0', '原版 3D	', '33', '6');
INSERT INTO `plan` VALUES ('6', '2018-04-18', '19:00:01', '3', '1', '0', '原版 3D	', '35', '6');
INSERT INTO `plan` VALUES ('7', '2018-04-18', '19:40:16', '2', '1', '0', '原版 3D	', '30', '6');
INSERT INTO `plan` VALUES ('8', '2018-04-18', '20:50:26', '1', '1', '0', '原版 3D	', '33', '6');
INSERT INTO `plan` VALUES ('9', '2018-04-18', '21:40:39', '3', '1', '0', '原版 3D	', '35', '6');
INSERT INTO `plan` VALUES ('10', '2018-04-18', '22:30:51', '2', '1', '0', '原版 3D	', '30', '6');

-- ----------------------------
-- Table structure for `sale_info`
-- ----------------------------
DROP TABLE IF EXISTS `sale_info`;
CREATE TABLE `sale_info` (
  `Sale_id` int(11) NOT NULL AUTO_INCREMENT,
  `Plan_id` int(11) DEFAULT NULL,
  `pos_x_y` varchar(255) DEFAULT NULL,
  `Actual_price` int(10) DEFAULT NULL,
  `Qr_code` varchar(255) DEFAULT NULL,
  `Phone_number` varchar(18) DEFAULT NULL,
  PRIMARY KEY (`Sale_id`),
  KEY `Plan_id` (`Plan_id`),
  CONSTRAINT `sale_info_ibfk_1` FOREIGN KEY (`Plan_id`) REFERENCES `plan` (`Plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sale_info
-- ----------------------------

-- ----------------------------
-- Table structure for `user_info`
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info` (
  `User_name` varchar(255) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `Telephone` int(11) NOT NULL,
  PRIMARY KEY (`Telephone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_info
-- ----------------------------
