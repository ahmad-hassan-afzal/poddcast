-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2020 at 05:25 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poddcast`
--

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `m_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `Created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`m_id`, `message`, `status`, `user_id`, `receiver_id`, `Created_at`) VALUES
(112, 'asdasd', 1, 1, 2, '2020-08-03 17:33:15'),
(113, 'asdasd', 1, 1, 2, '2020-08-03 17:33:18'),
(114, 'asdasda', 1, 1, 2, '2020-08-03 17:33:21'),
(115, 'asdasd', 2, 2, 1, '2020-08-03 17:33:44'),
(116, 'adasd', 2, 2, 1, '2020-08-03 17:33:47'),
(117, 'asdasdas', 2, 2, 1, '2020-08-03 17:33:49'),
(118, 'asdasdasd', 2, 2, 1, '2020-08-03 17:33:52'),
(119, 'asdasda', 2, 2, 1, '2020-08-03 17:33:54'),
(120, 'asdasdasd', 2, 2, 1, '2020-08-03 17:33:56'),
(121, 'adasdas', 2, 2, 1, '2020-08-03 17:33:58'),
(122, 'adada', 2, 2, 1, '2020-08-03 17:34:00'),
(123, 'dfgdfgdf', 2, 2, 1, '2020-08-03 17:34:02'),
(124, 'gjghjghj', 2, 2, 1, '2020-08-03 17:34:05'),
(125, 'rtyrtyrt', 2, 2, 1, '2020-08-03 17:34:07'),
(126, 'zxfxfcxzf', 1, 1, 2, '2020-08-04 11:06:16'),
(127, 'asdad', 1, 1, 2, '2020-08-04 12:35:17'),
(128, 'rtyrty', 1, 1, 2, '2020-08-04 12:35:20'),
(129, 'rtyryryr', 1, 1, 2, '2020-08-04 12:35:23'),
(130, 'ryryrt', 1, 1, 2, '2020-08-04 12:35:26'),
(131, 'ygyg', 1, 1, 2, '2020-08-04 12:35:56'),
(132, 'ytuiuyuiiuy', 1, 1, 2, '2020-08-04 12:38:14'),
(133, 'Hi ', 10, 10, 2, '2020-08-04 14:19:43'),
(134, 'asdfnmasvdfhj', 10, 10, 2, '2020-08-04 14:19:47'),
(135, 'asdasd', 10, 10, 2, '2020-08-04 14:19:52'),
(136, 'asdasd', 10, 10, 2, '2020-08-04 14:19:56'),
(137, 'jkljkl', 10, 10, 2, '2020-08-04 14:19:58'),
(138, 'ljkjklkj', 10, 10, 2, '2020-08-04 14:19:59'),
(139, 'asdsadasdasdddds', 10, 10, 1, '2020-08-04 14:20:17'),
(140, 'sadasdsad', 10, 10, 3, '2020-08-04 14:20:26'),
(141, 'sadasjdbasdjkbasdkab', 1, 1, 2, '2020-08-04 14:22:07'),
(142, 'asdasdasda', 1, 1, 2, '2020-08-04 14:22:12'),
(143, 'Hi', 2, 2, 10, '2020-08-04 14:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(50) NOT NULL,
  `post_description` varchar(1000) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `imgName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_description`, `user_id`, `post_time`, `imgName`) VALUES
(35, 'Test Post', 'Hi this is Admin and this is a Test Post', 1, '2020-08-03 16:08:20', '5f2836749a2a19.76633420.jpg'),
(36, 'Demo Title', 'This is a Demo Title for Demo post for Demo Video for Project Submission ', 1, '2020-08-04 11:55:32', '5f294cb4dc4b99.36944430.png'),
(37, 'First Post', 'Hi My name is ahmad and This is my first post', 10, '2020-08-04 14:18:28', '5f296e34c17937.28100094.jpg'),
(38, 'Admin Post', 'Hi This is your admin Posting for Demo video for Project Submission', 1, '2020-08-04 14:21:26', '5f296ee680d7e1.88583407.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `about` varchar(250) NOT NULL,
  `cover` varchar(255) NOT NULL DEFAULT 'img.png',
  `profile` varchar(255) NOT NULL DEFAULT 'user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `name`, `email`, `phone`, `about`, `cover`, `profile`) VALUES
(1, 'admin', 'admin', 'Muhammad Ahmad', 'ahmad@gmail.com', '03247757223', 'Hi I\'m a Software Engineering student in National Textile University, FSD', '5f294e06461310.55018901.png', '5f098ae08e19d3.46585486.png'),
(2, 'dani', 'danial', 'Muhammad Danial', 'danidaniels@gmail.com', '03012345678', 'My Name is Danyal and I\'m also known as Dani.', 'img.png', 'user.png'),
(3, 'muneeb', 'muneeb', 'Muhammad Muneeb', 'bebaboys123@gmail.com', '03012345678', 'Hi My name is Muneeb Rafique and I\'m the CR of BSSE-Morning', 'img.png', 'user.png'),
(10, 'ahmad', 'ahmad', 'Ahmad Afzal', 'ahmad@gmail.com', '213987123', 'ashjgadbashjdb', '5f296e10af78b8.73048866.png', '5f296e08d17123.29550946.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`m_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
