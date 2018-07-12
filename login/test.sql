/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-07-12 14:09:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for imagen
-- ----------------------------
DROP TABLE IF EXISTS `imagen`;
CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `apellido` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `imagen_name` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`id_imagen`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of imagen
-- ----------------------------
INSERT INTO `imagen` VALUES ('1', 'maria del rosario', 'rocha', null);
INSERT INTO `imagen` VALUES ('2', 'maria del rosario', 'rocha', null);
INSERT INTO `imagen` VALUES ('3', 'maria del rosario', 'rocha', null);
INSERT INTO `imagen` VALUES ('4', 'maria del rosario', 'rocha', null);
INSERT INTO `imagen` VALUES ('5', 'maria del rosariodfsdf', 'rocha', 'cartilla.jpeg');
INSERT INTO `imagen` VALUES ('6', 'maria del rosariodfsdf', 'rocha', 'cartilla.jpeg');
INSERT INTO `imagen` VALUES ('7', 'maria del rosariodfsdf', 'rocha', 'cartilla.jpeg');
INSERT INTO `imagen` VALUES ('8', 'maria del rosariodfsdf', 'rocha', 'cartilla.jpeg');
INSERT INTO `imagen` VALUES ('9', 'maria del rosariodfsdf', 'rocha', 'cartilla.jpeg');
INSERT INTO `imagen` VALUES ('10', 'maria del rosariodfsdf', 'rocha', 'cartilla.jpeg');
INSERT INTO `imagen` VALUES ('11', 'maria del rosariodfsdf', 'rocha', 'cartilla.jpeg');
INSERT INTO `imagen` VALUES ('12', 'Ros', null, 'Encapuchado, disfrazado de murciÃ©lago que sale por las noches a combatir el mal.');
INSERT INTO `imagen` VALUES ('13', 'Ros', null, 'Encapuchado, disfrazado de murciÃ©lago que sale por las noches a combatir el mal.');
INSERT INTO `imagen` VALUES ('14', 'Ros', null, 'Encapuchado, disfrazado de murciÃ©lago que sale por las noches a combatir el mal.');
INSERT INTO `imagen` VALUES ('15', 'Ros', null, 'Encapuchado, disfrazado de murciÃ©lago que sale por las noches a combatir el mal.');
INSERT INTO `imagen` VALUES ('16', 'maria del rosario', null, 'hernandez');

-- ----------------------------
-- Table structure for login
-- ----------------------------
DROP TABLE IF EXISTS `login`;
CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `ip` varchar(255) DEFAULT NULL,
  `navegador` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login
-- ----------------------------
INSERT INTO `login` VALUES ('1', 'admin', '9542931e640c671a60ea44a954b249c179da12391', null, null);
