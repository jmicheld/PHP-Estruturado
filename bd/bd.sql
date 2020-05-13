/*
Navicat MySQL Data Transfer

Source Server         : Local
Source Server Version : 50726
Source Host           : localhost:3306
Source Database       : chamados

Target Server Type    : MYSQL
Target Server Version : 50726
File Encoding         : 65001

Date: 2020-05-12 15:50:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for situacao
-- ----------------------------
DROP TABLE IF EXISTS `situacao`;
CREATE TABLE `situacao` (
  `idSituacao` int(20) NOT NULL AUTO_INCREMENT,
  `dscSituacao` varchar(255) NOT NULL,
  PRIMARY KEY (`idSituacao`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of situacao
-- ----------------------------
INSERT INTO `situacao` VALUES ('1', 'Aberto');
INSERT INTO `situacao` VALUES ('2', 'Em Andamento');
INSERT INTO `situacao` VALUES ('3', 'Em Teste');
INSERT INTO `situacao` VALUES ('4', 'Em Pausa');
INSERT INTO `situacao` VALUES ('5', 'Cancelada');
INSERT INTO `situacao` VALUES ('6', 'Concluída');

-- ----------------------------
-- Table structure for tarefa
-- ----------------------------
DROP TABLE IF EXISTS `tarefa`;
CREATE TABLE `tarefa` (
  `idTarefa` int(20) NOT NULL AUTO_INCREMENT,
  `dscTarefa` varchar(255) NOT NULL,
  `dscConteudo` varchar(255) NOT NULL,
  PRIMARY KEY (`idTarefa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tarefa
-- ----------------------------

-- ----------------------------
-- Table structure for tarefasituacao
-- ----------------------------
DROP TABLE IF EXISTS `tarefasituacao`;
CREATE TABLE `tarefasituacao` (
  `idSituacao` int(20) NOT NULL,
  `idTarefa` int(20) NOT NULL,
  `dtRegistro` datetime NOT NULL,
  PRIMARY KEY (`idSituacao`,`idTarefa`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tarefasituacao
-- ----------------------------
