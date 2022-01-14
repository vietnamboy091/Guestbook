-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Erstellungszeit: 16. Dez 2021 um 19:53
-- Server-Version: 10.4.17-MariaDB
-- PHP-Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `bbs`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `antworten`
--

CREATE TABLE `antworten` (
  `username` varchar(25) COLLATE utf8mb4_german2_ci NOT NULL,
  `nachricht` varchar(500) COLLATE utf8mb4_german2_ci NOT NULL,
  `fragen_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `antworten`
--

INSERT INTO `antworten` (`username`, `nachricht`, `fragen_id`) VALUES
('', 'Halo Combat Evolved ist das beste Halo der gesamten Reihe', 1),
('', 'Zufällig entdeckt der Master Chief, dass die Arche dabei ist, den ersten zerstörten Halo-Ring wiederaufzubauen. Er aktiviert den Ring, wodurch sich der unfertige Ring selbst zerstört und die Arche schwer beschädigt wird. Das Portal zur Erde kollabiert und nur der Gebieter entkommt rechtzeitig.', 3),
('', 'Nach der Zerstörung von Halo am Ende des ersten Teils wird der Master Chief bei seiner Rückkehr als Held gebührend gefeiert. In einem anderen Teil der Galaxie befasst sich währenddessen die Allianz in ihrem Hauptsitz, der heiligen Stadt High Charity, mit den Anführer der Flotte, den man für das Scheitern auf Halo verantwortlich macht. Als Folge seines Versagens wird er zum Tode verurteilt und der Master Chief zum größten Feind der Allianz erklärt.\r\n\r\nDie Feierlichkeiten auf der Erde halten demen', 4),
('', 'Die Allianzflotte hat die Erde erreicht und sucht in den Ruinen von Neu Mombasa wieder nach einem heiligen Artefakt. Während das Blutsväterschiff, die Dreadnought, in die Atmosphäre eindringt, springt der Master Chief ab und wird von Sgt. Johnson und einem Bergungstrupp gefunden. Ebenfalls mit dabei ist der Gebieter, der von unserem Spartan sehr skeptisch begrüßt wird. Genau genommen hält er ihm eine Pistole an den Kopf. Doch Sgt. Johnson erklärt ihm, dass die Eliten nun gemeinsam mit den Mensch', 5),
('', 'Halo 2. Nach der Zerstörung von Halo wird Spartan 117 bei seiner Rückkehr als Held gefeiert. ... Er wird zum Tode verurteilt, der Master Chief wiederum zum Dämon und Feind der Allianz erklärt.', 4),
('', 'Die Allianz ist auf der Erde angekommen und sucht in den Ruinen von Neu Mombasa nach einem heiligen Objekt. Der Master Chief ist an Bord des Blutsväterschiffes, das mit dem Propheten der Wahrheit von High Charity aus zur Erde unterwegs ist, um dort zu landen.', 5),
('', 'Vier Jahre nach den Geschehnissen in Halo 3 treibt der Chief in den Überresten der Forward Unto Dawn noch immer im Weltraum. Das Wrack nähert sich einem Planeten namens Requiem, woraufhin Cortana Spartan 117 aus dem Kälteschlaf holt', 6),
('', 'Von der blindwütigen Cortana fehlt jede Spur und der Master Chief treibt bewusstlos durch die Weiten des Weltalls. Der Pilot aus dem \"Discover-Hope\"-Trailer hilft dem Supersoldaten und hat auch einen Namen, den wir im Laufe der Kampagne erfahren', 7),
('', 'Cortana war eine \"schlaue\" Künstliche Intelligenz des United Nations Space Commands.', 8),
('', 'Master Chief, eigentlich John-117, ist einer der SPARTAN-II-Soldaten und Protagonist der Halo-Reihe, weshalb er in jedem der Hauptteile den spielbaren Charakter darstellt.', 9),
('', 'Halo ist eine Ego-Shooter-Spieleserie, deren einzelne Teile von Bungie, 343 Industries und den Ensemble Studios für Microsoft Games, heute Xbox Game Studios entwickelt wurden.', 10),
('', '1. Das Waffen-Feedback\r\n2. Halo und seine Geschichte\r\n3. Im Warthog durch die Ringwelt\r\n4. Der Koop-Modus\r\n5. Ein Augenschmaus', 11);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `fragen`
--

CREATE TABLE `fragen` (
  `fragen_id` int(11) NOT NULL,
  `frage` varchar(200) COLLATE utf8mb4_german2_ci NOT NULL,
  `extra` varchar(400) COLLATE utf8mb4_german2_ci NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_german2_ci NOT NULL,
  `geschlossen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `fragen`
--

INSERT INTO `fragen` (`fragen_id`, `frage`, `extra`, `username`, `geschlossen`) VALUES
(1, 'Was ist das beste Halo?', 'nichts', 'Denis \r\n', 1),
(3, 'Was passiert in Halo 1?', 'nichts', 'Denis', 1),
(4, 'Was passiert in Halo 2?', 'nichts ', 'Denis', 1),
(5, 'Was passiert in Halo 3?', 'nichts ', 'Denis', 1),
(6, 'Was passiert in Halo 4?', 'nichts', 'Denis', 1),
(7, 'Was passiert in Halo 5?', 'nichts', 'Denis', 1),
(8, 'Wer ist Cortana ? ', 'nichts', 'Denis', 1),
(9, 'Wer ist Master Chief ? ', 'nichts', 'Denis', 1),
(10, 'Was ist Halo ? ', 'nichts', 'Denis', 1),
(11, 'Warum Halo ? ', 'nichts', 'Denis', 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rollen`
--

CREATE TABLE `rollen` (
  `rollen_id` int(11) NOT NULL,
  `rollen_name` varchar(200) COLLATE utf8mb4_german2_ci NOT NULL,
  `berechtigung` varchar(200) COLLATE utf8mb4_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `rollen`
--

INSERT INTO `rollen` (`rollen_id`, `rollen_name`, `berechtigung`) VALUES
(1, 'Admin', 'Admin der Seite. Vollen Zugriff auf alles '),
(2, 'User', 'Kann Nachrichten schreiben und mitwirken');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE `user` (
  `username` varchar(25) COLLATE utf8mb4_german2_ci NOT NULL,
  `email` varchar(998) COLLATE utf8mb4_german2_ci NOT NULL,
  `passwort` varchar(20) COLLATE utf8mb4_german2_ci NOT NULL,
  `rolle` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_german2_ci;

--
-- Daten für Tabelle `user`
--

INSERT INTO `user` (`username`, `email`, `passwort`, `rolle`) VALUES
('Denis', 'denis.delwa@gmail.com', 'bang6olufsen', 1);

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `fragen`
--
ALTER TABLE `fragen`
  ADD PRIMARY KEY (`fragen_id`);

--
-- Indizes für die Tabelle `rollen`
--
ALTER TABLE `rollen`
  ADD PRIMARY KEY (`rollen_id`),
  ADD UNIQUE KEY `rollen_name` (`rollen_name`);

--
-- Indizes für die Tabelle `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`) USING HASH,
  ADD KEY `rolle_2` (`rolle`),
  ADD KEY `rolle_3` (`rolle`);

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`rolle`) REFERENCES `rollen` (`rollen_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
