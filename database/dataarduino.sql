-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-05-05 07:36:52
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `dataarduino`
--

-- --------------------------------------------------------

--
-- 資料表結構 `areapm`
--

CREATE TABLE `areapm` (
  `Sitename` varchar(10) NOT NULL,
  `Immediate` int(10) DEFAULT NULL,
  `Onehourago` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `areapm`
--

INSERT INTO `areapm` (`Sitename`, `Immediate`, `Onehourago`) VALUES
('三義', 32, 27),
('三重', 30, 33),
('中壢', 29, 31),
('中山', 0, 24),
('二林', 33, 31),
('仁武', 0, 64),
('冬山', 32, 30),
('前金', 60, 61),
('前鎮', 0, 56),
('南投', 42, 0),
('古亭', 37, 39),
('善化', 15, 28),
('嘉義', 18, 39),
('土城', 43, 39),
('埔里', 30, 29),
('基隆', 18, 27),
('士林', 15, 0),
('大同', 42, 42),
('大園', 32, 38),
('大寮', 24, 38),
('大里', 19, 28),
('安南', 31, 34),
('宜蘭', 12, 16),
('小港', 48, 55),
('屏東', 60, 52),
('崙背', 32, 36),
('左營', 70, 71),
('平鎮', 40, 38),
('彰化', 21, 0),
('復興', 53, 53),
('忠明', 35, 32),
('恆春', 2, 0),
('斗六', 21, 29),
('新店', 34, 31),
('新港', 30, 31),
('新營', 31, 28),
('新竹', 0, 21),
('新莊', 37, 34),
('朴子', 20, 25),
('松山', 37, 41),
('板橋', 39, 35),
('林口', 0, 47),
('林園', 22, 22),
('桃園', 27, 0),
('楠梓', 80, 81),
('橋頭', 54, 59),
('永和', 36, 34),
('汐止', 36, 37),
('沙鹿', 29, 25),
('淡水', 26, 27),
('湖口', 28, 35),
('潮州', 16, 45),
('竹山', 31, 25),
('竹東', 36, 34),
('線西', 25, 29),
('美濃', 33, 29),
('臺南', 38, 40),
('臺東', 8, 12),
('臺西', 26, 27),
('花蓮', 11, 11),
('苗栗', 26, 21),
('菜寮', 32, 31),
('萬華', 17, 0),
('萬里', 36, 37),
('西屯', 39, 32),
('觀音', 0, 0),
('豐原', 37, 33),
('金門', 62, 68),
('關山', 13, 13),
('陽明', 29, 23),
('頭份', 23, 28),
('馬公', 15, 15),
('馬祖', 28, 30),
('馬祖東引', 21, 32),
('鳳山', 73, 62),
('麥寮', 27, 33),
('龍潭', 29, 26);

-- --------------------------------------------------------

--
-- 資料表結構 `person`
--

CREATE TABLE `person` (
  `userID` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `passWord` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `age` int(3) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(3) COLLATE utf8_unicode_ci NOT NULL,
  `weight` int(5) NOT NULL,
  `height` int(5) NOT NULL,
  `Sitname` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `wfgh` varchar(50) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `person`
--

INSERT INTO `person` (`userID`, `passWord`, `age`, `name`, `sex`, `weight`, `height`, `Sitname`, `address`, `wfgh`) VALUES
('user', '000', 20, '', '', 0, 0, '', '', NULL),
('stu001', '001', 15, 'studentone ', '男', 61, 160, '', '台北市汀洲路300號', NULL),
('stu002', '002', 30, 'studenttwo', '女', 50, 150, '', '台中市北屯區圓環路125號', NULL),
('stu003', '003', 25, 'studentthree', '男', 80, 160, '', '高雄市旗山區延平一路', NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `tablearduino`
--

CREATE TABLE `tablearduino` (
  `ID` int(10) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Humidity` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Temperature` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Heat_hic` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Heat_hif` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 資料表的匯出資料 `tablearduino`
--

INSERT INTO `tablearduino` (`ID`, `Time`, `Humidity`, `Temperature`, `Heat_hic`, `Heat_hif`) VALUES
(2, '2017-04-13 07:44:01', '68.00', '26.00', '27.22', '81.00'),
(3, '2017-04-13 07:45:04', '68.00', '26.00', '27.22', '81.00'),
(4, '2017-04-13 07:46:06', '68.00', '26.00', '27.22', '81.00'),
(5, '2017-04-13 07:47:09', '68.00', '26.00', '27.22', '81.00'),
(6, '2017-04-13 07:48:11', '68.00', '26.00', '27.22', '81.00'),
(7, '2017-04-13 07:49:13', '67.00', '26.00', '27.18', '80.93'),
(8, '2017-04-13 07:50:16', '67.00', '26.00', '27.18', '80.93'),
(9, '2017-04-13 07:51:18', '67.00', '26.00', '27.18', '80.93'),
(10, '2017-04-13 07:52:20', '67.00', '26.00', '27.18', '80.93'),
(11, '2017-04-13 07:53:23', '67.00', '26.00', '27.18', '80.93'),
(12, '2017-04-13 07:54:25', '67.00', '26.00', '27.18', '80.93'),
(13, '2017-04-15 03:55:37', '60.00', '24.00', '24.02', '75.24'),
(14, '2017-04-15 03:56:39', '59.00', '24.00', '24.00', '75.19'),
(15, '2017-04-15 03:57:41', '57.00', '24.00', '23.94', '75.10'),
(16, '2017-04-15 03:58:44', '57.00', '23.00', '22.84', '73.12'),
(17, '2017-04-15 03:59:46', '57.00', '23.00', '22.84', '73.12'),
(18, '2017-04-18 03:07:25', '56.00', '23.00', '22.82', '73.07'),
(19, '2017-04-18 03:08:36', '43.00', '26.00', '25.78', '78.40'),
(20, '2017-04-18 03:09:38', '44.00', '26.00', '25.80', '78.45'),
(21, '2017-04-18 03:10:40', '43.00', '26.00', '25.78', '78.40'),
(22, '2017-04-18 03:11:43', '43.00', '26.00', '25.78', '78.40'),
(23, '2017-04-18 03:12:45', '43.00', '26.00', '25.78', '78.40'),
(24, '2017-04-18 03:13:47', '44.00', '26.00', '25.80', '78.45'),
(25, '2017-04-18 03:14:50', '44.00', '26.00', '25.80', '78.45'),
(26, '2017-04-18 03:15:52', '44.00', '26.00', '25.80', '78.45'),
(27, '2017-04-18 03:16:55', '44.00', '26.00', '25.80', '78.45'),
(28, '2017-04-18 03:17:57', '56.00', '28.00', '29.02', '84.24'),
(29, '2017-04-18 03:18:59', '61.00', '32.00', '37.38', '99.28'),
(30, '2017-04-18 03:20:02', '58.00', '30.00', '32.44', '90.39'),
(31, '2017-04-18 03:21:04', '54.00', '28.00', '28.82', '83.88'),
(32, '2017-04-18 03:26:25', '49.00', '26.00', '25.93', '78.68'),
(33, '2017-04-18 03:26:43', '46.00', '25.00', '24.76', '76.56'),
(34, '2017-04-18 03:27:46', '46.00', '25.00', '24.76', '76.56'),
(35, '2017-04-18 03:28:48', '47.00', '26.00', '25.88', '78.59'),
(36, '2017-04-18 03:29:50', '57.00', '30.00', '32.25', '90.05'),
(37, '2017-04-18 03:30:53', '55.00', '30.00', '31.89', '89.40'),
(38, '2017-04-18 03:31:55', '52.00', '29.00', '29.91', '85.84'),
(39, '2017-04-18 03:32:58', '48.00', '28.00', '28.27', '82.89'),
(40, '2017-04-18 03:34:00', '46.00', '27.00', '27.18', '80.93'),
(41, '2017-04-18 03:35:02', '46.00', '27.00', '27.18', '80.93'),
(42, '2017-04-18 03:36:05', '46.00', '27.00', '27.18', '80.93'),
(43, '2017-04-18 03:37:07', '46.00', '27.00', '27.18', '80.93'),
(44, '2017-04-18 03:38:09', '46.00', '27.00', '27.18', '80.93'),
(45, '2017-04-18 03:39:12', '46.00', '27.00', '27.18', '80.93'),
(46, '2017-04-18 03:40:14', '46.00', '27.00', '27.18', '80.93'),
(47, '2017-04-18 03:41:17', '46.00', '27.00', '27.18', '80.93'),
(48, '2017-04-18 03:42:19', '46.00', '27.00', '27.18', '80.93'),
(49, '2017-04-18 03:43:21', '46.00', '27.00', '27.18', '80.93'),
(50, '2017-04-18 03:44:24', '46.00', '27.00', '27.18', '80.93'),
(51, '2017-04-18 03:45:26', '45.00', '27.00', '27.13', '80.83');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `areapm`
--
ALTER TABLE `areapm`
  ADD PRIMARY KEY (`Sitename`);

--
-- 資料表索引 `tablearduino`
--
ALTER TABLE `tablearduino`
  ADD PRIMARY KEY (`ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `tablearduino`
--
ALTER TABLE `tablearduino`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
