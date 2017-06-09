-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2017 年 6 朁E09 日 05:11
-- サーバのバージョン： 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hinandb`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `hinantb`
--

CREATE TABLE `hinantb` (
  `ID` int(11) NOT NULL,
  `避難所名` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `緯度` double NOT NULL,
  `経度` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- テーブルのデータのダンプ `hinantb`
--

INSERT INTO `hinantb` (`ID`, `避難所名`, `緯度`, `経度`) VALUES
(13, '向山小学校', 35.682604, 140.01393),
(2, '大久保小学校', 35.689443, 140.044505),
(6, '大久保東小学校', 35.687044, 140.053637),
(5, '実籾小学校', 35.689513, 140.06515),
(12, '実花小学校', 35.698612, 140.065838),
(10, '屋敷小学校', 35.67937, 140.049902),
(8, '東習志野小学校', 35.691691, 140.072788),
(25, '東部体育館', 35.692507, 140.073918),
(1, '津田沼小学校', 35.68286, 140.019898),
(27, '県立実籾高等学校', 35.682344, 140.063525),
(26, '県立津田沼高等学校', 35.675028, 140.010739),
(14, '秋津小学校', 35.671981, 140.013997),
(17, '第一中学校', 35.691145, 140.012641),
(23, '第七中学校', 35.667595, 140.019679),
(19, '第三中学校', 35.673133, 140.023915),
(18, '第二中学校', 35.686982, 140.058621),
(21, '第五中学校', 35.688996, 140.028514),
(22, '第六中学校', 35.680075, 140.053165),
(20, '第四中学校', 35.693513, 140.073157),
(24, '習志野高等学校', 35.694313, 140.065905),
(11, '藤崎小学校', 35.6936702, 140.03883540000004),
(9, '袖ケ浦東小学校', 35.670403, 140.02807),
(7, '袖ケ浦西小学校', 35.678283, 140.016238),
(16, '谷津南小学校', 35.679613, 140.00875),
(3, '谷津小学校', 35.686707, 140.012066),
(15, '香澄小学校', 35.665232, 140.026765),
(4, '鷺沼小学校', 35.6780163, 140.02955610000004);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hinantb`
--
ALTER TABLE `hinantb`
  ADD PRIMARY KEY (`避難所名`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
