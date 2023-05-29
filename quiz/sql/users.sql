-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2022 at 09:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `icctlms`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersCID` varchar(128) NOT NULL COMMENT '1 = admin, 2 = teacher, 3 = student',
  `usersFName` varchar(128) NOT NULL,
  `usersLName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersCID`, `usersFName`, `usersLName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(1, '1', 'jeff', 'aba', 'jeffab@gmail.com', 'jeffab', '$2y$10$TDxUawRYATh9d1nwTL4CkedvDV4x6RJPTsGeivAst5ChPswk.2b3G'),
(2, '0', 'Cardo', 'Dalisay', 'cardalisay@gmail.com', 'card', '$2y$10$ofNAKuGRlQ14pH9lJISAd.VlPGB5PW8misV4AxB0NRCLQ4wmrHbNy'),
(3, '2', 'mora', 'liza', 'test@yahoo.cm', 'mora', '$2y$10$j.8VJBF7mqxTqPDOhhovY.utzD.XsCEKbBRY2I.CVZaDr9NKtxnim'),
(4, '2', 'liza', 'mora', 'test2@yahoo.com', 'liza', '$2y$10$rhG.Erly94C0nIGqi2yjk.r2e/TiLFWhS9KxOG.JuM6TteIByuLlO'),
(5, '2', 'tokina', 'maki', 'tokimak@example.com', 'tokis', '$2y$10$7BBWEVvxpgGknjn7MGlQaeIQcBI2NoDLH8pVzlilmqbRxyxpehyxi'),
(6, '3', 'klein', 'calvin', 'ckasjkld@yahoo.com', 'kalvin', '$2y$10$qE5W8EJ.C4Kdul4tUEzIp.h6zulAIoXgmEFwRr37r7KrXcqrt1Zaq'),
(7, '3', 'moriz', 'moka', 'moka@yahoo.com', 'mira', '$2y$10$8f8RkWU.WcwEj16Uzf3oWOBuaxUvQG6DyXpC4c4Z.lhNGFLsBDPp2'),
(8, '2', 'John', 'Smith', 'teach@example.com', '20221212', '$2y$10$kkQ.vDHoR0IHKA4P/boj/OJtmxp1Up3aA69M1OhhpWE/jBpEM8Mom'),
(9, '2', 'Pepito', 'Manaloto', 'lays76@yahoo.com', '20221234', '$2y$10$N5qyEvXwMdGxOlxw26dHe.guQZYDc2xS5J7/6XhET0v/CxuSe24ZS'),
(10, '3', 'Moriz', 'Manoko', 'morizman@yahoo.com', '20201234', '$2y$10$90g/RidgyUAHIlTG5O7rYOaH5IHEcvWOJsyc3LRh2ciokgZBG4QWu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
