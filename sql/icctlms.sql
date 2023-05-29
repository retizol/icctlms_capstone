-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 07:48 AM
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
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `quiz_question_id` int(11) NOT NULL,
  `answer_text` varchar(100) NOT NULL,
  `choices` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `quiz_question_id`, `answer_text`, `choices`) VALUES
(1, 4, 'Yea', 'A'),
(2, 4, 'no', 'B'),
(3, 4, 'heck yea', 'C'),
(4, 4, 'oh no', 'D'),
(5, 5, '', 'A'),
(6, 5, '', 'B'),
(7, 5, '', 'C'),
(8, 5, '', 'D'),
(9, 7, '', 'A'),
(10, 7, '', 'B'),
(11, 7, '', 'C'),
(12, 7, '', 'D'),
(13, 8, '', 'A'),
(14, 8, '', 'B'),
(15, 8, '', 'C'),
(16, 8, '', 'D'),
(17, 9, '', 'A'),
(18, 9, '', 'B'),
(19, 9, '', 'C'),
(20, 9, '', 'D'),
(21, 10, '', 'A'),
(22, 10, '', 'B'),
(23, 10, '', 'C'),
(24, 10, '', 'D'),
(25, 11, 'adsasd', 'A'),
(26, 11, 'afsasd', 'B'),
(27, 11, 'asfasd', 'C'),
(28, 11, 'asdasdasd', 'D'),
(29, 12, 'adsasd', 'A'),
(30, 12, 'afsasd', 'B'),
(31, 12, 'asfasd', 'C'),
(32, 12, 'asdasdasd', 'D'),
(33, 13, 'adsasd', 'A'),
(34, 13, 'afsasd', 'B'),
(35, 13, 'asfasd', 'C'),
(36, 13, 'asdasdasd', 'D'),
(37, 14, 'adsasd', 'A'),
(38, 14, 'afsasd', 'B'),
(39, 14, 'asfasd', 'C'),
(40, 14, 'asdasdasd', 'D'),
(41, 15, '', 'A'),
(42, 15, '', 'B'),
(43, 15, '', 'C'),
(44, 15, '', 'D'),
(45, 16, '', 'A'),
(46, 16, '', 'B'),
(47, 16, '', 'C'),
(48, 16, '', 'D'),
(49, 17, '', 'A'),
(50, 17, '', 'B'),
(51, 17, '', 'C'),
(52, 17, '', 'D'),
(53, 18, '2asda', 'A'),
(54, 18, 'asdqwdas', 'B'),
(55, 18, 'd', 'C'),
(56, 18, 'awdsdwa', 'D'),
(57, 19, '2asda', 'A'),
(58, 19, 'asdqwdas', 'B'),
(59, 19, 'd', 'C'),
(60, 19, 'awdsdwa', 'D'),
(61, 20, '', 'A'),
(62, 20, '', 'B'),
(63, 20, '', 'C'),
(64, 20, '', 'D'),
(65, 21, 'asdas', 'A'),
(66, 21, 'asdwa', 'B'),
(67, 21, 'dwas', 'C'),
(68, 21, 'dwasd', 'D'),
(69, 25, 'asdasdw', 'A'),
(70, 25, 'waasdw', 'B'),
(71, 25, 'asdwas', 'C'),
(72, 25, 'dwasdwasd', 'D'),
(73, 27, '1', 'A'),
(74, 27, '2', 'B'),
(75, 27, '3', 'C'),
(76, 27, '4', 'D'),
(77, 32, 'X', 'A'),
(78, 32, 'Y', 'B'),
(79, 32, 'Z', 'C'),
(80, 32, 'A', 'D'),
(81, 35, 'Aw', 'A'),
(82, 35, 'Baw', 'B'),
(83, 35, 'Caw', 'C'),
(84, 35, 'Daw', 'D'),
(85, 38, 'asdawdad', 'A'),
(86, 38, 'wd3wads', 'B'),
(87, 38, 'wa', 'C'),
(88, 38, 'dwadwasd', 'D'),
(89, 39, '2wadafas', 'A'),
(90, 39, 'dawsfasdf', 'B'),
(91, 39, 'awdas', 'C'),
(92, 39, 'dawrfasfas', 'D'),
(93, 40, 'wq3easdf', 'A'),
(94, 40, 'asfdqaw', 'B'),
(95, 40, 'asdwasfd', 'C'),
(96, 40, 'aweasdsad', 'D'),
(97, 41, 'Nokia 3310', 'A'),
(98, 41, 'Samsung Flip', 'B'),
(99, 41, 'Motorola G7', 'C'),
(100, 41, 'Xiaomi Mi 10', 'D'),
(101, 42, 'Last1', 'A'),
(102, 42, 'Last2', 'B'),
(103, 42, 'last3', 'C'),
(104, 42, 'last4', 'D'),
(105, 44, 'Multiple', 'A'),
(106, 44, 'True', 'B'),
(107, 44, 'False', 'C'),
(108, 44, 'Both', 'D'),
(109, 47, 'asdwaawrafasd', 'D'),
(110, 47, 'asdwaawrafasd', 'D'),
(111, 47, 'asdwaawrafasd', 'D'),
(112, 47, 'asdwaawrafasd', 'D'),
(113, 48, 'werqww', 'D'),
(114, 48, 'werqww', 'D'),
(115, 48, 'werqww', 'D'),
(116, 48, 'werqww', 'D'),
(117, 49, 'Angono, Rizal', 'A'),
(118, 49, 'Antipolo, Rizal', 'B'),
(119, 49, 'Tanay, Rizal', 'C'),
(120, 49, 'Binangonan, Rizal', 'D'),
(121, 51, 'Afghanistan', 'A'),
(122, 51, 'USA', 'B'),
(123, 51, 'Philippines', 'C'),
(124, 51, 'Australia', 'D'),
(125, 53, 'Twice', 'A'),
(126, 53, 'Blackpink', 'B'),
(127, 53, 'BTS', 'C'),
(128, 53, 'EXO', 'D'),
(129, 54, 'Quantitative', 'A'),
(130, 54, 'Qualitative', 'B'),
(131, 54, 'Citation', 'C'),
(132, 54, 'Source', 'D'),
(133, 59, 'A', 'A'),
(134, 59, 'B', 'B'),
(135, 59, 'C', 'C'),
(136, 59, 'D', 'D'),
(137, 60, 'Xiaomi', 'A'),
(138, 60, 'Apple', 'B'),
(139, 60, 'Samsung', 'C'),
(140, 60, 'Vivo', 'D'),
(141, 62, 'Data information', 'A'),
(142, 62, 'Data mining', 'B'),
(143, 62, 'Data table', 'C'),
(144, 62, 'Data clause', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `instruction` varchar(255) NOT NULL,
  `floc` varchar(255) NOT NULL,
  `date_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `teacher_id`, `class_id`, `title`, `instruction`, `floc`, `date_added`) VALUES
(1, 9, 28, 'Assignment', 'Description', '', '2022-07-10 13:46:36'),
(2, 9, 28, 'Assignment', 'Description', '', '2022-07-10 13:47:14'),
(3, 9, 28, 'Assignment', 'Description', '', '2022-07-10 13:48:07'),
(4, 9, 28, 'Testing', 'Yea', '', '2022-07-10 13:48:28'),
(5, 9, 28, 'Testing upload', 'Oyeaa', 'uploads/8009_upl_lagotka.jpg', '2022-07-10 13:49:16'),
(6, 9, 28, 'Testing it again', '4th time', 'uploads/4350_upl_iconca.png', '2022-07-10 13:51:39'),
(7, 9, 40, 'Testing it again', '4th time', 'uploads/4350_upl_iconca.png', '2022-07-10 13:51:39'),
(8, 9, 28, 'Docx file', 'Output in new tab w/o dl', 'uploads/3116_upl_Caps ch4.docx', '2022-07-11 01:47:14'),
(9, 9, 40, 'Docx file', 'Output in new tab w/o dl', 'uploads/3116_upl_Caps ch4.docx', '2022-07-11 01:47:14'),
(10, 9, 28, 'PDF file test', 'Upload and open in new tab', 'uploads/5450_upl_LMS_Manual.pdf', '2022-07-11 01:50:33'),
(11, 9, 40, 'PDF file test', 'Upload and open in new tab', 'uploads/5450_upl_LMS_Manual.pdf', '2022-07-11 01:50:33'),
(12, 9, 28, 'ASSIGNMENT 4', 'Explain why climate change is a thing to worry about. Submit your answer in word document.', '', '2022-07-12 17:40:11'),
(13, 9, 40, 'ASSIGNMENT 4', 'Explain why climate change is a thing to worry about. Submit your answer in word document.', '', '2022-07-12 17:40:11'),
(14, 18, 45, 'ASSIGNMENT 1', 'Assignment instructions. Submit in word document.', 'uploads/7925_upl_13349947455.png', '2022-07-12 18:24:02'),
(15, 9, 28, 'ASSIGNMENT 5', 'Read and create this program. Submit it pdf file', '', '2022-07-15 08:44:46'),
(16, 9, 40, 'ASSIGNMENT 5', 'Read and create this program. Submit it pdf file', '', '2022-07-15 08:44:46'),
(17, 9, 28, 'ASSIGNMENT 7', 'Add and submit', 'uploads/1724_upl_lagotka.jpg', '2022-07-15 08:50:11'),
(18, 9, 40, 'ASSIGNMENT 7', 'Add and submit', 'uploads/1724_upl_lagotka.jpg', '2022-07-15 08:50:11'),
(19, 20, 46, 'ASSIGNMENT 1', 'Read and pass your assignment in word document.', 'uploads/4723_upl_Chapter1-Methods_of_Research-Module.pdf', '2022-07-15 10:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `class_quiz`
--

CREATE TABLE `class_quiz` (
  `class_quiz_id` int(11) NOT NULL,
  `teacher_class_id` int(11) NOT NULL,
  `quiz_time` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `time_added` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_quiz`
--

INSERT INTO `class_quiz` (`class_quiz_id`, `teacher_class_id`, `quiz_time`, `quiz_id`, `time_added`) VALUES
(37, 28, 0, 18, '2022-07-14 10:26:36'),
(38, 40, 0, 18, '2022-07-14 11:25:33'),
(39, 40, 0, 21, '2022-07-14 11:46:25');

-- --------------------------------------------------------

--
-- Table structure for table `create_class`
--

CREATE TABLE `create_class` (
  `class_id` int(10) NOT NULL,
  `class_code` varchar(100) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_description` varchar(255) NOT NULL,
  `class_grade` varchar(100) NOT NULL,
  `class_subject` varchar(100) NOT NULL,
  `teacher_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `create_class`
--

INSERT INTO `create_class` (`class_id`, `class_code`, `class_name`, `class_description`, `class_grade`, `class_subject`, `teacher_id`) VALUES
(28, 'VL0TIj', 'Caps', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod', '3RD YEAR', 'Computer Technology', 9),
(38, 'y1R5m9', 'Ladida Class', 'Random Class', '3RD YEAR', 'Creative Arts', 13),
(39, 'P7GDUx', 'Classy Class', 'Creative Design for Art Course', '2ND YEAR', 'Creative Arts', 13),
(40, 'Vz6Jpm', 'IAS 02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer maximus dignissim nisl vitae viverra.', '3RD YEAR', 'Computer Technology', 9),
(42, 'LYlzNa', 'Capstone Project', 'Sample Class for demonstration', '3RD YEAR', 'Computer Technology', 14),
(43, 'Pnbl8s', 'Capstone 01 & 02', 'Capstone Project for 3rd year', '3RD YEAR', 'Computer Technology', 16),
(44, '3UzeBM', 'IAS 02', 'Info Tech for 3rd year student', '3RD YEAR', 'Computer Technology', 16),
(45, '7M3L2r', 'CAPSTONE 1 and 2', 'Culmination of study ', '3RD YEAR', 'Computer Technology', 18),
(48, 'qfFesf', 'Capstone Project', 'Culmination of study in Computer Technology', '3RD YEAR', 'Computer Technology', 20),
(49, 'jOjcE2', 'PE', 'Physical Fitness', '1ST YEAR', 'Health and PE', 22);

-- --------------------------------------------------------

--
-- Table structure for table `multiple_choice`
--

CREATE TABLE `multiple_choice` (
  `choices_id` int(11) NOT NULL,
  `multi_choice` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `multiple_choice`
--

INSERT INTO `multiple_choice` (`choices_id`, `multi_choice`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `question_type_id` int(2) NOT NULL,
  `question_type` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`question_type_id`, `question_type`) VALUES
(1, 'Multiple Choice'),
(2, 'True or False');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(11) NOT NULL,
  `quiz_title` varchar(50) NOT NULL,
  `quiz_description` varchar(100) NOT NULL,
  `date_added` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `teacher_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `quiz_title`, `quiz_description`, `date_added`, `teacher_id`) VALUES
(1, 'Quiz', 'Test', 'current_timestamp()', 1),
(2, 'Chapter 1', 'Chapter 1 for CC05', '2022-06-27 03:11:23', 1),
(14, 'CAPS2 Quiz 1', 'Quiz 1 PRELIM', '2022-07-07 19:12:09', 14),
(18, 'Quiz #1', 'First quiz in prelim', '2022-07-08 13:53:15', 9),
(19, 'PRETEST 1', 'CAPS1', '2022-07-08 20:21:42', 16),
(20, 'QUIZ 1', 'Quiz 1 for Caps', '2022-07-12 18:20:23', 18),
(21, 'Quiz #2', '2nd Quiz for Prelim', '2022-07-14 11:43:13', 9),
(23, 'QUIZ 1', 'Multiple Choice. Choose the correct answer.', '2022-07-22 17:18:11', 20);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `quiz_question_id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `question_type_id` int(11) NOT NULL,
  `points` int(11) NOT NULL,
  `date_added` varchar(100) NOT NULL DEFAULT current_timestamp(),
  `answer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quiz_question`
--

INSERT INTO `quiz_question` (`quiz_question_id`, `quiz_id`, `question_text`, `question_type_id`, `points`, `date_added`, `answer`) VALUES
(3, 4, 'What the?', 2, 0, '2022-06-27 05:22:19', 'True'),
(4, 4, 'OMG?', 1, 0, '2022-06-27 05:24:32', 'C'),
(22, 4, 'Hadtdog', 2, 0, '2022-06-28 02:37:49', 'False'),
(23, 4, 'Working?', 2, 0, '2022-06-28 02:44:21', 'True'),
(24, 4, 'What is this', 2, 2, '2022-06-28 04:21:31', 'False'),
(25, 4, 'Hatdog', 1, 1, '2022-06-28 04:36:51', 'C'),
(28, 4, 'Aw', 2, 1, '2022-06-30 00:59:52', 'False'),
(29, 4, 'WEEEEE', 2, 1, '2022-06-30 01:05:15', 'True'),
(30, 4, 'AWWW', 2, 1, '2022-06-30 01:06:24', 'True'),
(31, 4, 'Sampleawdasd', 2, 1, '2022-07-07 16:29:19', 'False'),
(32, 4, 'Choose a letter.', 1, 2, '2022-07-01 01:51:25', 'A'),
(36, 4, 'Platypus are the only known monotremes in the animal kingdom are the echidna and which other creature.', 2, 1, '2022-07-03 10:33:26', 'True'),
(41, 10, 'What is the unbeatable phone in the early 2000s?', 1, 1, '2022-07-03 22:26:05', 'A'),
(42, 4, 'Last question', 1, 1, '2022-07-03 22:38:29', 'B'),
(43, 4, 'adwasd', 2, 1, '2022-07-03 22:43:22', 'True'),
(44, 10, 'What is this question?', 1, 1, '2022-07-03 22:43:53', 'D'),
(45, 10, 'ICCT main branch is located at Cainta, Rizal.', 2, 1, '2022-07-03 23:13:00', 'True'),
(46, 10, 'In December 25, we celebrate Christmas.', 2, 1, '2022-07-03 23:14:37', 'True'),
(48, 4, 'SAMP UWU', 1, 2, '2022-07-07 16:21:11', 'D'),
(49, 8, 'Art Capital of the Philippines', 1, 1, '2022-07-07 17:41:52', 'A'),
(50, 8, 'Manila is the capital of the Philippines', 2, 1, '2022-07-07 17:43:05', 'True'),
(51, 14, 'Maroon 5 came from where?', 1, 1, '2022-07-07 19:12:59', 'B'),
(52, 14, 'Is it true?', 2, 2, '2022-07-07 19:13:11', 'True'),
(53, 18, 'What is love? ', 1, 1, '2022-07-08 14:29:00', 'A'),
(54, 19, 'Reference to a source.', 1, 1, '2022-07-08 20:25:20', 'C'),
(55, 19, 'Citation is the reference of a source', 2, 1, '2022-07-08 20:28:58', 'True'),
(57, 18, 'Is it true?', 2, 1, '2022-07-10 14:23:18', 'True'),
(58, 20, 'Is it true?', 2, 1, '2022-07-12 18:20:52', 'True'),
(59, 20, 'Choose a letter', 1, 1, '2022-07-12 18:21:13', 'B'),
(60, 21, 'Top global smartphone share in the market.', 1, 1, '2022-07-14 11:45:20', 'C'),
(61, 21, 'There are two seasons in the Philippines.', 2, 1, '2022-07-14 11:46:16', 'True');

-- --------------------------------------------------------

--
-- Table structure for table `student_assignment`
--

CREATE TABLE `student_assignment` (
  `student_assignment_id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `floc` varchar(255) NOT NULL,
  `date_added` varchar(255) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_assignment`
--

INSERT INTO `student_assignment` (`student_assignment_id`, `assignment_id`, `student_id`, `floc`, `date_added`, `grade`) VALUES
(8, 13, 10, 'uploads/8800_upl_ASSIGNMENT 4 IAS2.docx', '2022-07-14 11:33:01', '90'),
(9, 19, 21, 'uploads/8338_upl_ASSIGNMENT 1.docx', '2022-07-15 10:37:33', '85');

-- --------------------------------------------------------

--
-- Table structure for table `student_class_quiz`
--

CREATE TABLE `student_class_quiz` (
  `student_class_quiz_id` int(11) NOT NULL,
  `class_quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_quiz_time` varchar(100) NOT NULL,
  `grade` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_class_quiz`
--

INSERT INTO `student_class_quiz` (`student_class_quiz_id`, `class_quiz_id`, `student_id`, `student_quiz_time`, `grade`) VALUES
(13, 11, 10, '3600', '2/2'),
(14, 12, 10, '3600', '2/2'),
(15, 14, 10, '3600', '2/2'),
(16, 15, 10, '3600', '1/2'),
(17, 7, 10, '3600', '7/15'),
(18, 21, 15, '3600', '2/2'),
(19, 22, 15, '3600', '1/2'),
(20, 30, 10, '3600', '0/1'),
(21, 32, 10, '3600', '1/1'),
(22, 33, 17, '3600', '1/2'),
(23, 34, 19, '3600', '2/2'),
(24, 35, 19, '3600', '2/2'),
(25, 38, 10, '3600', '2/2'),
(26, 39, 10, '3600', '2/2'),
(27, 40, 21, '3600', '1/2');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_class_student`
--

CREATE TABLE `teacher_class_student` (
  `teacher_class_student_id` int(10) NOT NULL,
  `class_code` varchar(100) NOT NULL,
  `class_id` int(10) NOT NULL,
  `student_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `class_description` varchar(255) NOT NULL,
  `class_grade` varchar(100) NOT NULL,
  `class_subject` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_class_student`
--

INSERT INTO `teacher_class_student` (`teacher_class_student_id`, `class_code`, `class_id`, `student_id`, `teacher_id`, `class_name`, `class_description`, `class_grade`, `class_subject`) VALUES
(31, 'LYlzNa', 42, 15, 14, 'Capstone Project', 'Sample Class for demonstration', '3RD YEAR', 'Computer Technology'),
(37, 'LYlzNa', 42, 10, 14, 'Capstone Project', 'Sample Class for demonstration', '3RD YEAR', 'Computer Technology'),
(40, 'Vz6Jpm', 40, 10, 9, 'IAS 02', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer maximus dignissim nisl vitae viverra.', '3RD YEAR', 'Computer Technology'),
(41, '7M3L2r', 45, 19, 18, 'CAPSTONE 1 and 2', 'Culmination of study ', '3RD YEAR', 'Computer Technology'),
(43, 'qfFesf', 48, 10, 20, 'Capstone Project', 'Culmination of study in Computer Technology', '3RD YEAR', 'Computer Technology');

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
  `usersPwd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersCID`, `usersFName`, `usersLName`, `usersEmail`, `usersUid`, `usersPwd`) VALUES
(7, '3', 'moriz', 'moka', 'moka@yahoo.com', '20184285', '$2y$10$8f8RkWU.WcwEj16Uzf3oWOBuaxUvQG6DyXpC4c4Z.lhNGFLsBDPp2'),
(8, '2', 'John', 'Smith', 'teach@example.com', '20221212', '$2y$10$kkQ.vDHoR0IHKA4P/boj/OJtmxp1Up3aA69M1OhhpWE/jBpEM8Mom'),
(9, '2', 'Pepito', 'Manaloto', 'lays24@yahoo.com', '20221234', '$2y$10$L67N/adA3QLvAEnAAQNyiOmyQTEjJRlz2JiC3mHB.WEmEqL8ViQk.'),
(10, '3', 'Ye-ji', 'Hwang', 'morizman@yahoo.com', '20201234', '$2y$10$90g/RidgyUAHIlTG5O7rYOaH5IHEcvWOJsyc3LRh2ciokgZBG4QWu'),
(11, '2', 'Teacher', 'Smith', 'johnsmith23@yahoo.com', '20181234', '$2y$10$ejGVaEBwmj9VFPxeEpdSa.8LnFpmHS0t.ym29GzfwmLHCN7EWPb1O'),
(12, '3', 'Lisa', 'Manoban', 'carolst@yahoo.com', '20231234', '$2y$10$OgQYe0fPMWrR7FVwd4U.z.xqOAHmNdz6ccQ9e1oZXr50uvNjBpQN2'),
(13, '2', 'Second', 'Teacher', 'secondone@yahoo.com', '20241234', '$2y$10$V.5yDzuvhs4ChkFpu7KKOONhP/sybeg44frMoRdTVHhVay8eFfSh2'),
(14, '2', 'Third', 'Teacher', 'exampleteacher@yahoo.com', '20251234', '$2y$10$eLAHhJyDMQKx7mF3rke3NeGfpzP1ZknJhKp8uy0oaox6RazZ1WFXO'),
(15, '3', 'Third', 'Student', 'studentacc@yahoo.com', '20261234', '$2y$10$Wf7oVko.2mOsCl/G4B8JAOuTPFRiPX2lR.rM1.41uMLu3Y2G7itb6'),
(16, '2', 'Joseph', 'Maniwalin', 'josephmaniwalin@yahoo.com', '20271212', '$2y$10$Jym76HiC0MUVkvgyzxASceyU9qdbxoNUobHjccLuVn6YeHBmc80VS'),
(17, '3', 'Lalisa', 'Manoban', 'manobanlisa@gmail.com', '20281234', '$2y$10$vt7PbYFLg2TO8LWhCj61hOT2Ly67pm6t5HDrQPqSlkSdXdP987SdW'),
(19, '3', 'Paul Vincent', 'Neo', 'paulvn@gmail.com', '20171489', '$2y$10$exGAk9WGJLKib5b1xVNISu6V0oXMF381V.15un7ebEKqgxRVTTFMi'),
(20, '2', 'Chandler', 'Bing', 'bingchandlers@gmail.com', '20151200', '$2y$10$FQzpP0mMDwj7JNk/Hb5cs.AmuzV0f2khIfzEcb/DfOMZI7L2.dGpC'),
(21, '3', 'Joey', 'Tribbiani', 'joeytribs@gmail.com', '20161234', '$2y$10$0vesw.B8ZJlE2z.NPH7QaeG5lBzM6FoL2EnWpru35nNfNuPlTNUZu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`);

--
-- Indexes for table `class_quiz`
--
ALTER TABLE `class_quiz`
  ADD PRIMARY KEY (`class_quiz_id`);

--
-- Indexes for table `create_class`
--
ALTER TABLE `create_class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  ADD PRIMARY KEY (`choices_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`question_type_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`quiz_question_id`);

--
-- Indexes for table `student_assignment`
--
ALTER TABLE `student_assignment`
  ADD PRIMARY KEY (`student_assignment_id`);

--
-- Indexes for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  ADD PRIMARY KEY (`student_class_quiz_id`);

--
-- Indexes for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  ADD PRIMARY KEY (`teacher_class_student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `class_quiz`
--
ALTER TABLE `class_quiz`
  MODIFY `class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `create_class`
--
ALTER TABLE `create_class`
  MODIFY `class_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `multiple_choice`
--
ALTER TABLE `multiple_choice`
  MODIFY `choices_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `quiz_question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `student_assignment`
--
ALTER TABLE `student_assignment`
  MODIFY `student_assignment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_class_quiz`
--
ALTER TABLE `student_class_quiz`
  MODIFY `student_class_quiz_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `teacher_class_student`
--
ALTER TABLE `teacher_class_student`
  MODIFY `teacher_class_student_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
