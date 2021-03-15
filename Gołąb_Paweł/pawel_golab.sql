-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 15 Mar 2021, 13:26
-- Wersja serwera: 10.3.27-MariaDB-31.cba+deb10u1
-- Wersja PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `pawel_golab`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `delegacje`
--

CREATE TABLE `delegacje` (
  `Lp.` int(11) NOT NULL,
  `Imie` varchar(32) NOT NULL,
  `Nazwisko` varchar(32) NOT NULL,
  `Data_od` date NOT NULL,
  `Data_do` date NOT NULL,
  `Miejsce_wyjazdu` varchar(128) NOT NULL,
  `Miejsce_przyjazdu` varchar(128) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `delegacje`
--

INSERT INTO `delegacje` (`Lp.`, `Imie`, `Nazwisko`, `Data_od`, `Data_do`, `Miejsce_wyjazdu`, `Miejsce_przyjazdu`) VALUES
(1, 'Antoni', 'Iksiński', '2001-02-02', '2001-02-09', 'Poznań', 'Warszawa'),
(2, 'Aleksander', 'Igrek', '2002-02-02', '2020-02-12', 'Poznań', 'Kraków'),
(3, 'Jan', 'Nowak', '2006-06-06', '2006-06-19', 'Poznań', 'Łódź'),
(4, 'Julia', 'Kowalska', '2012-12-12', '2013-01-07', 'Poznań', 'Wrocław'),
(5, 'Majka', 'Lewandowska', '2014-06-10', '2014-06-30', 'Poznań', 'Zielona Góra'),
(6, 'Majka', 'Lewandowska', '2015-06-10', '2015-06-30', 'Poznań', 'Gdańsk');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kontrahenci`
--

CREATE TABLE `kontrahenci` (
  `id` int(11) NOT NULL,
  `nip` char(10) CHARACTER SET utf8mb4 NOT NULL,
  `regon` varchar(12) CHARACTER SET utf8mb4 NOT NULL,
  `nazwa` varchar(128) CHARACTER SET utf8mb4 NOT NULL,
  `platnik` tinyint(1) NOT NULL,
  `ulica` varchar(32) CHARACTER SET utf8mb4 NOT NULL,
  `nr_domu` varchar(8) CHARACTER SET utf8mb4 NOT NULL,
  `nr_mieszkania` varchar(8) CHARACTER SET utf8mb4 NOT NULL,
  `usuniety` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Zrzut danych tabeli `kontrahenci`
--

INSERT INTO `kontrahenci` (`id`, `nip`, `regon`, `nazwa`, `platnik`, `ulica`, `nr_domu`, `nr_mieszkania`, `usuniety`) VALUES
(1, '1209348756', '123045607890', 'Firma III S.A.', 0, 'SÅ‚oneczna', '24', '-', 0),
(2, '1234567890', '123345567789', 'Firma I Z.O.O', 1, 'Polna', '30', '4', 0),
(3, '0987654321', '098876554321', 'FIRMA II', 1, 'LeÅ›na', '29', '8', 0),
(4, '1357924689', '135792468024', 'Firma, IV S.K.A', 0, 'DÅ‚uga', '22', '-', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
