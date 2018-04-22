-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 19, 2018 at 12:15 PM
-- Server version: 5.6.17-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `places`
--

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

DROP TABLE IF EXISTS `place`;
CREATE TABLE IF NOT EXISTS `place` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `description` mediumtext COLLATE utf8_unicode_ci,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`id`, `name`, `address`, `latitude`, `longitude`, `description`, `image`, `type`) VALUES
(1, 'Armacao de Pera', 'Armacao de Pera, Algarve', 37.1049, -8.3584, 'Armação de Pêra is a Portuguese parish (freguesia) in the municipality of Silves. The population in 2011 was 4,867, in an area of 7.99 km². The village used to be called Pêra de Baixo or Lower Pêra to distinguish it from the present Pêra, which was then named Pêra de Cima or Upper Pêra.\r\n\r\nThe village of Armação de Pêra is, today, a popular tourist center with fine beaches, hotels, cafés and restaurants. The village is on a broad bay that stretches from Pont da Galé to Senhora da Rocha. Its beaches extend from Praia dos Pescadores or the Fishermans Beach, to Salomão beach, including those of Maré Grande and Beijinhos.\r\n\r\nThe village is one of the last places in the region where fishing boats are launched from and recovered to the actual beach. There is no harbour.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Armacaodepera.jpg/450px-Armacaodepera.jpg', 1),
(2, 'Praia da Luz', 'teste2', 37.0909, -8.7591, '\r\nPraia da Luz, officially Luz, is a civil parish located about 6 kilometres (3.7 mi) from the municipality of Lagos in the Algarve, Portugal. The population in 2011 was 3,545, in an area of 21.78 km². Also known as Luz de Lagos or Vila da Luz (a contraction of its former official name, Vila da Nossa Senhora da Luz), \"Praia da Luz\" (which means Beach of the Light) is used to refer to both the urbanized village and the beach. The parish had its origins in a small fishing village (the industry is now only found in isolated enclaves to the west), but was transformed by several holiday-villa complexes into a tourist area.', 'https://upload.wikimedia.org/wikipedia/commons/thumb/7/74/Vista_parcial_da_luz.jpg/450px-Vista_parcial_da_luz.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'Beach'),
(2, 'City'),
(3, 'Country'),
(4, 'Montain');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
