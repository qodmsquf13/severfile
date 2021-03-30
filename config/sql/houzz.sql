-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-03-19 03:50
-- 서버 버전: 10.4.17-MariaDB
-- PHP 버전: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `houzz`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `company`
--

CREATE TABLE `company` (
  `number` varchar(12) PRIMARY KEY NOT NULL,
  `id` varchar(20) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `category` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `consumer`
--

CREATE TABLE `consumer` (
  `number` int(11) PRIMARY KEY NOT NULL auto_increment,
  `id` varchar(20) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `job`
--

CREATE TABLE `job` (
  `number` int(11) PRIMARY KEY NOT NULL auto_increment,
  `id` varchar(20) NOT NULL,
  `pw` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `category` varchar(30) NOT NULL,
  `career` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `quset`
--

CREATE TABLE `quset` (
  `number` bigint(20) PRIMARY KEY NOT NULL auto_increment,
  `consumer_number` int(11) NOT NULL,
  `company_number` varchar(12) DEFAULT NULL,
  `text` text NOT NULL,
  `process` int(1) NOT NULL DEFAULT 0,
  `imgs` varchar(5000) NOT NULL,
  `quset_date` datetime NOT NULL DEFAULT current_timestamp(),
  `start_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- 테이블 구조 `estimate`
--

CREATE TABLE `estimate` (
  `number` bigint(20)  PRIMARY KEY NOT NULL auto_increment,
  `company_number` varchar(12) NOT NULL,
  `quset_number` bigint(20) NOT NULL,
  `process` int(11) NOT NULL DEFAULT 0,
  `price` bigint(20) NOT NULL DEFAULT 0,
  `file` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
--
-- 테이블 구조 `review`
--

CREATE TABLE `review` (
  `number` bigint(20) PRIMARY KEY NOT NULL auto_increment,
  `price` bigint(20) NOT NULL,
  `text` varchar(500) NOT NULL,
  `grade` float(4,2) NOT NULL,
  `consumer_number` int(11) NOT NULL,
  `company_number` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--

-- --------------------------------------------------------

--
-- 테이블 구조 `lovecall`
--

CREATE TABLE `lovecall` (
  `number` bigint(20) PRIMARY KEY NOT NULL auto_increment,
  `job_number` int(11) NOT NULL,
  `company_number` varchar(12) NOT NULL,
  `price` bigint(20) NOT NULL,
  `connect` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 테이블 구조 `job_review`
--

CREATE TABLE `job_review` (
  `number` bigint(20) PRIMARY KEY NOT NULL auto_increment,
  `lovecall_number` bigint(20) NOT NULL,
  `grade` float(4,2) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------


--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `company`
--
ALTER TABLE `company`
--   ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 테이블의 인덱스 `consumer`
--
ALTER TABLE `consumer`
  ADD UNIQUE KEY `id` (`id`);

--
-- 테이블의 인덱스 `job`
--
ALTER TABLE `job`
  -- ADD PRIMARY KEY (`number`),
  ADD UNIQUE KEY `id` (`id`);

--
-- 테이블의 인덱스 `estimate`
--

ALTER TABLE `estimate`
  -- ADD PRIMARY KEY (`number`),
  ADD KEY `into estimate cp` (`company_number`),
  ADD KEY `into estimate q` (`quset_number`);

--
-- 테이블의 인덱스 `job_review`
--

ALTER TABLE `job_review`
  -- ADD PRIMARY KEY (`number`),
  ADD KEY `into jobrivew call` (`lovecall_number`);

--
-- 테이블의 인덱스 `lovecall`
--
ALTER TABLE `lovecall`
  -- ADD PRIMARY KEY (`number`),
  ADD KEY `into call j` (`job_number`),
  ADD KEY `into call cp` (`company_number`);

--
-- 테이블의 인덱스 `quset`
--
ALTER TABLE `quset`
  -- ADD PRIMARY KEY (`number`),
  ADD KEY `into quset cm` (`consumer_number`);

--
-- 테이블의 인덱스 `review`
--
ALTER TABLE `review`
  -- ADD PRIMARY KEY (`number`),
  ADD KEY `into review cm` (`consumer_number`),
  ADD KEY `into review cp` (`company_number`);

--
-- 덤프된 테이블의 제약사항
--

--
-- 테이블의 제약사항 `estimate`
--
ALTER TABLE `estimate`
  ADD CONSTRAINT `into estimate cp` FOREIGN KEY (`company_number`) REFERENCES `company` (`number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `into estimate q` FOREIGN KEY (`quset_number`) REFERENCES `quset` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `job_review`
--
ALTER TABLE `job_review`
  ADD CONSTRAINT `into jobrivew call` FOREIGN KEY (`lovecall_number`) REFERENCES `lovecall` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `lovecall`
--
ALTER TABLE `lovecall`
  ADD CONSTRAINT `into call cp` FOREIGN KEY (`company_number`) REFERENCES `company` (`number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `into call j` FOREIGN KEY (`job_number`) REFERENCES `job` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `quset`
--
ALTER TABLE `quset`
  ADD CONSTRAINT `into quset cm` FOREIGN KEY (`consumer_number`) REFERENCES `consumer` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 테이블의 제약사항 `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `into review cm` FOREIGN KEY (`consumer_number`) REFERENCES `consumer` (`number`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `into review cp` FOREIGN KEY (`company_number`) REFERENCES `company` (`number`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

