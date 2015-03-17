-- phpMyAdmin SQL Dump
-- version 4.2.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: 2015-03-17 07:39:31
-- 服务器版本： 5.5.38
-- PHP Version: 5.5.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- 表的结构 `todo_todos`
--

CREATE TABLE `todo_todos` (
`todo_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `todo_text` text NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT '0',
  `due_date` date DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `todo_todos`
--

INSERT INTO `todo_todos` (`todo_id`, `text`, `todo_text`, `created_by`, `due_date`) VALUES
(1, '', 'High%20Priority', 1, '2002-04-23'),
(2, '', 'Medium Priority', 1, '2002-05-23'),
(3, '', 'high%20Priority', 1, '2002-04-23'),
(16, '', 'text', 9, '2014-01-02'),
(14, '', 'text', 9, '2014-01-01'),
(23, '', 'text', 9, '2014-01-06'),
(8, '', 'text', 1, '2014-01-01'),
(19, '', 'text', 9, '2014-01-04'),
(17, '', 'text', 9, '2014-01-03'),
(22, '', 'text', 9, '2014-01-05'),
(27, '', 'text\ntext', 9, '2014-01-01');

-- --------------------------------------------------------

--
-- 表的结构 `todo_users`
--

CREATE TABLE `todo_users` (
`usernr` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email_address` varchar(100) DEFAULT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(34) NOT NULL DEFAULT '',
  `admin` smallint(6) NOT NULL DEFAULT '0',
  `if_delete` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `todo_users`
--

INSERT INTO `todo_users` (`usernr`, `name`, `email_address`, `username`, `password`, `admin`, `if_delete`) VALUES
(1, 'Administrator', '', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 1),
(9, 'lhy', 'naruto@163.com', 'test', '098f6bcd4621d373cade4e832627b4f6', 0, 1),
(3, 'Name', 'Email@163.com', 'Username', '8b7267d0799668bacec8d8c73e5b9027', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `todo_todos`
--
ALTER TABLE `todo_todos`
 ADD PRIMARY KEY (`todo_id`), ADD KEY `due_date` (`due_date`);

--
-- Indexes for table `todo_users`
--
ALTER TABLE `todo_users`
 ADD PRIMARY KEY (`usernr`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `todo_todos`
--
ALTER TABLE `todo_todos`
MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `todo_users`
--
ALTER TABLE `todo_users`
MODIFY `usernr` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
