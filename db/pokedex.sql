-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 20 mrt 2018 om 14:55
-- Serverversie: 5.7.14
-- PHP-versie: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pokedex`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `attacks`
--

CREATE TABLE `attacks` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `damage` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `attacks`
--

INSERT INTO `attacks` (`id`, `name`, `damage`) VALUES
(1, 'Electric Ring ', 50),
(2, 'Pika Punch ', 20);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pokemon`
--

CREATE TABLE `pokemon` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `hitpoints` int(25) NOT NULL,
  `EnergyType` int(11) NOT NULL,
  `weakness_id` int(11) NOT NULL,
  `resistance_id` int(11) NOT NULL,
  `Weakness_multiplier` varchar(50) NOT NULL,
  `Resistance_multiplier` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `pokemon`
--

INSERT INTO `pokemon` (`id`, `name`, `nickname`, `hitpoints`, `EnergyType`, `weakness_id`, `resistance_id`, `Weakness_multiplier`, `Resistance_multiplier`) VALUES
(2, 'pikachu', 'piku', 60, 1, 1, 1, '1,5', '20');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `pokemonattacks`
--

CREATE TABLE `pokemonattacks` (
  `pokemonId` int(11) NOT NULL,
  `attackId` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `pokemonattacks`
--

INSERT INTO `pokemonattacks` (`pokemonId`, `attackId`) VALUES
(2, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `types`
--

INSERT INTO `types` (`id`, `type`) VALUES
(1, 'Lightning'),
(2, 'Fire'),
(4, 'Fighting'),
(5, 'Water');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `attacks`
--
ALTER TABLE `attacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `pokemon`
--
ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `weakness_id` (`weakness_id`),
  ADD KEY `resistance_id` (`resistance_id`),
  ADD KEY `EnergyType` (`EnergyType`);

--
-- Indexen voor tabel `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `attacks`
--
ALTER TABLE `attacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT voor een tabel `pokemon`
--
ALTER TABLE `pokemon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT voor een tabel `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
