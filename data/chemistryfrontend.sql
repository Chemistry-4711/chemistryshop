-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2016 at 08:18 AM
-- Server version: 5.7.10-log
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chemistryfrontend`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('a8739f101ceaba9ab1a3cd36e183215d1e4471b2', '192.168.33.1', 1478215234, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231353233343b),
('37ae643bf892fad5a09e183ec14fea335009d82d', '192.168.33.1', 1478215785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231353738353b75736572726f6c657c733a343a2275736572223b),
('98fbc35b880281d62e82e5be2acf124be48591ed', '192.168.33.1', 1478216824, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231363832343b),
('05e0d6ecac7d07f3909d72f189d5915e199ec25f', '192.168.33.1', 1478216094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231363039343b75736572726f6c657c733a343a2275736572223b),
('16206df00316bd479f2aeecdfa66335e6e528886', '192.168.33.1', 1478216535, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231363533353b75736572726f6c657c733a343a2275736572223b),
('b6e70e4e6032d7c4a43428be1a3d324c91736f50', '192.168.33.1', 1478216792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231363533353b75736572726f6c657c733a353a2261646d696e223b),
('d7ac8d3340389fcdb46b64f5658f0fab7a5f8ac5', '192.168.33.1', 1478217392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231373339323b),
('f1a2edbee141a23e90524669bf19d8965e10642c', '192.168.33.1', 1478217518, 0x5f5f63695f6c6173745f726567656e65726174657c693a313437383231373339323b),
('dd6dbf058ec573129c1e8b0e115de39678739aad', '127.0.0.1', 1481341425, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313334313432353b75736572726f6c657c733a353a2261646d696e223b),
('a04befce04218b653c5da12c70eee6fe562f7937', '127.0.0.1', 1481341883, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313334313838333b75736572726f6c657c733a353a2261646d696e223b),
('d174a810253acd25c42b2d7ed196894b39bb3e98', '127.0.0.1', 1481342008, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313334313838333b75736572726f6c657c733a353a2261646d696e223b6f726465727c613a333a7b733a363a226e756d626572223b693a303b733a383a226461746574696d65223b4e3b733a353a226974656d73223b613a303a7b7d7d),
('4b8d845061362c655a03e75c788247dd4717369c', '127.0.0.1', 1481357506, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313335373530363b75736572726f6c657c733a353a2261646d696e223b),
('4a1f102d6f0d4a9b4bddb2a2fb7656c50e105dca', '127.0.0.1', 1481357507, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438313335373530363b75736572726f6c657c733a353a2261646d696e223b);

-- --------------------------------------------------------

--
-- Table structure for table `costs`
--

CREATE TABLE `costs` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `gun_powder` int(11) NOT NULL DEFAULT '0',
  `h2o` int(11) NOT NULL DEFAULT '0',
  `peanuts` int(11) NOT NULL DEFAULT '0',
  `lithium` int(11) NOT NULL DEFAULT '0',
  `hydrochloric_acid` int(11) NOT NULL DEFAULT '0',
  `eggs` int(11) NOT NULL DEFAULT '0',
  `milk` int(11) NOT NULL DEFAULT '0',
  `vanilla_extract` int(11) NOT NULL DEFAULT '0',
  `flour` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `costs`
--

INSERT INTO `costs` (`id`, `name`, `gun_powder`, `h2o`, `peanuts`, `lithium`, `hydrochloric_acid`, `eggs`, `milk`, `vanilla_extract`, `flour`) VALUES
(1, 'C4', 3, 1, 0, 1, 0, 2, 0, 0, 0),
(2, 'Methamphetamine', 0, 1, 0, 0, 0, 4, 0, 0, 6),
(3, 'Advil', 0, 0, 5, 0, 2, 0, 0, 3, 0),
(4, 'Vitamins', 0, 0, 0, 0, 5, 0, 0, 0, 0),
(5, 'Stink Bomb', 3, 0, 2, 0, 0, 0, 4, 0, 0),
(6, 'Smoke Bomb', 30, 0, 0, 0, 0, 1, 0, 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `numberYielded` int(11) NOT NULL,
  `recipe` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`id`, `name`, `numberYielded`, `recipe`) VALUES
(1, 'C4', 1, 'Mix lithium, gun powder, H20, and 2 eggs and let it solidify'),
(2, 'Methamphetamine', 1, 'Mix the eggs with the flour while adding water and slowly sift till it hardens'),
(3, 'Advil', 4, 'Add vanilla extract to hydrochloric acid and once it changes color, add 5 peanuts'),
(4, 'Vitamins', 3, 'Encapsulate large amounts of hydrochloric acid'),
(5, 'Stink Bomb', 1, 'Mix milk and peanuts with gun powder'),
(6, 'Smoke Bomb', 2, 'Mix gun powder with sifted flour and 1 egg');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `description` varchar(512) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `num_sold` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `name`, `description`, `price`, `num_sold`, `quantity`) VALUES
(1, 'C4', 'Remote controlled explosive device', '14.95', 12, 100),
(2, 'Methamphetamine', 'Inject into bloodstream to feel good', '50.00', 31, 250),
(3, 'Advil', 'Swallow to relieve headaches and pain', '2.50', 31, 1200),
(4, 'Vitamins', 'Eat once a day to get all necessary vitamins', '5.70', 253, 850),
(5, 'Stink Bomb', 'Throw to stink things up', '50.00', 25, 350),
(6, 'Smoke Bomb', 'Throw to provide a large amount of smoke', '50.00', 88, 650);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `costs`
--
ALTER TABLE `costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `costs`
--
ALTER TABLE `costs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
