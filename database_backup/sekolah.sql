/*
 Navicat Premium Data Transfer

 Source Server         : sekolah
 Source Server Type    : MySQL
 Source Server Version : 80031
 Source Host           : localhost:3306
 Source Schema         : sekolah

 Target Server Type    : MySQL
 Target Server Version : 80031
 File Encoding         : 65001

 Date: 18/12/2022 23:06:56
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for skl_master_guru
-- ----------------------------
DROP TABLE IF EXISTS `skl_master_guru`;
CREATE TABLE `skl_master_guru`  (
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_guru` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nip`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_master_guru
-- ----------------------------
INSERT INTO `skl_master_guru` VALUES ('1ab', 'jhoby sins', 'texas', '08091001000');

-- ----------------------------
-- Table structure for skl_master_jenis_nilai
-- ----------------------------
DROP TABLE IF EXISTS `skl_master_jenis_nilai`;
CREATE TABLE `skl_master_jenis_nilai`  (
  `id_jenis_nilai` int NOT NULL,
  `jenis_nilai` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_jenis_nilai`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_master_jenis_nilai
-- ----------------------------
INSERT INTO `skl_master_jenis_nilai` VALUES (1, 'UAS');
INSERT INTO `skl_master_jenis_nilai` VALUES (2, 'UTS');
INSERT INTO `skl_master_jenis_nilai` VALUES (3, 'PR');
INSERT INTO `skl_master_jenis_nilai` VALUES (4, 'Quiz');

-- ----------------------------
-- Table structure for skl_master_murid
-- ----------------------------
DROP TABLE IF EXISTS `skl_master_murid`;
CREATE TABLE `skl_master_murid`  (
  `nik` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` int NOT NULL,
  `id_sekolah` int NOT NULL,
  `id_kelas` int NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`nik`, `id_user`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_master_murid
-- ----------------------------
INSERT INTO `skl_master_murid` VALUES ('1', 2, 1, 1, 'nurul', 'cimalaka', '0899', 'nurul.jpg');
INSERT INTO `skl_master_murid` VALUES ('123', 1, 1, 1, 'sartono', 'cmuja', '086', 'http://localhost/sekolah_fe/upload/1.jpg');
INSERT INTO `skl_master_murid` VALUES ('234', 1, 1, 2, 'sartono jr', 'cmuja', '087', 'http://localhost/sekolah_fe/upload/2.jpg');
INSERT INTO `skl_master_murid` VALUES ('345', 1, 1, 3, 'sartono jr 2', 'cmuja', '088', 'http://localhost/sekolah_fe/upload/1.jpg');

-- ----------------------------
-- Table structure for skl_master_opsi
-- ----------------------------
DROP TABLE IF EXISTS `skl_master_opsi`;
CREATE TABLE `skl_master_opsi`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_opsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `api` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_master_opsi
-- ----------------------------
INSERT INTO `skl_master_opsi` VALUES (1, 'absen', 'show semua data absen', 'getAbsenByNik');
INSERT INTO `skl_master_opsi` VALUES (2, 'nilai', 'show semua data nilai', 'getNilaiByNik');

-- ----------------------------
-- Table structure for skl_master_pelajaran
-- ----------------------------
DROP TABLE IF EXISTS `skl_master_pelajaran`;
CREATE TABLE `skl_master_pelajaran`  (
  `id_pelajaran` int NOT NULL AUTO_INCREMENT,
  `nama_pelajaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_pelajaran`, `nip`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_master_pelajaran
-- ----------------------------
INSERT INTO `skl_master_pelajaran` VALUES (1, 'matematika', '1ab');
INSERT INTO `skl_master_pelajaran` VALUES (3, 'agama', '1ab');
INSERT INTO `skl_master_pelajaran` VALUES (4, 'ppkn', '');

-- ----------------------------
-- Table structure for skl_master_user
-- ----------------------------
DROP TABLE IF EXISTS `skl_master_user`;
CREATE TABLE `skl_master_user`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_master_user
-- ----------------------------
INSERT INTO `skl_master_user` VALUES (1, 'test', '098f6bcd4621d373cade4e832627b4f6');
INSERT INTO `skl_master_user` VALUES (2, 'bandung', '827ccb0eea8a706c4c34a16891f84e7b');

-- ----------------------------
-- Table structure for skl_trx_absen
-- ----------------------------
DROP TABLE IF EXISTS `skl_trx_absen`;
CREATE TABLE `skl_trx_absen`  (
  `id_absen` int NOT NULL,
  `id_murid` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_absen`, `id_murid`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_trx_absen
-- ----------------------------

-- ----------------------------
-- Table structure for skl_trx_nilai
-- ----------------------------
DROP TABLE IF EXISTS `skl_trx_nilai`;
CREATE TABLE `skl_trx_nilai`  (
  `id_nilai` int NOT NULL,
  `id_pelajaran` int NOT NULL,
  `id_jenis_nilai` int NOT NULL,
  `id_murid` int NOT NULL,
  `nilai` float NOT NULL,
  PRIMARY KEY (`id_nilai`, `id_murid`, `id_pelajaran`, `id_jenis_nilai`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of skl_trx_nilai
-- ----------------------------
INSERT INTO `skl_trx_nilai` VALUES (1, 1, 1, 1, 70.5);
INSERT INTO `skl_trx_nilai` VALUES (2, 3, 1, 1, 80);
INSERT INTO `skl_trx_nilai` VALUES (2, 4, 1, 1, 60);
INSERT INTO `skl_trx_nilai` VALUES (4, 4, 2, 123, 90);
INSERT INTO `skl_trx_nilai` VALUES (5, 1, 2, 123, 90);
INSERT INTO `skl_trx_nilai` VALUES (6, 3, 1, 123, 40);

SET FOREIGN_KEY_CHECKS = 1;
