/*
 Navicat Premium Data Transfer

 Source Server         : XAMPP
 Source Server Type    : MySQL
 Source Server Version : 100130
 Source Host           : localhost:3306
 Source Schema         : db_freepik

 Target Server Type    : MySQL
 Target Server Version : 100130
 File Encoding         : 65001

 Date: 05/06/2018 11:03:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_comment
-- ----------------------------
DROP TABLE IF EXISTS `t_comment`;
CREATE TABLE `t_comment`  (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_gambar` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `comment` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_comment`) USING BTREE,
  INDEX `fk3`(`id_gambar`) USING BTREE,
  INDEX `fk4`(`id_user`) USING BTREE,
  CONSTRAINT `fk3` FOREIGN KEY (`id_gambar`) REFERENCES `t_gambar` (`id_gambar`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk4` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for t_ekstensi_gambar
-- ----------------------------
DROP TABLE IF EXISTS `t_ekstensi_gambar`;
CREATE TABLE `t_ekstensi_gambar`  (
  `id_ekstensi_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `ekstensi_gambar` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_ekstensi_gambar`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_ekstensi_gambar
-- ----------------------------
INSERT INTO `t_ekstensi_gambar` VALUES (1, 'jpg');
INSERT INTO `t_ekstensi_gambar` VALUES (2, 'png');

-- ----------------------------
-- Table structure for t_gambar
-- ----------------------------
DROP TABLE IF EXISTS `t_gambar`;
CREATE TABLE `t_gambar`  (
  `id_gambar` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_ekstensi_gambar` int(11) NOT NULL,
  `nama_gambar` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama_file` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `jumlah_like` int(11) NOT NULL,
  `jumlah_view` int(11) NOT NULL,
  PRIMARY KEY (`id_gambar`) USING BTREE,
  INDEX `fk2`(`id_user`) USING BTREE,
  INDEX `fk_ekstensi_gambar`(`id_ekstensi_gambar`) USING BTREE,
  CONSTRAINT `fk2` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk_ekstensi_gambar` FOREIGN KEY (`id_ekstensi_gambar`) REFERENCES `t_ekstensi_gambar` (`id_ekstensi_gambar`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_gambar
-- ----------------------------
INSERT INTO `t_gambar` VALUES (9, 5, 1, 'Comedy_2', 'Comedy_2.jpg', 0, 1);
INSERT INTO `t_gambar` VALUES (10, 6, 1, 'fantasy_background1', 'fantasy_background1.jpg', 0, 1);
INSERT INTO `t_gambar` VALUES (11, 6, 1, 'cute_kitten1', 'cute_kitten1.jpg', 0, 1);
INSERT INTO `t_gambar` VALUES (12, 6, 1, 'rumah', 'rumah.jpg', 0, 2);

-- ----------------------------
-- Table structure for t_role
-- ----------------------------
DROP TABLE IF EXISTS `t_role`;
CREATE TABLE `t_role`  (
  `id_role` int(11) NOT NULL,
  `role` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_role
-- ----------------------------
INSERT INTO `t_role` VALUES (1, 'user_biasa');
INSERT INTO `t_role` VALUES (2, 'user_admin');

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_role` int(11) NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_role`(`id_role`) USING BTREE,
  CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `t_role` (`id_role`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_user
-- ----------------------------
INSERT INTO `t_user` VALUES (1, 2, 'admin@gmail.com', 'admin', 'admin');
INSERT INTO `t_user` VALUES (3, 1, 'r@gmail.com', 'rrr', '654321');
INSERT INTO `t_user` VALUES (5, 1, 'abc@gmail.com', 'abc', '123456');
INSERT INTO `t_user` VALUES (6, 1, 'reyhanfikri@student.upi.edu', 'reyhanfikri', '123');

-- ----------------------------
-- Table structure for t_user_profile
-- ----------------------------
DROP TABLE IF EXISTS `t_user_profile`;
CREATE TABLE `t_user_profile`  (
  `id_user_profile` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jenis_kelamin` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user_profile`) USING BTREE,
  INDEX `fk_name`(`id_user`) USING BTREE,
  CONSTRAINT `fk_name` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of t_user_profile
-- ----------------------------
INSERT INTO `t_user_profile` VALUES (2, 3, NULL, NULL, NULL);
INSERT INTO `t_user_profile` VALUES (4, 5, 'Atang Budi Cahyo', 'Laki-laki', 'Bojongsoang	                        ');
INSERT INTO `t_user_profile` VALUES (5, 6, NULL, NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
