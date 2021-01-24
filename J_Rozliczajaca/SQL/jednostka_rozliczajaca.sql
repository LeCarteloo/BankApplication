-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2021, 00:45
-- Wersja serwera: 10.4.16-MariaDB
-- Wersja PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `jednostka_rozliczajaca`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `banki`
--

CREATE TABLE `banki` (
  `id_banku` int(11) NOT NULL,
  `rachunek_banku` varchar(32) NOT NULL,
  `nazwa_banku` varchar(256) NOT NULL,
  `numer_banku` varchar(8) NOT NULL,
  `numer_rachunku` varchar(16) NOT NULL,
  `saldo_banku` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `banki`
--

INSERT INTO `banki` (`id_banku`, `rachunek_banku`, `nazwa_banku`, `numer_banku`, `numer_rachunku`, `saldo_banku`) VALUES
(1, 'PL07123456785968155681541730', 'Bank A', '12345678', '5968155681541730', '100000'),
(3, 'PL70102024985117682831438344', 'test', '12345679', '5117682831438344', '0');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `konta`
--

CREATE TABLE `konta` (
  `id_konta` int(11) NOT NULL,
  `numer_konta` varchar(32) NOT NULL,
  `id_banku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `konta`
--

INSERT INTO `konta` (`id_konta`, `numer_konta`, `id_banku`) VALUES
(1, '1233213', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przelewy`
--

CREATE TABLE `przelewy` (
  `id_przelewu` int(11) NOT NULL,
  `id_bankowe` int(11) NOT NULL,
  `numer_zlecajacego` varchar(32) NOT NULL,
  `numer_odbiorcy` varchar(32) NOT NULL,
  `tytul` varchar(256) NOT NULL,
  `nazwa` varchar(128) NOT NULL,
  `kwota` varchar(256) NOT NULL,
  `data` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przelewy`
--

INSERT INTO `przelewy` (`id_przelewu`, `id_bankowe`, `numer_zlecajacego`, `numer_odbiorcy`, `tytul`, `nazwa`, `kwota`, `data`, `status`) VALUES
(22, 70, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'test70', 'xxxxx', '100', '2021-01-23', 1),
(23, 71, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'test71', 'xxxxx', '250', '2021-01-23', 1),
(24, 72, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'test72', 'xxxxx', '20', '2021-01-23', 1),
(25, 73, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'test73', 'xxxxx', '400', '2021-01-23', 1),
(26, 74, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'test74', 'xxxxx', '2500', '2021-01-23', 3),
(27, 75, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'test75', 'xxxxx', '999', '2021-01-23', 1),
(28, 75, 'PL07133356785968155681541730', 'PL07123456785968155681541730', 'inny bank', 'xxxxx', '999', '2021-01-23', 1),
(29, 79, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'test75zamiany', 'xxxxx', '999', '2021-01-23', 1),
(30, 75, 'PL07133356785968155681541730', 'PL07123456785968155681541730', 'inny bank2', 'xxxxx', '9992', '2021-01-23', 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `banki`
--
ALTER TABLE `banki`
  ADD PRIMARY KEY (`id_banku`);

--
-- Indeksy dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD PRIMARY KEY (`id_konta`),
  ADD KEY `id_banku` (`id_banku`);

--
-- Indeksy dla tabeli `przelewy`
--
ALTER TABLE `przelewy`
  ADD PRIMARY KEY (`id_przelewu`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `banki`
--
ALTER TABLE `banki`
  MODIFY `id_banku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `konta`
--
ALTER TABLE `konta`
  MODIFY `id_konta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `przelewy`
--
ALTER TABLE `przelewy`
  MODIFY `id_przelewu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `konta`
--
ALTER TABLE `konta`
  ADD CONSTRAINT `konta_ibfk_1` FOREIGN KEY (`id_banku`) REFERENCES `banki` (`id_banku`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
