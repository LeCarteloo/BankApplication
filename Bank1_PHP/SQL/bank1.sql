-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Sty 2021, 21:56
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
-- Baza danych: `bank1`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `historia`
--

CREATE TABLE `historia` (
  `id` int(11) NOT NULL,
  `numerZlecajacego` varchar(32) NOT NULL,
  `numerOdbiorcy` varchar(32) NOT NULL,
  `tytul` varchar(50) NOT NULL,
  `nazwa` varchar(50) NOT NULL,
  `kwota` double NOT NULL,
  `data` date NOT NULL,
  `id_status` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `historia`
--

INSERT INTO `historia` (`id`, `numerZlecajacego`, `numerOdbiorcy`, `tytul`, `nazwa`, `kwota`, `data`, `id_status`, `type`) VALUES
(21, 'PL07123456785968155681541730', 'PL53123456789707827426232168', '2323', 'test', 33, '2021-01-16', 2, 'Wewnetrzny'),
(22, 'PL07123456785968155681541730', 'PL93876543215798867744255448', 't', 'test', 999, '2021-01-16', 1, 'Zewnetrzny'),
(23, 'PL53123456789707827426232168', 'PL07123456785968155681541730', 'ZA COS', 'test', 999, '2021-01-16', 1, 'Wewnetrzny'),
(24, 'PL07123456785968155681541730', 'PL93876543215798867744255448', '2323', 'TEEEEE', 2323, '2021-01-16', 1, 'Zewnetrzny'),
(25, 'PL07123456785968155681541730', 'PL93876543215798867744255448', '222', 'test', 3333, '2021-01-16', 0, 'Zewnetrzny'),
(26, 'PL07123456785968155681541730', 'PL95123456782379845350090037', 'Usluga', 'Test', 999, '2021-01-19', 1, 'Wewnetrzny'),
(27, 'PL07123456785968155681541730', 'PL95123456782379845350090037', 'Usluga', 'Test', 999, '2021-01-19', 1, 'Wewnetrzny'),
(28, 'PL07123456785968155681541730', 'PL93876543215798867744255448', '2323', 'test', 22, '2021-01-21', 0, 'Zewnetrzny'),
(29, 'PL07123456785968155681541730', 'PL91123456787538809132177925', 'TESTTT', 'TESTTT', 123, '2021-01-21', 1, 'Wewnetrzny'),
(30, 'PL07123456785968155681541730', 'PL91123456787538809132177925', 'TESTTT', 'TESTTT', 123, '2021-01-21', 1, 'Wewnetrzny'),
(31, 'PL07123456785968155681541730', 'PL91123456787538809132177925', 'TESTTT', 'TESTTT', 123, '2021-01-21', 1, 'Wewnetrzny'),
(32, 'PL07123456785968155681541730', 'PL91123456787538809132177925', 'TESTTT', 'TESTTT', 123, '2021-01-21', 1, 'Wewnetrzny'),
(33, 'PL07123456785968155681541730', 'PL91123456787538809132177925', 'TESTTT', 'TESTTT', 123, '2021-01-21', 1, 'Wewnetrzny'),
(34, 'PL07123456785968155681541730', 'PL91123456787538809132177925', 'TESTTT', 'TESTTT', 123, '2021-01-21', 1, 'Wewnetrzny'),
(35, 'PL07123456785968155681541730', 'PL91123456787538809132177925', 'TESTTT', 'TESTTT', 123, '2021-01-21', 1, 'Wewnetrzny'),
(36, 'PL07123456785968155681541730', 'PL74123456787478701274128012', 'xxxxx', 'xxxxx', 888, '2021-01-21', 1, 'Wewnetrzny'),
(37, 'PL07123456785968155681541730', 'PL74123456787478701274128012', '9999', 'test', 9999, '2021-01-21', 1, 'Wewnetrzny'),
(38, 'PL07123456785968155681541730', 'PL74123456787478701274128012', '333', 'test', 7877, '2021-01-22', 1, 'Wewnetrzny'),
(39, 'PL07123456785968155681541730', 'PLt', 't', 't', 0, '2021-01-22', 2, 'Zewnetrzny'),
(40, 'PL07123456785968155681541730', 'PLt', 't', 't', 0, '2021-01-22', 2, 'Zewnetrzny'),
(41, 'PL07123456785968155681541730', 'PLt', 't', 't', 0, '2021-01-22', 2, 'Zewnetrzny'),
(42, 'PL07123456785968155681541730', 'PLt', 't', 't', 0, '2021-01-22', 2, 'Zewnetrzny'),
(43, 'PL07123456785968155681541730', 'PLt', 't', 't', 0, '2021-01-22', 2, 'Zewnetrzny'),
(44, 'PL07123456785968155681541730', 'PL74123456787478701274128012', '333', 'test', 333, '2021-01-22', 1, 'Wewnetrzny'),
(45, 'PL07123456785968155681541730', 'PL95123456782379845350090037', 't', 't', 100, '2021-01-22', 1, 'Wewnetrzny'),
(46, 'PL07123456785968155681541730', 'PL95123456782379845350090037', 't', 't', 100, '2021-01-22', 1, 'Wewnetrzny'),
(47, 'PL07123456785968155681541730', 'PL07123456785968155681541730', 'test', 'tttt', 999, '2021-01-22', 1, 'Wewnetrzny'),
(48, 'PL26123456783367476833309289', 'PL07123456785968155681541730', 'admin', 'admin', 1234, '2021-01-23', 1, 'Wewnetrzny'),
(49, 'PL07123456785968155681541730', 'PL07123456785968155681541730', 'out', 'out', 11, '2021-01-23', 1, 'Wewnetrzny'),
(50, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 'xxxxx', 'xxxxx', 161, '2021-01-23', 2, 'Zewnetrzny'),
(51, 'PL07123456785968155681541730', 'PL07133356785968155681541730', 't', 't', 11, '2021-01-23', 2, 'Zewnetrzny'),
(52, 'PL07123456785968155681541730', 'PL07123456785968155681541730', 't', 'takkk', 0, '2021-01-23', 1, 'Wewnetrzny'),
(53, 'PL07123456785968155681541730', 'PL07123456785968155681541730', 'ta', 'test', 11, '2021-01-23', 1, 'Wewnetrzny'),
(54, 'PL07123456785968155681541730', 'PL07123456785968155681541730', '1', 't', 1, '2021-01-23', 1, 'Wewnetrzny'),
(55, 'PL07123456785968155681541730', 'PL07123456785968155681541730', '0', 'test', 0, '2021-01-23', 1, 'Wewnetrzny'),
(56, 'PL07123456785968155681541730', 'PL07123456785968155681541730', '1', 'test', 0, '2021-01-23', 1, 'Wewnetrzny'),
(57, 'PL07123456785968155681541730', 'PL07123456785968155681541730', 'ttt', 'ttt', 111, '2021-01-23', 1, 'Wewnetrzny'),
(58, '1', '1', '1', '1', 0, '0000-00-00', 1, '1'),
(59, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za las', 'Karol', 0, '2021-01-23', 1, 'Zewnetrzny'),
(60, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za las', 'Karol', 0, '2021-01-23', 1, 'Zewnetrzny'),
(61, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za las', 'Karol', 0, '2021-01-23', 1, 'Zewnetrzny'),
(62, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za las', 'Karol', 0, '2021-01-23', 1, 'Zewnetrzny'),
(63, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za las', 'Karol', 0, '2021-01-23', 1, 'Zewnetrzny'),
(64, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 0, '2021-01-23', 1, 'Zewnetrzny'),
(65, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny'),
(66, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny'),
(67, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny'),
(68, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny'),
(69, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny'),
(70, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny'),
(71, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny'),
(72, 'PL56123456786637060101809197', 'PL32876543213738067968524773', 'Za XD', 'Karol', 999, '2021-01-23', 1, 'Zewnetrzny');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `statuses`
--

CREATE TABLE `statuses` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `statuses`
--

INSERT INTO `statuses` (`id_status`, `status`) VALUES
(1, 'Zrealizowany'),
(2, 'W trakcie realizacji'),
(3, 'Niezrealizowany');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(25) NOT NULL,
  `pesel` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephoneNumber` varchar(9) NOT NULL,
  `location` varchar(50) NOT NULL,
  `street` varchar(50) NOT NULL,
  `houseNumber` varchar(50) NOT NULL,
  `postCode` varchar(50) NOT NULL,
  `bankNumber` varchar(32) NOT NULL,
  `balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `login`, `password`, `pesel`, `email`, `telephoneNumber`, `location`, `street`, `houseNumber`, `postCode`, `bankNumber`, `balance`) VALUES
(12, 'admin', 'admin', 'admin', 'admin', '1234567890', 'admin@gmail.com', '123456789', 'Rzeszow', 'Testowa', '31', '39-999', 'PL07123456785968155681541730', 934056),
(13, '21421412', 't', 't', 't', 't', 'TEST@GMAIL.COM', 't', 't', 't', 't', 't', 'PL53123456789707827426232168', 40025),
(14, '3', '3', 'x', 'x', 'x', 'TEST@GMAIL.COM', 'x', '3', '3', 'x', 'x', 'PL79123456789677303247637404', 100),
(15, '3', '3', '3', '3', '3', '3@gmail.com', '3', '3', '3', '3', '3', 'PL41123456781807909146379364', 0),
(16, 'Filip', 'Papiernik', 'test223', 'test223', '12345678900', 'filippapiernik1999@gmail.com', '123456789', 'Rzeszow', 'Testowaaaaa', '777', '39-999', 'PL80123456785811832185275556', 0),
(17, 'Filip', 'Papiernik', 'tes33333', 'tes33333', '12345678900', 'filippapiernik1999@gmail.com', '123456789', 'Rzeszow', 'Testowa', '777', '39-999', 'PL74123456787478701274128012', 19097),
(18, 'admin', 'Papiernik', 'tes3333333', 'tes3333333', '12345678900', 'filippapiernik1999@gmail.com', '123456789', 'Rzeszow', 'Testowa', '777', '39-999', 'PL91123456787538809132177925', 246),
(20, 'testtest', 'testtest', 'testtest', 'testtest', '12345678900', 'TEST@GMAIL.COM', '123456789', 'Rzeszow', 'Testowa', '39', '39-105', 'PL95123456782379845350090037', 2231),
(21, 't', 't', 't2323131', '123456789@', '12345678900', 'TEST@GMAIL.COM', '123456789', 't', 't', '12', '22-998', 'PL87123456784730284530687728', 0),
(22, 't', 't', '123455224', '1234552@24', '12345678901', 'test@gmail.com', '123456789', 't', 't', '3', '33-105', 'PL72123456782775158345012564', 0),
(23, 't', 't', '11311111', '1131@1111', '12345678900', 'test@gmai.com', '123456789', 't', 't', '1', '13-392', 'PL26123456783367476833309289', 0),
(24, 't', 't', '111212121', '111212121@', '11212121212', 'test@gmail.com', '123456789', 'test', 't', '33', '11-000', 'PL75123456789016356669130649', 0),
(25, 't', 't', '1215125', '1215125@', '11111111111', 't@gmail.com', '222222222', 't', 't', '33', '39-999', 'PL08123456788952782457261053', 0),
(26, 'zalozKonto', 'zalozKonto', 'zalozKonto', 'zalozKonto@', '11111111111', '111111@gmail.cada', '333333333', 'zalozKonto', 'zalozKonto', '33', '99-999', 'PL68123456784774802176929984', 0),
(27, 't', 't', '2412444', '2412444@', '88888555555', '5@gam.cd', '555555555', 't', 't', '33', '33-999', 'PL54123456784304663345280093', 0),
(28, 't', 't', '646364643', '646364643@', '13333333333', '1@gmail.cc', '333333333', 't', 't', '33', '33-333', 'PL28123456783696418439436009', 0),
(29, 't', 't', '1414141', '1414141@', '11111111111', '11111111111111111@gaadm.ccc', '141414114', 't', 't', '333333', '33-993', 'PL30123456785756227708707046', 0),
(30, 't', 't', '333333', '333333@33', '11111111111', '1@gmail.com', '333333333', 't', 't', '33', '35-998', 'PL32123456783738067968524773', 0),
(31, 't', 't', '141414', '141414@33', '11111111111', 'x@g.ccc', '333333333', 't', 't', '33', '33-998', 'PL56123456786637060101809197', 5000),
(32, 'XD', 'XD', 'tttttt2', 'tttttt2@', '11111111111', '2G@gmailxxx.xxx', '111111111', 't', 't', '33', '39-998', 'PL91123456784194971117250491', 0),
(33, 'f', 'd', 'testtt', 'testtt@@', '11111111111', 'tes@tmgail.tt', '111111111', 'tt', 'tt', '13', '39-999', 'PL67123456789671429009730068', 0);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `historia`
--
ALTER TABLE `historia`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeksy dla tabeli `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `historia`
--
ALTER TABLE `historia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT dla tabeli `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT dla tabeli `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
