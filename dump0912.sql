/*
 Navicat Premium Data Transfer

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 100138
 Source Host           : localhost:3306
 Source Schema         : mangab

 Target Server Type    : MySQL
 Target Server Version : 100138
 File Encoding         : 65001

 Date: 09/12/2019 02:53:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for absen
-- ----------------------------
DROP TABLE IF EXISTS `absen`;
CREATE TABLE `absen`  (
  `ID_ABSEN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_MATKUL` int(11) NULL DEFAULT NULL,
  `RUANGAN_ABSEN` varchar(5) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `DATE_ABSEN` date NULL DEFAULT NULL,
  `TIME_ABSEN` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TS_ABSEN` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`ID_ABSEN`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ambilmk
-- ----------------------------
DROP TABLE IF EXISTS `ambilmk`;
CREATE TABLE `ambilmk`  (
  `ID_AMBILMK` int(11) NOT NULL AUTO_INCREMENT,
  `NRP_MHS` int(11) NOT NULL,
  `ID_MATKUL` int(11) NOT NULL,
  PRIMARY KEY (`ID_AMBILMK`) USING BTREE,
  INDEX `FK_RELATIONSHIP_3`(`NRP_MHS`) USING BTREE,
  CONSTRAINT `FK_RELATIONSHIP_3` FOREIGN KEY (`NRP_MHS`) REFERENCES `mahasiswa` (`NRP_MHS`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ambilmk
-- ----------------------------
INSERT INTO `ambilmk` VALUES (1, 171111079, 1);
INSERT INTO `ambilmk` VALUES (2, 171111079, 2);
INSERT INTO `ambilmk` VALUES (3, 171111079, 4);
INSERT INTO `ambilmk` VALUES (4, 171111109, 1);
INSERT INTO `ambilmk` VALUES (5, 171111109, 3);
INSERT INTO `ambilmk` VALUES (6, 171111109, 4);
INSERT INTO `ambilmk` VALUES (7, 191116027, 1);
INSERT INTO `ambilmk` VALUES (8, 191116027, 4);
INSERT INTO `ambilmk` VALUES (9, 191116027, 5);

-- ----------------------------
-- Table structure for detail_absen
-- ----------------------------
DROP TABLE IF EXISTS `detail_absen`;
CREATE TABLE `detail_absen`  (
  `ID_DETABSEN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ABSEN` int(11) NOT NULL,
  `NRP_MHS` int(11) NOT NULL,
  `STATUS_DETABSEN` varchar(1) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `TS_DETABSEN` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`ID_DETABSEN`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for dosen
-- ----------------------------
DROP TABLE IF EXISTS `dosen`;
CREATE TABLE `dosen`  (
  `NIP_DOSEN` int(11) NOT NULL,
  `PASS_DOSEN` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NAMA_DOSEN` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `EMAIL_DOSEN` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS_LOGIN` int(11) NULL DEFAULT NULL,
  `STATUS_PASS` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`NIP_DOSEN`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of dosen
-- ----------------------------
INSERT INTO `dosen` VALUES (10134, 'stikimalang', 'Chaulina Alfianti Oktavia, S.Kom, M.T', 'chaulina@stiki.ac.id', 0, 0);
INSERT INTO `dosen` VALUES (10163, 'stikimalang', 'Bagus Kristomoyo Kristanto, S.Kom., M.MT', 'bagus.kristanto@stiki.ac.', 0, 0);
INSERT INTO `dosen` VALUES (40016, 'stikimalang', 'Rakhmad Maulidi, S.Kom., M.Kom', 'maulidi@stiki.ac.id', 0, 0);

-- ----------------------------
-- Table structure for mahasiswa
-- ----------------------------
DROP TABLE IF EXISTS `mahasiswa`;
CREATE TABLE `mahasiswa`  (
  `NRP_MHS` int(11) NOT NULL,
  `PASS_MHS` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NAMA_MHS` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `EMAIL_MHS` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `ID_DEVICE` varchar(25) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `STATUS_LOGIN` int(11) NULL DEFAULT NULL,
  `STATUS_PASS` int(11) NULL DEFAULT NULL,
  `LAST_LOGOUT` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`NRP_MHS`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of mahasiswa
-- ----------------------------
INSERT INTO `mahasiswa` VALUES (171111079, 'stikimalang', 'Muhammad Reyhan Firnas Adani', '171111079@mhs.stiki.ac.id', NULL, 0, 0, NULL);
INSERT INTO `mahasiswa` VALUES (171111109, 'stikimalang', 'Nanda Bima Mahendra', '171111109@mhs.stiki.ac.id', NULL, 0, 0, NULL);
INSERT INTO `mahasiswa` VALUES (191116027, 'stikimalang', 'M Irfan Alfiansyah', '191116027@mhs.stiki.ac.id', NULL, 0, 0, NULL);

-- ----------------------------
-- Table structure for matkul
-- ----------------------------
DROP TABLE IF EXISTS `matkul`;
CREATE TABLE `matkul`  (
  `ID_MATKUL` int(11) NOT NULL AUTO_INCREMENT,
  `NIP_DOSEN` int(11) NULL DEFAULT NULL,
  `KODE_MATKUL` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `NAMA_MATKUL` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `KELAS_MATKUL` varchar(2) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID_MATKUL`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of matkul
-- ----------------------------
INSERT INTO `matkul` VALUES (1, 10163, 'TI14KB65', 'KOMPUTASI AWAN', 'A');
INSERT INTO `matkul` VALUES (2, 10134, '	TI14KB51', 'PEMROGRAMAN PERANGKAT BERGERAK', 'C');
INSERT INTO `matkul` VALUES (3, 10134, 'TI14KB51', 'PEMROGRAMAN PERANGKAT BERGERAK', 'D');
INSERT INTO `matkul` VALUES (4, 40016, 'TI14KB53', 'PEMROGRAMAN WEB LANJUT', 'A');
INSERT INTO `matkul` VALUES (5, 40016, 'TI14KB53', 'PEMROGRAMAN WEB LANJUT', 'C');

SET FOREIGN_KEY_CHECKS = 1;
