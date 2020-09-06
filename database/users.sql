-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-09-06 09:01
-- 서버 버전: 10.4.14-MariaDB
-- PHP 버전: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `users`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `meet`
--

CREATE TABLE `meet` (
  `idx` int(11) NOT NULL,
  `Title` text NOT NULL,
  `Photo` text NOT NULL,
  `Writer` text NOT NULL,
  `Target` text NOT NULL,
  `ReleaseDate` date NOT NULL,
  `meetDate` date NOT NULL,
  `days` text NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `meet`
--

INSERT INTO `meet` (`idx`, `Title`, `Photo`, `Writer`, `Target`, `ReleaseDate`, `meetDate`, `days`, `startTime`, `endTime`) VALUES
(25, '페인트', '페인트.jpg', '이희영', '초등학생', '2019-04-19', '2020-09-07', '월요일', '11:00:00', '13:00:00'),
(26, '체리새우', '체리새우.jpg', '황영미', '초등학생', '2019-01-28', '2020-09-08', '화요일', '13:00:00', '15:00:00'),
(27, '시간을 파는 상점', '시간을 파는 상점.jpg', '김선영', '초등학생', '2012-04-10', '2020-09-09', '수요일', '15:00:00', '17:00:00'),
(28, '아몬드', '아몬드.jpg', '손원평', '초등학생', '2017-03-31', '2020-09-10', '목요일', '10:00:00', '12:00:00'),
(29, '완득이', '완득이.jpg', '김려령', '초등학생', '2008-03-17', '2020-09-11', '금요일', '14:00:00', '16:00:00'),
(30, '단편소설 베스트35', '단편소설 베스트35.jpg', '김형주', '중학생', '2015-07-13', '2020-09-14', '월요일', '11:00:00', '13:00:00'),
(31, '그들도 아이였다', '그들도 아이였다.jpg', '김은우', '중학생', '2018-03-25', '2020-09-15', '화요일', '13:00:00', '15:00:00'),
(32, '십대를 위한 실패수업', '십대를 위한 실패수업.jpg', '정화진', '중학생', '2019-06-12', '2020-09-16', '수요일', '15:00:00', '17:00:00'),
(33, '중학국어 비문학 독해 한권으로 끝내기', '중학국어 비문학 독해 한권으로 끝내기.jpg', '정문경', '중학생', '2019-06-05', '2020-09-17', '목요일', '10:00:00', '12:00:00'),
(34, '바다소', '바다소.jpg', '양태은', '중학생', '2018-06-10', '2020-09-18', '금요일', '14:00:00', '16:00:00'),
(35, '선생님과 함께 읽는 우리 소설', '선생님과 함께 읽는 우리 소설.jpg', '권순긍', '고등학생', '2011-05-03', '2020-09-21', '월요일', '11:00:00', '13:00:00'),
(36, '스프링벅', '스프링벅.jpg', '배유안', '고등학생', '2008-10-13', '2020-09-22', '화요일', '13:00:00', '15:00:00'),
(37, '생각한다는것', '생각한다는것.jpg', '고병권', '고등학생', '2010-03-31', '2020-09-23', '수요일', '15:00:00', '17:00:00'),
(38, '개똥세개', '개똥 세개.jpg', '강수돌', '고등학생', '2013-07-30', '2020-09-24', '목요일', '10:00:00', '12:00:00'),
(39, '아이는 사춘기 엄마는 성장기', '아이는 사춘기 엄마는 성장기.jpg', '이윤정', '고등학생', '2010-03-26', '2020-09-25', '금요일', '14:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- 테이블 구조 `reservate`
--

CREATE TABLE `reservate` (
  `idx` int(11) NOT NULL,
  `title` text NOT NULL,
  `photo` text NOT NULL,
  `writer` text NOT NULL,
  `username` text NOT NULL,
  `gender` text NOT NULL,
  `age` int(150) NOT NULL,
  `school` text NOT NULL,
  `date` date NOT NULL,
  `days` int(11) NOT NULL,
  `startTime` time NOT NULL,
  `endTime` time NOT NULL,
  `about` text NOT NULL,
  `ready` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `idx` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `school` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`idx`, `username`, `email`, `password`, `gender`, `age`, `school`) VALUES
(7, 'admin', 'admin', '1234', '', 0, '');

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `meet`
--
ALTER TABLE `meet`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `reservate`
--
ALTER TABLE `reservate`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `meet`
--
ALTER TABLE `meet`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- 테이블의 AUTO_INCREMENT `reservate`
--
ALTER TABLE `reservate`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
