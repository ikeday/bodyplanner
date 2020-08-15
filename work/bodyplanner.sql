-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2020-08-08 16:27:16
-- サーバのバージョン： 10.4.13-MariaDB
-- PHP のバージョン: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `bodyplanner`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `dailydata`
--

CREATE TABLE `dailydata` (
  `date` date NOT NULL COMMENT '測定日',
  `weight` float NOT NULL COMMENT '体重',
  `BMI` float NOT NULL COMMENT 'BMI',
  `fat_ratio` float NOT NULL COMMENT '脂肪率\r\n',
  `fat_quant` float NOT NULL COMMENT '脂肪量',
  `fat_right_arm` float NOT NULL COMMENT '脂肪率右腕',
  `fat_left_arm` float NOT NULL COMMENT '脂肪率左腕',
  `fat_right_leg` float NOT NULL COMMENT '脂肪率右足',
  `fat_left_leg` float NOT NULL COMMENT '脂肪率左足',
  `inner_fat` float NOT NULL COMMENT '内臓脂肪指数',
  `muscle` float NOT NULL COMMENT '骨格筋量',
  `muscle_right_arm` float NOT NULL COMMENT '骨格筋量右腕',
  `muscle_left_arm` float NOT NULL COMMENT '骨格筋量左腕',
  `muscle_right_leg` float NOT NULL COMMENT '骨格筋量右足',
  `muscle_left_leg` float NOT NULL COMMENT '骨格筋量左足',
  `bone` float NOT NULL COMMENT '推定骨量',
  `water` float NOT NULL COMMENT '水分量',
  `metabolism` float NOT NULL COMMENT '基礎代謝量',
  `std_metabolism` float NOT NULL COMMENT '基礎代謝基準値'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `dailydata`
--

INSERT INTO `dailydata` (`date`, `weight`, `BMI`, `fat_ratio`, `fat_quant`, `fat_right_arm`, `fat_left_arm`, `fat_right_leg`, `fat_left_leg`, `inner_fat`, `muscle`, `muscle_right_arm`, `muscle_left_arm`, `muscle_right_leg`, `muscle_left_leg`, `bone`, `water`, `metabolism`, `std_metabolism`) VALUES
('2020-07-13', 62.9, 22.8, 16.8, 10.55, 17.3, 17.7, 15.3, 14.6, 90, 23.35, 1.8, 1.6, 5.95, 5.65, 2.45, 38.3, 1473, 1352),
('2020-07-16', 62.65, 22.7, 17.4, 10.9, 16.8, 18.8, 15.3, 14.6, 95, 23.3, 1.9, 1.6, 5.95, 5.7, 2.4, 37.9, 1459, 1347),
('2020-07-20', 63.3, 22.8, 19.2, 12.15, 19.3, 20, 16.8, 16.1, 100, 23.15, 1.7, 3.05, 7.4, 15.6, 2.35, 37.45, 1449, 1361),
('2020-07-21', 63.4, 23, 15.4, 9.75, 15.6, 16.5, 14.9, 14, 80, 23.7, 1.9, 1.55, 5.9, 5.6, 2.6, 39, 1502, 1363),
('2020-07-22', 63, 22.7, 15.9, 10, 16.4, 17, 14.6, 13.9, 85, 23.85, 1.9, 1.7, 6.05, 5.8, 2.5, 38.8, 1487, 1355),
('2020-07-27', 64.05, 23.1, 16.2, 10.4, 16.3, 17.2, 14.9, 14.1, 85, 24, 1.9, 1.6, 6.1, 5.75, 2.55, 39.3, 1505, 1377),
('2020-07-28', 63.8, 23.2, 15.9, 10.15, 16.9, 17.3, 15.5, 14.5, 80, 23.6, 1.75, 1.55, 5.8, 5.65, 2.6, 39.25, 1503, 1372),
('2020-07-29', 63.45, 23, 15.1, 9.55, 15.4, 16.6, 14.3, 13.5, 80, 23.85, 1.95, 1.65, 6, 5.7, 2.6, 39.45, 1508, 1364),
('2020-07-31', 62.8, 22.8, 15.8, 9.9, 16.8, 17.7, 14.8, 13.9, 85, 23.15, 1.85, 1.55, 5.95, 5.6, 2.55, 38.7, 1484, 1350),
('2020-08-03', 62.9, 22.8, 15.5, 9.7, 16.6, 16.9, 14.8, 13.8, 80, 23.5, 1.8, 1.55, 5.95, 5.7, 2.55, 38.95, 1490, 1352),
('2020-08-04', 62.9, 22.8, 15.5, 9.75, 16, 16.9, 14.8, 13.9, 80, 23.25, 1.85, 1.55, 5.95, 5.6, 2.55, 38.9, 1489, 1352),
('2020-08-05', 63.4, 23, 16.6, 10.55, 16.3, 16.8, 15, 14.2, 90, 23.6, 2, 1.65, 6.1, 5.7, 2.45, 38.7, 1486, 1363),
('2020-08-06', 63.3, 23, 16.6, 10.5, 16.8, 16.6, 14.8, 14.1, 95, 23.95, 1.9, 1.75, 6.05, 5.85, 2.45, 38.65, 1484, 1361);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `dailydata`
--
ALTER TABLE `dailydata`
  ADD PRIMARY KEY (`date`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
