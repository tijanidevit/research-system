-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2021 at 10:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `research_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(11) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` text NOT NULL,
  `comment` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `comment`, `date_added`) VALUES
(1, 4, '2', 'I went through your research work. You\'ve really done a great work', '2021-01-21 07:40:49'),
(2, 4, '1', 'Please read my file', '2021-01-21 08:21:15'),
(3, 1, '5', 'good job', '2021-01-21 16:46:49'),
(4, 1, '6', 'We ned to update ', '2021-01-21 16:50:06');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`) VALUES
(1, 'Computer Science'),
(2, 'SLT'),
(4, 'Agric Tech');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `title` varchar(140) NOT NULL,
  `content` text NOT NULL,
  `document` varchar(190) NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `views` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `department_id`, `title`, `content`, `document`, `time_added`, `views`) VALUES
(1, 1, 1, 'ONLINE E-LIBRARY SYSTEM', 'The advancement of technology and the rapid implementation of advanced technology have made many physical walls and boundaries of insignificant effect. Online E-Library (Electronic Library) is a wall breaking and boundaries cutting technology that allows users to have access to information resources electronically and conduct research anywhere they are and want without actually stepping into a library using the internet service. This applies rapidly advancing data processing technology as well as networking technology with an expectation to be highly convenient. ONLINE E-LIBRARY SYSTEM is web-based; MS Visual Studio 2008 and MS SQL Management Studio 2005 were used for its front end and back end design respectively. This system (the proposed model) automates the primarily aspect of manual library advantageously by the implementation of a search module amongst others. The Structured System Analysis and Design Methodology (SSADM) is use for the implementation of this project.', 'elibrary.pdf', '2021-01-21 16:56:31', 7),
(2, 1, 1, 'DESIGN AND IMPLEMENTATION OF FOOD AND DRUGS AUTHENTICATING SYSTEM {A CASE STUDY OF NAFDAC}', 'Counterfeiting is the concern of everyone – the consumers and the manufacturers alike. Drugs and food counterfeiting has been on the increased, the market is not sought for and the income is on the high side but to the detriment of both the consumers, suppliers and manufacturers. Technology can be of utmost importance in this area via the development of an authenticating system with a unified database that will authenticate all registered food and drugs. The food and drug authenticating systems will confirm the truth of an attribute of a single piece of data claimed true by an entity. The National Agency for Food and Drugs Administration and Control (NAFDAC), Nigeria will be a case study whereby the general public can instantly authenticate any food/drug before purchase and consumption and any failed authentication will be temporary blacklisted for further investigation. This proposed research is a web based system with modules on authenticating, registration for the admin and others; Dynamic System Development Method was used. Microsoft Visual Studio 2010 (ASP.net) and SQL Server Management Studio 2008 are employed for the design of the front end and back end respectively.', 'nafdac.pdf', '2021-01-21 08:08:26', 27),
(3, 4, 1, 'Student Chapel Attendance System', 'Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas Student Chapel Attendance System Heuristic Evaluation Storyboarding Design Ideas ', '6459-STUDENT-CHAPEL-ATTENDANCE-SYSTEM-USING-BIOMETRICS-FINGERPRINT-BY-AJIYE.docx', '2021-01-21 08:35:15', 0),
(4, 4, 1, 'Student Chapel Attendance System', 'Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System Student Chapel Attendance System ', '9336-STUDENT-CHAPEL-ATTENDANCE-SYSTEM-USING-BIOMETRICS-FINGERPRINT-BY-AJIYE.docx', '2021-01-21 08:37:40', 0),
(5, 1, 2, 'Hotel Management Information System', 'Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System Hotel Management Information System ', '9501-HOTEL_MANAGEMENT_INFORMATION_SYSTEM_PROJ.docx', '2021-01-21 16:56:46', 5),
(6, 1, 2, 'Heuristic Evaluation', 'Heuristic Evaluation Heuristic Evaluation Heuristic Evaluation Heuristic Evaluation Heuristic Evaluation Heuristic Evaluation ', '7107-chap-4.docx', '2021-01-21 16:55:51', 4);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `first_name` varchar(120) NOT NULL,
  `last_name` varchar(120) NOT NULL,
  `username` varchar(120) NOT NULL,
  `profile_image` varchar(120) NOT NULL,
  `password` text NOT NULL,
  `time_added` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `department_id`, `first_name`, `last_name`, `username`, `profile_image`, `password`, `time_added`) VALUES
(1, 1, 'Agbabiaka', 'Wenger', 'xpatentertainer', '9218-Davido.jpg', 'af6a781a8a77d3d2827bf3b804c5a05f', '2021-01-21 12:32:19'),
(2, 1, 'Oluwadamilare', 'Babatunde', 'Dreybase', '9218-Davido.jpg', '6735ed1c25c2715c9834f5db3519ddf8', '2021-01-20 18:53:11'),
(3, 1, 'Muhammed', 'Bakare', 'xpatentertainer2', '9218-Davido.jpg', '394f3a8c909368e1277f94d09afa7d7a', '2021-01-21 12:32:37'),
(4, 1, 'Oluwadamilare', 'Oluwadamilare', 'Oluwadamilare', '9218-Davido.jpg', 'a94a8af73806a5cc7ddab5cd9c3cd5e0', '2021-01-20 18:28:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
