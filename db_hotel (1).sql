-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 juin 2022 à 15:25
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `db_hotel`
--
CREATE DATABASE IF NOT EXISTS `db_hotel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_hotel`;

-- --------------------------------------------------------

--
-- Structure de la table `booking`
--

CREATE TABLE `booking` (
  `Idbooking` int(10) UNSIGNED NOT NULL,
  `IdClient` int(6) NOT NULL,
  `Check_In` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Adults` int(11) NOT NULL,
  `Children` int(11) NOT NULL,
  `Total` float NOT NULL,
  `Check_Out` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `booking`
--

INSERT INTO `booking` (`Idbooking`, `IdClient`, `Check_In`, `Adults`, `Children`, `Total`, `Check_Out`) VALUES
(1, 1, '2022-06-26 11:26:21', 2, 15200, 7600, '2022-06-28 11:26:21');

-- --------------------------------------------------------

--
-- Structure de la table `bookingroom`
--

CREATE TABLE `bookingroom` (
  `IdBooking` int(10) UNSIGNED NOT NULL,
  `IdRoom` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `bookingroom`
--

INSERT INTO `bookingroom` (`IdBooking`, `IdRoom`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `IdClient` int(6) NOT NULL,
  `FirstName` varchar(30) NOT NULL,
  `LastName` varchar(30) NOT NULL,
  `Adress` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `PhoneNumber` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`IdClient`, `FirstName`, `LastName`, `Adress`, `Email`, `Password`, `PhoneNumber`) VALUES
(1, 'zouhir', '3alami', 'uhcsdlsdlkhc', 'zouhir@gmail.com', '123', 563),
(2, 'mahdi', 'benani', 'tanger, bir chifa', 'mahdi@gmail.com', 'AZERT', 852);

-- --------------------------------------------------------

--
-- Structure de la table `photo`
--

CREATE TABLE `photo` (
  `IdImage` int(10) UNSIGNED NOT NULL,
  `MainImg` varchar(254) NOT NULL,
  `IdRoom` int(10) UNSIGNED NOT NULL,
  `Image1` varchar(254) NOT NULL,
  `Image2` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `photo`
--

INSERT INTO `photo` (`IdImage`, `MainImg`, `IdRoom`, `Image1`, `Image2`) VALUES
(1, 'room1.jpg', 1, 'glr1room1.jpg', 'glr2room1.jpg'),
(2, 'room2.jpg', 2, '	\r\nglr1room2.jpg', 'glr2room2.jpg'),
(3, 'room3.jpg', 3, 'glr1room3.jpg', 'glr2room3.jpg'),
(4, 'room4.jpg', 4, 'glr1room4.jpg', 'glr2room4.jpg'),
(5, 'room5.jpg', 5, 'glr1room5.jpg', 'gl2room5.jpg'),
(6, 'room6.jpg', 6, 'glr1room6.jpg', 'glr2room6.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `room`
--

CREATE TABLE `room` (
  `IdRoom` int(10) UNSIGNED NOT NULL,
  `Description` varchar(254) NOT NULL,
  `Label` varchar(254) NOT NULL,
  `Size` varchar(254) NOT NULL,
  `OccupancyAdults` int(11) NOT NULL,
  `OccupancyChildren` int(11) NOT NULL,
  `PricePerNight` float NOT NULL,
  `UniqueFeatures` varchar(254) NOT NULL,
  `Views` varchar(254) NOT NULL,
  `Beds` varchar(254) NOT NULL,
  `Bathroom` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `room`
--

INSERT INTO `room` (`IdRoom`, `Description`, `Label`, `Size`, `OccupancyAdults`, `OccupancyChildren`, `PricePerNight`, `UniqueFeatures`, `Views`, `Beds`, `Bathroom`) VALUES
(1, 'Desert tones and vaulted ceilings give these rooms a spacious, breezy appeal, enhanced by easy access to the pool for early-morning swims.', 'PAVILION PATIO ROOM', '50 m2 (538 sq.ft.). Ground floor', 2, 1, 7600, 'Walled-in terraces filled with plants and direct pool access', 'Resort gardens', 'One king or two twin beds, One rollaway or one crib', 'One full marble bathroom '),
(2, 'From the comfort of your private balcony, catch the sun setting over the pools’ shimmering waters.', 'POOL-VIEW TERRACE ROOM', '42 m2 (452 sq.ft.). 1st and 2nd floors\r\n\r\n', 2, 0, 6150, 'Cosy sitting area and private terrace', 'Resort pools', 'One king bed', 'One full marble bathroom'),
(3, 'Ideal for small families or intimate groups of friends, this villa’s two bedrooms are separated by a plant-filled courtyard designed for dining or lounging. Indoors, a kitchenette and a spacious living area help you feel at home.', 'TWO-BEDROOM VILLA WITH PRIVATE POOL\r\n', '212 m2 (2,281 sq.ft.). Ground floor\r\n\r\n\r\n', 4, 3, 35150, 'A kitchenette with a personal attendant (on request) and a walled-in terrace', 'Resort', 'One king bed and two double beds, One rollaway or one crib\r\n\r\n', 'Two full marble bathrooms\r\n\r\n'),
(4, 'These two-bedroom suites offer some of the best views at the Resort. Take in the snow-capped Atlas Mountains or mythic Menara Gardens from your wraparound terrace before heading inside to curl up in front of your fireplace.', 'PANORAMIC TWO-BEDROOM PRESIDENTIAL SUITE', '248 m2 (2,668 sq.ft.). 3rd floor', 4, 3, 20000, 'Wrap-around terrace with outdoor loungers and personal attendants on request', 'Resort, Atlas Mountains and Menara Gardens\r\n\r\n', 'One king bed and two double beds, One sofabed and one rollaway', 'Two full marble bathrooms plus a separate guest powder room'),
(5, 'With spacious desks and a dining area , these suites are ideal for working lunches, small meetings or longer stays.', 'GARDEN-VIEW TERRACE SUITE\r\n', '56 m2 (602 sq.ft.). Ground, second and third floors', 1, 1, 7000, 'Separate powder room for guests and space for private meetings', 'Resort gardens or Menara Gardens\r\n\r\n\r\n', 'One king bed, One sofabed\r\n\r\n', 'One full marble bathroom and a separate guest powder room'),
(6, 'Slightly removed from the main building for extra privacy, these airy rooms sport outdoor “living rooms” perfect for dining under the stars.', 'UPPER PAVILION ROOM\r\n', '50 m2 (538 sq.ft.). Pavilion 1st floor\r\n\r\n', 2, 1, 7000, 'Outdoor living area and seclusion from the main building', 'Resort gardens and pool\r\n\r\n', 'One king or two twin beds, One rollaway or one crib\r\n\r\n', 'One full marble bathroom\r\n\r\n');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`Idbooking`),
  ADD KEY `FK_booking_client` (`IdClient`);

--
-- Index pour la table `bookingroom`
--
ALTER TABLE `bookingroom`
  ADD PRIMARY KEY (`IdRoom`,`IdBooking`) USING BTREE,
  ADD KEY `FK_bookingroom_booking` (`IdBooking`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`IdClient`);

--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`IdImage`),
  ADD KEY `FK_photo_room` (`IdRoom`);

--
-- Index pour la table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`IdRoom`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `booking`
--
ALTER TABLE `booking`
  MODIFY `Idbooking` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `IdClient` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `photo`
--
ALTER TABLE `photo`
  MODIFY `IdImage` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `room`
--
ALTER TABLE `room`
  MODIFY `IdRoom` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `FK_booking_client` FOREIGN KEY (`IdClient`) REFERENCES `client` (`IdClient`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `bookingroom`
--
ALTER TABLE `bookingroom`
  ADD CONSTRAINT `FK_bookingroom_booking` FOREIGN KEY (`IdBooking`) REFERENCES `booking` (`Idbooking`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_bookingroom_room` FOREIGN KEY (`IdRoom`) REFERENCES `room` (`IdRoom`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `FK_photo_room` FOREIGN KEY (`IdRoom`) REFERENCES `room` (`IdRoom`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
