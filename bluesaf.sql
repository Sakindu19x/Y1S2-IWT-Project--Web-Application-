/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3306
 Source Schema         : bluesaf

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 09/05/2024 01:03:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `book_id` int NOT NULL AUTO_INCREMENT,
  `dt` date NULL DEFAULT NULL,
  `pack_type` int NULL DEFAULT NULL,
  `check_in` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `adults` int NULL DEFAULT NULL,
  `child` int NULL DEFAULT NULL,
  `amount` double(11, 2) NULL DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dt_send` datetime(0) NULL DEFAULT NULL,
  `id` int NULL DEFAULT NULL,
  PRIMARY KEY (`book_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES (2, '2024-05-08', 1, '2024-05-08', NULL, NULL, 'australia', NULL, '0719751707', 1, 2, 99.00, 'sockzopxckpozxc\r\nsdfkosdpfk\r\nsdfmopsdkmfpsdf', '::1', '2024-05-08 02:12:17', 128);
INSERT INTO `book` VALUES (3, '2024-05-08', 2, '2024-06-26', NULL, NULL, 'australia', NULL, '0716087066', 4, 2, 99.00, 'Test Messsage xxxxxxx', '127.0.0.1', '2024-05-08 10:07:27', 128);
INSERT INTO `book` VALUES (5, '2024-05-08', 1, '2024-05-22', NULL, NULL, 'australia', NULL, '123', 2, 1, 99.00, 'sadasdffffffffff', '127.0.0.1', '2024-05-08 10:25:56', 129);
INSERT INTO `book` VALUES (6, '2024-05-08', 1, '2024-05-22', NULL, NULL, 'australia', NULL, '35345345', 22, 1, 99.00, 'ffffffffffffffffffffsssssssssss', '127.0.0.1', '2024-05-08 10:27:14', 128);
INSERT INTO `book` VALUES (7, '2024-05-08', 2, '2024-11-21', NULL, NULL, 'australia', NULL, '11121', 111, 1, 1000.00, 'dsfmasdiofmsdoifm', '127.0.0.1', '2024-05-08 10:34:18', 128);

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `dt` date NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `message` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `ip` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `dt_send` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact
-- ----------------------------
INSERT INTO `contact` VALUES (1, '2024-05-07', 'Chanaka', 'Basnayake', 'australia', 'saasdasdasd', '::1', '2024-05-07 01:06:20');
INSERT INTO `contact` VALUES (2, '2024-05-07', 'Chanaka', 'Basnayake', 'australia', 'saasdasdasd', '::1', '2024-05-07 01:07:59');

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `gal_id` int NOT NULL AUTO_INCREMENT,
  `caption` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`gal_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES (1, 'download.jpg', 'download.jpg');
INSERT INTO `gallery` VALUES (2, 'dw.jpg', 'dw.jpg');
INSERT INTO `gallery` VALUES (3, 'madu-ganga-biodiversity.jpg', 'madu-ganga-biodiversity.jpg');
INSERT INTO `gallery` VALUES (4, 'Madu-Queen-13.jpg', 'Madu-Queen-13.jpg');
INSERT INTO `gallery` VALUES (5, 'madu-river-boat-safari-4-sri-lanka.jpg', 'madu-river-boat-safari-4-sri-lanka.jpg');
INSERT INTO `gallery` VALUES (6, 'madu.jpg', 'madu.jpg');
INSERT INTO `gallery` VALUES (7, 'slider-1.png', 'slider-1.png');
INSERT INTO `gallery` VALUES (8, 'slider-2.png', 'slider-2.png');
INSERT INTO `gallery` VALUES (9, 'slider-3.png', 'slider-3.png');
INSERT INTO `gallery` VALUES (12, 'Mangrow view (Madu River)', 'slider-4.png');
INSERT INTO `gallery` VALUES (14, 'Our Logo', 'blue-horizon-logo.png');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `level` int NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 131 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES (125, 'metaeng2022@gmail.com', 'Admin@123#', 'metaeng2022@gmail.com', 1, 'Sakindu', NULL, NULL, NULL, NULL);
INSERT INTO `members` VALUES (126, 'shavindriwow9@gmail.com', 'Admin@123#', 'shavindriwow9@gmail.com', 1, 'Aloka', 'Aloka', NULL, NULL, NULL);
INSERT INTO `members` VALUES (127, 'thamindudamsith@gmail.com', 'Admin@123#', 'thamindudamsith@gmail.com', 1, 'Thamindu', 'Damsith', NULL, NULL, NULL);
INSERT INTO `members` VALUES (124, 'bma.navindi@gmail.com', 'Admin@123#', 'bma.navindi@gmail.com', 1, 'Aparna', 'Navindi', NULL, NULL, NULL);
INSERT INTO `members` VALUES (130, 'test@test.com', '123456', 'test@test.com', 0, 'Test', 'Com', NULL, NULL, NULL);
INSERT INTO `members` VALUES (128, 'test@123.com', 'Admin@123#', 'test@123.com', 0, 'ABC', '123', NULL, NULL, '128-Blue Horizon Logo.png');
INSERT INTO `members` VALUES (129, 'admin@admin.com', 'Admin@123#', 'admin@admin.com', 1, 'adminxxxxxxx', 'admin', NULL, NULL, '129-p_image.jpg');

-- ----------------------------
-- Table structure for pack
-- ----------------------------
DROP TABLE IF EXISTS `pack`;
CREATE TABLE `pack`  (
  `pack_type` int NOT NULL AUTO_INCREMENT,
  `pack_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pack_sub` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pack_desc` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `pack_amount` decimal(11, 2) NULL DEFAULT NULL,
  `img_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pack_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pack
-- ----------------------------
INSERT INTO `pack` VALUES (1, 'Madu Ganga River Boat Safari Test', 'Package-1', '<p>\r\n                While you are enjoying your time in the Eco Isle, we offer you a Boat Trip around the Madu Ganga river. River Safari is a must whenever you camp nearby a river. When you camp nearby the MAdu Ganga in Balapitiya, Boat riding gives you a unique experience due to it\'s richness of activities to do.\r\n            </p>\r\n\r\n            <p>    There are many things to watch and get the experience of. including,</p>\r\n\r\n            <ul>\r\n                <li>Watch and go through mangrove trees</li>\r\n                <li>Islands of Madu Ganga including Satha Paha doowa</li>\r\n                <li>Demonstrations of Cinnamon productions</li>\r\n                <li>Kothduwa island\'s temple</li>\r\n                <li>Fish therepy</li>\r\n            </ul>\r\n                <p>\r\n                    Eco Island is an island located in the middle of Madu Ganga river, Balapitiya (Southern Province of Sri Lanka). We provide our land for visitors who are wishing to have an amazing experience in a green island doing interesting things.\r\n            </p>                                                ', 99.00, 'slider-4.png');
INSERT INTO `pack` VALUES (2, 'Test Package', 'Pack -2', 'this is test package', 1000.00, NULL);

SET FOREIGN_KEY_CHECKS = 1;
