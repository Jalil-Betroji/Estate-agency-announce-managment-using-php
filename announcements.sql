-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2023 at 07:47 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estate_agency`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `ID` int(11) NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Image` varchar(250) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Area` varchar(100) NOT NULL,
  `Address` varchar(80) NOT NULL,
  `Amount` float NOT NULL,
  `Announcement_Date` date NOT NULL,
  `Ad_Type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`ID`, `Title`, `Image`, `Description`, `Area`, `Address`, `Amount`, `Announcement_Date`, `Ad_Type`) VALUES
(1, 'Rental house with luxury view', 'pic1.jpg', 'a rental house with luxury view inculding 2 living rooms ,kitchen and children games room', '350', 'Casablanca hay farah ', 500, '2023-02-01', 'Rental'),
(2, 'Entire villa hosted by Vincent', 'pic2.jpg', 'Best designed house in cansablanca near to ain diab with 5 rooms , 2 living rooms, kitchen and bathroom', '350', 'Marrakech, Marrakech-Safi, Morocco', 800, '2023-02-02', 'Rental'),
(3, 'villa in casablanca', 'pic3.jpg', 'Best designed villa in cansablanca near to ain diab with 5 rooms , 2 living rooms, kitchen and bathroom', '500', 'Casablanca , ain diab ', 520000, '2023-02-24', 'Sell'),
(4, 'best designed tripe house', 'pic4.jpg', 'daily rental trip house icludin 2 rooms , bathroom , kitchen and little living room', '80', 'Marrakech, Marrakech-Safi, Morocco', 100, '2023-02-11', 'Rental'),
(5, 'best designed house in tanger', 'pic5.jpg', 'a rental house with luxury view inculding 2 living rooms ,kitchen and children games room', '122', 'Tanger achakar', 700, '2023-02-16', 'Rental'),
(6, 'Luxury villa in tetouan', 'pic6.jpg', 'a luxury design with wonderful view on the sea , a villa with 5 rooms, 3 living room , 2 kitchens, 3 bathroom and a garden', '350', 'Tetouan, melalyin', 500000, '2023-02-21', 'Sell'),
(7, 'A rental house in tanger', 'pic7.jpg', 'a rental house with luxury view inculding 2 living rooms ,kitchen and children games room', '122', 'Tanger-ahlan', 500, '2023-02-23', 'Rental'),
(8, 'A Luxury house in chefchaouen', 'pic8.jpg', 'Best designed house in chefchaouen includin 3 rooms , 2 living rooms ,kitchen , bathroom and a garden ', '350', 'chefchaouen', 400, '2023-02-15', 'Rental'),
(9, 'living house in rabat', 'pic9.jpg', 'best desined house in rabat with 2 rooms ,living room, kitchen and bathroom', '100', 'Rabat', 85000, '2023-02-25', 'Sell'),
(10, 'luxury house in tetouan', 'pic10.jpg', 'a rental house with luxury view inculding 2 living rooms ,kitchen and children games room', '350', 'Tetouan, melalyin', 55000, '2023-02-17', 'Sell'),
(11, 'best villa in tanger', 'pic11.jpg', 'a luxury design with wonderful view on the sea , a villa with 5 rooms, 3 living room , 2 kitchens, 3 bathroom and a garden', '500', 'Tanger achakar', 1500, '2023-02-23', 'Rental'),
(12, 'rental house in ouezzane', 'pic12.jpg', 'a house with 2 rooms ,kitchen ,living room and bathroom ', '100', 'Ouezzane - adil', 250, '2023-02-19', 'Rental'),
(13, 'Villa in rabat for sell', 'pic13.jpg', 'with wonderful design villa in rabat with 5 rooms , 3 living room , kitchen ,bathroom and garden ', '500', 'Rabat', 400000, '2023-02-24', 'Sell'),
(14, 'best designed house in hociema', 'pic20.jpg', 'Best designed house in hociema with 5 rooms , 2 living rooms, kitchen and bathroom', '350', 'Hociema', 300000, '2023-02-14', 'Sell');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
