-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2020 at 10:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_num` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `first_name`, `last_name`, `phone_num`, `address`) VALUES
(27, 'Veda', 'Singleton', '1-883-719-3833', 'Ap #723-7191 Vitae Road'),
(28, 'Tarik', 'Levine', '1-847-664-0263', '907-6771 Tincidunt Rd.'),
(29, 'Edan', 'Payne', '1-425-222-6318', 'Ap #741-1255 Sem Street'),
(30, 'Amal', 'Carrillo', '1-418-597-6364', 'P.O. Box 757, 5962 Tellus. Avenue'),
(31, 'Chester', 'Tucker', '1-740-150-0227', '833-8182 Consectetuer, Rd.'),
(32, 'Lars', 'Pollard', '1-397-299-8134', '336-8918 Tortor Street'),
(33, 'Noelle', 'Jimenez', '1-340-119-6362', '2168 Pellentesque Avenue'),
(34, 'Lucas', 'Avila', '1-537-123-3596', '496-770 Fermentum Rd.'),
(35, 'Samson', 'Roberts', '1-795-901-6299', 'P.O. Box 353, 4380 Pellentesque. Ave'),
(36, 'Rahim', 'Grant', '1-404-719-6661', 'P.O. Box 721, 3238 Sed Ave'),
(37, 'Piper', 'Callahan', '1-813-576-9933', 'P.O. Box 583, 6920 Est. Road'),
(38, 'Acton', 'Caldwell', '1-591-544-1509', 'P.O. Box 729, 7123 Erat, Rd.'),
(39, 'Emmanuel', 'Stafford', '1-625-235-3622', '126-8984 Velit Avenue'),
(40, 'Ciaran', 'Romero', '1-247-250-8531', 'Ap #463-574 Diam Road'),
(41, 'Minerva', 'Shelton', '1-692-170-9912', 'P.O. Box 627, 484 Tempus Road'),
(42, 'Gloria', 'Zimmerman', '1-269-765-6454', '528-8002 Vel, Ave'),
(43, 'Burke', 'Wilkins', '1-683-684-6653', 'Ap #430-9092 Nunc Av.'),
(44, 'Carissa', 'French', '1-282-330-4690', 'P.O. Box 806, 2349 Justo Street'),
(45, 'Bert', 'Reeves', '1-807-627-0286', 'P.O. Box 854, 4869 Lectus, St.'),
(46, 'Zachary', 'Roman', '1-443-994-9454', 'P.O. Box 367, 3572 Tortor Road'),
(47, 'Bernard', 'Sharp', '1-758-821-4155', 'Ap #766-4252 In Rd.'),
(48, 'Britanney', 'Hebert', '1-291-412-6591', 'Ap #578-4687 Egestas Rd.'),
(49, 'Kermit', 'Howell', '1-367-585-9672', 'Ap #655-6469 Dignissim Street'),
(50, 'Emerald', 'Kaufman', '1-539-678-6494', '125-3589 Imperdiet Ave'),
(51, 'Moana', 'Day', '1-395-624-0065', 'Ap #428-7678 Lacus Ave'),
(52, 'Yen', 'Rutledge', '1-881-869-9371', '9646 Vel Ave'),
(53, 'Gil', 'Brewer', '1-918-699-5095', 'Ap #541-6787 Mollis. St.'),
(54, 'Bianca', 'Henry', '1-123-206-7723', '162-2698 Elit, Rd.'),
(55, 'Kirestin', 'House', '1-770-676-8220', 'P.O. Box 486, 5100 Eu Ave'),
(56, 'Ila', 'Petersen', '1-397-800-4493', '8978 Commodo Street'),
(57, 'Rudyard', 'Frederick', '1-336-693-6538', 'Ap #227-7114 Metus Rd.'),
(58, 'Fatima', 'Bailey', '1-901-744-2981', 'P.O. Box 126, 4098 Dolor. Rd.'),
(59, 'Holly', 'Browning', '1-464-374-9928', '8040 Mauris Avenue'),
(60, 'Basia', 'Moran', '1-732-103-5835', 'Ap #394-6899 Sem. St.'),
(61, 'Maris', 'Meadows', '1-277-412-4287', 'P.O. Box 682, 1277 Placerat Rd.'),
(62, 'Kerry', 'Gonzales', '1-412-121-8317', '7830 Lobortis Road'),
(63, 'Martha', 'Cooley', '1-768-709-8920', 'Ap #836-6857 Lorem, Rd.'),
(64, 'Regan', 'Kim', '1-307-475-4109', '2405 Ligula. Street'),
(65, 'Hop', 'Espinoza', '1-501-908-0397', '746-9747 Quis St.'),
(66, 'Lamar', 'Fitzpatrick', '1-773-444-2434', '2485 Magna Road'),
(67, 'Cynthia', 'Clements', '1-250-661-1874', '160-8954 Placerat St.'),
(68, 'Nyssa', 'Wolfe', '1-967-460-0931', '151 Ac St.'),
(69, 'Tate', 'Christensen', '1-778-363-1912', '1773 Amet Rd.'),
(70, 'Candace', 'Holcomb', '1-880-447-0833', '423-7475 Ac Rd.'),
(71, 'Audrey', 'Gibson', '1-609-601-5217', '542-6989 Aliquam St.'),
(72, 'Trevor', 'Crane', '1-945-893-6336', 'P.O. Box 955, 1865 Diam St.'),
(73, 'Zena', 'Dixon', '1-372-891-5803', '3516 Eros St.'),
(74, 'Porter', 'Strong', '1-734-706-3864', '5426 Ipsum Rd.'),
(75, 'Holly', 'Cabrera', '1-992-398-1087', 'Ap #396-9272 Proin Ave'),
(76, 'Drew', 'Buckley', '1-542-527-1001', 'P.O. Box 301, 8874 Posuere Rd.'),
(81, 'Giselle', 'Domingo', '1-222-222-2222', '20 ASD AVE'),
(82, 'Ronald', 'Mark', '1-222-222-2222', '20 ASD AVE'),
(84, 'fsdf', 'bvcbcvb', '1-111-111-1111', '20 ASD AVE');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `MenuID` int(11) NOT NULL,
  `menu_item` varchar(255) DEFAULT NULL,
  `price` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`MenuID`, `menu_item`, `price`) VALUES
(1, 'Coffee and Donuts', 12),
(2, 'Breakfast Corn Dogs', 12),
(3, 'Pancakes', 12),
(4, 'Deviled Eggs', 12),
(9, 'Tea', 2),
(10, 'Coffee', 3),
(11, 'Local Greens', 13),
(12, 'Geist Burger', 14);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `menuID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `menuID`, `quantity`, `CustomerID`) VALUES
(114, 1, 2, 82),
(115, 2, 2, 82),
(116, 1, 5, 84),
(117, 2, 2, 84),
(118, 1, 2, 81),
(119, 2, 1, 81);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(50) NOT NULL,
  `rdate` varchar(50) NOT NULL,
  `rtime` varchar(50) NOT NULL,
  `guest` varchar(50) NOT NULL,
  `tableno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `rdate`, `rtime`, `guest`, `tableno`) VALUES
(9, '2020-11-27', '07:00 AM', '4', '5'),
(10, '2020-11-27', '07:00 AM', '4', '3'),
(11, '2020-11-17', '10:30 AM', '3', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `tableID` int(11) NOT NULL,
  `numberOfPeople` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(5, 'rmark', '$2y$10$oGHt4BgeqRjgXUFRbPD9bePtix1xQDbuGd1baJujiZhv.IcQ5Racm', '2020-11-22 16:15:10'),
(6, 'ronaldmark', '$2y$10$eCKxVzMvmiiBXLKybfqAV.teqFb7JEBlqXGKDsl6K2hNj8NyR6CSu', '2020-11-22 16:39:56'),
(9, 'giselled', '$2y$10$lGGAr6gcZKs.KK8GnfeLK.D3jlajJ4EQRL.MN0SBU7GhH4VVGH.4y', '2020-11-22 16:53:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`MenuID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `menuID` (`menuID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tableID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `MenuID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `tableID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `CustomerID` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`),
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`menuID`) REFERENCES `menu` (`MenuID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
