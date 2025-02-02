SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `__PREFIX__usdt_pay`;
CREATE TABLE `__PREFIX__usdt_pay`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `trade_no` char(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT '订单号',
  `amount` decimal(10, 2) UNSIGNED NOT NULL COMMENT '订单金额',
  `acg_amount` decimal(10, 3) UNSIGNED NOT NULL COMMENT '轮询金额',
  `return_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '跳转地址',
  `notification_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL COMMENT '异步通知地址',
  `type` tinyint UNSIGNED NOT NULL DEFAULT 0 COMMENT '支付类型：0=微信',
  `status` tinyint UNSIGNED NOT NULL COMMENT '订单状态：0=未支付，1=已支付',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `pay_time` datetime NULL DEFAULT NULL COMMENT '支付时间',
  `hash` varchar(128) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT 'hash',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `trade_no`(`trade_no`) USING BTREE,
  INDEX `acg_amount`(`acg_amount`) USING BTREE,
  INDEX `type`(`type`) USING BTREE,
  INDEX `create_time`(`create_time`) USING BTREE,
  INDEX `status`(`status`) USING BTREE,
  UNIQUE INDEX `hash`(`hash`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;


SET FOREIGN_KEY_CHECKS = 1;