-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 02:29 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fswd13_cr11_petadoption_marko`
--
CREATE DATABASE IF NOT EXISTS `fswd13_cr11_petadoption_marko` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fswd13_cr11_petadoption_marko`;

-- --------------------------------------------------------

--
-- Table structure for table `adoption`
--

CREATE TABLE `adoption` (
  `adoption_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adoption`
--

INSERT INTO `adoption` (`adoption_id`, `animal_id`, `user_id`, `date`) VALUES
(34, 92, 16, '2021-08-22 11:09:18'),
(35, 92, 16, '2021-08-22 11:09:36'),
(36, 92, 16, '2021-08-22 11:09:58'),
(37, 92, 16, '2021-08-22 11:12:56'),
(38, 92, 16, '2021-08-22 11:32:19'),
(39, 92, 16, '2021-08-22 11:32:28'),
(40, 92, 16, '2021-08-22 11:33:02'),
(41, 92, 16, '2021-08-22 11:33:07'),
(42, 92, 16, '2021-08-22 11:33:12'),
(43, 92, 16, '2021-08-22 11:33:14'),
(44, 92, 16, '2021-08-22 11:33:16'),
(45, 92, 16, '2021-08-22 11:34:28'),
(46, 92, 16, '2021-08-22 11:34:34'),
(47, 92, 16, '2021-08-22 11:47:42');

-- --------------------------------------------------------

--
-- Table structure for table `animals`
--

CREATE TABLE `animals` (
  `animal_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `petaddress` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `size` enum('small','big') NOT NULL,
  `age` varchar(255) NOT NULL,
  `hobbies` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `status` enum('available','unavailable') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `animals`
--

INSERT INTO `animals` (`animal_id`, `name`, `picture`, `petaddress`, `description`, `size`, `age`, `hobbies`, `breed`, `status`) VALUES
(92, 'Buddy and Haylee', '6121a3746fdb6.jpg', 'Teststraße 1 1010 Vienna', 'They are easygoing happy and playful.', 'small', '5', 'They always get along with other dogs and are so sweet and friendly.', 'Beagle Mix ', 'unavailable'),
(93, 'Celine', '6121a41ceaea1.jpg', 'Teststraße 1 1010 Vienna', 'She is very sweet and energetic.', 'big', '9', 'Celine is very peppy, and seems to do well with other dogs .She seems quite playful and She is a friendly girl.', 'German Shepherd Dog', 'available'),
(94, 'Sunbeam', '6121a4604ca4c.jpg', 'Teststraße 1 1010 Vienna', 'Gentle, Playful, Smart, Funny, Athletic, Curious, Affectionate', 'small', '10', 'He exercises on the One Fast Cat wheel and chases the other kittens all the time.', 'Domestic Short Hair ', 'available'),
(95, 'Wanda & Sophia', '6121a4b5ea274.jpg', 'Teststraße 1 1010 Vienna', 'They are a very social cats and love to be petted and to purr.', 'small', '6', 'They both love to sit on the windowsill and watch the world go by.', 'Domestic Short Hair ', 'available'),
(96, 'Luna Honey', '6121a50142dd4.jpg', 'Teststraße 1 1010 Vienna', 'She is very sweet and lovable, Austrian Pinscher and Terrier mix.', '', '11', 'Loves to play, run, and cuddle', 'Terrier Mix ', 'available'),
(98, 'Yogi', '6121a5e28e897.jpg', 'Teststraße 1 1010 Vienna', 'No description', 'small', '12', 'He loves to cuddle up with you as well as eat his greens and hay.', 'Guinea Pig ', 'available'),
(99, 'Penny - in Maine', '6121a655341f5.jpg', 'Teststraße 1 1010 Vienna', 'Penny is a female pup thought to be heeler and hound mix.', 'small', '4', 'She is a sweet pup who is shy at first, warming up after a few days.', 'Cattle Dog & Hound Mix ', 'available'),
(100, 'Sarah', '6121a6d765cb7.jpg', 'Teststraße 1 1010 Vienna', 'Sarah is a sweet girl who can be a bit shy to start.', 'small', '3', 'She loves to  romp around and play.', 'Rabbit', 'available'),
(101, 'Squirt', '6121a72de3d69.jpg', 'Teststraße 1 1010 Vienna', ' Squirt is looking for an active home that can keep up with him.', 'big', '11', 'Who is ready to go, go, GO?! Squirt is and he wants to play, all day.', ' Terrier Mix', 'available'),
(102, 'Farah', '6121a78abd84d.jpg', 'Teststraße 1 1010 Vienna', 'Farah is a young dog about 3 months old.', 'small', '1', 'Playing and sleeping as She is still a baby.', 'American Staffordshire Terrier Mix ', 'available'),
(103, 'Kristoff', '6121a858c6555.jpg', 'Teststraße 1 1010 Vienna', 'He is a very sensitive kitten who needs a home that will give him time to come out of his shell.', 'small', '5', 'He can be easily bought with some yummy food and string toys.', 'Domestic Short Hair ', 'available'),
(104, 'Phoebe', '6121a8b61bb98.jpg', 'Teststraße 1 1010 Vienna', 'A sweet ginger baby looking for her forever home.', 'small', '8', 'She is obsessed with soft food and play time.', 'Domestic Short Hair ', 'available');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `useraddress` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `password`, `useraddress`, `email`, `picture`, `phone`, `status`) VALUES
(15, 'Marko', 'Tomic', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Teststraße 1 1120 Vienna', 'marko@admin.com', '6121780b3f4ec.png', '06604136557', 'adm'),
(16, 'MARKO', 'TOMIC', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Gatterholzgasse 21/13 1120 Wien', 'marko@user.com', '61217ca4f3646.png', '06644123521', 'user'),
(17, 'Max', 'Mustermann', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'Teststraße 1 1120 Vienna', 'max@user.com', 'avatar.png', '06991085661', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption`
--
ALTER TABLE `adoption`
  ADD PRIMARY KEY (`adoption_id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`animal_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption`
--
ALTER TABLE `adoption`
  MODIFY `adoption_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `animals`
--
ALTER TABLE `animals`
  MODIFY `animal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adoption`
--
ALTER TABLE `adoption`
  ADD CONSTRAINT `adoption_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`animal_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `adoption_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
