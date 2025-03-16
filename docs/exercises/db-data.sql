-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 10.50.1.18:3308
-- Erstellungszeit: 14. Jul 2024 um 15:11
-- Server-Version: 10.9.2-MariaDB-1:10.9.2+maria~ubu2204
-- PHP-Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `gwprg-24-team-12`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Artikel`
--

CREATE TABLE `Artikel` (
  `ID` int(10) NOT NULL,
  `Kategorie` varchar(30) NOT NULL,
  `Bezeichnung` varchar(300) NOT NULL,
  `Farbe` varchar(30) NOT NULL,
  `Preis` double NOT NULL,
  `Beschreibung` varchar(5000) NOT NULL,
  `Vorschaubild` varchar(50) NOT NULL,
  `Material` varchar(100) NOT NULL,
  `Pflege` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Artikel`
--

INSERT INTO `Artikel` (`ID`, `Kategorie`, `Bezeichnung`, `Farbe`, `Preis`, `Beschreibung`, `Vorschaubild`, `Material`, `Pflege`) VALUES
(1, 'T-Shirt', 'Basic Tee 1', 'Schwarz', 24.99, 'Basic Tee very basic', 'assets/images/T-shirt3.jpg', '100% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(2, 'Sweatshirt', 'Basic Sweater 1', 'Schwarz', 34.99, 'Basic Sweater very basic', 'assets/images/Sweatshirt2.jpg', '50% Baumwolle, 50% Polyester', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(3, 'T-Shirt', 'Basic Tee 2', 'Schwarz', 23.99, 'Basic Tee very basic', 'assets/images/T-shirt2.jpg', '100% Leinen', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(4, 'Hose', 'Basic Pants 1', 'Schwarz', 43.99, 'Basic Pants very basic', 'assets/images/Hose1.jpg', '100% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(5, 'T-Shirt', 'Basic Tee 3', 'Schwarz', 33.99, 'Basic Tee very basic', 'assets/images/T-shirt1.jpg', '60% Polyester, 40% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(6, 'Hose', 'Basic Pants 2', 'Schwarz', 53.99, 'Basic Pants very basic', 'assets/images/Hose2.jpg', '100% Leinen', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(7, 'T-Shirt', 'Basic Tee 4', 'Schwarz', 19.99, 'Basic Tee very basic', 'assets/images/T-shirt4.jpg', '100% Polyester', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(8, 'Hose', 'Basic Pants 3', 'Schwarz', 35.99, 'Basic Pants very basic', 'assets/images/Hose3.jpg', '50% Polyester, 50% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(9, 'T-Shirt', 'Basic Tee 5', 'Schwarz', 11.99, 'Basic Tee very basic', 'assets/images/T-shirt5.jpg', '33% Baumwolle, 33% Polyester, 33% Leinen', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(10, 'Hose', 'Basic Pants 4', 'Schwarz', 25.99, 'Basic Pants very basic', 'assets/images/Hose4.jpg', '100% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(11, 'T-Shirt', 'Basic Tee 6', 'Schwarz', 31.99, 'Basic Tee very basic', 'assets/images/T-shirt6.jpg', '100% Polyester', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(12, 'Hose', 'Basic Pants 5', 'Schwarz', 69.99, 'Basic Pants very basic', 'assets/images/Hose5.jpg', '100% Leinen', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(13, 'T-Shirt', 'Basic Tee 7', 'Schwarz', 69.99, 'Basic Tee very basic', 'assets/images/T-shirt7.jpg', '50% Leinen, 50% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(14, 'Hose', 'Basic Pants 6', 'Schwarz', 31.99, 'Basic Pants very basic', 'assets/images/Hose6.jpg', '80% Baumwolle, 20% Leder', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(15, 'T-Shirt', 'Basic Tee 8', 'Schwarz', 44.99, 'Basic Tee very basic', 'assets/images/T-shirt8.jpg', '100% Polyester', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(16, 'Hose', 'Basic Pants 7', 'Schwarz', 33.99, 'Basic Pants very basic', 'assets/images/Hose7.jpg', '100% Leinen', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(17, 'Hose', 'Basic Pants 8', 'Schwarz', 55.55, 'Basic Pants very basic', 'assets/images/Hose8.jpg', '100% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(18, 'Sweatshirt', 'Basic Sweater 2', 'Schwarz', 44.99, 'Basic Sweater very basic', 'assets/images/Sweatshirt1.jpg', '70% Polyester, 30% Baumwolle', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.'),
(19, 'Sweatshirt', 'Basic Sweater 3', 'Schwarz', 79.66, 'Basic Sweater very basic', 'assets/images/Sweatshirt3.jpg', '50% Baumwolle, 50% Leinen', 'Bei 30 Grad pflegeleicht waschen und keinen Weichspüler verwenden.');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `ArtikelBilder`
--

CREATE TABLE `ArtikelBilder` (
  `ID` int(11) NOT NULL,
  `Foto1` varchar(50) NOT NULL,
  `Foto2` varchar(50) NOT NULL,
  `Foto3` varchar(50) NOT NULL,
  `Artikel_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `ArtikelBilder`
--

INSERT INTO `ArtikelBilder` (`ID`, `Foto1`, `Foto2`, `Foto3`, `Artikel_ID`) VALUES
(1, 'assets/images/weyo.jpg', 'assets/images/weyo.jpg', 'assets/images/weyo.jpg', 1),
(2, 'assets/images/weyo.jpg', 'assets/images/weyo.jpg', 'assets/images/weyo.jpg', 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Bestellung`
--

CREATE TABLE `Bestellung` (
  `ID` int(10) NOT NULL,
  `Kunde_ref` int(10) NOT NULL,
  `Artikel_ref` int(10) NOT NULL,
  `Lieferadresse_ref` int(10) NOT NULL,
  `Zahlung_ref` int(10) NOT NULL,
  `Bestelldatum` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Bestellung`
--

INSERT INTO `Bestellung` (`ID`, `Kunde_ref`, `Artikel_ref`, `Lieferadresse_ref`, `Zahlung_ref`, `Bestelldatum`) VALUES
(1, 1, 1, 1, 1, '2024-05-02'),
(2, 2, 2, 2, 2, '2024-05-02');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `BestellungArtikel`
--

CREATE TABLE `BestellungArtikel` (
  `ID` int(10) NOT NULL,
  `Bestellung_ref` int(10) NOT NULL,
  `WarenkorbArtikel_ref` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Kunde`
--

CREATE TABLE `Kunde` (
  `ID` int(10) NOT NULL,
  `Vorname` varchar(20) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Nachname` varchar(20) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Passwort` varchar(100) NOT NULL,
  `TelNummer` varchar(20) CHARACTER SET latin1 COLLATE latin1_german1_ci NOT NULL,
  `Profilbild` blob DEFAULT NULL,
  `Lieferadresse_ref` int(10) DEFAULT NULL,
  `Zahlung_ref` int(10) DEFAULT NULL,
  `Warenkorb_ref` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Kunde`
--

INSERT INTO `Kunde` (`ID`, `Vorname`, `Nachname`, `Email`, `Passwort`, `TelNummer`, `Profilbild`, `Lieferadresse_ref`, `Zahlung_ref`, `Warenkorb_ref`) VALUES
(1, 'Fatih', 'Bozkurt', 'fatih@gmail.de', 'fatih', '0176 111111', 0x30, 1, 1, 1),
(2, 'Asim', 'Eröz', 'asim@gmail.de', 'asim', '0176 222222', 0x30, 2, 2, 2);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Lieferadresse`
--

CREATE TABLE `Lieferadresse` (
  `ID` int(10) NOT NULL,
  `Strasse` varchar(30) NOT NULL,
  `Postleitszahl` varchar(30) NOT NULL,
  `Ort` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Lieferadresse`
--

INSERT INTO `Lieferadresse` (`ID`, `Strasse`, `Postleitszahl`, `Ort`) VALUES
(1, 'Teststraße 1', '23617', 'bikini bottom'),
(2, 'Teststraße 2', '23556', 'Lübeck');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Warenkorb`
--

CREATE TABLE `Warenkorb` (
  `ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Warenkorb`
--

INSERT INTO `Warenkorb` (`ID`) VALUES
(1),
(2),
(4),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `WarenkorbArtikel`
--

CREATE TABLE `WarenkorbArtikel` (
  `ID` int(11) NOT NULL,
  `Warenkorb_ref` int(10) NOT NULL,
  `Artikel_ref` int(10) NOT NULL,
  `Artikelmenge` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `WarenkorbArtikel`
--

INSERT INTO `WarenkorbArtikel` (`ID`, `Warenkorb_ref`, `Artikel_ref`, `Artikelmenge`) VALUES
(1, 1, 1, 2),
(2, 2, 2, 3),
(3, 1, 2, 1),
(4, 1, 1, 1),
(5, 2, 3, 1),
(6, 2, 3, 1),
(7, 2, 3, 1),
(8, 2, 3, 1),
(9, 2, 3, 1),
(10, 2, 3, 1),
(11, 2, 3, 1),
(12, 2, 3, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `Zahlung`
--

CREATE TABLE `Zahlung` (
  `ID` int(10) NOT NULL,
  `Kontoinhaber` varchar(30) NOT NULL,
  `IBAN` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `Zahlung`
--

INSERT INTO `Zahlung` (`ID`, `Kontoinhaber`, `IBAN`) VALUES
(1, 'Fatih Bozkurt', '312312'),
(2, 'Asim Eröz', 'de 2222');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `Artikel`
--
ALTER TABLE `Artikel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_2` (`ID`);

--
-- Indizes für die Tabelle `ArtikelBilder`
--
ALTER TABLE `ArtikelBilder`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Artikel_ID` (`Artikel_ID`);

--
-- Indizes für die Tabelle `Bestellung`
--
ALTER TABLE `Bestellung`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Artikel_ref` (`Artikel_ref`),
  ADD KEY `Kunde_ref` (`Kunde_ref`),
  ADD KEY `Lieferadresse_ref` (`Lieferadresse_ref`),
  ADD KEY `Zahlung_ref` (`Zahlung_ref`);

--
-- Indizes für die Tabelle `BestellungArtikel`
--
ALTER TABLE `BestellungArtikel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `WarenkorbArtikel_ref` (`WarenkorbArtikel_ref`),
  ADD KEY `Bestellung_ref` (`Bestellung_ref`);

--
-- Indizes für die Tabelle `Kunde`
--
ALTER TABLE `Kunde`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `TelNummer` (`TelNummer`),
  ADD KEY `Lieferadresse_ref` (`Lieferadresse_ref`),
  ADD KEY `Zahlung_ref` (`Zahlung_ref`),
  ADD KEY `Warenkorb_ref` (`Warenkorb_ref`);

--
-- Indizes für die Tabelle `Lieferadresse`
--
ALTER TABLE `Lieferadresse`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `Warenkorb`
--
ALTER TABLE `Warenkorb`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `WarenkorbArtikel`
--
ALTER TABLE `WarenkorbArtikel`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `Warenkorb_ref` (`Warenkorb_ref`),
  ADD KEY `Artikel_ref` (`Artikel_ref`);

--
-- Indizes für die Tabelle `Zahlung`
--
ALTER TABLE `Zahlung`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `Artikel`
--
ALTER TABLE `Artikel`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT für Tabelle `Bestellung`
--
ALTER TABLE `Bestellung`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT für Tabelle `BestellungArtikel`
--
ALTER TABLE `BestellungArtikel`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT für Tabelle `Kunde`
--
ALTER TABLE `Kunde`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `Lieferadresse`
--
ALTER TABLE `Lieferadresse`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT für Tabelle `Warenkorb`
--
ALTER TABLE `Warenkorb`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT für Tabelle `WarenkorbArtikel`
--
ALTER TABLE `WarenkorbArtikel`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT für Tabelle `Zahlung`
--
ALTER TABLE `Zahlung`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `ArtikelBilder`
--
ALTER TABLE `ArtikelBilder`
  ADD CONSTRAINT `ArtikelBilder_ibfk_1` FOREIGN KEY (`Artikel_ID`) REFERENCES `Artikel` (`ID`);

--
-- Constraints der Tabelle `Bestellung`
--
ALTER TABLE `Bestellung`
  ADD CONSTRAINT `Bestellung_ibfk_1` FOREIGN KEY (`Artikel_ref`) REFERENCES `Artikel` (`ID`),
  ADD CONSTRAINT `Bestellung_ibfk_2` FOREIGN KEY (`Kunde_ref`) REFERENCES `Kunde` (`ID`),
  ADD CONSTRAINT `Bestellung_ibfk_3` FOREIGN KEY (`Lieferadresse_ref`) REFERENCES `Lieferadresse` (`ID`),
  ADD CONSTRAINT `Bestellung_ibfk_4` FOREIGN KEY (`Zahlung_ref`) REFERENCES `Zahlung` (`ID`);

--
-- Constraints der Tabelle `BestellungArtikel`
--
ALTER TABLE `BestellungArtikel`
  ADD CONSTRAINT `BestellungArtikel_ibfk_1` FOREIGN KEY (`WarenkorbArtikel_ref`) REFERENCES `WarenkorbArtikel` (`ID`),
  ADD CONSTRAINT `BestellungArtikel_ibfk_2` FOREIGN KEY (`Bestellung_ref`) REFERENCES `Bestellung` (`ID`);

--
-- Constraints der Tabelle `Kunde`
--
ALTER TABLE `Kunde`
  ADD CONSTRAINT `Kunde_ibfk_1` FOREIGN KEY (`Lieferadresse_ref`) REFERENCES `Lieferadresse` (`ID`),
  ADD CONSTRAINT `Kunde_ibfk_2` FOREIGN KEY (`Zahlung_ref`) REFERENCES `Zahlung` (`ID`),
  ADD CONSTRAINT `Kunde_ibfk_3` FOREIGN KEY (`Warenkorb_ref`) REFERENCES `Warenkorb` (`ID`);

--
-- Constraints der Tabelle `WarenkorbArtikel`
--
ALTER TABLE `WarenkorbArtikel`
  ADD CONSTRAINT `WarenkorbArtikel_ibfk_1` FOREIGN KEY (`Warenkorb_ref`) REFERENCES `Warenkorb` (`ID`),
  ADD CONSTRAINT `WarenkorbArtikel_ibfk_2` FOREIGN KEY (`Artikel_ref`) REFERENCES `Artikel` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
