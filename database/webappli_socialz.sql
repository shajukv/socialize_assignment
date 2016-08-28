-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 28, 2016 at 07:09 AM
-- Server version: 5.5.48-37.8
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webappli_socialz`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE IF NOT EXISTS `tb_user` (
  `regid` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `mobile` text NOT NULL,
  `age` smallint(3) NOT NULL,
  `sex` varchar(1) NOT NULL,
  `dish_name` varchar(100) NOT NULL,
  `dish_image` varchar(100) NOT NULL,
  `why` text NOT NULL,
  `user` varchar(50) NOT NULL,
  `passwd` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `token` text,
  `likes` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`regid`, `fname`, `lname`, `email`, `country`, `mobile`, `age`, `sex`, `dish_name`, `dish_image`, `why`, `user`, `passwd`, `status`, `token`, `likes`) VALUES
(5, 'kvs', 'kv', 'shaju.kv@gmail.com', 'Albania', '123456', 30, 'M', 'fish', '4.jpg', '', 'shaju.kv@gmail.com', 'bd0c80831ee49940004fda08700b84dd', 1, NULL, 60),
(6, 'shyju', 'k', 'shyju@dubai.com', 'Afganistan', '666888435', 19, 'M', 'Gulab jam', '6.jpg', '', 'shyju@dubai.com', '14e1f4b73f7d55ecf03b55f0c46fd235', 1, NULL, 20),
(7, 'Deepa', '', 'deepa@dubai.com', 'Afganistan', '666888435', 19, 'M', 'Rice with butter', '7.jpg', '', 'deepa@dubai.com', '14e1f4b73f7d55ecf03b55f0c46fd235', 1, NULL, 25),
(8, 'Mohammad', '', 'mohammed@duabi.com', 'Afganistan', '666888435', 19, 'M', 'hiiii', '8.jpg', '', 'mohammed@duabi.com', '14e1f4b73f7d55ecf03b55f0c46fd235', 1, NULL, 10),
(9, 'Suma', 'kv', 'suma@sdubai.com', 'Afganistan', '666888435', 19, 'M', 'hiiii', '9.jpg', '', 'suma@sdubai.com', '14e1f4b73f7d55ecf03b55f0c46fd235', 1, NULL, 0),
(11, 'shaju', '', 'test@socialize.ae', 'Albania', '123456', 30, 'M', 'fish', '11.jpg', 'spicy', 'test@socialize.ae', 'bd0c80831ee49940004fda08700b84dd', 1, 'Null', 50),
(12, 'socialize', 'Dubai', 'user@socializeagency.com', 'Afganistan', '666888435', 19, 'M', 'Pista', '8.jpg', '', 'user@socializeagency.com', '14e1f4b73f7d55ecf03b55f0c46fd235', 1, NULL, 100),
(13, 'John', '', 'test@test.com', 'Algeria', '123456', 30, 'M', 'fish', '12.jpg', 'spicy', 'test@test.com', '61409aa1fd47d4a5332de23cbf59a36f', 1, NULL, 0),
(14, 'Shaju', '', 'shaju.kvs@gmail.com', 'Albania', '123456', 30, 'M', 'biriyani', '12.jpg', 'spicy', 'shaju.kvs@gmail.com', '98177f15f9cc5ad7c22b224b43e69131', 1, NULL, 0),
(15, 'George', '', 'george@dubai.com', 'Albania', '123456', 30, 'M', 'Chicken Spring Roll', 'Chicken spring roll.jpg', 'spicy', 'george@dubai.com', '578ad8e10dc4edb52ff2bd4ec9bc93a3', 1, NULL, 0),
(16, 'raju', '', 'raju@dubai.com', 'Albania', '123456', 30, 'M', 'chicken burger', 'chicken burger.jpg', 'spicy', 'raju@dubai.com', '03c017f682085142f3b60f56673e22dc', 1, NULL, 0),
(17, 'Dileep', '', 'dileep@dubai.com', 'Algeria', '123456', 30, 'M', 'Pasta', 'pasta.jpg', 'spicy', 'dileep@dubai.com', '81395dbb86d84c109e3c400fafaf92d1', 1, NULL, 0),
(18, 'ram', '', 'ram@dubai.com', 'Algeria', '123456', 30, 'M', 'Pista', 'pista.jpg', 'spicy', 'ram@dubai.com', '4641999a7679fcaef2df0e26d11e3c72', 1, NULL, 0),
(19, 'raju', '', 'raju@raju.com', 'Albania', '123456', 30, 'M', 'Arabic', 'arabic.jpg', 'spicy', 'raju@raju.com', '03c017f682085142f3b60f56673e22dc', 1, NULL, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`regid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `regid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
