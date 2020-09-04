-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-08-14 08:02
-- 서버 버전: 10.4.13-MariaDB
-- PHP 버전: 7.2.31

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
  `MDate` date NOT NULL,
  `MTime` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `meet`
--

INSERT INTO `meet` (`idx`, `Title`, `Photo`, `Writer`, `Target`, `ReleaseDate`, `MDate`, `MTime`) VALUES
(15, '포토행사입니다.', 'back.jpg', '이이이', '대학생', '2020-07-01', '2020-07-31', '10:29:00'),
(17, '코로나', 'book-2432139_1920.jpg', '코로나', '고등학생', '2020-06-28', '2020-08-08', '12:19:00'),
(18, 'qwe', '10.jpg', '123', '123', '2020-07-21', '2020-08-01', '23:12:00'),
(19, '이벤트', '23.PNG', 'sdfsdf', 'ㄴㅇㄹㄴㅁㅇㄹ', '2020-07-13', '2020-07-02', '20:26:00'),
(20, '123123124124', '2653034C572594B52E.jpg', 'ㅁㄴㅇㄻㄴㅇㄹ', 'ㄴㅇㄹㄴㅁㅇㄹ', '2020-07-30', '2020-07-31', '18:26:00');

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
  `about` text NOT NULL,
  `ready` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `reservate`
--

INSERT INTO `reservate` (`idx`, `title`, `photo`, `writer`, `username`, `gender`, `age`, `school`, `date`, `about`, `ready`) VALUES
(5, 'qwe', '10.jpg', '123', 'admin', '', 0, '중학교', '2020-08-01', '', '예약중'),
(6, '포토행사입니다.', 'back.jpg', '이이이', '조민희', 'male', 18, '고등학교', '2020-07-31', '123414', '대기중'),
(8, '123123124124', '2653034C572594B52E.jpg', 'ㅁㄴㅇㄻㄴㅇㄹ', '조민희', 'male', 18, '고등학교', '2020-07-31', '', '대기중'),
(9, '이벤트', '23.PNG', 'sdfsdf', '조민희', 'male', 18, '고등학교', '2020-07-02', '1234', '대기중'),
(10, '이벤트', '23.PNG', 'sdfsdf', '조민희', 'male', 18, '중학교', '2020-07-02', '346346', '대기중'),
(11, '코로나', 'book-2432139_1920.jpg', '코로나', '조민희', 'male', 18, '중학교', '2020-08-08', '1254367458', '대기중'),
(12, '이벤트', '23.PNG', 'sdfsdf', '조민희', 'male', 18, '초등학교', '2020-07-02', 'dasfstagdhg', '예약중'),
(13, 'qwe', '10.jpg', '123', '조민희', 'male', 18, '초등학교', '2020-08-01', '1241516', '대기중');

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
(7, 'admin', 'admin', '1234', '', 0, ''),
(8, '조민희', 'qwe@qwe.com', '123', 'male', 18, '고등학교'),
(10, '이이', '1234@naver.com', '1234', 'female', 18, '고등학교'),
(13, '조민희', 'test@naver.com', '1234', 'male', 12, '초등학교'),
(14, '조민희', 'test@gmail.com', '1234', 'female', 18, '고등학교'),
(15, '조민희', 'test@gmail.com', '', 'female', 18, '고등학교'),
(16, '조민희', 'admin@admin.add', '1234', 'male', 18, '초등학교'),
(17, '조민희', 'qwe@qwe.com', '123', 'male', 18, '초등학교'),
(18, '조민희', 'qwe@qwe.com', '123', 'male', 18, '초등학교'),
(19, '조민희', 'qwe@qwe.com', '', 'male', 18, '초등학교'),
(20, '조민희', 'qwe@qwe.com', '', 'male', 18, '초등학교'),
(21, '조민희', 'qwe@qwe.com', '', 'male', 18, '초등학교'),
(22, '조민희', 'qwe@qwe.com', '123', 'male', 1, '초등학교'),
(23, '조민희', 'qwe@qwe.com', '123', 'male', 18, '초등학교');

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
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- 테이블의 AUTO_INCREMENT `reservate`
--
ALTER TABLE `reservate`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
