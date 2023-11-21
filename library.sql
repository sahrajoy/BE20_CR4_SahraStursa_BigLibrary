-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 21. Nov 2023 um 10:38
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `library`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `author`
--

CREATE TABLE `author` (
  `id_author` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `author`
--

INSERT INTO `author` (`id_author`, `first_name`, `last_name`) VALUES
(1, 'Pavla', 'Wykes'),
(2, 'Juliet', 'Corgenvin'),
(3, 'Datha', 'Penvarne'),
(4, 'Gusty', 'Betjes'),
(5, 'Ervin', 'Sneath'),
(6, 'Kalinda', 'Franz-Schoninger'),
(7, 'Meg', 'Goom'),
(8, 'Georgiana', 'Scola'),
(9, 'Bartholomeus', 'Odam'),
(10, 'Ikey', 'Kleinstern'),
(11, 'Bryanty', 'Cammock'),
(12, 'Essy', 'Benzi'),
(13, 'Hazel', 'Kadd'),
(14, 'Katine', 'Philpault'),
(15, 'Xymenes', 'di Rocca');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `publisher`
--

CREATE TABLE `publisher` (
  `id_publisher` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `publisher`
--

INSERT INTO `publisher` (`id_publisher`, `first_name`, `last_name`, `address`, `city`) VALUES
(1, 'Igor', 'Rallings', '1 Banding Drive', 'Lesnoy'),
(2, 'Beverly', 'Lenoir', '011 Marquette Point', 'Kīevka'),
(3, 'Linc', 'Winyard', '69375 Memorial Trail', 'Volosovo'),
(4, 'Gregoor', 'Sterry', '95 Clove Road', 'Bus’k'),
(5, 'Nickolai', 'Secrett', '3 Hudson Point', 'Longtang'),
(6, 'Grier', 'Lattimore', '53959 Ridge Oak Drive', 'Kariya'),
(7, 'Haleigh', 'Santhouse', '7597 Coolidge Alley', 'Memphis'),
(8, 'Stanly', 'Climson', '30239 Homewood Street', 'Toulouse'),
(9, 'Belicia', 'Cabel', '9839 Nelson Court', 'Carlsbad'),
(10, 'Ardys', 'Morley', '91661 Homewood Trail', 'Bularit');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `isbn` varchar(50) NOT NULL,
  `description` varchar(265) DEFAULT NULL,
  `fk_type` int(11) NOT NULL,
  `fk_author` int(11) NOT NULL,
  `fk_publisher` int(11) NOT NULL,
  `publish_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `stock`
--

INSERT INTO `stock` (`id_stock`, `title`, `img`, `isbn`, `description`, `fk_type`, `fk_author`, `fk_publisher`, `publish_date`) VALUES
(42, 'Napoleon', '6557a569c818f.jpg', '218995271-9', 'Nondisp fx of proximal phalanx of unspecified thumb', 2, 3, 7, '2023-11-05'),
(43, 'D.E.B.S.S', 'product.png', '567834980-5', 'Oth fx of lower end of r radius, init for opn fx type I/2', 3, 1, 9, '2023-05-03'),
(44, 'Outrage (Autoreiji)', '6557a552e750b.jpg', '116984509-6', '3-part fracture of surgical neck of unspecified humerus', 2, 5, 5, '2023-04-07'),
(46, 'Our Vinyl Weighs a Ton: This Is Stones Throw Recor', '6557a5e6dfac0.jpg', '043853426-3', 'Myopathy in diseases classified elsewhere', 1, 10, 5, '2023-11-11'),
(47, 'Lonely Guy, The', 'product.png', '257038185-3', 'Ganglion, left ankle and foot', 3, 13, 6, '2022-12-22'),
(48, 'In the Time of the Butterflies', '6557a60576e54.jpg', '641697540-8', 'Fall into oth water striking surfc causing drown, init', 2, 12, 5, '2023-04-06'),
(49, 'Step Up', '6557a5721feca.jpg', '507683246-X', 'Pulmonary heart disease, unspecified', 2, 4, 7, '2023-08-13'),
(52, 'Last Trapper, The (Le dernier trappeur)', '6557a58666e78.jpg', '091658657-X', 'Poisoning by, adverse effect of and underdosing of aspirin', 1, 12, 8, '2022-12-20'),
(53, 'Grabbers', '6557a58077fc9.jpg', '823541016-8', 'Fracture of orbital floor, right side, 7thB', 1, 5, 7, '2023-05-26'),
(54, 'Sabotagee', '65579e9d21f61.jpg', '374669016-1333', 'Algoneurodystrophy, left lower lege', 2, 2, 3, '2023-01-13'),
(55, 'Seven Pounds', 'product.png', '946980807-X', 'Unsp fracture of unsp foot, init encntr for closed fracture', 3, 15, 2, '2023-05-28'),
(57, 'Return', 'product.png', '173678239-8', 'Nondisplaced unspecified fracture of left lesser toe(s)', 3, 14, 6, '2023-05-09'),
(58, 'Christmas Vacation (National Lampoons Christmas V', '6557a77c985ab.jpg', '873538723-8', 'War op w unarmed hand to hand combat, civilian, sequela', 3, 15, 7, '2023-01-04'),
(60, 'One A.M.', 'product.png', '301597462-9', 'Wedge compression fracture of T11-T12 vertebra, sequela', 2, 11, 10, '2023-02-06'),
(61, 'Soldiers Story, A', '6557a70fc400c.jpg', '669907866-6', 'Insect bite (nonvenomous) of wrist', 1, 11, 7, '2023-06-01'),
(62, 'Pinky', '6557a7944c2f2.jpg', '115302315-6', 'Unspecified choroidal hemorrhage, unspecified eye', 3, 12, 8, '2023-09-09'),
(63, 'Tromeo and Juliet', '6557a748ee39b.jpg', '071510888-3', 'Alzheimers disease with early onset', 3, 10, 1, '2023-10-19'),
(64, 'The Girls from Berlin', '6557a22faa641.jpg', '134315943-1', 'Assault by being hit or run over by motor vehicle, sequela', 2, 4, 2, '2023-08-06'),
(65, 'Greening of Whitney Brown, The', '6557a504a8d13.jpg', '830546814-3', 'Prsn brd/alit pedl cyc injured in nonclsn transport accident', 2, 13, 2, '2023-07-10'),
(66, 'Mr. North', '6557a763ca2b1.jpg', '083712083-7', 'Toxic effect of oth gases, fumes and vapors, undetermined', 3, 5, 3, '2023-05-12'),
(67, 'Dreamscape Adventures', '6557a5d1273be.jpg', '263736882-9', 'Encounter for initial prescription of vagnl ring', 2, 7, 4, '2023-08-28'),
(68, 'Regular Lovers (Amants réguliers, Les)', 'product.png', '250356464-X', 'Pre-exist hyp chronic kidney disease comp preg, third tri', 2, 12, 8, '2023-04-18'),
(70, 'Normal People', '6557a51879149.jpg', '944355996-X', 'Insufficient sleep syndrome', 2, 15, 2, '2023-07-13'),
(71, 'Dog Year, A', '6557a59614b9f.jpg', '218085445-5', 'Nondisp oblique fx shaft of r fibula, 7thN', 2, 9, 2, '2023-10-04'),
(73, 'I Declare War', '6557a58cb86fe.jpg', '350290113-9', 'Traumatic rupture of collat ligament of left wrist, sequela', 1, 6, 9, '2023-04-03'),
(74, 'Avenging Conscience, The', '6557a78741779.jpg', '493652646-0', 'Acquired atrophy of ovary and fallopian tube', 3, 4, 7, '2023-09-20'),
(75, 'Play Dirty', '6557a526e5f99.jpg', '624388467-8', 'Other subluxation of left radial head', 2, 12, 3, '2023-10-05'),
(76, 'Conversations with Other Women', '6557a53518ed4.jpg', '571796600-8', 'Sepsis following ectopic and molar pregnancy', 2, 12, 3, '2023-11-08'),
(77, 'Untouchables, The', 'product.png', '919477634-2', 'Underdosing of unspecified anesthetics, initial encounter', 1, 15, 8, '2023-03-04'),
(78, 'Opportunists, The', '6557a560d2ec4.jpg', '974325713-6', 'Major osseous defect, right forearm', 2, 11, 5, '2023-03-22'),
(79, 'Jiro Dreams of Sushi', 'product.png', '022940534-7', 'Disturbance of cerebral status of newborn, unspecified', 1, 11, 6, '2023-02-15'),
(80, 'Lowlands (Tiefland)', '6557a754e1ee7.webp', '475324303-6', 'Leakage of cystostomy catheter', 3, 13, 1, '2023-03-16'),
(82, 'hey', '65579d5fed52f.jpg', 'hey', 'hey', 2, 2, 4, '2023-11-14');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `type`
--

CREATE TABLE `type` (
  `id_type` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `type`
--

INSERT INTO `type` (`id_type`, `type`) VALUES
(1, 'CD'),
(2, 'Book'),
(3, 'DVD');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_author`);

--
-- Indizes für die Tabelle `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id_publisher`);

--
-- Indizes für die Tabelle `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`),
  ADD KEY `fk_type` (`fk_type`),
  ADD KEY `fk_author` (`fk_author`),
  ADD KEY `fk_publisher` (`fk_publisher`);

--
-- Indizes für die Tabelle `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id_type`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `author`
--
ALTER TABLE `author`
  MODIFY `id_author` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT für Tabelle `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id_publisher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT für Tabelle `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT für Tabelle `type`
--
ALTER TABLE `type`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`fk_type`) REFERENCES `type` (`id_type`),
  ADD CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`fk_author`) REFERENCES `author` (`id_author`),
  ADD CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`fk_publisher`) REFERENCES `publisher` (`id_publisher`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
