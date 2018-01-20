-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2018 at 08:17 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `collabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `companydetails`
--

CREATE TABLE `companydetails` (
  `id` int(11) NOT NULL,
  `companyId` int(11) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `about` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companydetails`
--

INSERT INTO `companydetails` (`id`, `companyId`, `contactNo`, `city`, `website`, `about`) VALUES
(1, 2, '1231', 'dfsdf', 'qqq', '123123123'),
(2, 4, '123', 'qwerw', 'gsavas', '123'),
(3, 7, '0135654', 'Dhaka', 'www.ok.com', 'Akjdnkabsjkdbwad'),
(4, 8, '654654', 'Dhaka', 'https://www.acc.com', 'AIUB Computer Club');

-- --------------------------------------------------------

--
-- Table structure for table `contests`
--

CREATE TABLE `contests` (
  `id` int(11) UNSIGNED NOT NULL,
  `company_id` int(11) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `start_on` date NOT NULL,
  `close_on` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contests`
--

INSERT INTO `contests` (`id`, `company_id`, `title`, `description`, `start_on`, `close_on`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Winter Marathon 2019', 'This contest will be held on the first january of 2018, Participants are encouraged for it.', '2018-01-05', '2018-03-30', 1, '2017-11-08 01:09:45', '2017-11-09 15:22:13'),
(7, 3, 'okolk', NULL, '2018-01-01', '2018-01-01', 0, '2017-11-09 15:31:17', '2017-11-09 15:31:31'),
(8, 7, 'wow', 'new era', '2018-01-01', '2018-01-01', 0, '2017-11-15 07:02:30', '2017-11-15 07:02:30'),
(9, 7, 'new', 'amar', '2018-01-01', '2018-01-01', 0, '2017-11-15 17:44:24', '2017-11-15 17:44:24'),
(10, 8, 'ba', 'bla', '2017-11-16', '2017-11-29', 2, '2017-11-27 15:19:41', '2017-11-27 15:19:41'),
(11, 8, 'AIUB CS-Fest 2017', 'aiub cs fest', '2017-12-05', '2017-12-11', 0, '2017-11-27 15:21:01', '2017-12-02 05:50:24'),
(12, 3, 'Summer-Camp 2018', 'sdasd', '2017-11-08', '2017-11-13', 2, '2017-11-29 07:14:42', '2017-11-29 07:14:42'),
(13, 7, 'Test Reqst', 'test for review', '2017-12-20', '2017-12-27', 0, '2017-12-02 05:55:07', '2017-12-02 05:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `contest_company`
--

CREATE TABLE `contest_company` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `contest_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_company`
--

INSERT INTO `contest_company` (`id`, `user_id`, `contest_id`, `company_id`, `message`, `status`) VALUES
(1, 7, 8, 7, 'Test', 1),
(3, 3, 1, 7, 'multi test', 1),
(4, 8, 11, 9, 'We would like to take sponsorship', 1),
(5, 3, 12, 7, NULL, 1),
(6, 7, 8, 9, NULL, 1),
(7, 9, 11, 7, NULL, 1),
(8, 7, 13, 9, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contest_user`
--

CREATE TABLE `contest_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `contest_id` int(11) UNSIGNED NOT NULL,
  `team_id` int(11) UNSIGNED NOT NULL,
  `project_id` int(11) UNSIGNED NOT NULL,
  `about` varchar(500) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contest_user`
--

INSERT INTO `contest_user` (`id`, `user_id`, `contest_id`, `team_id`, `project_id`, `about`, `status`) VALUES
(1, 1, 1, 3, 1, 'Pasta Management is so good software', 1),
(2, 1, 7, 3, 1, 'sfasdfsdf', 0),
(5, 4, 1, 0, 0, 'd', 0),
(6, 6, 8, 8, 0, 'asd', 0),
(7, 5, 1, 9, 0, 'asd', 0),
(8, 5, 9, 9, 5, 'asd', 1),
(9, 5, 8, 11, 8, 'e-commerce website', 2),
(10, 5, 7, 11, 8, 'Newasd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hire`
--

CREATE TABLE `hire` (
  `offer_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `accept` int(1) NOT NULL DEFAULT '0',
  `details` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hire`
--

INSERT INTO `hire` (`offer_id`, `company_id`, `user_id`, `accept`, `details`) VALUES
(2, 7, 5, 3, 'we would like to invite u to an interview for hiring in our company.\r\nif u want to accept.\r\ninterview time: 22th december, 2017  10PM.'),
(3, 7, 5, 1, 'Come'),
(4, 7, 5, 3, 'ew'),
(5, 7, 5, 0, 'Interview'),
(6, 7, 11, 6, 'interview at 5th'),
(7, 7, 11, 5, 'again..ebar accept'),
(8, 7, 11, 4, 'abar..');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `primary_id` int(11) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `from_id` int(11) NOT NULL,
  `to_id` int(11) NOT NULL,
  `messages` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`primary_id`, `msg_id`, `from_id`, `to_id`, `messages`, `time`) VALUES
(1, 1, 5, 6, 'new', '2017-12-01 17:01:47'),
(2, 1, 5, 6, 'ok', '2017-12-01 22:01:14'),
(3, 1, 6, 5, 'accha', '2017-12-01 22:03:01'),
(4, 2, 6, 1, 'hey rafat', '2017-12-01 22:12:12'),
(5, 2, 6, 1, 'sup?', '2017-12-01 22:12:18'),
(6, 2, 1, 6, 'wanna join?', '2017-12-01 22:12:44'),
(7, 2, 1, 6, 'a', '2017-12-01 22:13:00'),
(8, 2, 1, 6, 'a', '2017-12-01 22:13:02'),
(9, 2, 6, 1, 'b', '2017-12-01 22:13:07'),
(10, 1, 5, 6, 'whats up', '2017-12-02 06:35:18'),
(11, 1, 5, 6, 'new?', '2017-12-02 06:35:25'),
(12, 3, 7, 5, 'Yo', '2017-12-02 07:21:39'),
(13, 1, 5, 6, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '2017-12-02 08:35:30'),
(14, 4, 7, 8, 'yo', '2017-12-02 11:58:15'),
(15, 4, 8, 7, 'what?', '2017-12-02 11:58:34'),
(16, 4, 7, 8, 'sd', '2017-12-04 21:42:54'),
(17, 4, 7, 8, 'asdasd', '2017-12-04 21:44:55'),
(18, 5, 3, 1, 'yo', '2018-01-20 07:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `team_id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `details` varchar(500) DEFAULT NULL,
  `extra` text,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `user_id`, `team_id`, `name`, `details`, `extra`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 'Pasta Management', 'Pasta Management Idea on Decker Contest by Urban Dev', NULL, 1, '2017-11-11 02:05:49', '2017-11-11 02:28:13'),
(2, 6, 7, 'Library Management', 'Library management is so good', NULL, 1, '2017-11-14 20:41:48', '2017-11-14 21:08:18'),
(3, 9, 8, 'Dua Lipa <3', 'asdasdasd', '{\"github\":\"https:\\/\\/github.com\\/fengyuanchen\\/datepicker\",\"youtube\":\"https:\\/\\/www.youtube.com\\/watch?v=-rey3m8SWQI\"}', 1, '2017-11-15 22:31:53', '2017-11-15 22:31:53'),
(4, 5, 9, 'asdw', 'asd', '{\"github\":\"https:\\/\\/www.github.com\\/asdasd\",\"youtube\":\"https:\\/\\/www.github.com\\/asdasd\"}', 1, '2017-11-16 01:43:48', '2017-11-16 01:43:48'),
(7, 6, 8, 'ew dua', 'asd', '{\"github\":\"https:\\/\\/www.github.com\\/asdasd\",\"youtube\":null}', 1, '2017-11-23 13:37:16', '2017-11-23 13:37:16'),
(8, 5, 11, 'Website', 'Web app', '{\"github\":\"https:\\/\\/www.github.com\\/asdasd\",\"youtube\":null}', 1, '2017-11-27 15:26:44', '2017-11-27 15:26:44'),
(9, 11, 13, 'asdfafsdf', 'asdfasdf', '{\"github\":\"http:\\/\\/github.com\\/hkjlkasd\",\"youtube\":null}', 1, '2017-12-02 02:09:09', '2017-12-02 02:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `total_member` int(10) NOT NULL,
  `existing_member` int(10) NOT NULL DEFAULT '1',
  `leader_id` int(10) NOT NULL,
  `leader_name` varchar(50) NOT NULL,
  `description` text,
  `status` tinyint(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `total_member`, `existing_member`, `leader_id`, `leader_name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'ok', 5, 2, 2, '', 'asdasd', 0, '2017-11-08 10:13:03', NULL),
(2, 'new', 14, 2, 2, '', 'asd', 0, '2017-11-08 11:02:36', NULL),
(3, 'arekta5', 7, 2, 1, 'Rafat', 'bla bla2', 0, '2017-11-08 11:54:57', '2017-11-07 20:28:45'),
(4, 'gogogo', 7, 1, 1, 'Rafat', 'asdwawd', 0, '2017-11-08 12:08:06', NULL),
(5, 'ew', 15, 1, 1, 'Rafat', 'asdasd', 0, '2017-11-08 14:04:42', NULL),
(6, 'asad', 11, 1, 1, 'Rafat', 'asd', 0, '2017-11-09 21:07:06', '2017-11-09 03:07:15'),
(7, 'ye', 1, 1, 1, 'Rafat', 'k', 0, '2017-11-10 07:37:04', NULL),
(8, 'lololololol', 8, 2, 6, 'tomar', 'sadawdasd asd', 0, '2017-11-15 12:45:51', NULL),
(9, 'asd', 5, 2, 5, 'amar', 'Web Development', 0, '2017-11-15 22:45:01', '2017-12-04 03:30:05'),
(10, 'Team Android', 8, 1, 6, 'tomar', 'Android Developmend', 0, '2017-11-27 21:25:47', NULL),
(11, 'Team Online-shop', 9, 1, 5, 'amar', 'E-commerse', 0, '2017-11-27 21:26:07', NULL),
(12, '1112', 1, 1, 10, 'amra', '12132', 0, '2017-11-28 07:39:03', NULL),
(13, 'ami kichu pari na', 6, 1, 11, 'jihan', 'asfdadsf', 0, '2017-12-02 08:07:16', '2017-12-02 02:07:22');

-- --------------------------------------------------------

--
-- Table structure for table `team_project`
--

CREATE TABLE `team_project` (
  `team_project_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `accept` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_project`
--

INSERT INTO `team_project` (`team_project_id`, `team_id`, `project_id`, `accept`) VALUES
(1, 3, 1, 1),
(2, 7, 2, 1),
(3, 8, 3, 1),
(4, 9, 4, 1),
(5, 1, 4, 0),
(6, 8, 7, 1),
(8, 1, 7, 0),
(10, 11, 8, 1),
(11, 10, 8, 2),
(12, 3, 4, 0),
(13, 8, 1, 2),
(14, 13, 9, 1),
(15, 9, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `team_user`
--

CREATE TABLE `team_user` (
  `team_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `invite` tinyint(1) NOT NULL DEFAULT '0',
  `teamuser_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team_user`
--

INSERT INTO `team_user` (`team_id`, `user_id`, `invite`, `teamuser_id`) VALUES
(1, 1, 1, 1),
(2, 1, 1, 10),
(3, 4, 0, 13),
(8, 5, 1, 14),
(9, 1, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `dateOfBirth` date NOT NULL,
  `city` varchar(100) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `contactNo` varchar(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `website` varchar(100) DEFAULT NULL,
  `aboutMe` varchar(255) DEFAULT NULL,
  `education` varchar(1000) DEFAULT NULL,
  `programming_language` varchar(1000) DEFAULT NULL,
  `archi_patters` text,
  `team_exp` text NOT NULL,
  `projects` varchar(1000) DEFAULT NULL,
  `joined` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`id`, `userId`, `dateOfBirth`, `city`, `gender`, `contactNo`, `occupation`, `website`, `aboutMe`, `education`, `programming_language`, `archi_patters`, `team_exp`, `projects`, `joined`) VALUES
(3, 3, '2017-11-14', 'asdfhgafffff', 1, 'asfffw', 'asdas', NULL, 'aaaa', NULL, NULL, NULL, '', 'aaaa', NULL),
(4, 6, '2017-11-07', 'asdf', 1, 'asdf', 'asdf', 'wewewewe', 'asdfevsdfgsfg', NULL, NULL, NULL, '', NULL, NULL),
(5, 1, '2017-11-21', 'Dhaka', 1, 'asdf', 'asdfsadf', 'asdf', 'asfdasgfasfasccxvxcvxc1232134134', NULL, 'asdfasd', NULL, '', NULL, NULL),
(8, 7, '2017-11-14', 'asdf', 2, 'asdf', 'asdf', 'uuuuu', 'aaaaa', NULL, NULL, NULL, '', NULL, NULL),
(9, 5, '1994-09-27', 'Dhaka', 1, '015876647', 'Student', 'https://www.acc.com', 'Funny', 'BSc in CSE From AIUB', 'C,C++,Paython,PHP,Js', NULL, '', 'Asd Management system, Bang Management System', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Rafat', 'rafat@gmail.com', '$2y$10$vrb70T8CJNA/Yb5NSJCLeufH7Dv5M59zOHE67Zd4Wokw7qCXxQJCK', 0, '2017-11-07 06:15:56', NULL),
(2, 'Fahim', 'fahim@gmail.com', '$2y$10$vrb70T8CJNA/Yb5NSJCLeufH7Dv5M59zOHE67Zd4Wokw7qCXxQJCK', 1, '2017-11-07 06:42:07', NULL),
(3, 'asd', 'aka@gm.com', '$2y$10$vrb70T8CJNA/Yb5NSJCLeufH7Dv5M59zOHE67Zd4Wokw7qCXxQJCK', 1, '2017-11-07 08:17:04', NULL),
(4, 'human', 'alien@gmail.com', '$2y$10$vrb70T8CJNA/Yb5NSJCLeufH7Dv5M59zOHE67Zd4Wokw7qCXxQJCK', 0, '2017-11-10 21:55:11', NULL),
(5, 'amar', 'amar@gmail.com', '$2y$10$2RgT1rP2NE9FCnD4cNXHbel8NsPAeywdLN70H5gKfHqMN.cfJ1M7O', 0, '2017-11-15 12:42:12', NULL),
(6, 'tomar', 'tomar@gmail.com', '$2y$10$QkjYYHpVUzkm/NVbj4W.V.ro9G0n1Cypz4klm3.XkERs4t4QdfZcq', 0, '2017-11-15 12:45:13', NULL),
(7, 'company', 'company@gmail.com', '$2y$10$vrb70T8CJNA/Yb5NSJCLeufH7Dv5M59zOHE67Zd4Wokw7qCXxQJCK', 1, '2017-11-15 13:02:10', NULL),
(8, 'ACC', 'acc@gmail.com', '$2y$10$5S0.zBri/vO0ET3vpYsm4uxqOMDh4zKCk65NbdEFwSy80Evf.COLy', 1, '2017-11-27 21:14:32', NULL),
(9, 'asus', 'asus@gmail.com', '$2y$10$sqWEbZxS6X1ntuHQXeaHye858KX8n1AUKR01xdQZdwQfpcp4/mseC', 1, '2017-11-27 21:14:50', NULL),
(10, 'amra', 'amra@gmail.com', '$2y$10$W8JSnxeTNwsOqMolFdZwtuo8iDMSI7F4qW2b5y1AKU6jUepnKWPEm', 0, '2017-11-28 07:38:30', NULL),
(11, 'jihan', 'jihan@gmail.com', '$2y$10$PMJClZmbZCLiIUw6HaCN2OywPCaaSUSFOYiqqVRfk2iWSiYjaXncS', 0, '2017-12-02 08:06:28', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_educations`
--

CREATE TABLE `user_educations` (
  `user_educations_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `institution_name` text NOT NULL,
  `department` text NOT NULL,
  `start` date NOT NULL,
  `end` date NOT NULL,
  `edu/job` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_educations`
--

INSERT INTO `user_educations` (`user_educations_id`, `user_id`, `institution_name`, `department`, `start`, `end`, `edu/job`) VALUES
(1, 5, 'NDC', 'Science', '2011-07-03', '2013-07-03', 0),
(2, 5, 'BZS', 'science', '2003-07-03', '2011-07-03', 0),
(3, 5, 'bla', 'Project Manager', '2014-07-03', '2017-07-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_relation`
--

CREATE TABLE `user_relation` (
  `relation_id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_name1` text NOT NULL,
  `user_id2` int(11) NOT NULL,
  `user_name2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_relation`
--

INSERT INTO `user_relation` (`relation_id`, `user_id1`, `user_name1`, `user_id2`, `user_name2`) VALUES
(1, 5, 'amar', 6, 'tomar'),
(2, 6, 'tomar', 1, 'Rafat'),
(3, 7, 'company', 5, 'amar'),
(4, 7, 'company', 8, 'ACC'),
(5, 3, 'asd', 1, 'Rafat');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companydetails`
--
ALTER TABLE `companydetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`companyId`);

--
-- Indexes for table `contests`
--
ALTER TABLE `contests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest_company`
--
ALTER TABLE `contest_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contest_user`
--
ALTER TABLE `contest_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hire`
--
ALTER TABLE `hire`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`primary_id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team_project`
--
ALTER TABLE `team_project`
  ADD PRIMARY KEY (`team_project_id`);

--
-- Indexes for table `team_user`
--
ALTER TABLE `team_user`
  ADD PRIMARY KEY (`teamuser_id`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_educations`
--
ALTER TABLE `user_educations`
  ADD PRIMARY KEY (`user_educations_id`);

--
-- Indexes for table `user_relation`
--
ALTER TABLE `user_relation`
  ADD PRIMARY KEY (`relation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companydetails`
--
ALTER TABLE `companydetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contests`
--
ALTER TABLE `contests`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `contest_company`
--
ALTER TABLE `contest_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contest_user`
--
ALTER TABLE `contest_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `hire`
--
ALTER TABLE `hire`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `primary_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `team_project`
--
ALTER TABLE `team_project`
  MODIFY `team_project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `team_user`
--
ALTER TABLE `team_user`
  MODIFY `teamuser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_educations`
--
ALTER TABLE `user_educations`
  MODIFY `user_educations_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_relation`
--
ALTER TABLE `user_relation`
  MODIFY `relation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
